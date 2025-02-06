<?php

namespace DSEWesternThessaloniki\Component\Schoolsj3\Site\Table;

use Joomla\CMS\Table\Table;

defined( '_JEXEC' ) or die( 'Restricted access' );

class SchoolsTable extends Table
{                      
    /**
     * Constructor
    *
    * @param object Database connector object
    */
    function __construct($table, $key, $db) {
        parent::__construct('#__sch3_schools', 'id', $db);
    }
}
?>
