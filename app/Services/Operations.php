<?php
namespace App\Services;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

Class Operations{
    public static function decryptId($value){
                // check if id is encrypted
                try {
                    $value = Crypt::decrypt($value);
                } catch (DecryptException $e) {
                    return redirect()->route('home');
                }

                return $value;
    }
}

?>
