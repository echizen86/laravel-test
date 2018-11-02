<?php

namespace App\Services;

use GuzzleHttp\Client;

class MailService
{
    /**
     * Function to get a complete email
     * from mailgun.
     */
    public static function getEmail($url)
    {
        $client = new Client();
        $res = $client->request('GET', '' . $url . '', [
            'auth' => ['api', '330b8af8aeb24ec2114d296ea257678d-c9270c97-c2ce62b4']
        ]);

        return $res;
    }
}