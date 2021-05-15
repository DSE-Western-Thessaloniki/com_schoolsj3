<?php
defined('_JEXEC') or die;

class Schoolsj3ViewMunicipalities extends JViewLegacy
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

	JToolbarHelper::title(JText::_('COM_SCHOOLSJ3_MANAGER_MUNICIPALITIES'), '');
	JToolbarHelper::addNew('municipality.add');

	if ($canDo->get('core.edit'))
	{
	    JToolbarHelper::editList('municipality.edit');
	}
	if ($canDo->get('core.edit.state')) {
	    JToolbarHelper::publish('municipality.publish', 'JTOOLBAR_PUBLISH', true);
	    JToolbarHelper::unpublish('municipality.unpublish', 'JTOOLBAR_UNPUBLISH', true);
	    JToolbarHelper::archiveList('municipality.archive');
	    JToolbarHelper::checkin('municipality.checkin');
	}
	$state = $this->get('State');
	if ($state->get('filter.state') == -2 && $canDo->get('core.delete'))
	{
	    JToolbarHelper::deleteList('', 'municipality.delete', 'JTOOLBAR_EMPTY_TRASH');
	} elseif ($canDo->get('core.edit.state'))
	{
	    JToolbarHelper::trash('municipality.trash');
	}
	if ($canDo->get('core.admin'))
	{
	    JToolbarHelper::preferences('com_schoolsj3');
	}

	// Adding filters
	JHtmlSidebar::setAction('index.php?option=com_schoolsj3&view=municipalities');

 	JHtmlSidebar::addFilter( JText::_('JOPTION_SELECT_PUBLISHED'), 'filter_state', JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.state'), true) );
   }
}

?>
