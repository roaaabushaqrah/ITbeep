<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Services;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $services = Services::all();
        $orders = Orders::all();
        return view('home',compact('services', 'orders'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {    $this->validation($request);
        User::create($request->all());

        $to_name = $request->email;
        $to_email = $request->email;
        $data = array('name'=>'Ogbonna Vitalis(sender_name)', 'body' => " hello $request->name , your email is: $request->email , your service/s: $request->services , your order time: $request->time ");
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('IT beep ');
            $message->from('roaa.abushaqrah@gmail.com','ITbeep ');
        });
    }
}
