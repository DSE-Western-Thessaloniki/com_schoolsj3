<?php
defined('_JEXEC') or die;

$db   = JFactory::getDbo();
$query = "SELECT * FROM #__sch3_config LIMIT 1";
$db->setQuery($query);

$mapcfg = $db->loadObject();
?>
