<?php

Class MailerReborn 
{
    private static string $url__ = "https://mailer.gg/api/";
    public static string $response = "";

    public function __construct(string $token)
    {
        $this->token = $token;
    }



   public function sendPostRequest(string $route, array $data) 
   {

    $url = self::$url__ . $route;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $headers = array(
       "Accept: application/json",
       "Authorization: Bearer ". $this->token,
       "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    
    $response = curl_exec($curl);
    curl_close($curl);

    self::$response = $response;
   }


   public function sendGetRequest(string $route) 
   {
    $url = self::$url__ . $route;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $headers = array(
       "Accept: application/json",
       "Authorization: Bearer ". $this->token,
       "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    $response = curl_exec($curl);
    curl_close($curl);
    self::$response = $response;
   }


   //////////////////////////////////////////////////////////////////////

   //             Методы для упрощенного взаимодействия                //

   //////////////////////////////////////////////////////////////////////


   public function sendSMS(string $recipient, string $sender, $message) 
   {
    $data = [
        "recipient" => $recipient,
        "sender" => $sender,
        "message" => $message
    ];

    $this->sendPostRequest("messages/send", $data);
   }

   public function getSenders(int $phone) 
   {
    $this->sendGetRequest("phone/". $phone . "/senders");
   }

   public static function getResponse() 
   {
        return json_decode(self::$response, true);
   }
}