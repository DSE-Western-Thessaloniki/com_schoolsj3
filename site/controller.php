<?php
defined('_JEXEC') or die;

class Schoolsj3Controller extends JControllerLegacy
{
    protected $default_view = 'schools';

    public function display($cachable = false, $urlparams = false)
    {
	// require_once JPATH_COMPONENT.'/helpers/school.php';

	$view = $this->input->get('view', 'schools');
	$layout = $this->input->get('layout', 'default');
	$id = $this->input->getInt('id');

	parent::display();

	return $this;
    }
}

?>
