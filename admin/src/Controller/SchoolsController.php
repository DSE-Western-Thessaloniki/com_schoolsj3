<?php

namespace DSEWesternThessaloniki\Component\Schoolsj3\Administrator\Controller;

use Joomla\CMS\MVC\Controller\AdminController;

defined("_JEXEC") or die();

class SchoolsController extends AdminController
{
    public function getModel(
        $name = "School",
        $prefix = "Administrator",
        $config = ["ignore_request" => true]
    ) {
        return parent::getModel($name, $prefix, $config);
    }
}

?>
