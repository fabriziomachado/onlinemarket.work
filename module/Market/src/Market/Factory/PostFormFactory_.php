<?php
namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Market\Form\PostForm;


class PostFormFactory implements FactoryInterface
{	
	public function createService(ServiceLocatorInterface $serviceManager)
    {
 		 $categories = $serviceManager->get('categories');
 		 $filter     = $serviceManager->get('market-post-filter');

         $form = new PostForm();
         $form->setCategories($categories);
         $form->buildForm();
         $form->setInputFilter($filter);


        return $form;
    }
}