<?php
/*
Template Name: profil
*/

$user = wp_get_current_user();
//print-r($user); //die();
if($user-> ID == 0)
{
	header('location:login');
}

get_header();

do_action( 'hestia_before_single_page_wrapper' );

?>
<div class="<?php echo hestia_layout(); ?>">
<h1> Mes informations </h1>


	</div>
	<?php get_footer(); ?>