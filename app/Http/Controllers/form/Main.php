<?php

namespace App\Http\Controllers\form;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\MakeFormRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\form\EncryptionController;
use App\Http\Controllers\form\logger;
use App\Http\Requests\homeRequest;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Main extends Controller
{
   private $Encrytion;
   private $Logg;
   public function __construct()
   {
     $this->Encrytion = new EncryptionController();
     $this->Logg = new logger();
   }

    public function index()
    {
        //checks if the user is logged in
        if($this->checkSession())
        {
            return redirect()->route('home');
        }
         else
         {
            return redirect()->route('loginform');
         }
    }
    // =============================================================
      private function checkSession()
      {
          return session()->has('user');
      }


    // =================================================================
    public function loginform()
    {
        //check if it session already exist
        if($this->checkSession())
        {
            return redirect()->route('index');
        }

        $error = session('status');
        $data =[];
        if(!empty($error))
        {
            $data = [
                   'er'=>$error
            ];
        }


        return view('form.login',$data);
    }
    // ===============================================================

        public function logout()
        {
            //logger
            $this->Logg->log('info','logout');
           // Log::channel('main')->info('have an logout');
            session()->forget('user');
            return redirect()->route('loginform');
        }
   // =================================================================
    public function form_login_submit(MakeFormRequest $request)
    {
       /* $validated = $request->validate(
            // $rules
            [

                //'text_username'=>'bail|required|max:5|min:1',
                'text_username'=>'required|email|max:30',
                'text_password'=>'required|',


            ],
            // messages
            [
                   'text_username.required'=> 'this field is required',
                   'text_username.email' =>'please enter the valid email',
                   'text_username.max' =>'please only required 30 field'
            ]
        );
       */

       // checks if the form was submitted
        if(!$request->isMethod('post'))
        {
            return redirect()->route('index');
        }

       //check if it session already exist
       if($this->checkSession())
       {
           return redirect()->route('index');
       }

        //validate
        $request->validated();


        // rest of code check data for login
        $user = $request->input('text_username');
        $password = $request->input('text_password');
        $telephone =  $request->input('text_telephone');


      $login = Login::where('email', $user)->first();




      //check if the user exist in the database
      if (!$login) {
          //log
          $this->Logg->log('error',$user.'user does not exits');

           session()->flash('status',['user does not exits']);
          return redirect()->route('loginform');

      }





  //    check if the password is correct

     if(!Hash::check($password, $login->password))
       {
           //logg
           $this->Logg->log('error',$user.'  password is not valid');


        session()->flash('status',['password is not valid ']);
        return redirect()->route('loginform');
       }

     //  login is valid

       session()->put('user',$user);

  //logger

    $this->Logg->log('info','logged in.');
       return redirect()->route('index');








        // insert data into database
      /* $login = new Login;
        $login->email = $user;
        $login->password = $password;
        $login->telephone = $telephone;
        $login->save();

        return redirect()->route('loginform');
        */

    }
// =======================================================
  //    Home
// =======================================================
    public function home()
    {
        if(!$this->checkSession('form.login'))
        {
            return redirect()->route('loginform');

        }
        $data =[
            'login'=> Login::all()
        ];
         return view('form.home',$data);
    }
    // ==================================================

   public function edit($id)
   {
       $id = $this->Encrytion->decrypt($id);
       echo 'the user the editor -----'.$id;
   }
   // ======================================================== upload

   public function upload(homeRequest $request)
   {
    $request->validated();

       $request->file->store('public/images');
       echo 'finish';
   }
   // ======================================================= list file
   public function list_files()
   {
        $files = Storage::files('public/images');
        echo '<pre>';
        print_r($files);
   }
   // ============================================================ download file

   public function download($file)
    {
      return response()->download("storage/images/$file");
    }

}
