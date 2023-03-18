<?php

use Joomla\CMS\Table\Table;

 defined( '_JEXEC' ) or die( 'Restricted access' ); 
 
class Schoolsj3TableSchools extends Table
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
