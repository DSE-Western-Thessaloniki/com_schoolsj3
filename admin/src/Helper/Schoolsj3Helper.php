<?php

namespace DSEWestThessaloniki\Component\Schoolsj3\Administrator\Helper;

use Joomla\CMS\Access\Access;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\Helpers\Sidebar;
use Joomla\CMS\Language\Text;
use Joomla\Registry\Registry;

defined('_JEXEC') or die;

class Schoolsj3Helper
{
    public static function getActions($categoryId = 0)
    {
		$user = Factory::getApplication()->getIdentity();
		$result = new Registry();

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

		$actions = Access::getActionsFromFile(
			"../access.xml", 
			"/access/section[@name='$level']/"
		);

		foreach ($actions as $action)
		{
			$result->set($action->name, $user->authorise($action->name, $assetName));
		}

		return $result;
    }

    public static function addSubmenu($vName = 'schools')
    {
		Sidebar::addEntry(Text::_('COM_SCHOOLSJ3_SUBMENU_SCHOOLS'),
		'index.php?option=com_schoolsj3&view=schools', $vName == 'schools' );
		Sidebar::addEntry( Text::_('COM_SCHOOLSJ3_SUBMENU_CATEGORIES'),
		'index.php?option=com_schoolsj3&view=categories', $vName == 'categories' );
		Sidebar::addEntry( Text::_('COM_SCHOOLSJ3_SUBMENU_OFFICES'),
		'index.php?option=com_schoolsj3&view=offices', $vName == 'offices' );
		Sidebar::addEntry( Text::_('COM_SCHOOLSJ3_SUBMENU_MUNICIPALITIES'),
		'index.php?option=com_schoolsj3&view=municipalities', $vName == 'municipalities' );
		Sidebar::addEntry( Text::_('COM_SCHOOLSJ3_SUBMENU_SHIFTS'),
		'index.php?option=com_schoolsj3&view=shifts', $vName == 'shifts' );
		Sidebar::addEntry( Text::_('COM_SCHOOLSJ3_SUBMENU_UNITS'),
		'index.php?option=com_schoolsj3&view=units', $vName == 'units' );
		Sidebar::addEntry( Text::_('COM_SCHOOLSJ3_SUBMENU_DISTRICTS'),
		'index.php?option=com_schoolsj3&view=districts', $vName == 'districts' );

		//if ($vName == 'categories')
		//{
		//    JToolbarHelper::title( Text::sprintf('COM_SCHOOLSJ3_CATEGORIES_TITLE', Text::_('com_schoolsj3')), 'schools-categories');
		//}
    }

}

?>
