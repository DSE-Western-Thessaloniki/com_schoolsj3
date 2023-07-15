<?php

namespace DSEWestThessaloniki\Component\Schoolsj3\Administrator\View\Municipalities;

use DSEWestThessaloniki\Component\Schoolsj3\Administrator\Helper\Schoolsj3Helper;
use Joomla\CMS\HTML\Helpers\Sidebar;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;

defined('_JEXEC') or die;

class HtmlView extends BaseHtmlView
{
    protected $items;
    protected $state;
    protected $pagination;

    public function display($tpl = null)
    {
		$this->items = $this->get('Items');
		$this->state = $this->get('State');
		$this->pagination = $this->get('Pagination');

		Schoolsj3Helper::addSubmenu('municipalities');

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

		ToolbarHelper::title(Text::_('COM_SCHOOLSJ3_MANAGER_MUNICIPALITIES'), '');
		ToolbarHelper::addNew('municipality.add');

		if ($canDo->get('core.edit'))
		{
			ToolbarHelper::editList('municipality.edit');
		}
		if ($canDo->get('core.edit.state')) {
			ToolbarHelper::publish('municipality.publish', 'JTOOLBAR_PUBLISH', true);
			ToolbarHelper::unpublish('municipality.unpublish', 'JTOOLBAR_UNPUBLISH', true);
			ToolbarHelper::archiveList('municipality.archive');
			ToolbarHelper::checkin('municipality.checkin');
		}
		$state = $this->get('State');
		if ($state->get('filter.state') == -2 && $canDo->get('core.delete'))
		{
			ToolbarHelper::deleteList('', 'municipality.delete', 'JTOOLBAR_EMPTY_TRASH');
		} elseif ($canDo->get('core.edit.state'))
		{
			ToolbarHelper::trash('municipality.trash');
		}
		if ($canDo->get('core.admin'))
		{
			ToolbarHelper::preferences('com_schoolsj3');
		}

		// Adding filters
		Sidebar::setAction('index.php?option=com_schoolsj3&view=municipalities');

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
