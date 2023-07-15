<?php

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

defined('_JEXEC') or die;
$user = Factory::getApplication()->getIdentity();
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
?>

<form action="<?php echo Route::_('index.php?option=com_schoolsj3&view=schools'); ?>" method="post" name="adminForm" id="adminForm">

	<!-- Filterbar -->
	<div id="filter-bar" class="btn-toolbar">
	    <div class="btn-group pull-left">
		<button class="btn" type="button" onclick="window.location.href='index.php?option=com_schoolsj3&view=allsch&format=xls'"><?php echo Text::_('COM_SCHOOLSJ3_EXPORT_XLS')?></button>
		<button class="btn" type="button" onclick="window.location.href='index.php?option=com_schoolsj3&view=map'"><?php echo Text::_('COM_SCHOOLSJ3_SHOW_MAP')?></button>
	    </div>
	</div>

	<div class="clearfix">
	<table class="table table-striped" id="Schoolsj3List">
	    <thead>
		<tr>
		    <th width="1%" class="hidden-phone">
			<?php echo '#' ?>
		    </th>
		    <th>
			<?php echo HTMLHelper::_('grid.sort', 'JGLOBAL_TITLE', 'a.description', $listDirn, $listOrder); ?>
		    </th>
		    <th>
			<?php echo HTMLHelper::_('grid.sort', 'COM_SCHOOLSJ3_HEADING_CATEGORY', 'cat.description', $listDirn, $listOrder); ?>
		    </th>
		    <th>
			<?php echo HTMLHelper::_('grid.sort', 'COM_SCHOOLSJ3_HEADING_OFFICE', 'off.description', $listDirn, $listOrder); ?>
		    </th>
		    <th>
			<?php echo HTMLHelper::_('grid.sort', 'COM_SCHOOLSJ3_HEADING_MUNICIPALITY', 'mun.description', $listDirn, $listOrder); ?>
		    </th>
		    <th>
			<?php echo HTMLHelper::_('grid.sort', 'COM_SCHOOLSJ3_HEADING_SHIFT', 'shi.description', $listDirn, $listOrder); ?>
		    </th>
		    <th>
			<?php echo HTMLHelper::_('grid.sort', 'COM_SCHOOLSJ3_HEADING_UNITS', 'units', $listDirn, $listOrder); ?>
		    </th>
		    <th>
			<?php echo HTMLHelper::_('grid.sort', 'COM_SCHOOLSJ3_HEADING_DISTRICT', 'dis.description', $listDirn, $listOrder); ?>
		    </th>
		</tr>
		<tr>
		    <th></th>
		    <th class="sectiontableheader">
			<input type="text" name="filter_search" id="filter_search"
			    placeholder="<?php echo Text::_('COM_SCHOOLSJ3_SEARCH_IN_TITLE'); ?>"
			    value="<?php echo $this->escape($this->state->get('filter.search')); ?>"
			    title="<?php echo Text::_('COM_SCHOOLSJ3_SEARCH_IN_TITLE'); ?>" />
		    </th>
		    <th class="sectiontableheader">
		       <select class="inputbox" name="filter_category" id="filter_category" onchange="this.form.submit()">
			   <option value="">
			       <?php echo Text::_('COM_SCHOOLSJ3_FILTER_CATEGORY');?>
			   </option>
			   <?php
			    $db   = Factory::getContainer()->get("DatabaseDriver");
			    $query = "SELECT id, description FROM #__sch3_categories";
			    $db->setQuery($query);
			    $rows = $db->loadObjectList();
			    $options = array();
			    foreach ($rows as $row)
			    {
			       $options[] = HTMLHelper::_('select.option', "$row->id", Text::_($row->description));
			    }
			    echo HTMLHelper::_('select.options', $options, 'value', 'text', $this->state->get('filter.category'), true);
			    ?>
			</select>
		    </th>
		    <th class="sectiontableheader">
		       <select class="inputbox" name="filter_office" id="filter_office" onchange="this.form.submit()">
			   <option value="">
			       <?php echo Text::_('COM_SCHOOLSJ3_FILTER_OFFICE');?>
			   </option>
			   <?php
			    $db   = Factory::getContainer()->get("DatabaseDriver");
			    $query = "SELECT id, description FROM #__sch3_offices";
			    $db->setQuery($query);
			    $rows = $db->loadObjectList();
			    $options = array();
			    foreach ($rows as $row)
			    {
			       $options[] = HTMLHelper::_('select.option', "$row->id", Text::_($row->description));
			    }
			    echo HTMLHelper::_('select.options', $options, 'value', 'text', $this->state->get('filter.office'), true);
			    ?>
			</select>
		    </th>
		    <th class="sectiontableheader">
		       <select class="inputbox" name="filter_municipality" id="filter_municipality" onchange="this.form.submit()">
			   <option value="">
			       <?php echo Text::_('COM_SCHOOLSJ3_FILTER_MUNICIPALITY');?>
			   </option>
			   <?php
			    $db   = Factory::getContainer()->get("DatabaseDriver");
			    $query = "SELECT id, description FROM #__sch3_municipalities";
			    $db->setQuery($query);
			    $rows = $db->loadObjectList();
			    $options = array();
			    foreach ($rows as $row)
			    {
			       $options[] = HTMLHelper::_('select.option', "$row->id", Text::_($row->description));
			    }
			    echo HTMLHelper::_('select.options', $options, 'value', 'text', $this->state->get('filter.municipality'), true);
			    ?>
			</select>
		    </th>
		    <th class="sectiontableheader">
		       <select class="inputbox" name="filter_shift" id="filter_shift" onchange="this.form.submit()">
			   <option value="">
			       <?php echo Text::_('COM_SCHOOLSJ3_FILTER_SHIFT');?>
			   </option>
			   <?php
			    $db   = Factory::getContainer()->get("DatabaseDriver");
			    $query = "SELECT id, description FROM #__sch3_shifts";
			    $db->setQuery($query);
			    $rows = $db->loadObjectList();
			    $options = array();
			    foreach ($rows as $row)
			    {
			       $options[] = HTMLHelper::_('select.option', "$row->id", Text::_($row->description));
			    }
			    echo HTMLHelper::_('select.options', $options, 'value', 'text', $this->state->get('filter.shift'), true);
			    ?>
			</select>
		    </th>
		    <th class="sectiontableheader">
		       <select class="inputbox" name="filter_units" id="filter_units" onchange="this.form.submit()">
			   <option value="">
			       <?php echo Text::_('COM_SCHOOLSJ3_FILTER_UNITS');?>
			   </option>
			   <?php
			    $db   = Factory::getContainer()->get("DatabaseDriver");
			    $query = "SELECT id, units FROM #__sch3_units";
			    $db->setQuery($query);
			    $rows = $db->loadObjectList();
			    $options = array();
			    foreach ($rows as $row)
			    {
			       $options[] = HTMLHelper::_('select.option', "$row->id", Text::_($row->units));
			    }
			    echo HTMLHelper::_('select.options', $options, 'value', 'text', $this->state->get('filter.units'), true);
			    ?>
			</select>
		    </th>
		    <th class="sectiontableheader">
		       <select class="inputbox" name="filter_district" id="filter_district" onchange="this.form.submit()">
			   <option value="">
			       <?php echo Text::_('COM_SCHOOLSJ3_FILTER_DISTRICT');?>
			   </option>
			   <?php
			    $db   = Factory::getContainer()->get("DatabaseDriver");
			    $query = "SELECT id, description FROM #__sch3_districts";
			    $db->setQuery($query);
			    $rows = $db->loadObjectList();
			    $options = array();
			    foreach ($rows as $row)
			    {
			       $options[] = HTMLHelper::_('select.option', "$row->id", Text::_($row->description));
			    }
			    echo HTMLHelper::_('select.options', $options, 'value', 'text', $this->state->get('filter.district'), true);
			    ?>
			</select>
		    </th>
		</tr>
	    </thead>
	    <tfoot>
		<tr>
		    <td colspan="10">
			<?php echo $this->pagination->getListFooter(); ?>
		    </td>
		</tr>
	    </tfoot>
	    <tbody>
		<?php foreach ($this->items as $i => $item) : ?>
		    <tr class="row<?php echo $i % 2; ?>">
			<td class="center hidden-phone">
			    <?php echo $this->pagination->getRowOffset($i); ?>
			</td>
			<td class="wrap has-context">
			    <a href="<?php echo Route::_('index.php?option=com_schoolsj3&view=school&id='.(int) $item->id); ?>">
				<?php echo $this->escape($item->schoolname); ?>
			    </a>
			</td>
			<td class="wrap has-context">
			    <?php echo $this->escape($item->category); ?>
			</td>
			<td class="wrap has-context">
			    <?php echo $this->escape($item->office); ?>
			</td>
			<td class="wrap has-context">
			    <?php echo $this->escape($item->municipality); ?>
			</td>
			<td class="wrap has-context">
			    <?php echo $this->escape($item->shift); ?>
			</td>
			<td class="wrap has-context">
			    <?php echo $this->escape($item->units); ?>
			</td>
			<td class="wrap has-context">
			    <?php echo $this->escape($item->district); ?>
			</td>
		    </tr>
		<?php endforeach; ?>
	    </tbody>
	</table>
	</div>

	<input type="hidden" name="task" value="" />
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
	<?php echo HTMLHelper::_('form.token'); ?>
    </div>
</form>
