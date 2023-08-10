<?php

namespace DSEWestThessaloniki\Component\Schoolsj3\Site\Model;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Model\ItemModel;

defined("_JEXEC") or die();

class SchoolModel extends ItemModel
{
    protected $text_prefix = "COM_SCHOOLSJ3";

    public function __construct($config = [])
    {
        parent::__construct($config);
    }

    public function populateState()
    {
        $input = Factory::getApplication()->getInput();
        $id = $input->getInt("id");
        $this->setState("school.id", $id);
    }

    public function getItem($id = null)
    {
        if ($this->_item === null) {
            $this->_item = [];
        }

        if (empty($id)) {
            $id = (int) $this->getState("school.id");
        }

        if (!isset($this->_item[$id])) {
            $db = $this->getDatabase();
            $query = $db
                ->getQuery(true)
                ->select("a.*")
                ->from("#__sch3_schools AS a")
                ->where("id=" . (int) $id);
            $db->setQuery($query);
            $data = $db->loadObject();
            $this->_item[$id] = $data;
        }

        return $this->_item[$id];
    }

    public function getTable($type = "School", $prefix = "", $config = [])
    {
        return $this->getMVCFactory()->createTable($type, $prefix, $config);
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
