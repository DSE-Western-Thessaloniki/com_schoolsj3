<?php
defined('_JEXEC') or die;

class Schoolsj3Controller extends JControllerLegacy
{
    protected $default_view = 'schools';

    public function display($cachable = false, $urlparams = false)
    {
	require_once JPATH_COMPONENT.'/helpers/school.php';

	$view = $this->input->get('view', 'schools');
	$layout = $this->input->get('layout', 'default');
	$id = $this->input->getInt('id');

	if ($view == 'school' && $layout == 'edit' && !$this->checkEditId('com_schoolsj3.edit.school', $id))
	{
	    $this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
	    $this->setMessage($this->getError(), 'error');
	    $this->setRedirect(JRoute::_('index.php?option=com_schoolsj3&view=schools', false));
	    return false;
	}

	parent::display();

	return $this;
    }
}
