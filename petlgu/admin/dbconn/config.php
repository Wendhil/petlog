<?php
    define('DB_HOST','localhost:3306');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_NAME','lgupetsystem');



   $conn = new mysqli(DB_HOST,DB_USER,  DB_PASSWORD, DB_NAME);

   if($conn->connect_error){
      die("Conneciton failed:".$conn->connect_error);
   }