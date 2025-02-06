<?php

namespace DSEWesternThessaloniki\Component\Schoolsj3\Administrator\View\Units;

use DSEWesternThessaloniki\Component\Schoolsj3\Administrator\Helper\Schoolsj3Helper;
use Joomla\CMS\HTML\Helpers\Sidebar;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;

defined("_JEXEC") or die();

class HtmlView extends BaseHtmlView
{
    protected $items;
    protected $state;
    protected $pagination;
    public $filterForm;
    public $activeFilters;

    public function display($tpl = null)
    {
        $this->items = $this->get("Items");
        $this->state = $this->get("State");
        $this->pagination = $this->get("Pagination");
        $this->filterForm = $this->get("FilterForm");
        $this->activeFilters = $this->get("ActiveFilters");

        if (count($errors = $this->get("Errors"))) {
            throw new \Exception(implode("\n", $errors), 500);
            return false;
        }

        $this->addToolbar();
        parent::display($tpl);
    }

    protected function addToolbar()
    {
        $canDo = Schoolsj3Helper::getActions();

        ToolbarHelper::title(Text::_("COM_SCHOOLSJ3_MANAGER_UNITS"), "");
        ToolbarHelper::addNew("unit.add");

        if ($canDo->get("core.edit")) {
            ToolbarHelper::editList("unit.edit");
        }

        if ($canDo->get("core.edit.state")) {
            ToolbarHelper::publish("unit.publish", "JTOOLBAR_PUBLISH", true);
            ToolbarHelper::unpublish(
                "unit.unpublish",
                "JTOOLBAR_UNPUBLISH",
                true
            );
            ToolbarHelper::archiveList("unit.archive");
            ToolbarHelper::checkin("unit.checkin");
        }

        $state = $this->get("State");
        if ($state->get("filter.state") == -2 && $canDo->get("core.delete")) {
            ToolbarHelper::deleteList(
                "",
                "unit.delete",
                "JTOOLBAR_EMPTY_TRASH"
            );
        } elseif ($canDo->get("core.edit.state")) {
            ToolbarHelper::trash("unit.trash");
        }

        if ($canDo->get("core.admin")) {
            ToolbarHelper::preferences("com_schoolsj3");
        }
    }
}

?>
