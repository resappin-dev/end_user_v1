<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;
    public $resetUrl;

    public function __construct($customer)
    {
        $this->customer = $customer;
        $this->resetUrl = url('reset-password/' . $customer->email);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'RESAPPIN - Reset Password',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'session.password-reset-mail-template',
            with: ['user' => $this->customer, 'message' => $this, 'resetUrl' => $this->resetUrl]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
