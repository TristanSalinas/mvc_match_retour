<?php

/*Le userController est un objet qui va faire le lien entre la la VUE et le MODEl, c'est le C du MVC.

Il va commander ici le manager qui va gérer la base de donnee pour optenir/modifier les infos et 
donner ces infos a l'utilisateur via un require de la vue. 
Ici la vue est toujours layout.phtml, cependant il y a dans layout.pthml, un contenu qui pourra changer
en fonction d'une variable $layoutContent qui va contenir le nom de la vue a afficher. (voir layout.phtml)

On peux voir deux types de methode, les show et les check.

Les show sont juste des require de vue, et les check sont des appels aux managers pour modifier/creer des users.

Pour les show:
Vu que les variables déclarées au dessus d'un require y sont accessibles dans la vue, On va pouvoir 
passer des infos aux vues en utilisant des variables globales déclarées ici.

Exemple:
public function list()
  {
    $layoutContent = 'list_user'; 
    $users = (new UserManager())->findAllUsers();
    require './templates/layout.phtml';
  }
Grace a la ligne $users = (new UserManager())->findAllUsers(); on acommandé a notre manager de nous lister tous nos users 
vous pourrez voir que la variable $users est utilisée dans list.phtml pour afficher la liste des users dans un tableau de div.




Pour les check: 
On va y arriver principalement par des action POST des formulaires (voir create.phtml et update.phtml).

( <form action="index.php?route=check_create_user" method="post"> )

Une action submit est donc un lien commme un autre pour notre programme. mais il a le bénéfice de nous donner un tableau 
de valeurs dans un $_POST.
On va donc pouvoir recupérer les infos du formulaire et commander au manager de faire un truc avec!.

NOTE : les check n'ont pas pour role de donner une Vue mais juste de commander le manager. C'est pour cela qu'au lieu 
de require un template, on va juste faire un header('Location: index.php?route=list_user'); pour redémarer le programme
et repartir de l'index en lui donnant la route de notre choix ici : "list_user".

*/
class UserController
{
  // /!\ If layout is required it need $layoutContent variable to know what to render.


  public function showCreateUserForm()
  {
    $layoutContent = 'create_user_form';
    require './templates/layout.phtml';
  }

  public function showUpdateUserForm()
  {

    $layoutContent = 'update_user_form';
    $user = (new UserManager)->findUserById($_GET['id']);
    require './templates/layout.phtml';
  }

  public function list()
  {

    $layoutContent = 'list_user';
    $users = (new UserManager())->findAllUsers();

    require './templates/layout.phtml';
  }




  public function checkUpdate()
  {
    $user = new User($_POST['email'], $_POST['first_name'], $_POST['last_name']);
    $user->setId($_POST['id']);
    (new UserManager())->updateUser($user);
    header('Location: index.php?route=list_user');
  }

  public function checkCreate()
  {
    $user = new User($_POST['email'],  $_POST['first_name'], $_POST['last_name']);
    (new UserManager())->createUser($user);
    header('Location: index.php?route=list_user');
  }

  public function delete()
  {
    (new UserManager())->deleteUser($_GET['id']);
    header('Location: index.php?route=list_user');
  }
}
