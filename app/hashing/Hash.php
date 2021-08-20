<?php

namespace App\hashing;


class  Hash{

    public static function hashThis($password){

        $timeTarget = 0.05; // 50 milliseconds 

        $cost = 8;
        do {
            $cost++;
            $start = microtime(true);
            $hspasswrd = password_hash($password, PASSWORD_BCRYPT, ["cost" => $cost]);
            $end = microtime(true);
        } while (($end - $start) < $timeTarget);

        if (password_needs_rehash($hspasswrd, PASSWORD_BCRYPT, ["cost" => $cost])) {
            $newHash = password_hash($password, PASSWORD_BCRYPT, ["cost" => $cost]);
            return $newHash;
        }else{
            return $hspasswrd;
        }
    }


   
    public static function verifyThis($password, $hspasswrd){

        if (password_verify($password, $hspasswrd)) {
           return true;
        } else {
           return false;
        }
    }


}