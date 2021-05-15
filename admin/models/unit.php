<?php
defined('_JEXEC') or die;

class Schoolsj3ModelUnit extends JModelAdmin
{
    protected $text_prefix = 'COM_SCHOOLSJ3';

    public function getTable($type = 'Unit', $prefix = 'Schoolsj3Table', $config = array())
    {
	return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true)
    {
	$app = JFactory::getApplication();

	$form = $this->loadForm('com_schoolsj3.unit', 'unit', array('control' => 'jform', 'load_data' => $loadData));

	if (empty($form))
	{
	    return false;
	}

	return $form;
    }

    protected function loadFormData()
    {
	$data = JFactory::getApplication()->getUserState('com_schoolsj3.edit.unit.data', array());

	if (empty($data))
	{
	    $data = $this->getItem();
	}

	return $data;
    }

    protected function prepareTable($table)
    {
	// FIX: We need to transform all fields...
	$table->units = htmlspecialchars_decode($table->units, ENT_QUOTES);
    }
}

?>
