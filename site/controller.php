<?php

use Joomla\CMS\MVC\Controller\BaseController;

defined('_JEXEC') or die;

class Schoolsj3Controller extends BaseController
{
    protected $default_view = 'schools';

    public function display($cachable = false, $urlparams = false)
    {
		parent::display();

		return $this;
    }
}

?>
