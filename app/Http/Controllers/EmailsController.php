<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\LifeIsSpiritualBooks;
class EmailsController extends Controller
{
    //
	    public function index()

    {

        $pdf = PDF::loadView('emails.myTestMail', $data);

  

        Mail::send('emails.myTestMail', $data, function($message)use($data, $pdf) {

            $message->to($data["email"], $data["email"])

                    ->subject($data["title"])

                    ->attachData($pdf->output(), "text.pdf");

        });

  

        dd('Mail sent successfully');

    }
}
