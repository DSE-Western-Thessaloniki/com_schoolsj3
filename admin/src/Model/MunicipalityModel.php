<?php

namespace DSEWestThessaloniki\Component\Schoolsj3\Administrator\Model;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Model\AdminModel;
use Joomla\CMS\Table\Table;

defined('_JEXEC') or die;

class MunicipalityModel extends AdminModel
{
    protected $text_prefix = 'COM_SCHOOLSJ3';

    public function getTable($name = 'Municipality', $prefix = '', $config = array())
    {
		if ($table = $this->getMVCFactory()->createTable($name, $prefix, $config)) {
			return $table;
		}

		throw new \Exception(Text::sprintf('JLIB_APPLICATION_ERROR_TABLE_NAME_NOT_SUPPORTED', $name), 0);
    }

    public function getForm($data = array(), $loadData = true)
    {
		$form = $this->loadForm('com_schoolsj3.municipality', 'municipality', array('control' => 'jform', 'load_data' => $loadData));

		if (empty($form))
		{
			return false;
		}

		return $form;
    }

    protected function loadFormData()
    {
		$data = Factory::getApplication()->getUserState('com_schoolsj3.edit.municipality.data', array());

		if (empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
    }

    protected function prepareTable($table)
    {
		$table->id = (int) $table->id;
		$table->description = htmlspecialchars_decode($table->description, ENT_QUOTES);
    }
}

?>
