<?php
/*
Plugin Name: Préinscription
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: Formulaire de préinscription
Author: Marlène Canot
Version: 0.1
Author URI: http://
*/

defined( 'ABSPATH' ) or die( 'No direct access' );

define('PREINSCRIPTION_TEMPLATE', '
<form action="%s" method="POST">
	%s
	<input type="hidden" name="id-evenement" value="%s" />
	<p>
		<input id="submit" type="submit" name="Valider" class="submit" value="%s" />
	</p>
</form>
');

// Action pour traiter le formulaire de reservation
add_action('template_redirect', 'preinscription_form');

// Recuperation du code HTML du formaulaire de reservation
function preinscription_getform( $postId ) {

    if (is_user_logged_in()) {
        printf(PREINSCRIPTION_TEMPLATE,
                    get_site_url() . '/preinscription/',
                    wp_nonce_field('preinscription', 'preinscription-verif'),
                    $postId);
    }

}

// Traitement des reservations
function preinscription_form() {

    if (isset($_POST['id-evenement']) && isset($_POST['reservation-verif']))  {

        // Verifie que la requete est valide
        if (wp_verify_nonce($_POST['preinscription-verif'], 'preinscription')) {

            $user = wp_get_current_user();
            $sEmail = $user->user_email;

            $aListeReservation = json_decode(get_post_meta($_POST['id-evenement'], 'reservations-evenement', true), true);
            if ($aListeReservation===null) {
                $aListeReservation = [$sEmail];
            } else {
                if (!in_array($sEmail, $aListeReservation)) {
                    array_push($aListeReservation, $sEmail);
                } else {
                    foreach ($aListeReservation as $key => $value)
                        if ($value == $sEmail){

                        unset($aListeReservation[$key]);
                        }
                }
            }

            update_post_meta( $_POST['id-evenement'], 'reservations-evenement', json_encode($aListeReservation) );

        }
    }
}