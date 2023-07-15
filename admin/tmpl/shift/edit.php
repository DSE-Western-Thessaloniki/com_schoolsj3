<?php

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

defined('_JEXEC') or die;
?>

<form action="<?php echo Route::_('index.php?option=com_schoolsj3&view=shift&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
    <div class="row-fluid">
	<div class="span10 form-horizontal">
	    <fieldset>
		<?php echo HTMLHelper::_('bootstrap.startPane', 'myTab',
			array('active' => 'details')); ?>
		    <?php echo HTMLHelper::_('bootstrap.addPanel', 'myTab',
			    'details', empty($this->item->id) ?
			    Text::_('COM_SCHOOLSJ3_NEW_SHIFT', true) :
			    Text::sprintf('COM_SCHOOLSJ3_EDIT_SHIFT',
				$this->item->id, true)); ?>
			<?php foreach ($this->form->getFieldset('shiftfields') as $field) : ?>
			    <div class="control-group">
				<div class="control-label"><?php echo $field->label; ?></div>
				<div class="controls"><?php echo $field->input; ?></div>
			    </div>
			<?php endforeach; ?>
		    <?php echo HTMLHelper::_('bootstrap.endPanel'); ?>
		    <input type="hidden" name="task" value="" />
		    <?php echo HTMLHelper::_('form.token'); ?>
		<?php echo HTMLHelper::_('bootstrap.endPane'); ?>
	    </fieldset>
	</div>
    </div>
</form>
