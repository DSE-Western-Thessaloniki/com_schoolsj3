<?php

use Joomla\CMS\MVC\Controller\AdminController;

defined('_JEXEC') or die;

class Schoolsj3ControllerSchools extends AdminController
{
    public function getModel($name = 'School', $prefix = 'Schoolsj3Model', $config = array('ignore_request' => true))
    {
        $model = parent::getModel($name, $prefix, $config);
        return $model;
    }
}

?>
