<?php

use Joomla\CMS\Factory;

defined('_JEXEC') or die;

$document = Factory::getApplication()->getDocument();
$cssFile = "./media/com_schoolsj3/css/site.stylesheet.css";
$document->addStyleSheet($cssFile);

$mvc = Factory::getApplication()->bootComponent("com_schoolsj3")->getMVCFactory();
$controller = $mvc->createController('Schoolsj3');
$controller->execute(Factory::getApplication()->getInput()->get('task'));
$controller->redirect();

?>
