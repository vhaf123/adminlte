<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    public function index(){
        return view('contactanos.index');
    }

    public function mensaje(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'mensaje' => 'required',
        ]);

        Mail::send('contactanos.mensaje', $request->all(), function ($message) {
            /* $message->from('john@johndoe.com', 'John Doe');
            $message->sender('john@johndoe.com', 'John Doe'); */
            $message->to('victor.aranaf92@gmail.com', 'Victor Arana');
            /* $message->cc('john@johndoe.com', 'John Doe');
            $message->bcc('john@johndoe.com', 'John Doe'); 
            $message->replyTo('john@johndoe.com', 'John Doe');*/
            $message->subject('Información de contácto');
            /* $message->priority(3);
            $message->attach('pathToFile'); */
        });

        return redirect()->route('contactanos.index')->with('info', 'Tu mensaje se envío con éxito');
    }
}
