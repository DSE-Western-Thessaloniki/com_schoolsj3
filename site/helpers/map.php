<?php

use Joomla\CMS\Factory;

defined('_JEXEC') or die;

$db   = Factory::getContainer()->get("DatabaseDriver");
$query = "SELECT * FROM #__sch3_config LIMIT 1";
$db->setQuery($query);

$mapcfg = $db->loadObject();
?>
