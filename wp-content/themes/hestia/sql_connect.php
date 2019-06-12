<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=zumbab2m','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}
catch (Exeption $e)
{
    die('Erreur : ' . $e->getMessage()) or die(print_r($bdd->errorInfo()));
}