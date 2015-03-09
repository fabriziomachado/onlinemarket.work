<?php
namespace Application\Helper;

use Zend\View\Helper\AbstractHelper;

class LeftLinks extends AbstractHelper
{

	public function __invoke(array $items, $activeItem = NULL, $urlPrefix)
	{
		$html = '<div class="list-group">' . PHP_EOL;
		foreach ($items as $item) {
			$class = $activeItem == $item ? ' active' : NULL;
			$html .= sprintf("<a href='%s/%s' class='list-group-item%s'>%s</a>", $urlPrefix, $item, $class, $item);
		}
		$html .= '</div>'. PHP_EOL;

		return $html;
	}



}
