<?php

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Installer\InstallerAdapter;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Table\Table;
use Joomla\Registry\Registry;

class com_schoolsj3InstallerScript
{
	/**
	 * Constructor
	 *
	 * @param   InstallerAdapter  $adapter  The object responsible for running this script
	 */
	public function __construct(InstallerAdapter $adapter)
	{
	}

	/**
	 * Called on installation
	 *
	 * @param   InstallerAdapter  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
    public function install(InstallerAdapter $adapter)
    {
        $adapter->getParent()->setRedirectURL('index.php?option=com_schoolsj3');

		return true;
    }

	/**
	 * Called on uninstallation
	 *
	 * @param   InstallerAdapter  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
    public function uninstall(InstallerAdapter $adapter) 
    {
		return true;
    }

	/**
	 * Called on update
	 *
	 * @param   InstallerAdapter  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
    public function update(InstallerAdapter $parent) 
    {
		$params = ComponentHelper::getParams("com_schoolsj3", true);

		$db = Factory::getContainer()->get("DatabaseDriver");

		try {
			$db->setQuery("SELECT * FROM `#__sch3_config` WHERE `id` = 1");
			$confData = $db->loadObject();
		} catch (\Exception $e) {
			throw new \Exception(Text::_('COM_SCHOOLSJ3_DB_ERROR'));
		}

		if ($params === false || $params->count() === 0) { // Upgrade from old version of com_schoolsj3
			$params = new Registry();
			
			echo "Copying configuration from old version of com_schoolsj3...<br/>";
			
			// Copy old config to component params
			$params->loadObject($confData);
			
			$componentid = ComponentHelper::getComponent('com_schoolsj3')->id;
			$table = Table::getInstance('extension');
			$table->load($componentid);
			$table->bind(array('params' => $params->toString()));

			// check for error
			if (!$table->check()) {
				echo $table->getError();
				return false;
			}
			// Save to database
			if (!$table->store()) {
				echo $table->getError();
				return false;
			}			
		}
        
		echo '<p>' . Text::sprintf('COM_SCHOOLSJ3_UPDATE_TEXT', $parent->manifest->version) . '</p>';

		return true;
    }

	/**
	 * Called before any type of action
	 *
	 * @param   string  $route  Which action is happening (install|uninstall|discover_install|update)
	 * @param   InstallerAdapter  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
    public function preflight($route, InstallerAdapter $adapter) 
    {
		return true;
    }

	/**
	 * Called after any type of action
	 *
	 * @param   string  $route  Which action is happening (install|uninstall|discover_install|update)
	 * @param   InstallerAdapter  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
    function postflight($route, InstallerAdapter $adapter) 
    {
		return true;
    }
}