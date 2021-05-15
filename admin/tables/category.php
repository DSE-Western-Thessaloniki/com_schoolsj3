<?php
defined('_JEXEC') or die;

class Schoolsj3TableCategory extends JTable
{
    public function __construct(&$db)
    {
	parent::__construct('#__sch3_categories', 'id', $db);
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
