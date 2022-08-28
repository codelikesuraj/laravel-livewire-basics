<?php

namespace App\Http\Livewire;

use App\Mail\ContactFormMailable;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'message' => 'required',
    ];

    protected function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $contact = $this->validate();

        $contact['name'] = $this->name;
        $contact['email'] = $this->email;
        $contact['phone'] = $this->phone;
        $contact['message'] = $this->message;

        Mail::to($this->email)->send(new ContactFormMailable($contact));

        $this->resetForm();

        session()->flash('status', 'Contact details have been mailed successfully');
    }

    private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
