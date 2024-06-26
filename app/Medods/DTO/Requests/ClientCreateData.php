<?php

namespace App\Medods\DTO\Requests;

use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

class ClientCreateData extends Data
{
    public string $surname;

    public string $name;

    public ?string $secondName;

    #[Email]
    public ?string $email;

    public ?string $birthdate;

    #[Min(11)]
    public string $phone;

    #[In('male', 'female')]
    public ?string $sex;

    public ?bool $denyCalls;

    public ?bool $denyEmail;

    public ?bool $denySmsNotifications;

    public ?bool $denySmsDispatches;

    public ?string $serviceCard;

    public ?array $clientGroupIds;

    public ?IdCardData $idCard;

    public ?AddressData $address;

    public ?string $patientCardNumber;

    public static function messages(): array
    {
        return [
            'surname.required' => ':attribute обязательный параметр',

            'name.required' => ':attribute обязательный параметр',

            'phone.required' => ':attribute обязательный параметр',
        ];
    }
}
