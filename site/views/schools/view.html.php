<?php

use Joomla\CMS\MVC\View\HtmlView;

defined('_JEXEC') or die;

class Schoolsj3ViewSchools extends HtmlView
{
    protected $items;

    public function display($tpl = null)
    {
		$this->items = $this->get('Items');
		$this->state = $this->get('State');
		$this->pagination = $this->get('Pagination');

		if (count($errors = $this->get('Errors')))
		{
			throw new \Exception(implode("\n", $errors), 500);
			return;
		}

		parent::display($tpl);
    }

}

?>
