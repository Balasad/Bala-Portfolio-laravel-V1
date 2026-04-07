<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $name,
        public string $email,
        public string $enquiryType,
        public string $enquiryLabel,
        public string $message,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Thank you for reaching out, {$this->name}!",
            to: $this->email,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.contact-confirmation',
            with: [
                'name' => $this->name,
                'enquiryType' => $this->enquiryType,
                'enquiryLabel' => $this->enquiryLabel,
                'message' => $this->message,
            ],
        );
    }
}
