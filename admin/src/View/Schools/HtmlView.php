<?php

namespace DSEWestThessaloniki\Component\Schoolsj3\Administrator\View\Schools;

use DSEWestThessaloniki\Component\Schoolsj3\Administrator\Helper\Schoolsj3Helper;
use Joomla\CMS\Factory;
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

		Schoolsj3Helper::addSubmenu('schools');

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

		ToolbarHelper::title(Text::_('COM_SCHOOLSJ3_MANAGER_SCHOOLS'), '');
		ToolbarHelper::addNew('school.add');

		if ($canDo->get('core.edit'))
		{
			ToolbarHelper::editList('school.edit');
		}
		if ($canDo->get('core.edit.state')) {
			ToolbarHelper::publish('schools.publish', 'JTOOLBAR_PUBLISH', true);
			ToolbarHelper::unpublish('schools.unpublish', 'JTOOLBAR_UNPUBLISH', true);
			ToolbarHelper::archiveList('schools.archive');
			ToolbarHelper::checkin('schools.checkin');
		}
		$state = $this->get('State');
		if ($state->get('filter.state') == -2 && $canDo->get('core.delete'))
		{
			ToolbarHelper::deleteList('', 'schools.delete', 'JTOOLBAR_EMPTY_TRASH');
		} elseif ($canDo->get('core.edit.state'))
		{
			ToolbarHelper::trash('schools.trash');
		}
		if ($canDo->get('core.admin'))
		{
			ToolbarHelper::preferences('com_schoolsj3');
		}

		// Adding filters
		Sidebar::setAction('index.php?option=com_schoolsj3&view=schools');

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

		$db   = Factory::getContainer()->get("DatabaseDriver");
		$query = "SELECT id, description FROM #__sch3_categories";
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		$options = array();
		foreach ($rows as $row)
		{
			$options[] = HTMLHelper::_(
				'select.option', 
				"$row->id", 
				Text::_($row->description)
			);
		}
		Sidebar::addFilter(
			Text::_('COM_SCHOOLSJ3_FILTER_CATEGORY'),
			'filter_category', 
			HTMLHelper::_(
				'select.options',
				$options,
				'value', 
				'text', 
				$this->state->get('filter.category'),
				true
			)
		);

		$db   = Factory::getContainer()->get("DatabaseDriver");
		$query = "SELECT id, description FROM #__sch3_offices";
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		$options = array();
		foreach ($rows as $row)
		{
			$options[] = HTMLHelper::_(
				'select.option',
				 "$row->id", 
				Text::_($row->description)
			);
		}
		Sidebar::addFilter(
			Text::_('COM_SCHOOLSJ3_FILTER_OFFICE'),
			'filter_office', 
			HTMLHelper::_(
				'select.options',
				$options,
				'value', 
				'text', 
				$this->state->get('filter.office'), 
				true
			)
		);

		$db   = Factory::getContainer()->get("DatabaseDriver");
		$query = "SELECT id, description FROM #__sch3_municipalities";
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		$options = array();
		foreach ($rows as $row)
		{
			$options[] = HTMLHelper::_(
				'select.option', 
				"$row->id", 
				Text::_($row->description)
			);
		}
		Sidebar::addFilter( 
			Text::_('COM_SCHOOLSJ3_FILTER_MUNICIPALITY'),
			'filter_municipality',
			HTMLHelper::_(
				'select.options',
				$options,
				'value',
				'text',
				$this->state->get('filter.municipality'),
				true
			)
		);

		$db   = Factory::getContainer()->get("DatabaseDriver");
		$query = "SELECT id, description FROM #__sch3_shifts";
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		$options = array();
		foreach ($rows as $row)
		{
			$options[] = HTMLHelper::_(
				'select.option', 
				"$row->id", 
				Text::_($row->description)
			);
		}
		Sidebar::addFilter( 
			Text::_('COM_SCHOOLSJ3_FILTER_SHIFT'),
			'filter_shift', 
			HTMLHelper::_(
				'select.options',
				$options,
				'value', 
				'text', 
				$this->state->get('filter.shift'), 
				true
			)
		);

		$db   = Factory::getContainer()->get("DatabaseDriver");
		$query = "SELECT id, units FROM #__sch3_units";
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		$options = array();
		foreach ($rows as $row)
		{
			$options[] = HTMLHelper::_(
				'select.option', 
				"$row->id", 
				Text::_($row->units)
			);
		}
		Sidebar::addFilter(
			Text::_('COM_SCHOOLSJ3_FILTER_UNITS'),
			'filter_units', 
			HTMLHelper::_(
				'select.options',
				$options,
				'value',
				'text',
				$this->state->get('filter.units'),
				true
			)
		);

		$db   = Factory::getContainer()->get("DatabaseDriver");
		$query = "SELECT id, description FROM #__sch3_districts";
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		$options = array();
		foreach ($rows as $row)
		{
			$options[] = HTMLHelper::_(
				'select.option',
				"$row->id",
				Text::_($row->description)
			);
		}
		Sidebar::addFilter(
			Text::_('COM_SCHOOLSJ3_FILTER_DISTRICT'),
			'filter_district',
			HTMLHelper::_(
				'select.options',
				$options,
				'value',
				'text',
				$this->state->get('filter.district'),
				true
			)
		);
    }
}

?>
