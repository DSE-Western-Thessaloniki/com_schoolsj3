<?php

namespace DSEWestThessaloniki\Component\Schoolsj3\Site\Table;

use Joomla\CMS\Table\Table;

defined('_JEXEC') or die;

class SchoolTable extends Table
{
    public function __construct($table, $key, $db)
    {
	    parent::__construct('#__sch3_schools', 'id', $db);
    }
}

?>
