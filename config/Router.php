<?php
class Router
{
  public function __construct() {}

  public function routing($get)
  {
    $route = $get['route'] ?? null;


    switch ($route) {

      case 'show_user':
        (new UserController())->show();
        break;
      case 'create_user':
        (new UserController())->create();
        break;
      case 'update_user':
        (new UserController())->update();
        break;

      case 'check_create_user':
        (new UserController())->checkCreate();
        break;
      case 'check_update_user':
        (new UserController())->checkUpdate();
        break;
      case 'delete_user':
        (new UserController())->delete();


      default:
        (new UserController())->list();
        break;
    }
  }
}
