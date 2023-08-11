<?php

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

defined("_JEXEC") or die();
?>

<form action="<?php echo Route::_(
    "index.php?option=com_schoolsj3&view=school&layout=edit&id=" .
        (int) $this->item->id
); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
    <div class="row-fluid">
	<div class="span10 form-horizontal">
	    <fieldset>
		<?php echo HTMLHelper::_("uitab.startTabSet", "myTab", [
      "active" => "details",
  ]); ?>
		    <?php echo HTMLHelper::_(
          "uitab.addTab",
          "myTab",
          "details",
          empty($this->item->id)
              ? Text::_("COM_SCHOOLSJ3_NEW_SCHOOL", true)
              : Text::sprintf(
                  "COM_SCHOOLSJ3_EDIT_SCHOOL",
                  $this->item->id,
                  true
              )
      ); ?>
			<?php foreach ($this->form->getFieldset("schoolfields") as $field): ?>
			    <div class="control-group">
				<div class="control-label"><?php echo $field->label; ?></div>
				<div class="controls"><?php echo $field->input; ?></div>
			    </div>
			<?php endforeach; ?>
			<?php $params = ComponentHelper::getParams("com_schoolsj3"); ?>
	<script type='text/javascript'>
    function GetMap() {
        let map = new Microsoft.Maps.Map('#map-canvas', {
            credentials: '<?php echo $params->get("mapAPIKey"); ?>',
        });

        //Request the user's location
		let lat = document.getElementById('jform_lat');
		let lng = document.getElementById('jform_lng');
        let loc = new Microsoft.Maps.Location(
                `${lat.value}`,
                `${lng.value}`);

		//Add a pushpin at the user's location.
		let pin = new Microsoft.Maps.Pushpin(loc);
		map.entities.push(pin);

		//Center the map on the user's location.
		map.setView({ center: loc, zoom: 15 });
    }
    </script>
    <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap' async defer></script>
		    <style type="text/css">
			#map-canvas { height: 500px; width:500px; margin: 0; padding: 0; }
		    </style>
		    <div id="map-canvas"></div>

		    <?php echo HTMLHelper::_("uitab.endTab"); ?>
		    <input type="hidden" name="task" value="" />
		    <?php echo HTMLHelper::_("form.token"); ?>
		<?php echo HTMLHelper::_("uitab.endTabSet"); ?>
	    </fieldset>
	</div>
    </div>
</form>
