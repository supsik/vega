<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\PhoneVerificationCode;
use App\Models\User;
use Illuminate\Support\Str;
use App\Medods\Exceptions\MedodsException;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\PhoneVerification\PhoneAuthLimitException;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request): View
    {
        $user = auth()->user()->getMedodsUser();

        return view('user.profile', compact('user'));
    }

    public function update(int $medodsId, ProfileUpdateRequest $request): RedirectResponse
    {
        $data = [
            'email' => $request->input('email'),

            'denyCalls' => $request->boolean('denyCalls'),
            'denyEmail' => $request->boolean('denyEmail'),
            'denySmsNotifications' => $request->boolean('denySmsNotifications'),
            'denySmsDispatches' => $request->boolean('denySmsDispatches'),
        ];

        app('medods')->client()->update($medodsId, $data);

        flash()->success('Профиль успешно обновлен!');

        return redirect()->back();
    }

    public function sendSmsCode(Request $request): JsonResponse
    {
        // Validate the phone number parameter
        $query = $request->all();
        $phoneNumber = $query['phone'] ?? '';
        if (!$this->isValidPhoneNumber($phoneNumber))
            return response()->json(['error' => 'Неправильный формат телефона'], 400);

        // Proceed to send verification code
        try {
            PhoneVerificationCode::sendCode($phoneNumber);
        } catch (PhoneAuthLimitException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

        return response()->json(['message' => 'Код отправлен по смс'], 200);
    }

    public function confirmSmsCode(Request $request): JsonResponse
    {
        // Validate the phone number and code parameters
        $query = $request->all();
        $phoneNumber = $query['phone'] ?? '';
        $code = $query['code'] ?? '';
        // returns 0 if no code with this phone in db
        if (PhoneVerificationCode::validateCode($code, Str::phoneNumber($phoneNumber)))
            return response()->json(['message' => 'Номер подтвержден'], 200);

        return response()->json(['error' => 'Неправильный код'], 400);

    }
    //register user
    public function registerUser(Request $request): JsonResponse
    {
        $query = $request->all();
        // Check if the user is already registered
        if (User::existsWithPhone(Str::phoneNumber($query['phone'])))
            return response()->json(['error' => 'Вы уже зарегистрированы'], 409);

        try {
            $medodsUser = app('medods')->client()->create([
                'phone' => $query['phone'],
                'name' => $query['name'],
                'surname' => $query['surname'],
                'denyCalls' => true,
                'denyEmail' => true,
                'denySmsNotifications' => true,
                'denySmsDispatches' => true,
                'denyWhatsappMessages' => true,
            ]);
        } catch (MedodsException) {
            return response()->json(['message' => 'Вы уже зарегистрированы'], 400);
        }
        $result = User::create([
            'medodsId' => $medodsUser['id'],
            'phone' => $query['phone'],
            'password' => Hash::make($query['password']),
        ]);
        if (empty($result)) {
            return response()->json(['message' => 'Произошла ошибка.Пожалуйста, обратитесь к администратору'], 400);
        }
        return response()->json(['message' => 'Вы успешно зарегистрированы'], 200);
    }

    private function isValidPhoneNumber(string $phoneNumber): bool
    {
        // Remove any non-digit characters from the phone number
        $phoneNumber = preg_replace('/\D/', '', $phoneNumber);

        // Check if the phone number matches the desired format
        if (strlen($phoneNumber) === 11 && substr($phoneNumber, 0, 1) === '7') {
            return true;
        }

        return false;
    }
    //forgot password method
    public function forgotPassword(Request $request): JsonResponse
    {
        $query = $request->all();
        $phone = $query['phone'] ?? '';
        $newPassword = $query['password'] ?? '';
        $user = User::where('phone', Str::phoneNumber($phone))->first();
        if (isset($user)) {
            $user->update(['password' => Hash::make($newPassword)]);

            $isAuth = Auth::attempt([
                'phone' => Str::phoneNumber($phone),
                'password' => $newPassword,
            ]);

            if ($isAuth) {
                return response()->json(['message' => 'Пароль успешно обновлен'], 200);
            }
            return response()->json(['error' => 'Неизвестная ошибка.Пожалуйста, обратитесь к администрации'], 500);
        } else {
            return response()->json(['error' => 'Вы не зарегистрированы'], 400);
        }
    }
    public function login(Request $request): JsonResponse
    {
        $query = $request->all();
        $phone = $query['phone'] ?? '';
        $password = $query['password'] ?? '';
        $code = $query['code'] ?? '';

        $user = User::where('phone', Str::phoneNumber($phone))->first();

        if (isset($user)) {
            if (!empty($password)) {
                $isAuth = Auth::attempt([
                    'phone' => Str::phoneNumber($phone),
                    'password' => $password
                ], true);

                if ($isAuth)
                    return response()->json(['message' => 'Вы успешно вошли в систему'], 200);
                return response()->json(['error' => 'Неверный пароль'], 400);
            } elseif (!empty($code)) {
                if (PhoneVerificationCode::validateCode($code, Str::phoneNumber($phone))) {

                    Auth::login($user);

                    return response()->json(['message' => 'Вы успешно вошли в систему'], 200);
                } else {
                    return response()->json(['error' => 'Неверный код'], 400);
                }
            } else {
                return response()->json(['error' => 'Введите код или пароль'], 400);
            }
        } else {
            return response()->json(['error' => 'Вы не зарегистрированы'], 400);
        }
    }
}
