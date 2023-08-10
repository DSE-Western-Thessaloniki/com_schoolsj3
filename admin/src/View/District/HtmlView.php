<?php

namespace DSEWestThessaloniki\Component\Schoolsj3\Administrator\View\District;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;

defined("_JEXEC") or die();

class HtmlView extends BaseHtmlView
{
    protected $item;
    protected $form;

    public function display($tpl = null)
    {
        $this->item = $this->get("Item");
        $this->form = $this->get("Form");

        if (count($errors = $this->get("Errors"))) {
            throw new \Exception(implode("\n", $errors), 500);
            return false;
        }

        $this->addToolbar();
        parent::display($tpl);
    }

    protected function addToolbar()
    {
        Factory::getApplication()
            ->getInput()
            ->set("hidemainmenu", true);
        ToolbarHelper::title(Text::_("COM_SCHOOLSJ3_MANAGER_DISTRICT"), "");
        ToolbarHelper::save("district.save");

        if (empty($this->item->id)) {
            ToolbarHelper::cancel("district.cancel");
        } else {
            ToolbarHelper::cancel("district.cancel", "JTOOLBAR_CLOSE");
        }
    }
}

?>
