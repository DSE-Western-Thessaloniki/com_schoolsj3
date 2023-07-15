<?php

namespace DSEWestThessaloniki\Component\Schoolsj3\Administrator\Controller;

use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Router\Route;

defined('_JEXEC') or die;

class DisplayController extends BaseController
{
    protected $default_view = 'schools';

    public function display($cachable = false, $urlparams = false)
    {
		$view = $this->input->get('view', 'schools');
		$layout = $this->input->get('layout', 'default');
		$id = $this->input->getInt('id');

		if ($view == 'school' && $layout == 'edit' && !$this->checkEditId('com_schoolsj3.edit.school', $id))
		{
			throw new \Exception(Text::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
			$this->setRedirect(Route::_('index.php?option=com_schoolsj3&view=schools', false));
			return false;
		}

		return parent::display($cachable, $urlparams);
    }
}
