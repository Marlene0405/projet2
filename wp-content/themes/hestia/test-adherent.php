<?php

require_once("adherent.php");

$unAdherent = new Adherent();
$unAdherent->setNom($_POST['Nom']);
$unAdherent->setPrenom($_POST['Prenom']);
$unAdherent->setAdresse($_POST['Adresse']);
$unAdherent->setCp($_POST['Cp']);
$unAdherent->setVille($_POST['Ville']);
$unAdherent->setTel($_POST['Tel']);
$unAdherent->setMail($_POST['Mail']);
$unAdherent->setPhoto($_POST['Photo']);


//$unAdherent->addCompetence('vol');
//$unAdherent->addCompetence('grimper');
//$unAdherent->addCompetence('crocheter porte');

//$unAdherent->print();


/*
public function getNom()
public function getPrenom()
public function getDatenaissance()
public function getSexe()
public function removeCompetence($sRemove)
public function getCompetence()
*/
