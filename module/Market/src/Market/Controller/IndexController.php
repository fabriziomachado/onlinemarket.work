<?php

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    private $messages;

    public function __construct() {
        $this->messages = ['Welcome to the Online Market'];
    }

    public function indexAction()
    {


    	if( $this->flashMessenger()->hasMessages() )
    	{
    		$this->messages = $this->flashMessenger()->getMessages();
    	} 

        return ['messages' => $this->messages ]; 

    }

    public function fooAction()
    {
        return new ViewModel();
    }
}
