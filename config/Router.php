<?php
/*
Une classe est comme la description d'un objet. Elle contient des attributs et des comportements
cela signifie que c'est une manière de grouper de la donnée (les attributs) et de la logique (les méthodes) en un seul endroit.

NOTE : on appelle Une function dans une class -> une methode. 

Ici on a pas spécialement besoin de donées dans notre router dons nous n'aurons que de notre méthode routing(). 
*/
class Router
{
  public function __construct() {} //pas besoin de paramètres, ni de logique pour creer un router. Donc le constructeur est vide.


  /*
  La methode routing() est responsable de l'aiguillage du programme en fonction de l'url, on s'est donné
  via un contrat avec nous même (voir l'index.php) pour qu'il y ai a chaque redirection vers l'index un $_GET['route'] qui contient
  un truc a interpréter.

  Pour cet exercice nous n'aurons qu'un controller mais on peut imaginer un programme plus complexe avec plusieurs controllers
  LE role de routing() est d'appeler le bon controller et sa bonne méthode en fonction du $_GET['route'].
  . 
  */
  public function routing($get)
  {
    // Il est tout de même possible que l'utilisateur n'ait pas donné de GET dans l'url (il arrive d'ailleur
    // par exemple), Dans ce cas et pour éviter une erreur
    // on mettra par defaut un null si $get['route'] est undefined.  
    $route = $get['route'] ?? null;

    //Chaque routing est une nouvelle execution de notre programme. Il faut qu'on fasse une nouvelle instance de notre controller.
    $userController = new UserController();

    //ici on va tester le $route et appeler la bonne methode de notre controller.
    //Rendez vous sur le UserController pour savoir ce qui s'y passe.

    switch ($route) {

      case 'create_user_form':
        $userController->showCreateUserForm();
        break;
      case 'update_user_form':
        $userController->ShowUpdateUserForm();
        break;

      case 'check_create_user':
        $userController->checkCreate();
        break;
      case 'check_update_user':
        $userController->checkUpdate();
        break;
      case 'delete_user':
        $userController->delete();
        break;
      case 'list_user':
        $userController->list();
        break;
        // SI $route est null ex: index.php?route=null ou non répertorié index.php alors on appelle la methode list() de UserController
      default:
        $userController->list();
        break;
    }
  }
}
