<?php
/**
 * Created by PhpStorm.
 * User: abc
 * Date: 14-7-1
 * Time: 下午4:47
 */
namespace AbUser\Controller;
use Zend\Mvc\Controller\AbstractActionController;

class UserController extends AbstractActionController
{
    public function indexAction()
    {
        echo 'user index';
        exit;
    }
}