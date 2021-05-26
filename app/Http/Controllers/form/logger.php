<?php

namespace App\Http\Controllers\form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class logger extends Controller
{
    //
    public function log($level,$message)
    {

       // tries to add the message to the user's identification
       if (session()->has('user')) {
           $message = '['.session('user').']-'. $message;
       }
       else
       {
           $message = '[N/A] -'.$message;
       }

      //records an entry in the logs
      Log::channel('main')->$level($message);
    }
}
