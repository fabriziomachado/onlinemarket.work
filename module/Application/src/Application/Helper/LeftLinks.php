<?php
namespace Application\Helper;

use Zend\View\Helper\AbstractHelper;

class LeftLinks extends AbstractHelper
{
	public function __invoke(array $values, $urlPrefix)
	{
		$html = '<ul style="list-style-type: none">' . PHP_EOL;
		foreach ($values as $item) {
			$html .= "<li>";
			$html .= sprintf("<a href='%s/%s'>%s</a>", $urlPrefix, $item, $item);
			$html .= "</li>". PHP_EOL;
		}
		$html .= '</ul>'. PHP_EOL;

		return $html;
	}

}
