<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifikasiEmailUntukRegistrasiPermohonanMasyarakat extends Mailable
{
    use Queueable, SerializesModels;

    public $nama;
    public $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama, $link)
    {
        $this->nama = $nama;
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('User.Mail.message')->with(['nama' => $this->nama, 'link' => $this->link]);
    }
}
