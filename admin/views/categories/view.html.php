<?php

use Joomla\CMS\HTML\Helpers\Sidebar;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;

defined('_JEXEC') or die;

class Schoolsj3ViewCategories extends HtmlView
{
    protected $items;
    protected $state;
    protected $pagination;

    public function display($tpl = null)
    {
		$this->items = $this->get('Items');
		$this->state = $this->get('State');
		$this->pagination = $this->get('Pagination');

		Schoolsj3Helper::addSubmenu('categories');

		if (count($errors = $this->get('Errors')))
		{
			throw new \Exception(implode("\n", $errors), 500);
			return false;
		}

		$this->addToolbar();
		$this->sidebar = Sidebar::render();
		parent::display($tpl);
    }

    protected function addToolbar()
    {
		$canDo = Schoolsj3Helper::getActions();

		ToolbarHelper::title(Text::_('COM_SCHOOLSJ3_MANAGER_CATEGORIES'), '');
		ToolbarHelper::addNew('category.add');

		if ($canDo->get('core.edit'))
		{
			ToolbarHelper::editList('category.edit');
		}
		if ($canDo->get('core.edit.state')) {
			ToolbarHelper::publish('category.publish', 'JTOOLBAR_PUBLISH', true);
			ToolbarHelper::unpublish('category.unpublish', 'JTOOLBAR_UNPUBLISH', true);
			ToolbarHelper::archiveList('category.archive');
			ToolbarHelper::checkin('category.checkin');
		}
		$state = $this->get('State');
		if ($state->get('filter.state') == -2 && $canDo->get('core.delete'))
		{
			ToolbarHelper::deleteList('', 'category.delete', 'JTOOLBAR_EMPTY_TRASH');
		} elseif ($canDo->get('core.edit.state'))
		{
			ToolbarHelper::trash('category.trash');
		}
		if ($canDo->get('core.admin'))
		{
			ToolbarHelper::preferences('com_schoolsj3');
		}

		// Adding filters
		Sidebar::setAction('index.php?option=com_schoolsj3&view=categories');

		Sidebar::addFilter(
			Text::_('JOPTION_SELECT_PUBLISHED'), 
			'filter_state', 
			HTMLHelper::_(
				'select.options', 
				HTMLHelper::_('jgrid.publishedOptions'), 
				'value', 
				'text', 
				$this->state->get('filter.state'), 
				true
			)
		);
    }
}

?>
