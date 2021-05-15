<?php
defined('_JEXEC') or die;

class Schoolsj3ControllerShifts extends JControllerAdmin
{
    public function getModel($name = 'Shift', $prefix = 'Schoolsj3Model', $config = array('ignore_request' => true))
    {
	$model = parent::getModel($name, $prefix, $config);
	return $model;
    }
}

?>
