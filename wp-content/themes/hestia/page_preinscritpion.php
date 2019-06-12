<?php
/*
Template Name: préinscription
*/

get_header();

do_action( 'hestia_before_single_page_wrapper' );

?>
<div class="<?php echo hestia_layout(); ?>">
	<?php
	$class_to_add = '';
	if ( class_exists( 'WooCommerce' ) && ! is_cart() ) {
		$class_to_add = 'blog-post-wrapper';
	}
	?>
	<div class="blog-post <?php esc_attr( $class_to_add ); ?>">
		<div class="container">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile;
			else :
				get_template_part( 'template-parts/content', 'none' );
            endif;
            
            echo'<h2>Formulaire d\'inscription</h2>
                    <p>Merci de remplir tous les champs du formulaire pour pouvoir vous inscrire </p> <br>
                    <form method="post" action="Formulaire.php"> get_site_url() . '/evenements/',

                        <label for="name">Nom :</label> <br>
                        <input type="text" id="NOM_IDENTITE" name="Nom" size="30" required > <br>

                        <label for="Prenom">Prénom :</label> <br>
                        <input type="text" id="PRENOM_IDENTITE" name="Prenom" size="30" required > <br>

                        <label for="mail"> E-mail :</label> <br>
                        <input type="email" id="MAIL_IDENTITE" name="Mail" size="30" required > <br>

                        <label for="Login">Login :</label> <br>
                        <input id="LOGIN_IDENTITE" name="Login" size="30" required > <br>

                        <label for="MDP"> Mot de passe :</label> <br>
                        <input id="MDP_IDENTITE" type="password" name="MDP" size="30" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au moins 8 caractères, 1 chiffre, 1 lettre en majuscule et en minuscule" > <br>

                        <label for="MDP"> Confirmation du mot de passe :</label> <br>
                        <input id="MDP_IDENTITE" type="password" name="MDPCONFIRM" size="30" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au moins 8 caractères, 1 chiffre, 1 lettre en majuscule et en minuscule" > <br> <br>

                        <button class="button" type="submit">Valider</button>

                        </form>'?>
</div>
	</div>
	<?php get_footer(); ?>