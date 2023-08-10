<?php

namespace DSEWestThessaloniki\Component\Schoolsj3\Administrator\Model;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Model\AdminModel;

defined("_JEXEC") or die();

class SchoolModel extends AdminModel
{
    protected $text_prefix = "COM_SCHOOLSJ3";

    public function getTable($name = "School", $prefix = "", $config = [])
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
        $form = $this->loadForm("com_schoolsj3.school", "school", [
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
            "com_schoolsj3.edit.school.data",
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
        $table->cat_id = (int) $table->cat_id;
        $table->off_id = (int) $table->off_id;
        $table->mun_id = (int) $table->mun_id;
        $table->shi_id = (int) $table->shi_id;
        $table->uni_id = (int) $table->uni_id;
        $table->dis_id = (int) $table->dis_id;
        $table->edu_id = (int) $table->edu_id;
        $table->phone = htmlspecialchars_decode($table->phone, ENT_QUOTES);
        $table->fax = htmlspecialchars_decode($table->fax, ENT_QUOTES);
        $table->email = htmlspecialchars_decode($table->email, ENT_QUOTES);
        $table->website = htmlspecialchars_decode($table->website, ENT_QUOTES);
        $table->address = htmlspecialchars_decode($table->address, ENT_QUOTES);
        $table->postcode = htmlspecialchars_decode(
            $table->postcode,
            ENT_QUOTES
        );
        $table->area = htmlspecialchars_decode($table->area, ENT_QUOTES);
        $table->lat = htmlspecialchars_decode($table->lat, ENT_QUOTES);
        $table->lng = htmlspecialchars_decode($table->lng, ENT_QUOTES);
    }
}

?>
