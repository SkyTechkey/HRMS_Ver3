<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;
 
class MailController extends Controller
{
    public function send()
    {
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo';
        $objDemo->sender = 'Nhan';
        $objDemo->receiver = 'Vinh';
 
        Mail::to("vinh.hvdn@gmail.com")->send(new MyTestMail($objDemo));
    }
}