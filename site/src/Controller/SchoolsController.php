<?php

namespace DSEWesternThessaloniki\Component\Schoolsj3\Site\Controller;

use Joomla\CMS\MVC\Controller\FormController;

defined("_JEXEC") or die();

class SchoolsController extends FormController
{
    public function getModel(
        $name = "Schools",
        $prefix = "Site",
        $config = ["ignore_request" => true]
    ) {
        return parent::getModel($name, $prefix, $config);
    }
}

?>
