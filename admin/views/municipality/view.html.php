<?php

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;

defined('_JEXEC') or die;

class Schoolsj3ViewMunicipality extends HtmlView
{
    protected $item;
    protected $form;

    public function display($tpl = null)
    {
		$this->item = $this->get('Item');
		$this->form = $this->get('Form');

		if (count($errors = $this->get('Errors')))
		{
			throw new \Exception(implode("\n", $errors), 500);
			return false;
		}

		$this->addToolbar();
		parent::display($tpl);
    }

    protected function addToolbar()
    {
		Factory::getApplication()->getInput()->set('hidemainmenu', true);
		ToolbarHelper::title(Text::_('COM_SCHOOLSJ3_MANAGER_MUNICIPALITY'), '');
		ToolbarHelper::save('municipality.save');

		if (empty($this->item->id))
		{
			ToolbarHelper::cancel('municipality.cancel');
		}
		else
		{
			ToolbarHelper::cancel('municipality.cancel', 'JTOOLBAR_CLOSE');
		}
    }
}

?>
