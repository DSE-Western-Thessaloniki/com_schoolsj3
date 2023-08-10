<?php

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

defined("_JEXEC") or die();
$user = Factory::getApplication()->getIdentity();
$listOrder = $this->escape($this->state->get("list.ordering"));
$listDirn = $this->escape($this->state->get("list.direction"));
?>

<form action="<?php echo Route::_(
    "index.php?option=com_schoolsj3&view=schools"
); ?>" method="post" name="adminForm" id="adminForm">

    <!-- Sidebar -->
    <?php if (!empty($this->sidebar)): ?>
    <div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
    </div>
    <div id="j-main-container" class="span10">
    <?php else: ?>
    <div id="j-main-container">
    <?php endif; ?>

	<!-- Filterbar -->
	<div id="filter-bar" class="btn-toolbar">
	    <div class="filter-search btn-group pull-left">
		<label for="filter_search" class="element-invisible"><?php echo Text::_(
      "COM_SCHOOLSJ3_SEARCH_IN_TITLE"
  ); ?></label>
		<input type="text" name="filter_search" id="filter_search"
		    placeholder="<?php echo Text::_("COM_SCHOOLSJ3_SEARCH_IN_TITLE"); ?>"
		    value="<?php echo $this->escape($this->state->get("filter.search")); ?>"
		    title="<?php echo Text::_("COM_SCHOOLSJ3_SEARCH_IN_TITLE"); ?>" />
	    </div>
	    <div class="btn-group pull-left">
		<button class="btn hasTooltip" type="submit" title="<?php echo Text::_(
      "JSEARCH_FILTER_SUBMIT"
  ); ?>"><i class="icon-search"></i></button>
		<button class="btn hasTooltip" type="button" title="<?php echo Text::_(
      "JSEARCH_FILTER_CLEAR"
  ); ?>" onclick="document.getElementById('filter_search').value='';this.form.submit();"><i class="icon-remove"></i></button>
	    </div>
	    <div class="btn-group pull-right hidden-phone">
		<label for="limit" class="element-invisible">
		    <?php echo Text::_("JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC"); ?>
		</label>
		<?php echo $this->pagination->getLimitBox(); ?>
	    </div>
	</div>

	<div class="clearfix"> </div>
	<table class="table table-striped" id="Schoolsj3List">
	    <thead>
		<tr>
		    <th width="1%" class="hidden-phone">
			<input type="checkbox" name="checkall-toggle" value="" title="<?php echo Text::_(
       "JGLOBAL_CHECK_ALL"
   ); ?>" onclick="Joomla.checkAll(this)" />
		    </th>
		    <th width="1%" style="min-width:55px" class="nowrap center">
			<?php echo HTMLHelper::_(
       "grid.sort",
       "JSTATUS",
       "a.published",
       $listDirn,
       $listOrder
   ); ?>
		    </th>
		    <th>
			<?php echo HTMLHelper::_(
       "grid.sort",
       "JGLOBAL_TITLE",
       "a.description",
       $listDirn,
       $listOrder
   ); ?>
		    </th>
		    <th>
			<?php echo HTMLHelper::_(
       "grid.sort",
       "COM_SCHOOLSJ3_HEADING_CATEGORY",
       "cat.description",
       $listDirn,
       $listOrder
   ); ?>
		    </th>
		    <th>
			<?php echo HTMLHelper::_(
       "grid.sort",
       "COM_SCHOOLSJ3_HEADING_OFFICE",
       "off.description",
       $listDirn,
       $listOrder
   ); ?>
		    </th>
		    <th>
			<?php echo HTMLHelper::_(
       "grid.sort",
       "COM_SCHOOLSJ3_HEADING_MUNICIPALITY",
       "mun.description",
       $listDirn,
       $listOrder
   ); ?>
		    </th>
		    <th>
			<?php echo HTMLHelper::_(
       "grid.sort",
       "COM_SCHOOLSJ3_HEADING_SHIFT",
       "shi.description",
       $listDirn,
       $listOrder
   ); ?>
		    </th>
		    <th>
			<?php echo HTMLHelper::_(
       "grid.sort",
       "COM_SCHOOLSJ3_HEADING_UNITS",
       "units",
       $listDirn,
       $listOrder
   ); ?>
		    </th>
		    <th>
			<?php echo HTMLHelper::_(
       "grid.sort",
       "COM_SCHOOLSJ3_HEADING_DISTRICT",
       "dis.description",
       $listDirn,
       $listOrder
   ); ?>
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
		<?php foreach ($this->items as $i => $item):

      $canCheckin =
          $user->authorise("core.manage", "com_checkin") ||
          $item->checked_out == $user->get("id") ||
          $item->checked_out == 0;
      $canChange =
          $user->authorise("core.edit.state", "com_schoolsj3") && $canCheckin;
      ?>
		    <tr class="row<?php echo $i % 2; ?>">
			<td class="center hidden-phone">
			    <?php echo HTMLHelper::_("grid.id", $i, $item->id); ?>
			</td>
			<td class="center">
			    <?php echo HTMLHelper::_(
           "jgrid.published",
           $item->published,
           $i,
           "schools.",
           $canChange,
           "cb",
           $item->publish_up,
           $item->publish_down
       ); ?>
			</td>
			<td class="wrap has-context">
			    <a href="<?php echo Route::_(
           "index.php?option=com_schoolsj3&task=school.edit&id=" .
               (int) $item->id
       ); ?>">
				<?php echo $this->escape($item->schoolname); ?>
			    </a>
			</td>
			<td class="nowrap has-context">
			    <?php echo $this->escape($item->category); ?>
			</td>
			<td class="nowrap has-context">
			    <?php echo $this->escape($item->office); ?>
			</td>
			<td class="nowrap has-context">
			    <?php echo $this->escape($item->municipality); ?>
			</td>
			<td class="nowrap has-context">
			    <?php echo $this->escape($item->shift); ?>
			</td>
			<td class="nowrap has-context">
			    <?php echo $this->escape($item->units); ?>
			</td>
			<td class="nowrap has-context">
			    <?php echo $this->escape($item->district); ?>
			</td>
		    </tr>
		<?php
  endforeach; ?>
	    </tbody>
	</table>

	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
	<?php echo HTMLHelper::_("form.token"); ?>
    </div>
</form>
