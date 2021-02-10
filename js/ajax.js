// Récupère l'élément cible, dont le contenu sera modifié
//var elem = document.getElementById('modContent');
// Met une image animée afin de montrer le chargement en cours du contenu
//elem.innerHTML = '<img src="img/loading.gif" alt="Chargement" />';

//-----------------------------------------------

function getRequest() {
    
    //Récupère la connexion au serveur http
    var request;
    if (window.XMLHttpRequest) {
    request = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        try {
          request = new ActiveXObject("Msxml2.XMLHTTP"); // IE version > 5
        } catch (e) {
          request = new ActiveXObject("Microsoft.XMLHTTP");
        }
    } else {
        request = false;
    }
    return request;

}

// function changeContent(url, param, id_elem) {
    
    var elem = document.getElementById("modContent");
    elem.innerHTML = '<img src="img/loading.gif" alt="Chargement">';
    
    var request = getRequest();
    // Ouvre la connexion en mode asynchrone avec le serveur http avec comme adresse url
    request.open('POST', "index.php?route=ajax", true);

    // Envoie des entêtes pour l'encodage
    request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    //Envoie les paramètres (même vide) et la requête et active les évènements en mode assynchrone
    request.send();

    request.onreadystatechange = function() {

        if(request.readyState == 4 && request.status == 200) {
            let elem2 = document.getElementById("modContent");

            let datas = JSON.parse(request.responseText);

            let html = "<ul>";
            for(let data of datas) {
                html += "<li>"+ data.nom + "</li>";
            }
            html += "</ul>"

            console.log(datas);
            elem2.innerHTML = html;
        }
    }
    

    console.log(request);

//     // Exécution en mode asynchrone de la fonction anonyme dès que l'on obtient une réponse du serveur http
//     request.onreadystatechange = function() {
//         // Teste si le serveur a tout reçu (200) et que le serveur ait fini (4)
//         if (request.status == 200 && request.readyState == 4) {
//           elem.innerHTML = request.responseText; // Modifie l'élément cible
//         }
//     };
// }



