<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShip extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $custom;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$custom)
    {
        //
        $this->data = $data;
        $this->custom = $custom;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('shop.mail')->subject('new mail');
    }
}
