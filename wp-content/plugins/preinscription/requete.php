<?php

 $nom='toto';
 $prenom='mm';
 $adresse='rue bidul';
 $cp='42000';
 $ville='ville';
 $tel='0477';
 $mdp='mdp';
 $mail='mail@mail.fr';
 $photo='photo';

$maBdd=sqlConnect();

function sqlConnect()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=zumbab2m','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        echo 'creation bdd';
    }
    catch (Exeption $e)
    {
        die('Erreur : ' .$e->getMessage())  or die(print_r($bdd->errorInfo()));
    }
    return($bdd);
}

        $result1 = $maBdd->prepare('INSERT INTO adherent (ID_ADHERENT, NOM_ADHERENT, PRENOM_ADHERENT,
		MDP_ADHERENT, ADRESSE_ADHERENT, CP_ADHERENT, VILLE_ADHERENT, TEL_ADHERENT, MAIL_ADHERENT, PHOTO_ADHERENT)
		VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
		$result1->execute(ARRAY(NULL,$nom,$prenom,$mdp,$adresse,$cp,$ville,$tel,$mail,$photo));
         
               
        echo'requete execute';