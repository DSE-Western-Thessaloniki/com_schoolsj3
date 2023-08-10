<?php

namespace DSEWestThessaloniki\Component\Schoolsj3\Site\Helper;

use Joomla\CMS\Factory;

defined("_JEXEC") or die();

class MapHelper
{
    public static function getMapConfig()
    {
        $db = Factory::getContainer()->get("DatabaseDriver");
        $query = "SELECT * FROM #__sch3_config LIMIT 1";
        $db->setQuery($query);

        $mapcfg = $db->loadObject();

        return $mapcfg;
    }
}

?>
