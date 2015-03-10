<?php
namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PostController extends AbstractActionController
{
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
    	$this->postForm->setData($data);

    	$view = new ViewModel( ['postForm' => $this->postForm , 'data' => $data] );
    	//$view = new ViewModel( ['categories' => $this->categories] );
    	//$view->setTemplate("market/post/invalid.phtml");

        return $view;

    }

}