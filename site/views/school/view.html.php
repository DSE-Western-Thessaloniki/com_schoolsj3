<?php
defined('_JEXEC') or die;

class Schoolsj3ViewSchool extends JViewLegacy
{
    protected $item;

    public function display($tpl = null)
    {
	$this->item = $this->get('Item');

	if (count($errors = $this->get('Errors')))
	{
	    JError::raiseError(500, implode("\n", $errors));
	    return false;
	}

	parent::display($tpl);
    }
}
?>
