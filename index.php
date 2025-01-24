<?php

/*
Le point d'entree du programme,
quand un utilisateur accede au site ou clique sur un lien il arrive ici, tout ce qu'on sait 
sur le client c'est l'url.

En clair il faut comprendre le programme comme completement nouveau à chaques redirection et 
qu'il sera de notre responsabilitée que de mettre suffisament d'infos dans l'url pour savoir
ce qu'on doit faire et rendre a l'utilisateur.

Pour cela on va pas reinventer la route et on va faire un ROUTER ! Pour se dire qu'on va utiliser 
un router il va falloir q'uon fasse un contrat avec soit-même : Dès que je redirige sur un autre page, 
je DOIT avoir un $_GET dans l'url. Et si ce n'est pas le cas, je redirige vers la page d'accueil.

EXemple, dans ma nav pour un lien vers le formulaire pour ajouter un nouvel utilisateur 
je mettrais : <a href="index.php?route=create_user_form">Create a new user</a>
Donc : ici on a un $_GET dans l'url. L'index recevra $_GET['route'] = 'create_user_form'

Donc ici l'index a deux fonctions :
 - faire un require de l'autoload pour que tout fonctionne
 - faire appel au routeur pour savoir ce qu'on rend à l'utilisateur en fonction de l'url.

Note : Un require pour php c'est un comme un copié-collé de code, donc ici l'autolaod a pour role de 
TOUT ramener dans l'index (voir l'autoload.php : on y require quasi toute l'appli)
cela nous permettra de faire appel par example ici a la classe Router mais aussi plus tard aux autres classes 
sans avoir a require ailleur tout le temps.

Pas mal de texte pour trois lignes de codes :P
*/

require './config/autoload.php';



$router = new Router(); // le programme est tout neuf, il nous faut un routeur et c'est ce qu'on instancie ici !
$router->routing($_GET); 


// Allez dans config/Router.php pour savoir ce que j'y ai mis, et ce que routing() fait faire a notre programe!