<?php

use Joomla\CMS\MVC\Controller\FormController;

defined('_JEXEC') or die;

class Schoolsj3ControllerAllsch extends FormController
{
    public function getModel($name = 'Allsch', $prefix = 'Schoolsj3Model', $config = array('ignore_request' => true))
    {
	$model = parent::getModel($name, $prefix, $config);
	return $model;
    }
}

?>
