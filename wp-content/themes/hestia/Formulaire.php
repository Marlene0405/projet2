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

// Définitions des deux constantes
define('ADRESSE_WEBMASTER','canot.marlene@gmail.com'); // Votre adresse qui apparaitra en tant qu'expéditeur des E-mails
define('SUJET','Inscription au site de tutoriels de Loire Habitat'); // Sujet commun aux deux E-mail

$nom = $_POST['Nom'];
$prenom = $_POST['Prenom'];
$mail = $_POST['Mail'];
$login = $_POST['Login'];
$mdp = $_POST['MDP'];
$mdpcomfirm = $_POST['MDPCONFIRM'];

//connexion à la bdd
include("./sql_connect.php");


$result = $bdd->prepare('SELECT LOGIN_ADHERENT, MAIL_ADHERENT FROM adherent WHERE LOGIN_ADHERENT= :login OR MAIL_ADHERENT= :mail');
$result->bindValue(':login', $login, PDO::PARAM_STR);
$result->bindValue(':mail', $mail, PDO::PARAM_STR);
$result->execute();

//print_r($result); die();

$tab_login = array();
$tab_mail = array();

while ($data=$result->fetch()) {
    $tab_login[]=$data['LOGIN_ADHERENT'];
    $tab_mail[]=$data['MAIL_ADHERENT'];
}

$number=$result->rowCount();

$loginbdd=0;
$mailbdd=0;

for ($i=0; $i<$number; $i++) {
    $loginbdd=$tab_login[$i];
	$mailbdd=$tab_mail[$i];
}

if (strtolower($login) == strtolower($loginbdd)) { //On vérifie si le login est déjà existant dans la bdd
    Echo "<div id='message'> <br>
          <img src='ressources/images/flat.png'/> <br> <br>
          Ce login est déjà utilisé.
          </div>";
          echo '<meta http-equiv="refresh" content= "5; URL=inscription.php">';
} elseif (strtolower($mail) == strtolower($mailbdd)) { //On vérifie si mail est déjà existant dans la bdd
    Echo "<div id='message'> <br>
          <img src='ressources/images/flat.png'/> <br> <br>
          Oups, cette adresse e-mail est déjà utilisée.
          </div>";
    echo '<meta http-equiv="refresh" content= "5; URL=inscription.php">';
} elseif ($_POST['MDP'] != $_POST['MDPCONFIRM']) { //On vérifie que les mdp sont identiques
    echo "<div id='message'> <br>
          <img src='ressources/images/flat.png'/> <br> <br>
          Oups, les deux mots de passe ne sont pas identiques.
          </div>";
          echo '<meta http-equiv="refresh" content= "5; URL=inscription.php">';
} elseif (empty($_POST['type'])) { //On vérifie qu'un bouton radio a bien été coché
    echo "<div id='message'> <br>
          <img src='ressources/images/flat.png'/> <br> <br>
          Oups, aucune case n'a été cochée, merci d'indiquer si vous êtes locataire, salarié ou fournisseurs
          </div>";
    echo '<meta http-equiv="refresh" content= "5; URL=inscription.php">';
} else {
    $mdp_crypte = password_hash($mdp, PASSWORD_DEFAULT); //Fonction passwordhash

    $type = $_POST['type']; //on recupere la variable puis on insert les données dans les tables corespondantes

    //requete preparée insertion sql
    $result = $bdd->prepare('INSERT INTO adherent (NOM_ADHERENT, PRENOM_ADHERENT, MAIL_ADHERENT, LOGIN_ADHERENT, MDP_ADHERENT) VALUES(?, ?, ?, ?, ?)');
    $result->execute(array($nom, $prenom, $mail, $login, $mdp_crypte));

     /*   //Message envoyé à l'admin
        $message = "Nouvelle inscription!\n\n
                    Nom : ".$_POST['Nom']."\n\n
                    Prénom : ".$_POST['Prenom']."\n\n
                    Mail : ".$_POST['Mail']."\n\n
                    Login : ".$_POST['Login']."\n\n
                    Catégorie : ".$valeur."\n\n
                    Rappel des catégories : 1-Admin, 2-Salarié, 3-Locataire, 4-Fournisseur.";

//Appel de la fonction mail() afin d'envoyé un E-mail contenant les informations saisies par le visiteur
mail(ADRESSE_WEBMASTER,SUJET,$message,'From: '.ADRESSE_WEBMASTER);

//Message envoyé au visiteur
$message = "Bonjour ".$_POST['Prenom']." ".$_POST['Nom']." !\n\n
            Suite à votre inscription à notre bibliothèque de tutoriels.\n\n
            Rappel de votre login : ".$_POST['Login']."\n\n
            Merci de conserver cet e-mail, car votre login ne peut être modifié en cas d'oubli.\n\n
            Bonne journée, \n\n
            Votre Webmaster Loire Habitat \n\n
            ---------------
            Ceci est un mail automatique, Merci de ne pas y répondre.";

//Second appel de la fonction mail() : le visiteur reçoit cet E-mail
mail($_POST['Mail'],SUJET,$message,'From: '.ADRESSE_WEBMASTER);
*/
$result->closeCursor();
//redirection vers l'index.php
    echo "<div id='message'> <br>
              <img src='ressources/images/hook.png'/> <br> <br>
              Votre compte a été créé, vous pouvez vous connecter
              </div>";
        echo '<meta http-equiv="refresh" content= "5; URL=http://zumba">';
    }
};

?>

</body>

</html>