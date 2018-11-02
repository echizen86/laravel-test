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
        $text = stripslashes(html_entity_decode($message->text));

        $json = json_decode($text, true);
        // $json = $message->text;

        $fn = $json["first_name"];
        $ln = $json["last_name"];
        $nn = ["nick_name"];

        $user = new User();
        // check if that email exist in database
        $isRegistered = $user::where('email', $message->from)->first();
        if ($isRegistered) {
            $isRegistered->first_name = $fn;
            $isRegistered->last_name = $ln;
            $isRegistered->nick_name = $nn;
            $isRegistered->save();
        }
        return $isRegistered;
    }
}