<?php
<<<<<<< HEAD
  define('DB_HOST','localhost:3306');
  define('DB_USER','root');
  define('DB_PASSWORD','');
  define('DB_NAME','test');
=======
  define('DB_HOST','localhost');
  define('DB_USER','bpa_db');
  define('DB_PASSWORD','oLtxJc8lIy+djioy');
  define('DB_NAME','bpa_system');
>>>>>>> 613bf9cbb8b003106be1579d4b6707d73c148df4


   $conn = new mysqli(DB_HOST,DB_USER,  DB_PASSWORD, DB_NAME);

   if($conn->connect_error){
      die("Conneciton failed:".$conn->connect_error);
   }

<<<<<<< HEAD
   //bpa_db,oLtxJc8lIy+djioy,bpa_system
=======
>>>>>>> 613bf9cbb8b003106be1579d4b6707d73c148df4
