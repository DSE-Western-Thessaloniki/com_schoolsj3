<?php

use Joomla\CMS\MVC\Controller\AdminController;

defined("_JEXEC") or die();

class OfficesController extends AdminController
{
    public function getModel(
        $name = "Office",
        $prefix = "Administrator",
        $config = ["ignore_request" => true]
    ) {
        return parent::getModel($name, $prefix, $config);
    }
}

?>
