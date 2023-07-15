<?php

namespace DSEWestThessaloniki\Component\Schoolsj3\Administrator\Table;

use Joomla\CMS\Table\Table;

defined('_JEXEC') or die;

class OfficeTable extends Table
{
    public function __construct($table, $key, $db)
    {
	    parent::__construct('#__sch3_offices', 'id', $db);
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