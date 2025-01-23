<?php
class UserController
{
  // /!\ If layout is required it need $layoutContent variable to know what to render.

  //never used :P for now
  public function show()
  {
    $layoutContent = 'show_user';
    require '../templates/layout.phtml';
  }
  public function create()
  {
    $layoutContent = 'create_user';
    require './templates/layout.phtml';
  }

  public function update()
  {
    $layoutContent = 'update_user';
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
