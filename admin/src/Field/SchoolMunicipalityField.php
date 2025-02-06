<?php

namespace DSEWesternThessaloniki\Component\Schoolsj3\Administrator\Field;

defined('JPATH_BASE') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Form\Field\ListField;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

class SchoolMunicipalityField extends ListField {

	protected $type ='SchoolMunicipality';

	protected function getOptions()
	{
		$db    = Factory::getContainer()->get("DatabaseDriver");
		$query = "SELECT id, description FROM #__sch3_municipalities";
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
					Text::_($row->description)
				);
			}
		}
	
		// Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $options);
	
		return $options;
	}
}