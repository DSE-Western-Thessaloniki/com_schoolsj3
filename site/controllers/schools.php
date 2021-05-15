<?php
defined('_JEXEC') or die;

class Schoolsj3ControllerSchools extends JControllerForm
{
    public function getModel($name = 'Schools', $prefix = 'Schoolsj3Model', $config = array('ignore_request' => true))
    {
	$model = parent::getModel($name, $prefix, $config);
	return $model;
    }
}

?>
