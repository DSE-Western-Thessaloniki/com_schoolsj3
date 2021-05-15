<?php
defined('_JEXEC') or die;

class Schoolsj3ControllerOffices extends JControllerAdmin
{
    public function getModel($name = 'Office', $prefix = 'Schoolsj3Model', $config = array('ignore_request' => true))
    {
	$model = parent::getModel($name, $prefix, $config);
	return $model;
    }
}

?>
