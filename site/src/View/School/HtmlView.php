<?php

namespace DSEWestThessaloniki\Component\Schoolsj3\Site\View;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;

defined('_JEXEC') or die;

class HtmlView extends BaseHtmlView
{
    protected $item;

    public function display($tpl = null)
    {
		$this->item = $this->get('Item');

		if (count($errors = $this->get('Errors')))
		{
			throw new \Exception(implode("\n", $errors), 500);
			return;
		}

		parent::display($tpl);
    }
}
?>
