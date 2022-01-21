<?php


require 'classes/MailerReborn.php';

$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0b2tlbiI6IlNjY3NyUHIwYW9vZmVPZk4wTEp6UDNtY3hUZHJkOHByMDJ6SFZpTXNCREtZU0ZEbUFEWUdvT3kzbEdyNE1TZHgxVUltWUROaWw2b3I1YzZ1NmM2WVZWcm1nQ1J2Tmx6ZkVrU3hBcTJVdVpIa1lydGgwOXdiOUluWXF4b1BIQm9YIiwidXNlcklkIjoxMjkyMDMyOTc2LCJpYXQiOjE2NDI3Nzc1NTF9.yCz9QbbUmgTyd00Cd0gOXRBSG4fbnEcj9GtW3i1G7BM';
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

$MailerReborn->sendSMS('79697124393', 'f5a9dd69-377e-4597-a642-fd2331227344', 'Это сообщение отправлено с кайфом');



echo '<pre>'; 
var_dump($MailerReborn->getResponse());
echo '</pre>';
