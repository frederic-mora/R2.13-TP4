<?php

/*  getMenu

    . paramètre $s : le numéro de la semaine demandée
    . paramètre $j : le jour du menu demandé
    > valeur de retour : un objet avec 3 propriétés entree, plat dessert décrivant le menu du jour $j

    La fonction getMenu se connecte à votre BDD et récupère de la table Repas 
    le menu du jour $j de la semaine $s.
*/
function getMenu($j){
    $cnx = new PDO("mysql:host=localhost;dbname=???", "???", "???");
    $answer = $cnx->query("select entree, plat, dessert from Repas where jour='$j'"); 
    $res = $answer->fetchAll(PDO::FETCH_OBJ);
    return $res;
}


/*  updateMenu

    . paramètre $s : le numéro de la semaine demandée
    . paramètre $j : le jour du menu concerné
    . paramètre $e : la nouvelle entrée du menu
    . paramètre $p : le  nouveau plat du menu
    . paramètre $d : le nouveau dessert du menu
    > valeur de retour : le nombre de ligne modifié dans Repas (donc 1 si tout va bien, 0 sinon)

    La fonction updateMenu se connecte à votre BDD et met à jour la table Repas
    avec le nouveau menu donné en paramètre pour le jour $j de la semaine $s.
*/
function updateMenu($j, $e, $p, $d){
    $cnx = new PDO("mysql:host=localhost;dbname=???", "???", "???");
    $answer = $cnx->query("update Repas set entree='$e', plat='$p', dessert='$d' where jour='$j'"); 
    $res = $answer->rowCount();
    return $res;
}
?>