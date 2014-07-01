<?php
/**
 * Created by PhpStorm.
 * User: abc
 * Date: 14-6-27
 * Time: 上午11:03
 */
namespace Album\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Helper\ViewModel;

class AlbumController extends AbstractActionController
{
    public function indexAction()
    {
       $albumTable= $this->getServiceLocator()->get('Album\Model\AlbumTable');
       $album=$albumTable->fetchAll();

       /*$viewModel=new ViewModel(array(
           'albums'=> $album
       ));

        return $viewModel;*/
        return array('albums'=>$album);
    }
}