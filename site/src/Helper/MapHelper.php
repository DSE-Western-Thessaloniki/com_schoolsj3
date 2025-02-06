<?php

namespace DSEWesternThessaloniki\Component\Schoolsj3\Site\Helper;

use Joomla\CMS\Component\ComponentHelper;

defined("_JEXEC") or die();

class MapHelper
{
    public static function getMapConfig()
    {
        $params = ComponentHelper::getParams("com_schoolsj3");

        return $params->jsonSerialize();
    }
}

?>
