<?php
require_once('preinscription.php');

class Adherent
{


protected $nom;
protected $prenom;
protected $adresse;
protected $cp;
protected $ville;
protected $tel;
protected $mdp;
protected $mail;
protected $photo;

	public function __construct($aData)
	{

		if ((is_string($aData['Nom'])) && (is_string($aData['Prenom'])) && (is_string($aData['Adresse'])) && (is_string($aData['Cp'])) && (is_string($aData['Ville'])) &&
			(is_string($aData['Tel'])) && (is_string($aData['Mdp'])) && (is_string($aData['Mdpconfirm'])) && (is_string($aData['Mail'])) && (is_string($aData['Photo'])))
		{
			$this->nom= htmlentities($aData['Nom']);
			$this->prenom= htmlentities($aData['Prenom']);
			$this->adresse= htmlentities($aData['Adresse']);
			$this->cp= htmlentities($aData['Cp']);
			$this->ville= htmlentities($aData['Ville']);
			$this->tel= htmlentities($aData['Tel']);
			$mdp1= htmlentities($aData['Mdp']);
			$mdp2= htmlentities($aData['Mdpconfirm']);
			$this->mail= htmlentities($aData['Mail']);
			$this->photo= htmlentities($aData['Photo']);

			if ($mdp1 == $mdp2)
			{ //On vérifie que les mdp sont identiques
				$this->mdp= password_hash($mdp1, PASSWORD_DEFAULT); //Fonction passwordhash
			}
		}
	}
}

class AdherentModel extends Adherent
{

	protected $bdd;

    public function __construct( $bdd )
    {
        $this->bdd = $bdd;
	}

	public function createAdherent($adherent)
	{
		$maBdd=sqlConnect();
		
		$sql='INSERT INTO adherent(NOM_ADHERENT, PRENOM_ADHERENT,
								   MDP_ADHERENT, ADRESSE_ADHERENT,
								   CP_ADHERENT, VILLE_ADHERENT,
								   TEL_ADHERENT, MAIL_ADHERENT,
								   PHOTO_ADHERENT) VALUES
								   (:nom, :prenom, :mpd, :adresse, :codepostal,
								   :ville, :telephone, :mail, :photo)';

		$result1=$maBdd->prepare($sql);

		//echo "\nERREUR:\n";
		//echo "\nPDO::errorinfo():\n";
		//print_r($result1->errorInfo());die();
	
		$result1->execute(ARRAY(
		// 'idvendeur'=>'',
		':nom'=>$nom,
		':prenom'=>$prenom,
		':mdp'=>$mdp,
		':adresse'=>$adresse,
		':codepostal'=>$cp,
		':ville'=>$ville,
	  	':telephone'=>$telephone,
		':mail'=>$mail,
		':photo'=>$photo));

		$result1 = $maBdd->prepare('INSERT INTO adherent (ID_ADHERENT, NOM_ADHERENT, PRENOM_ADHERENT,
		MDP_ADHERENT, ADRESSE_ADHERENT, CP_ADHERENT, VILLE_ADHERENT, TEL_ADHERENT, MAIL_ADHERENT, PHOTO_ADHERENT)
		VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $result1->execute(ARRAY(NULL,$nom,$prenom,$mdp,$adresse,$cp,$ville,$tel,$mail,$photo));

        $result2= $maBdd->prepare('SELECT ID_ADHERENT FROM adherent where NOM_ADHERENT = :nom');
        $result2->bindValue(':nom', $nom, PDO::PARAM_STR);
        $result2->execute();

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

        //echo $idbdd;

        $result3 = $maBdd->prepare('INSERT INTO appartient (ID_ADHERENT, ID_STATUT) VALUES(?, ?)');
        $result3->execute(array($idbdd, $statut));
	}

	public function readAdherent()
	{
		return($this->adherent);
	}

	public function updateAdherent()
	{
		$this->adherent = $adherent;
	}

	public function deleteAdherent($delete)
	{

	}
}

