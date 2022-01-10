<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SwandikaEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->from('swandikatio97@gmail.com')
        //            ->view('email')
        //            ->with(
        //             [
        //                 'nama' => 'Swandika Tio',
        //                 'website' => 'swandika.com',
        //             ]);
        return $this->subject('Mini CRM Laravel')
            ->view('emails.company');
    }
}
