<?php
defined('_JEXEC') or die;

class Schoolsj3ViewSchools extends JViewLegacy
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
	    JError::raiseError(500, implode("\n", $errors));
	    return false;
	}

	$this->addToolbar();
	$this->sidebar = JHtmlSidebar::render();
	parent::display($tpl);
    }

    protected function addToolbar()
    {
	$canDo = Schoolsj3Helper::getActions();
	$bar = JToolBar::getInstance('toolbar');

	JToolbarHelper::title(JText::_('COM_SCHOOLSJ3_MANAGER_SCHOOLS'), '');
	JToolbarHelper::addNew('school.add');

	if ($canDo->get('core.edit'))
	{
	    JToolbarHelper::editList('school.edit');
	}
	if ($canDo->get('core.edit.state')) {
	    JToolbarHelper::publish('schools.publish', 'JTOOLBAR_PUBLISH', true);
	    JToolbarHelper::unpublish('schools.unpublish', 'JTOOLBAR_UNPUBLISH', true);
	    JToolbarHelper::archiveList('schools.archive');
	    JToolbarHelper::checkin('schools.checkin');
	}
	$state = $this->get('State');
	if ($state->get('filter.state') == -2 && $canDo->get('core.delete'))
	{
	    JToolbarHelper::deleteList('', 'schools.delete', 'JTOOLBAR_EMPTY_TRASH');
	} elseif ($canDo->get('core.edit.state'))
	{
	    JToolbarHelper::trash('schools.trash');
	}
	if ($canDo->get('core.admin'))
	{
	    JToolbarHelper::preferences('com_schoolsj3');
	}

	// Adding filters
	JHtmlSidebar::setAction('index.php?option=com_schoolsj3&view=schools');

	JHtmlSidebar::addFilter( JText::_('JOPTION_SELECT_PUBLISHED'), 'filter_state', JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.state'), true) );

	$db   = JFactory::getDbo();
	$query = "SELECT id, description FROM #__sch3_categories";
	$db->setQuery($query);
	$rows = $db->loadObjectList();
	$options = array();
	foreach ($rows as $row)
	{
	   $options[] = JHtml::_('select.option', "$row->id", JText::_($row->description));
	}
	JHtmlSidebar::addFilter( JText::_('COM_SCHOOLSJ3_FILTER_CATEGORY'),'filter_category', JHtml::_('select.options',$options,'value', 'text', $this->state->get('filter.category'), true));

	$db   = JFactory::getDbo();
	$query = "SELECT id, description FROM #__sch3_offices";
	$db->setQuery($query);
	$rows = $db->loadObjectList();
	$options = array();
	foreach ($rows as $row)
	{
	   $options[] = JHtml::_('select.option', "$row->id", JText::_($row->description));
	}
	JHtmlSidebar::addFilter( JText::_('COM_SCHOOLSJ3_FILTER_OFFICE'),'filter_office', JHtml::_('select.options',$options,'value', 'text', $this->state->get('filter.office'), true));

	$db   = JFactory::getDbo();
	$query = "SELECT id, description FROM #__sch3_municipalities";
	$db->setQuery($query);
	$rows = $db->loadObjectList();
	$options = array();
	foreach ($rows as $row)
	{
	   $options[] = JHtml::_('select.option', "$row->id", JText::_($row->description));
	}
	JHtmlSidebar::addFilter( JText::_('COM_SCHOOLSJ3_FILTER_MUNICIPALITY'),'filter_municipality', JHtml::_('select.options',$options,'value', 'text', $this->state->get('filter.municipality'), true));

	$db   = JFactory::getDbo();
	$query = "SELECT id, description FROM #__sch3_shifts";
	$db->setQuery($query);
	$rows = $db->loadObjectList();
	$options = array();
	foreach ($rows as $row)
	{
	   $options[] = JHtml::_('select.option', "$row->id", JText::_($row->description));
	}
	JHtmlSidebar::addFilter( JText::_('COM_SCHOOLSJ3_FILTER_SHIFT'),'filter_shift', JHtml::_('select.options',$options,'value', 'text', $this->state->get('filter.shift'), true));

	$db   = JFactory::getDbo();
	$query = "SELECT id, units FROM #__sch3_units";
	$db->setQuery($query);
	$rows = $db->loadObjectList();
	$options = array();
	foreach ($rows as $row)
	{
	   $options[] = JHtml::_('select.option', "$row->id", JText::_($row->units));
	}
	JHtmlSidebar::addFilter( JText::_('COM_SCHOOLSJ3_FILTER_UNITS'),'filter_units', JHtml::_('select.options',$options,'value', 'text', $this->state->get('filter.units'), true));

	$db   = JFactory::getDbo();
	$query = "SELECT id, description FROM #__sch3_districts";
	$db->setQuery($query);
	$rows = $db->loadObjectList();
	$options = array();
	foreach ($rows as $row)
	{
	   $options[] = JHtml::_('select.option', "$row->id", JText::_($row->description));
	}
	JHtmlSidebar::addFilter( JText::_('COM_SCHOOLSJ3_FILTER_DISTRICT'),'filter_district', JHtml::_('select.options',$options,'value', 'text', $this->state->get('filter.district'), true));
    }
}

?>
