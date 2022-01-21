<?php


require 'classes/MailerReborn.php';

$token = '';
$MailerReborn = new MailerReborn($token);

                                                            
// Если у класса нет нужного метода, то можно создать свой API запрос.
// Пример:

/* 

$data = [
    "recipient" => "88005553535",
    "sender" => "f5a9dd69-377e-4597-a642-fd2331227344",
    "message" => "Test Message"
]; 

*/


// $MailerReborn->sendPostRequest("messages/send", $data);
// Направляем запрос.


// Или вариант с ГЕТ запросами
// $MailerReborn->sendGetRequest("сюда роут на апишку");

// пример получения возможных отправителей на нужный номер:  
// $this->sendGetRequest("phone/7777777777/senders");


// Доступные готовые методы:
/*
    ->getSenders(int $phone)
    ->sendSMS(string $recipient, string $sender, $message) 

*/

// И наконец получаем ответ. Работает со всеми методами.

$MailerReborn->sendSMS('номер', 'f5a9dd69-377e-4597-a642-fd2331227344', 'Это сообщение отправлено с кайфом');



echo '<pre>'; 
var_dump($MailerReborn->getResponse());
echo '</pre>';
