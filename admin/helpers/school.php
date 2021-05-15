<?php
defined('_JEXEC') or die;

class Schoolsj3Helper
{
    public static function getActions($categoryId = 0)
    {
	$user = JFactory::getUser();
	$result = new JObject;

	if (empty($categoryId))
	{
	    $assetName = 'com_schoolsj3';
	    $level = 'component';
	}
	else
	{
	    $assetName = 'com_schoolsj3.category.'.(int) $categoryId;
	    $level = 'category';
	}

	$actions = JAccess::getActions('com_schoolsj3', $level);

	foreach ($actions as $action)
	{
	    $result->set($action->name, $user->authorise($action->name, $assetName));
	}

	return $result;
    }

    public static function addSubmenu($vName = 'schools')
    {
	JHtmlSidebar::addEntry(JText::_('COM_SCHOOLSJ3_SUBMENU_SCHOOLS'),
	'index.php?option=com_schoolsj3&view=schools', $vName == 'schools' );
	JHtmlSidebar::addEntry( JText::_('COM_SCHOOLSJ3_SUBMENU_CATEGORIES'),
	'index.php?option=com_schoolsj3&view=categories', $vName == 'categories' );
	JHtmlSidebar::addEntry( JText::_('COM_SCHOOLSJ3_SUBMENU_OFFICES'),
	'index.php?option=com_schoolsj3&view=offices', $vName == 'offices' );
	JHtmlSidebar::addEntry( JText::_('COM_SCHOOLSJ3_SUBMENU_MUNICIPALITIES'),
	'index.php?option=com_schoolsj3&view=municipalities', $vName == 'municipalities' );
	JHtmlSidebar::addEntry( JText::_('COM_SCHOOLSJ3_SUBMENU_SHIFTS'),
	'index.php?option=com_schoolsj3&view=shifts', $vName == 'shifts' );
	JHtmlSidebar::addEntry( JText::_('COM_SCHOOLSJ3_SUBMENU_UNITS'),
	'index.php?option=com_schoolsj3&view=units', $vName == 'units' );
	JHtmlSidebar::addEntry( JText::_('COM_SCHOOLSJ3_SUBMENU_DISTRICTS'),
	'index.php?option=com_schoolsj3&view=districts', $vName == 'districts' );

	//if ($vName == 'categories')
	//{
	//    JToolbarHelper::title( JText::sprintf('COM_SCHOOLSJ3_CATEGORIES_TITLE', JText::_('com_schoolsj3')), 'schools-categories');
	//}

    }

}

?>
