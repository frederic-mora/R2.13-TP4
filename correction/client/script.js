
/*  requestMenu

  . paramètre j : le nom d'un jour de la semaine 

  La fonction demande au serveur les données au format JSON sur le menu du jour j.
  Quand les données sont reçues et lues, on les affiche avec la fonction V.renderMenu.

*/
let requestMenu = async function(j){
    let semaine = document.querySelector('#semaine');
    // attente de la réponse à la requête demandant les données d'une collection de Lego
    let response = await fetch("../server/script.php?jour=" + j + "&semaine=" + semaine.value);
    // attente de l'extration des données en format json de la réponse à la requête
    let data = await response.json();
    if (data.length>0){
      V.renderMenu(data[0]);
    }
    else{
      V.renderMenu( {entree:"Soon...", plat:"Soon..", dessert:"Soon..."} );
    }
  }

// V : la vue de l'application
let V = {};


/*  V.renderMenu

    paramètre menu : un objet contenant les informations sur un menu (entrée plat dessert)

    La fonction formate le template HTML définit dans index.html et insère le tout dans la div de classe 'menu'

    TODO : fonction à compléter (ainsi que le template dans index.html)
*/
V.renderMenu = function( menu ){
    let html = document.querySelector('template').innerHTML;
    html = html.replace('{{entree}}', menu.entree);
    html = html.replace('{{plat}}', menu.plat);
    html = html.replace('{{dessert}}', menu.dessert);
    document.querySelector('.menu').innerHTML = html;
}
