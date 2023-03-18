<?php

use Joomla\CMS\MVC\View\HtmlView;

defined('_JEXEC') or die;

class Schoolsj3ViewSchool extends HtmlView
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
