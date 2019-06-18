<?php
require_once('adherent.php');
//ini_set('display_errors','on');
//error_reporting(E_ALL);
/*
Plugin Name: Préinscription
Description: Formulaire de préinscription
Author: Marlène Canot
Version: 0.1
Author URI: http://
*/

defined( 'ABSPATH' ) or die( 'No direct access' );

define('PREINSCRIPTION_TEMPLATE', '
<form action="%s" method="POST">
	%s
    <label for="Nom">Nom :</label> <br>
    <input type="text" id="NOM_ADHERENT" name="Nom" size="30" required value="" > <br>

<label for="Prenom">Prénom :</label> <br>
    <input type="text" id="PRENOM_ADHERENT" name="Prenom" size="30" required value="" > <br>

<label for="Adresse">Adresse :</label> <br>
    <input id="ADRESSE_ADHERENT" name="Adresse" size="100" required value="" > <br>

<label for="Cp">CP :</label> <br>
    <input id="CP_ADHERENT" name="Cp" size="5" required value="" > <br>

<label for="Ville">Ville :</label> <br>
    <input id="VILLE_ADHERENT" name="Ville" size="30" required value="" > <br>

<label for="Tel">Tel :</label> <br>
    <input id="TEL_ADHERENT" name="Tel" size="10" required value="" > <br>

<label for="MDP"> Mot de passe :</label> <br>
    <input id="MDP_IDENTITE" type="password" name="Mdp" size="30" required
    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
    title="Doit contenir au moins 8 caractères, 1 chiffre, 1 lettre en majuscule et en minuscule" value=""> <br>

<label for="MDP"> Confirmation du mot de passe :</label> <br>
    <input id="MDP_IDENTITE" type="password" name="Mdpconfirm" size="30" required
    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
    title="Doit contenir au moins 8 caractères, 1 chiffre, 1 lettre en majuscule et en minuscule" value="" > <br> <br>

<label for="mail"> E-mail :</label> <br>
    <input type="email" id="MAIL_ADHERENT" name="Mail" size="50" required value="" > <br> <br>

<label for="mon_fichier"> Votre photo (JPEG ou PNG | max. 1 Mo) </label> <br>
     <input type="hidden" name="MAX_FILE_SIZE" value="1048576" >
    <input type="file" id="PHOTO_ADHERENT" name="Photo" accept="image/png, image/jpeg" required value="" >

    <input id="submit" type="submit" name="preinscription" class="submit" value="Valider" />
</form>');

// Action pour traiter le formulaire de reservation
add_action('template_redirect', 'preinscription_form');

$maBdd=sqlConnect();

function sqlConnect()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=zumbab2m','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }
    catch (Exeption $e)
    {
        die('Erreur : ' .$e->getMessage())  or die(print_r($bdd->errorInfo()));
    }
    return($bdd);
}

// Recuperation du code HTML du formaulaire de reservation
function preinscription_getform() {

    if (is_user_logged_in()) {
        printf(PREINSCRIPTION_TEMPLATE,
                    get_site_url() . '/preinscription/',
                    wp_nonce_field('preinscription', 'preinscription-verif'));
    }

}

// Traitement des preinscriptions
function preinscription_form() {

    global $maBdd;

    //var_dump($_POST);

    //$adherent=new Adherent($_POST);
    //$adherentModel= new AdherentModel($maBdd);
    //$adherentModel->createAdherent($adherent);
    //$adherentModel->readeAdherent($adherent);
    //$adherentModel->updateAdherent($adherent);
    //$adherentModel->deleteAdherent($adherent);

    if (isset($_POST['id-adherent']) && isset($_POST['preinscription-verif']))  {

        // Verifie que la requete est valide
        if (wp_verify_nonce($_POST['preinscription-verif'], 'preinscription')) {

            }


    }
}
