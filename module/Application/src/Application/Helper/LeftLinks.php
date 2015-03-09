<?php
namespace Application\Helper;

use Zend\View\Helper\AbstractHelper;

class LeftLinks extends AbstractHelper
{

	public function __invoke(array $values, $urlPrefix)
	{

//echo $this->request->params()->fromRoute("category");
//$category = $params->params()->fromRoute("category") ?: 'undefined category';
		

// Via the plugin manager:
$pluginManager = $view->getHelperPluginManager();
//$helper        = $pluginManager->get('lowercase');


		$html = '<div class="list-group">' . PHP_EOL;
		foreach ($values as $item) {

			$html .= sprintf("<a href='%s/%s' class='list-group-item'>%s</a>", $urlPrefix, $item, $item);
		}
		$html .= '</div>'. PHP_EOL;

		return $html;
	}



}
