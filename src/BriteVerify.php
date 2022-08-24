<?php

namespace Travis;

class BriteVerify
{
    public static function run($apikey, $email)
    {
        // set endpoint
        $endpoint = 'https://bpi.briteverify.com/api/v1/fullverify';

        $payload = [
            'email' => $email,
        ];
        $payload = json_encode($payload);

        // setup curl request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: ApiKey: '.$apikey,
        ]);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // catch error...
        if (curl_errno($ch))
        {
            // report
            #$errors = curl_error($ch);

            // close
            curl_close($ch);

            // return false
            return false;
        }

        // close
        curl_close($ch);

        // catch error...
        if (!in_array($httpcode, [200, 201, 202]))
        {
            // throw error
            throw new \Exception(ex($response, 'response.errors.0', 'Request failed with HTTP code '.$httpcode));

            // return false
            return false;
        }

        // decode response
        return json_decode($response);
    }
}