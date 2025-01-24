<?php
/*
Pas grand chose à dire ici, mis a part que l'ordre est important pour que tout fonctionne
si le user manager a besoin d'utiliser la classe User il faudra que cette dernière soit require avant.

On remarque que les chemins sont relatifs a l'index.php, car vu que require est un 'copié-collé',
ce qui est ecrit ici sera donc copié dans l'index.php
*/


require './models/User.php';
require './managers/AbstractManager.php';
require './managers/UserManager.php';
require './controllers/UserController.php';
require './config/Router.php';
