<?php
ob_start();
error_reporting(0);
define("API_KEY",'API_TOKEN');
$admin = array("ADMIN_ID");

function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/$method";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas); 
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}



$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$data = $update->callback_query->data;
$mid = $message->message_id;
$text = $message->text;
$cid = $message->chat->id;
$uid = $message->from->id;
$cty = $message->chat->type;
$name = $message->from->first_name;
$surname = $message->from->last_name;
$tx = $message->text;

if($text == "/start"){
   bot('sendmessage',[
   'chat_id'=>$cid,
   'text'=>"<b>Assalomu aleykum, ushbu kodni siz shablon sifatida ishlatishingiz mumkin.</b>",
   'parse_mode'=>"html",
]);
}
