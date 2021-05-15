<?php
defined('_JEXEC') or die;

class Schoolsj3ModelSchool extends JModelItem
{
    protected $text_prefix = 'COM_SCHOOLSJ3';

    public function __construct($config = array())
    {
	parent::__construct($config);
    }

    public function populateState() {
	$id = JRequest::getInt('id');
	$this->setState('school.id', $id);
    }

    public function getItem($id = null) {
	if ($this->_item === null) {
	    $this->_item = array();
	}

	if (empty($id)) {
	    $id = (int) $this->getState('school.id');
	}

	if (!isset($this->_item[$id])) {
	    $db = $this->getDbo();
	    $query = $db->getQuery(true)->select('a.*')->from('#__sch3_schools AS a')->where('id='.(int)$id);
	    $db->setQuery($query);
	    $data = $db->loadObject();
	    $this->_item[$id] = $data;
	}

	return $this->_item[$id];
    }

    public function getTable($type = 'School', $prefix = 'Schoolsj3Table', $config = array())
    {
	return JTable::getInstance($type, $prefix, $config);
    }

    protected function prepareTable($table)
    {
	// FIX: We need to transform all fields...
	$table->description = htmlspecialchars_decode($table->description, ENT_QUOTES);
    }
}

?>
