<?php

namespace DSEWestThessaloniki\Component\Schoolsj3\Site\Model;

use Joomla\CMS\MVC\Model\ListModel;

defined('_JEXEC') or die;

class MapModel extends ListModel
{
    public function __construct($config = array())
    {
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'a.id',
				'schoolname', 'a.description',
				'category', 'cat.description',
				'office', 'off.description',
				'municipality', 'mun.description',
				'shift', 'shi.description',
				'units', 'uni.units',
				'district', 'dis.description'
			);
		}

		parent::__construct($config);
    }

    protected function populateState($ordering = null, $direction = null)
    {
		// Get state from filters
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);
		$category = $this->getUserStateFromRequest($this->context.'.filter.category', 'filter_category', '', 'string');
		$this->setState('filter.category', $category);
		$published = $this->getUserStateFromRequest($this->context.'.filter.office', 'filter_office', '', 'string');
		$this->setState('filter.office', $published);
		$published = $this->getUserStateFromRequest($this->context.'.filter.municipality', 'filter_municipality', '', 'string');
		$this->setState('filter.municipality', $published);
		$published = $this->getUserStateFromRequest($this->context.'.filter.shift', 'filter_shift', '', 'string');
		$this->setState('filter.shift', $published);
		$published = $this->getUserStateFromRequest($this->context.'.filter.units', 'filter_units', '', 'string');
		$this->setState('filter.units', $published);
		$published = $this->getUserStateFromRequest($this->context.'.filter.district', 'filter_district', '', 'string');
		$this->setState('filter.district', $published);
		parent::populateState('a.description', 'asc');
		$this->setState('list.start', 0);
		$this->state->set('list.limit', 0);
    }

    protected function getListQuery()
    {
		$db = $this->getDatabase();
		$query = $db->getQuery(true);
		$query->select(
			$this->getState(
			'list.select',
			'a.id, a.description AS schoolname, a.address, a.postcode, a.area, a.phone, a.fax, a.website, a.edu_id, a.email, cat.description AS category, off.description AS office, mun.description AS municipality, shi.description AS shift, uni.units, dis.description AS district, a.published, a.lat, a.lng'

			)
		);
		$query->from($db->quoteName('#__sch3_schools').' AS a'.
		' INNER JOIN '.$db->quoteName('#__sch3_categories').' AS cat ON cat.id = a.cat_id'.
		' INNER JOIN '.$db->quoteName('#__sch3_offices').' AS off ON off.id = a.off_id'.
		' INNER JOIN '.$db->quoteName('#__sch3_municipalities').' AS mun ON mun.id = a.mun_id'.
		' INNER JOIN '.$db->quoteName('#__sch3_shifts').' AS shi ON shi.id = a.shi_id'.
		' INNER JOIN '.$db->quoteName('#__sch3_units').' AS uni ON uni.id = a.uni_id'.
		' INNER JOIN '.$db->quoteName('#__sch3_districts').' AS dis ON dis.id = a.dis_id');

		// Get filters
		$query->where('a.published = 1');

		$category = $this->getState('filter.category');
		if (is_numeric($category))
		{
			$query->where('a.cat_id = '.(int) $category);
		}

		$office = $this->getState('filter.office');
		if (is_numeric($office))
		{
			$query->where('a.off_id = '.(int) $office);
		}

		$municipality = $this->getState('filter.municipality');
		if (is_numeric($municipality))
		{
			$query->where('a.mun_id = '.(int) $municipality);
		}

		$shift = $this->getState('filter.shift');
		if (is_numeric($shift))
		{
			$query->where('a.shi_id = '.(int) $shift);
		}

		$units = $this->getState('filter.units');
		if (is_numeric($units))
		{
			$query->where('a.uni_id = '.(int) $units);
		}

		$district = $this->getState('filter.district');
		if (is_numeric($district))
		{
			$query->where('a.dis_id = '.(int) $district);
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
			$query->where('a.description LIKE '.$search);
			}
		}

		return $query;
    }
}

?>
