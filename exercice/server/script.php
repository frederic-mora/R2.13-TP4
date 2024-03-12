<?php


require("model.php");


/*  [ Contrôle de la mise à jour d'un menu ]

    Si la requête HTTP comprend un paramètre 'action', alors on comprend que la requête
    provient du formulaire de mise à jour d'un menu du Back Office.
*/
if (isset($_REQUEST['action']) && $_REQUEST['action']=='Update'){
  $jour = $_REQUEST['jour'];
  $entree = $_REQUEST['entree'];
  $plat = $_REQUEST['plat'];
  $dessert = $_REQUEST['dessert'];
  $ok = updateMenu($jour, $entree, $plat, $dessert);
  if ($ok>0){
    echo "Le menu du $jour de la semaine $semaine est à jour";
  }
  else{
    echo "Un problème est survenu";
  }
  exit(); // termine le script (ce qui est en dessous ne s'exécutera pas)
}

/*  [ Contrôle de la demande d'un menu pour un jour donnée ]

    Si l'on atteint ce point du script, on sait déjà que la requête HTTP n'est pas une mise
    à jour d'un menu. Reste à vérifier s'il s'agit d'obtenir le menu d'un jour donné. C'est
    le cas si la requête comprend un paramètre 'jour'.
*/
if ( isset($_REQUEST['jour'] ) && !empty($_REQUEST['jour']) ){
    $jour = $_REQUEST['jour'];
    $menu = getMenu($jour);
    echo json_encode($menu);
    exit(); // termine le script (ce qui est en dessous ne s'exécutera pas)
}

/* 
    Si on atteint ce point du script, c'est que la requête HTTP ne correspond ni à une
    demande de mise à jour d'un menu, ni à une demande d'un menu pour un jour donné.
    Dans ce cas le script répond par un code 404 par défaut.
*/

http_response_code(404);

?>