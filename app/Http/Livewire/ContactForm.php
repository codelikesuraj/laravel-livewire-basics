<?php

namespace App\Http\Livewire;

use App\Mail\ContactFormMailable;
use App\Models\User;
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

        // create contact
        $this->create($contact);

        // mail to user
        $this->mail($contact);

        // reset form
        $this->resetForm();

        session()->flash('status', 'Contact details have been mailed successfully');
    }

    private function mail($contact)
    {
        Mail::to($contact['email'])->send(new ContactFormMailable($contact));
    }

    private function create($contact)
    {
        $contact['name'] = $this->name;
        $contact['email'] = $this->email;
        $contact['phone'] = $this->phone;
        $contact['message'] = $this->message;

        // store user in database
        return User::create($contact);
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
