<?php
defined('_JEXEC') or die;

class Schoolsj3ViewCategory extends JViewLegacy
{
    protected $item;
    protected $form;

    public function display($tpl = null)
    {
	$this->item = $this->get('Item');
	$this->form = $this->get('Form');

	if (count($errors = $this->get('Errors')))
	{
	    JError::raiseError(500, implode("\n", $errors));
	    return false;
	}

	$this->addToolbar();
	parent::display($tpl);
    }

    protected function addToolbar()
    {
	JFactory::getApplication()->input->set('hidemainmenu', true);
	JToolbarHelper::title(JText::_('COM_SCHOOLSJ3_MANAGER_CATEGORY'), '');
	JToolbarHelper::save('category.save');

	if (empty($this->item->id))
	{
	    JToolbarHelper::cancel('category.cancel');
	}
	else
	{
	    JToolbarHelper::cancel('category.cancel', 'JTOOLBAR_CLOSE');
	}
    }
}

?>
