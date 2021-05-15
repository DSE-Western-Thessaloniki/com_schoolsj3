<?php
defined('_JEXEC') or die;

$document = JFactory::getDocument();
$cssFile = "./media/com_schoolsj3/css/site.stylesheet.css";
$document->addStyleSheet($cssFile);

$controller = JControllerLegacy::getInstance('Schoolsj3');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();

?>
