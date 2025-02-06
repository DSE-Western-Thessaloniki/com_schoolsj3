<?php

namespace DSEWesternThessaloniki\Component\Schoolsj3\Administrator\Controller;

use Joomla\CMS\MVC\Controller\AdminController;

defined("_JEXEC") or die();

class CategoriesController extends AdminController
{
    public function getModel(
        $name = "Category",
        $prefix = "Administrator",
        $config = ["ignore_request" => true]
    ) {
        $model = parent::getModel($name, $prefix, $config);
        return $model;
    }
}

?>
