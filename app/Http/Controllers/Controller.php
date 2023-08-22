<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   public function sendSms()
   {
    $basic  = new \Vonage\Client\Credentials\Basic("db901df5", "vLNovP2ebXyMIl5C");
    $client = new \Vonage\Client($basic);

    $response = $client->sms()->send(
    new \Vonage\SMS\Message\SMS("639945756114", 'ORMS', 'Hello! a message from - Online Registration and Monitoring System')
    );

    $message = $response->current();

    if ($message->getStatus() == 0) {
         Alert::success('Message sent successfully','success')->autoClose(6000);
            return redirect('/admin-dashboard');
    } else {
        toast('Failed to send message!','error')->autoClose(6000);
        return redirect('/admin-dashboard');
    }
    }

}
