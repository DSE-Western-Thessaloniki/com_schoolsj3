<?php

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\MVC\Factory\MVCFactory;

defined('_JEXEC') or die;

$user = Factory::getApplication()->getIdentity();
if (
	$user === null || 
	!$user->authorise('core.manage', 'com_schoolsj3')
   )
{
	throw new \Exception(Text::_('JERROR_ALERTNOAUTHOR'), 404);
	die;
}

$mvc = Factory::getApplication()->bootComponent("com_schoolsj3")->getMVCFactory();
$controller = $mvc->createController('Schoolsj3');
$controller->execute(Factory::getApplication()->getInput()->get('task'));
$controller->redirect();

?>
