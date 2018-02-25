<?php

namespace App\Http\Classes;
 
class Important {

    public function get_auth_tcurl()
    {
         $data = ['url' => url(''), 'key' => '11111111111dvasdararwbwas'];
           
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://bsitezone.com/api/auth_client",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array(
                    // Set here requred headers
                    "accept: */*",
                    "accept-language: en-US,en;q=0.8",
                    "content-type: application/json",
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if($response == 'unauthorize'){
            die();
         }
    }
    

 }