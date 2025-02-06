<?php

namespace DSEWesternThessaloniki\Component\Schoolsj3\Administrator\Model;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Model\AdminModel;

defined("_JEXEC") or die();

class OfficeModel extends AdminModel
{
    protected $text_prefix = "COM_SCHOOLSJ3";

    public function getTable($name = "Office", $prefix = "", $config = [])
    {
        if (
            $table = $this->getMVCFactory()->createTable(
                $name,
                $prefix,
                $config
            )
        ) {
            return $table;
        }

        throw new \Exception(
            Text::sprintf(
                "JLIB_APPLICATION_ERROR_TABLE_NAME_NOT_SUPPORTED",
                $name
            ),
            0
        );
    }

    public function getForm($data = [], $loadData = true)
    {
        $form = $this->loadForm("com_schoolsj3.office", "office", [
            "control" => "jform",
            "load_data" => $loadData,
        ]);

        if (empty($form)) {
            return false;
        }

        return $form;
    }

    protected function loadFormData()
    {
        $data = Factory::getApplication()->getUserState(
            "com_schoolsj3.edit.office.data",
            []
        );

        if (empty($data)) {
            $data = $this->getItem();
        }

        return $data;
    }

    protected function prepareTable($table)
    {
        $table->id = (int) $table->id;
        $table->description = htmlspecialchars_decode(
            $table->description,
            ENT_QUOTES
        );
        $table->markertext = htmlspecialchars_decode(
            $table->markertext,
            ENT_QUOTES
        );
        $table->markercolor = htmlspecialchars_decode(
            $table->markercolor,
            ENT_QUOTES
        );
    }
}

?>
