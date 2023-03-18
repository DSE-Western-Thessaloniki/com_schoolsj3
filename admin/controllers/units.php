<?php

use Joomla\CMS\MVC\Controller\AdminController;

defined('_JEXEC') or die;

class Schoolsj3ControllerUnits extends AdminController
{
    public function getModel($name = 'Unit', $prefix = 'Schoolsj3Model', $config = array('ignore_request' => true))
    {
        $model = parent::getModel($name, $prefix, $config);
        return $model;
    }
}

?>
