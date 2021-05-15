<?php
defined('_JEXEC') or die;

class Schoolsj3ModelCategory extends JModelAdmin
{
    protected $text_prefix = 'COM_SCHOOLSJ3';

    public function getTable($type = 'Category', $prefix = 'Schoolsj3Table', $config = array())
    {
	return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true)
    {
	$app = JFactory::getApplication();

	$form = $this->loadForm('com_schoolsj3.category', 'category', array('control' => 'jform', 'load_data' => $loadData));

	if (empty($form))
	{
	    return false;
	}

	return $form;
    }

    protected function loadFormData()
    {
	$data = JFactory::getApplication()->getUserState('com_schoolsj3.edit.category.data', array());

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
