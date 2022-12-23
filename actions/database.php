<?php
try
{
   
    $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;','root','koumare');
}
catch(Exception $e)
{
    die("Une erreur a été détecté:".$e->getMessage());
}
