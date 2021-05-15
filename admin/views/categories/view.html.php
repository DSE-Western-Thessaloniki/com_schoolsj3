<?php
defined('_JEXEC') or die;

class Schoolsj3ViewCategories extends JViewLegacy
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

	JToolbarHelper::title(JText::_('COM_SCHOOLSJ3_MANAGER_CATEGORIES'), '');
	JToolbarHelper::addNew('category.add');

	if ($canDo->get('core.edit'))
	{
	    JToolbarHelper::editList('category.edit');
	}
	if ($canDo->get('core.edit.state')) {
	    JToolbarHelper::publish('category.publish', 'JTOOLBAR_PUBLISH', true);
	    JToolbarHelper::unpublish('category.unpublish', 'JTOOLBAR_UNPUBLISH', true);
	    JToolbarHelper::archiveList('category.archive');
	    JToolbarHelper::checkin('category.checkin');
	}
	$state = $this->get('State');
	if ($state->get('filter.state') == -2 && $canDo->get('core.delete'))
	{
	    JToolbarHelper::deleteList('', 'category.delete', 'JTOOLBAR_EMPTY_TRASH');
	} elseif ($canDo->get('core.edit.state'))
	{
	    JToolbarHelper::trash('category.trash');
	}
	if ($canDo->get('core.admin'))
	{
	    JToolbarHelper::preferences('com_schoolsj3');
	}

	// Adding filters
	JHtmlSidebar::setAction('index.php?option=com_schoolsj3&view=categories');

 	JHtmlSidebar::addFilter( JText::_('JOPTION_SELECT_PUBLISHED'), 'filter_state', JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.state'), true) );
   }
}

?>
