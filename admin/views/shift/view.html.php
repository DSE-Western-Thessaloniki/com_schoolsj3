<?php
defined('_JEXEC') or die;

class Schoolsj3ViewShift extends JViewLegacy
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
	JToolbarHelper::title(JText::_('COM_SCHOOLSJ3_MANAGER_SHIFT'), '');
	JToolbarHelper::save('shift.save');

	if (empty($this->item->id))
	{
	    JToolbarHelper::cancel('shift.cancel');
	}
	else
	{
	    JToolbarHelper::cancel('shift.cancel', 'JTOOLBAR_CLOSE');
	}
    }
}

?>
