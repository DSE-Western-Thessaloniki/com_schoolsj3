<?php
defined('_JEXEC') or die;

class Schoolsj3ControllerAllsch extends JControllerForm
{
    public function getModel($name = 'Allsch', $prefix = 'Schoolsj3Model', $config = array('ignore_request' => true))
    {
	$model = parent::getModel($name, $prefix, $config);
	return $model;
    }
}

?>
