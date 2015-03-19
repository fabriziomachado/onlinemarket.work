<?php

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class IndexController extends AbstractActionController
{

    use ListingsTableTrait;
    
    private $messages;

    public function __construct() {
        # $this->messages = ['Welcome to Online Market ZF2'];
    }

    public function indexAction()
    {
    	if( $this->flashMessenger()->hasMessages() )
    	{
    		$this->messages = $this->flashMessenger()->getMessages();
    	} 

        $recentItem = $this->listingsTable->getMostRecentListing();

        return ['messages' => $this->messages, 'item' => $recentItem ]; 

    }

    public function fooAction()
    {
        return new ViewModel();
    }
}
