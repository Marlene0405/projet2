<?php
/*
Template Name: déconnexion
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
			?>
                <form method="post" action="http://www.VOTRE_SITE.com/wp-login.php" id="loginform" name="loginform">
                    <p>
                        <label for="user_login">Identifiant</label>
                        <input type="text" tabindex="10" size="20" value="" id="user_login" name="log">
                    </p>
                    <p>
                        <label for="user_pass">Mot de passe</label>
                        <input type="password" tabindex="20" size="20" value="" id="user_pass" name="pwd">
                    </p>
                    <p>
                        <label><input type="checkbox" tabindex="90" value="forever" id="rememberme" name="rememberme"> Rester connecter</label>
                    |   <a href="http://www.VOTRE_SITE.com/wp-login.php?action=lostpassword">Mot de passe oublié</a></p>
                    <p>
                        <input type="submit" tabindex="100" value="Se connecter" id="wp-submit" name="wp-submit">
                        <input type="hidden" value="http://www.VOTRE_SITE.com/" name="redirect_to">
                    </p>
                </form>
		</div>
	</div>
	<?php get_footer(); ?>
