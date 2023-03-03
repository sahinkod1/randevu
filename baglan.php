<?php

try{

$db=new PDO("mysql:host=localhost;dbname=web;charset=utf8",'root', '123456789');


} catch(PDOexception $e){

   echo $e->getMessage();

}
?>