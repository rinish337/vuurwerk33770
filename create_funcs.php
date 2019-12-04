<?php

$servername = "localhost"; 
$username = "root";
$password = "";

include "connect.php";

$conn = new PDO("mysql:host=$servername", $username, $password,);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function database($servername, $username, $password){

  try{

  $conn = new PDO("mysql:host=$servername", $username, $password,);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql =  "CREATE DATABASE IF NOT EXISTS Afspraken";
    $conn -> exec($sql);


  }catch(PDOException $e){
    
    echo"heiij is al gemaakt". $e -> getMessage();
  
  }

}

function CreateTable($servername,$username,$dbname,$password){
  try { 
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); 
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  
      // sql to create table 
      $sql = "CREATE TABLE IF NOT EXISTS afspraken (
          voornaam varchar(100) NOT NULL,
          achternaam varchar(100) NOT NULL,
          waar varchar(50) NOT NULL,
          datum date DEFAULT NULL,
          tijd time DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
  
      // use exec() because no results are returned 
      $conn->query($sql); 
  
      } 
  catch(PDOException $e) 
      { 
      echo "oi" . $e->getMessage(); 
      } 
  
  $conn = null; 
  }
  function InsertTable($servername, $username, $password, $db_name) {
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
    $insert_table = "INSERT INTO
    `afspraken` (`voornaam`, `achternaam`, `waar`, `datum`, `tijd`) 
        VALUES
            ('Jan', 'van Dijk', 'Tandarts', '0000-00-00', '10:00:00'),
            ('Pieter', 'Post', 'PostNL', '2022-02-22', '22:00:00'),
            ('Yuri', 'Turdid', 'KFC', '2020-03-04', '12:34:00');
        COMMIT;";
        $conn -> query($insert_table);
    }catch(PDOException $e){
        echo"niet gelukt" . $e -> getMessage();
        }
    }
    function droptable($servername, $username, $password, $db_name){
      try{
          $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password); 
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
          $sql = "DROP TABLE afspraken";
          $conn -> query($sql);
  
      }catch(PDOException $e){
          echo"mislukt" . $e -> getMessage();
      }
  }
    droptable("localhost","root","","afspraken");
    database("localhost", "root","");
    CreateTable("localhost","root","afspraken","");
    InsertTable("localhost","root","","afspraken");
    



?>