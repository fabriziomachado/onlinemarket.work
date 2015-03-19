<?php
namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PostController extends AbstractActionController
{
	use ListingsTableTrait;

	public $categories;
	private $postForm;


	public function setPostForm($postForm)
	{ 
		$this->postForm = $postForm;
	}

	
	public function setCategories($categories)
	{
		$this->categories = $categories;
	}

    public function indexAction()
    {
    	$data = $this->params()->fromPost();
    	//$data = $this->getRequest()->getPost();
    	$view = new ViewModel( ['postForm' => $this->postForm , 
    							'data' => $data] );
    	
    	$view->setTemplate('market/post/index.phtml');

    	if( $this->getRequest()->isPost() )
    	{
    		$this->postForm->setData($data);

    		if($this->postForm->isValid())
    		{

    			$this->listingsTable->addPosting($this->postForm->getData());

    			$this->flashMessenger()->addMessage("Tanks for posting!");
    			$this->redirect()->toRoute('home');
	    	}
	    	else
	    	{
	    		$invalidView = new ViewModel();
	    		$invalidView->setTemplate("market/post/invalid.phtml");
	    		$invalidView->addChild($view, 'main');
	    	
	    		return $invalidView;
    		}
    	}	

        return $view;
    }
}