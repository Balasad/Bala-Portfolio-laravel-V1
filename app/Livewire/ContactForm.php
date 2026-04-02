<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Component
{
    public string $name = '';
    public string $email = '';
    public string $message = '';
    public bool $isSubmitting = false;
    public string $successMessage = '';

    protected $rules = [
        'name' => 'required|min:2|max:100',
        'email' => 'required|email|max:255',
        'message' => 'required|min:10|max:5000',
    ];

    protected $messages = [
        'name.required' => 'Please enter your name.',
        'email.required' => 'Please enter your email address.',
        'email.email' => 'Please enter a valid email address.',
        'message.required' => 'Please enter your message.',
        'message.min' => 'Message must be at least 10 characters.',
    ];

    public function submit()
    {
        $this->validate();
        $this->isSubmitting = true;

        try {
            // In production, you would send an email here
            // Mail::to('contact@bala.dev')->send(new ContactMail($this->name, $this->email, $this->message));
            
            $this->successMessage = 'Thank you! Your message has been sent successfully.';
            $this->reset(['name', 'email', 'message']);
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to send message. Please try again.');
        } finally {
            $this->isSubmitting = false;
        }
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
