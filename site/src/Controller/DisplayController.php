<?php

namespace DSEWestThessaloniki\Component\Schoolsj3\Site\Controller;

use Joomla\CMS\MVC\Controller\BaseController;

defined("_JEXEC") or die();

class DisplayController extends BaseController
{
    protected $default_view = "schools";

    public function display($cachable = false, $urlparams = false)
    {
        parent::display();

        return $this;
    }
}

?>
