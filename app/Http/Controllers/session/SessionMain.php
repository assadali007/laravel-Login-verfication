<?php

namespace App\Http\Controllers\session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Session is can store information on the server side information is server short live.that is it is not stored on the databasr
class SessionMain extends Controller
{
    public function AcessAllData(Request $request)
    {

        //Retriving all session data
        $data = $request->session()->all();
        echo '<pre>';
        print_r($data);


    }
    // =========================================================
    public function storeData(Request $request)
    {

      // store data in the session
    //  $request->session()->put('key', 'value');
     // $request->session()->put('surename','assad ali');

     #another way to store session
     $data =[
           'surename'=>'usama',
           'country'=>'america',
            'id'=>23,
             'sex'=>'M'

     ];
     $request->session()->push('data.teams', 'developers');
    $request->session()->put($data);

    echo 'data has been added';

    }
    //==================================================================

    public function getSingleData(Request $request)
    {
       // $value = $request->session()->get('surename');
       // echo $value;

        //another way

        if ($request->session()->has('country')) {
            echo $request->session()->get('country');
        }
        else
         {
            echo 'no data in the session';
        }

    }
    // ===========================================================================
    public function deleteData(Request $request)
    {
        $request->session()->flush();
      echo  'data is deleted';
    }


}
