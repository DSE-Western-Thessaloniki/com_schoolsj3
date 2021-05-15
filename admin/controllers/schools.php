<?php
defined('_JEXEC') or die;

class Schoolsj3ControllerSchools extends JControllerAdmin
{
    public function getModel($name = 'School', $prefix = 'Schoolsj3Model', $config = array('ignore_request' => true))
    {
	$model = parent::getModel($name, $prefix, $config);
	return $model;
    }
}

?>
