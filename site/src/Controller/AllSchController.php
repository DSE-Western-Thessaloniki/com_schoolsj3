<?php

namespace DSEWesternThessaloniki\Component\Schoolsj3\Site\Controller;

use Joomla\CMS\MVC\Controller\FormController;

defined("_JEXEC") or die();

class AllSchController extends FormController
{
    public function getModel(
        $name = "AllSch",
        $prefix = "Site",
        $config = ["ignore_request" => true]
    ) {
        return parent::getModel($name, $prefix, $config);
    }
}

?>
