<?php
defined('_JEXEC') or die;

class Schoolsj3ControllerCategories extends JControllerAdmin
{
    public function getModel($name = 'Category', $prefix = 'Schoolsj3Model', $config = array('ignore_request' => true))
    {
	$model = parent::getModel($name, $prefix, $config);
	return $model;
    }
}

?>
