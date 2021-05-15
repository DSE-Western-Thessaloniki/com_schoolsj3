<?php defined( '_JEXEC' ) or die( 'Restricted access' ); 
 
class Schoolsj3TableAllsch extends JTable
{                      
  /**
  * Constructor
  *
  * @param object Database connector object
  */
  function __construct( &$db ) {
    parent::__construct('#__sch3_schools', 'id', $db);
  }
}
?>
