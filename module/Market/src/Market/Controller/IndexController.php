<?php

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {

    	// $exampleService = $this->getServiceLocator()->get('ExampleService');

        return new ViewModel();
    }
}
