<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailVerification extends Mailable
{
    use SerializesModels;

    public $customer;

    public function __construct($customer)
    {
        $this->customer = $customer;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'RESAPPIN - Verification',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'session.email-verification',
            with: ['user' => $this->customer, 'message' => $this]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
