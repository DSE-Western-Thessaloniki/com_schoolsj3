<?php

namespace DSEWestThessaloniki\Component\Schoolsj3\Site\Controller;

use Joomla\CMS\MVC\Controller\FormController;

defined('_JEXEC') or die;

class SchoolsController extends FormController
{
    public function getModel($name = 'Schools', $prefix = 'Site', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }
}

?>
