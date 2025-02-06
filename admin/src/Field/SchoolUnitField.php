<?php

namespace DSEWesternThessaloniki\Component\Schoolsj3\Administrator\Field;

defined('JPATH_BASE') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Form\Field\ListField;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

class SchoolUnitField extends ListField {

	protected $type ='SchoolUnit';

	protected function getOptions()
	{
		$db    = Factory::getContainer()->get("DatabaseDriver");
		$query = "SELECT id, units FROM #__sch3_units";
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		$options = array();
	
		$options  = array();
		if ($rows)
		{
			foreach ($rows as $row)
			{
				$options[] = HTMLHelper::_(
					'select.option', 
					"$row->id", 
					Text::_($row->units)
				);
			}
		}
	
		// Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $options);
	
		return $options;
	}
}