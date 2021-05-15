<?php
defined('_JEXEC') or die;
?>

<form action="<?php echo JRoute::_('index.php?option=com_schoolsj3&view=school&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
    <div class="row-fluid">
	<div class="span10 form-horizontal">
	    <fieldset>
		<?php echo JHtml::_('bootstrap.startPane', 'myTab',
			array('active' => 'details')); ?>
		    <?php echo JHtml::_('bootstrap.addPanel', 'myTab',
			    'details', empty($this->item->id) ?
			    JText::_('COM_SCHOOLSJ3_NEW_SCHOOL', true) :
			    JText::sprintf('COM_SCHOOLSJ3_EDIT_SCHOOL',
				$this->item->id, true)); ?>
			<?php foreach ($this->form->getFieldset('schoolfields') as $field) : ?>
			    <div class="control-group">
				<div class="control-label"><?php echo $field->label; ?></div>
				<div class="controls"><?php echo $field->input; ?></div>
			    </div>
			<?php endforeach; ?>
			<?php $mapquery = "SELECT * FROM #__sch3_config WHERE id = 1";
			    $db = JFactory::getDbo();
			    $db->setQuery($mapquery);
			    $config_rows = $db->loadObjectList();
			    $confData = $config_rows[0];
			?>
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo $confData->mapAPIKey; ?>">
			</script>
			<script type="text/javascript">
			    function initialize(){
				var mapOptions = {
				center: { lat: parseFloat(document.getElementsByName("jform[lat]")[0].value), lng: parseFloat(document.getElementsByName("jform[lng]")[0].value)},
				zoom: <?php echo $confData->mapZoomLevelAdmin; ?>
			    };

			    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
			    schoolpos = new google.maps.LatLng(parseFloat(document.getElementsByName("jform[lat]")[0].value), parseFloat(document.getElementsByName("jform[lng]")[0].value));
			    var marker = new google.maps.Marker({
					position: schoolpos,
					map: map,
					draggable: true
			    });

			    google.maps.event.addListener(marker, 'drag', function() {
				document.getElementsByName("jform[lat]")[0].value = marker.position.lat().toString();
				document.getElementsByName("jform[lng]")[0].value = marker.position.lng().toString();
			    });

			    }

			    google.maps.event.addDomListener(window, 'load', initialize);
			</script>
		    <style type="text/css">
			#map-canvas { height: 500px; width:500px; margin: 0; padding: 0; }
		    </style>
		    <div id="map-canvas"></div>

		    <?php echo JHtml::_('bootstrap.endPanel'); ?>
		    <input type="hidden" name="task" value="" />
		    <?php echo JHtml::_('form.token'); ?>
		<?php echo JHtml::_('bootstrap.endPane'); ?>
	    </fieldset>
	</div>
    </div>
</form>
