<?php

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;

defined("_JEXEC") or die();
$user = Factory::getApplication()->getIdentity();
$listOrder = $this->escape($this->state->get("list.ordering"));
$listDirn = $this->escape($this->state->get("list.direction"));
?>

<form action="<?php echo Route::_(
    "index.php?option=com_schoolsj3&view=shifts"
); ?>" method="post" name="adminForm" id="adminForm">

	<!-- SearchTools -->
	<?php echo LayoutHelper::render("joomla.searchtools.default", [
     "view" => $this,
 ]); ?>

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
           "shifts.",
           $canChange,
           "cb",
           $item->publish_up,
           $item->publish_down
       ); ?>
			</td>
			<td class="wrap has-context">
			    <a href="<?php echo Route::_(
           "index.php?option=com_schoolsj3&task=shift.edit&id=" .
               (int) $item->id
       ); ?>">
				<?php echo $this->escape($item->shiftname); ?>
			    </a>
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
