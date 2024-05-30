<?php

namespace App\Http\Livewire\Form;

use App\Mail\ReviewMail;
use App\Models\Variable;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Review extends Component
{
    public $name;
    public $phone;
    public $message;

    protected $rules = [
        'name' => ['required', 'string', 'min:3', 'max:150'],
        'message' => ['required', 'string', 'min:5', 'max:999'],
        'phone' => ['sometimes', 'string', 'min:10', 'max:999'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function send()
    {
        $data = $this->validate();

        $to = Variable::query()
            ->select('review_email')
            ->first();

        Mail::to($to->review_email)
            ->send(new ReviewMail($data['name'], $data['message'],$data['phone']));

        $this->dispatchBrowserEvent('flash-review');
        $this->reset(['phone', 'message']);
    }


    public function mount(string $name)
    {
        $this->name = $name;

    }

    public function render()
    {
        return view('livewire.form.review');
    }
}
