<?php

namespace DSEWestThessaloniki\Component\Schoolsj3\Site\View;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;

defined('_JEXEC') or die;

class HtmlView extends BaseHtmlView
{
    protected $items;

    public function display($tpl = null)
    {
		$this->items = $this->get('Items');
		$this->state = $this->get('State');

		if (count($errors = $this->get('Errors')))
		{
			throw new \Exception(implode("\n", $errors), 500);
			return;
		}

		parent::display($tpl);
    }

}

?>
