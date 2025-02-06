<?php

namespace DSEWesternThessaloniki\Component\Schoolsj3\Administrator\Table;

use Joomla\CMS\Table\Table;
use Joomla\Database\DatabaseDriver;

defined("_JEXEC") or die();

class ShiftTable extends Table
{
    public function __construct(DatabaseDriver $db)
    {
        parent::__construct("#__sch3_shifts", "id", $db);
    }

    public function bind($array, $ignore = "")
    {
        return parent::bind($array, $ignore);
    }

    public function store($updateNulls = false)
    {
        return parent::store($updateNulls);
    }
}

?>
