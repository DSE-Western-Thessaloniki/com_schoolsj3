<?php

namespace DSEWesternThessaloniki\Component\Schoolsj3\Administrator\Helper;

use Joomla\CMS\Access\Access;
use Joomla\CMS\Factory;
use Joomla\Registry\Registry;

defined("_JEXEC") or die();

class Schoolsj3Helper
{
    public static function getActions($categoryId = 0)
    {
        $user = Factory::getApplication()->getIdentity();
        $result = new Registry();

        if (empty($categoryId)) {
            $assetName = "com_schoolsj3";
            $level = "component";
        } else {
            $assetName = "com_schoolsj3.category." . (int) $categoryId;
            $level = "category";
        }

        $actions = Access::getActionsFromFile(
            __DIR__ . "/../../access.xml",
            "/access/section[@name='$level']/"
        );

        foreach ($actions as $action) {
            $result->set(
                $action->name,
                $user->authorise($action->name, $assetName)
            );
        }

        return $result;
    }
}

?>
