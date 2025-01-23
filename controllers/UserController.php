<?php
class UserController
{
  public function show()
  {
    $route = 'show_user';
    require '../templates/layout.phtml';
  }
  public function create()
  {
    $route = 'create_user';
    require './templates/layout.phtml';
  }

  public function update()
  {
    $route = 'update_user';
    $user = (new UserManager)->findUserById($_GET['id']);
    var_dump($user);
    require './templates/layout.phtml';
  }

  public function list()
  {
    $route = 'list_user';
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
