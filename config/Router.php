<?php
class Router
{
  public function __construct() {}

  public function routing($get)
  {
    switch ($get) {
      case 'show_user':
        new UserController()->show();
      case 'create_user':
        return 'create';
      case 'check_create_user':
        return 'checkCreate';
      case 'update_user':
        return 'update';
      case 'check_update_user':
        return 'checkUpdate';
      case 'delete_user':
        return 'delete';
      default:
        return 'list';
    }
  }
}
