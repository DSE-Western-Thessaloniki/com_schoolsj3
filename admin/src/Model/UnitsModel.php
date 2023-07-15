<?php

namespace DSEWestThessaloniki\Component\Schoolsj3\Administrator\Model;

use Joomla\CMS\MVC\Model\ListModel;

defined('_JEXEC') or die;

class UnitsModel extends ListModel
{
    public function __construct($config = array())
    {
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'a.id',
				'unitname', 'a.units',
				'publish_up', 'a.publish_up',
				'publish_down', 'a.publish_down'
			);
		}

		parent::__construct($config);
    }

    protected function populateState($ordering = null, $direction = null)
    {
		// Get state from filters
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);
		$published = $this->getUserStateFromRequest($this->context.'.filter.state', 'filter_state', '', 'string');
		$this->setState('filter.state', $published);
		parent::populateState('a.units', 'asc');
    }

    protected function getListQuery()
    {
		$db = $this->getDatabase();
		$query = $db->getQuery(true);
		$query->select(
			$this->getState(
			'list.select',
			'a.id, a.units AS unitname, a.published, a.publish_up, a.publish_down'
			)
		);
		$query->from($db->quoteName('#__sch3_units').' AS a');

		// Get filters
		$where = array();

		$published = $this->getState('filter.state');
		if (is_numeric($published))
		{
			$query->where('a.published = '.(int) $published);
		}  elseif ($published === '')
		{
			$query->where('(a.published IN (0, 1))');
		}

		// Filter by search in title
		$search = $this->getState('filter.search');
		if (!empty($search))
		{
			if (stripos($search, 'id:') === 0)
			{
				$query->where('a.id = '.(int) substr($search, 3));
			} else {
				$search = $db->Quote('%'.$db->escape($search, true).'%');
				$query->where('a.units LIKE '.$search);
			}
		}

		// Add the list ordering clause
		$orderCol = $this->state->get('list.ordering');
		$orderDirn = $this->state->get('list.direction');
		$query->order($db->escape($orderCol.' '.$orderDirn));

		return $query;
    }
}

?>
