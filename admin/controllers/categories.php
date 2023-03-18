<?php

use Joomla\CMS\MVC\Controller\AdminController;

defined('_JEXEC') or die;

class Schoolsj3ControllerCategories extends AdminController
{
    public function getModel($name = 'Category', $prefix = 'Schoolsj3Model', $config = array('ignore_request' => true))
    {
        $model = parent::getModel($name, $prefix, $config);
        return $model;
    }
}

?>
