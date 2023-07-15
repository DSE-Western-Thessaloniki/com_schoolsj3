<?php

namespace DSEWestThessaloniki\Component\Schoolsj3\Site\Table;

use Joomla\CMS\Table\Table;

 defined( '_JEXEC' ) or die( 'Restricted access' ); 
 
class AllSchTable extends Table
{                      
    /**
    * Constructor
    *
    * @param object Database connector object
    */
    function __construct( $table, $key, $db ) {
        parent::__construct('#__sch3_schools', 'id', $db);
    }
}
?>
