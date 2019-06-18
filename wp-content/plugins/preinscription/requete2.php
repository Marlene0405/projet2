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
 $statut=1;

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

        echo'requete 1';
        echo $nom;

        $result2= $maBdd->prepare('SELECT ID_ADHERENT FROM adherent where NOM_ADHERENT = :nom');
        $result2->bindValue(':nom', $nom, PDO::PARAM_STR);
        $a=$result2->execute();



        var_dump($a);
        
        $tab_id = array();
        $i=0;
        while ($data=$result2->fetch())
        {
            $tab_id[$i]=$data['ID_ADHERENT'];
            $i++;
        }

        $number=$result2->rowCount();

        $i=0;

         $idbdd=$tab_id[$i];


        echo $idbdd;

        $result3 = $maBdd->prepare('INSERT INTO appartient (ID_ADHERENT, ID_STATUT) VALUES(?, ?)');
        $result3->execute(array($idbdd, $statut));

        echo'requete 1 & 2 execute';