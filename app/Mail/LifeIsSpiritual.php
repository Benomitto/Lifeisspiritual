<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LifeIsSpiritual extends Mailable
{
    use Queueable, SerializesModels;
	
	
	public $dataReceived; 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
		$this->dataReceived = $data; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mailTemplate');
		return $this->markdown('emails.attachment')
		->subject('books')
		->attach(public_path('/docs/Dummypdf.pdf'),[
			'as' => 'Dummypdf.pdf',
			'mime' => 'application/pdf'
		]);
    }
}
