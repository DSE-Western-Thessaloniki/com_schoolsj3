<?php

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Model\AdminModel;

defined('_JEXEC') or die;

class Schoolsj3ModelOffice extends AdminModel
{
    protected $text_prefix = 'COM_SCHOOLSJ3';

    public function getTable($type = 'Office', $prefix = 'Schoolsj3Table', $config = array())
    {
		return $this->getMVCFactory()->createTable($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true)
    {
		$form = $this->loadForm('com_schoolsj3.office', 'office', array('control' => 'jform', 'load_data' => $loadData));

		if (empty($form))
		{
			return false;
		}

		return $form;
    }

    protected function loadFormData()
    {
		$data = Factory::getApplication()->getUserState('com_schoolsj3.edit.office.data', array());

		if (empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
    }

    protected function prepareTable($table)
    {
	// FIX: We need to transform all fields...
	$table->description = htmlspecialchars_decode($table->description, ENT_QUOTES);
    }
}

?>
