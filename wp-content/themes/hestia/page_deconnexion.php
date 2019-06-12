<?php
session_start();
$_SESSION['Login'] = NULL;
$_SESSION ['connect']=NULL;
$_SESSION['MDP'] = NULL;
$_SESSION['connect']=NULL;
session_destroy();
header ('location: index.php');
