<?php

namespace App\Http\Livewire\Form;

use App\Mail\ContactMail;
use App\Models\Variable;
use App\Rules\PhoneNumber;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Contact extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;


    protected function rules() {
        return [
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'phone' => ['required', 'string', 'max:18', new PhoneNumber()],
            'message' => ['required', 'string', 'min:5', 'max:999'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function send()
    {
        $data = $this->validate();

        $to = Variable::query()
            ->select('contact_email')
            ->first();

        Mail::to($to->contact_email)
            ->send(new ContactMail($data['name'], $data['email'], $data['phone'], $data['message']));

        $this->emit('flash', 'success', 'Ваш заявка была успешно отправлена!');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.form.contact');
    }
}
