<?php

namespace App\Services;

use App\Models\User;


class UserService
{
    /**
     * Register an user in application through
     * an email, the user data is in body email.
     */
    public function registerUser($message)
    {
        $user = new User();

        // check if that email exist in database
        $isRegistered = $user::where('email', $message->from)->first();
        if ($isRegistered) {
            return 'Exist';
        }

        $user->email = $message->from;
        $user->nick_name = $message->text;

        return $user->register($user);
    }

    public function updateUser($message)
    {  
        $json = json_encode($message->text);

        $fn = $json['first_name'];
        $ln = $json['last_name'];

        $user = new User();
        // check if that email exist in database
        $isRegistered = $user::where('email', $message->from)->first();
        if($isRegistered){
            $isRegistered->first_name = $fn;
            $isRegistered->last_name = $ln;
            $isRegistered->save();
        }
        return $isRegistered;
    }
}