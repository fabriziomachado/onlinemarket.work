<?php
namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Model\ListingsTable;

class ListingsTableFactory implements FactoryInterface
{	
	public function createService(ServiceLocatorInterface $sm)
    {
      
      $table = ListingsTable::$tableName;
      $adapter = $sm->get('general-adapter');
      // echo "<pre>";print_r($adapter);echo "</pre>";

      $listingsTable = new ListingsTable($table, $adapter);


      return   $listingsTable;
    }

}