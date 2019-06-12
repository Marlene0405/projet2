<?php
require_once('./sql_connect.php');
/*
Template Name: connexion
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


            $Login = ($_POST ["log"]);
            $mdp = ($_POST ["pwd"]);

            $bbd=openDatabase();

            // Requête SQL sécurisée
            $result = $bdd->prepare('SELECT LOGIN_ADHERENT, MDP_ADHERENT FROM identite WHERE LOGIN_ADHERENT= :login');
            $result->bindValue(':login', $Login, PDO::PARAM_STR);
            $result->execute();


            $tab_login = array();
            $tab_mdp = array();
            while($data=$result->fetch()) {
                $tab_login[]=$data['LOGIN_ADHERENT'];
                $tab_mdp[]=$data['MDP_ADHERENT'];
            }

            $number=$result->rowCount();

            $Loginbdd=0;
            $mdpbdd=0;

            for($i=0; $i<$number; $i++) {
                $Loginbdd=$tab_login[$i];
                $mdpbdd=$tab_mdp[$i];
            }

            //vérification des éléments de connexion (formulaire/BDD)
            if (!$number) {
                echo '<div id="message"> <br>
                    <img src="ressources/images/flat.png"/> <br> <br>
                    Oups, login introuvable, merci de verifier votre login ou de vous inscrire;
                    </div>';
                echo '<meta http-equiv="refresh" content= "5; URL=./template-connexion.php">';
            } else {
                if (password_verify($mdp, $mdpbdd)) {
                    session_start();
                    $_SESSION['Login'] = $Loginbdd;
                    $_SESSION ['connect']=1;
                    $_SESSION['MDP'] = $mdpbdd;
                    echo '<div id="message"> <br>
                        <img src="ressources/images/hook.png"/> <br> <br>
                        Vous êtes connecté !
                        </div>';
                        echo '<meta http-equiv="refresh" content= "4; URL=http://zumba">';
                } else {
                    echo '<div id="message"> <br>
                        <img src="ressources/images/flat.png"/> <br> <br>
                        Oups, mauvais identifiant ou mot de passe !
                        </div>';
                    echo '<meta http-equiv="refresh" content= "4; URL=template-connexion.php">';
                }
            }

            $result->closeCursor();

?>
</div>
	</div>
	<?php get_footer(); ?>