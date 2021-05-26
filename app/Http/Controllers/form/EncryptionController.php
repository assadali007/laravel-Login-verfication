<?php

namespace App\Http\Controllers\form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EncryptionController extends Controller
{
    //
    public function encrypt($value)
    {
        return bin2hex(openssl_encrypt($value,'aes-256-cbc','FiUV5P25M2AHhPxp6FvgDA2nIErm1qPp',OPENSSL_RAW_DATA,'dR7kmMdFa7D9hru5'));
      // return  Crypt::encryptString($value);
    }
     public function decrypt($value_encrypt)
     {
         if(strlen($value_encrypt)%2 != 0)
         {
             return null;
         }

         return openssl_decrypt(hex2bin($value_encrypt),'aes-256-cbc','FiUV5P25M2AHhPxp6FvgDA2nIErm1qPp',OPENSSL_RAW_DATA,'dR7kmMdFa7D9hru5');
     }
}
