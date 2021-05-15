<?php
defined('_JEXEC') or die;

class Schoolsj3TableSchool extends JTable
{
    public function __construct(&$db)
    {
	parent::__construct('#__sch3_schools', 'id', $db);
    }

    public function bind($array, $ignore = '')
    {
	return parent::bind($array, $ignore);
    }

    public function store($updateNulls = false)
    {
	return parent::store($updateNulls);
    }
}

?>
