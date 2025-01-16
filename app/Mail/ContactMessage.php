<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;

    // Maak een nieuwe instantie van de mailable
    public function __construct($contactData)
    {
        $this->contactData = $contactData;
    }

    public function build()
    {
        return $this->subject('Contact Message')
                    ->view('emails.contact')  // De view voor je e-mail
                    ->with('contactData', $this->contactData); // Stuur de gegevens naar de view
    }
}

