<?php

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

defined("_JEXEC") or die();
?>

<form action="<?php echo Route::_(
    "index.php?option=com_schoolsj3&view=school&id=" . (int) $this->item->id
); ?>" method="post" name="adminForm" id="adminForm" >
    <div class="clearfix">
	<table width=100%>
	    <tr>
		<td>
		    <!-- School data -->
		    <table>
			<th colspan=2><?echo $this->item->description ?></th>
			<tr><td><? echo Text::_('COM_SCHOOLSJ3_FIELD_ADDRESS_LABEL'); ?></td><td><?php echo $this
       ->item->address .
       (!empty($this->item->postcode)
           ? "," . $this->item->postcode
           : ""); ?></td></tr>
			<tr><td><? echo Text::_('COM_SCHOOLSJ3_FIELD_MUNICIPALITY_LABEL'); ?></td>
			    <td><?php
       $query =
           "SELECT description FROM #__sch3_municipalities WHERE id=" .
           (int) $this->item->mun_id;
       $db = Factory::getContainer()->get("DatabaseDriver");
       $db->setQuery($query);
       $res = $db->loadResult();
       echo $res;
       ?>
			    </td>
			</tr>
			<?php if (!empty($this->item->email)) { ?>
			<tr><td><? echo Text::_('JGLOBAL_EMAIL'); ?></td><td><?php echo HTMLHelper::link(
       "mailto:" . $this->item->email,
       $this->item->email
   ); ?></td></tr>
			<?php } ?>
			<?php if (!empty($this->item->website)) { ?>
			<tr><td><? echo Text::_('COM_SCHOOLSJ3_FIELD_WEBSITE_LABEL'); ?></td><td><?php echo HTMLHelper::link(
       substr($this->item->website, 0, 4) === "http"
           ? $this->item->website
           : "http://" . $this->item->website,
       $this->item->website
   ); ?></td></tr>
			<?php } ?>
			<tr><td><? echo Text::_('COM_SCHOOLSJ3_FIELD_TELEPHONE_LABEL'); ?></td><td><?php echo $this
       ->item->phone; ?></td></tr>
			<tr>
			    <td><? echo Text::_('COM_SCHOOLSJ3_FIELD_CATEGORY_LABEL'); ?></td>
			    <td><?php
       $query =
           "SELECT description FROM #__sch3_categories WHERE id=" .
           (int) $this->item->cat_id;
       $db = Factory::getContainer()->get("DatabaseDriver");
       $db->setQuery($query);
       $res = $db->loadResult();
       echo $res;
       ?>
			    </td>
			</tr>
			<tr><td><? echo Text::_('COM_SCHOOLSJ3_FIELD_DISTRICT_LABEL'); ?></td>
			    <td><?php
       $query =
           "SELECT description FROM #__sch3_districts WHERE id=" .
           (int) $this->item->dis_id;
       $db = Factory::getContainer()->get("DatabaseDriver");
       $db->setQuery($query);
       $res = $db->loadResult();
       echo $res;
       ?>
			    </td>
			</tr>
			<tr><td><? echo Text::_('COM_SCHOOLSJ3_FIELD_OFFICE_LABEL'); ?></td>
			    <td><?php
       $query =
           "SELECT description FROM #__sch3_offices WHERE id=" .
           (int) $this->item->off_id;
       $db = Factory::getContainer()->get("DatabaseDriver");
       $db->setQuery($query);
       $res = $db->loadResult();
       echo $res;
       ?>
			    </td>
			</tr>
			<tr><td><? echo Text::_('COM_SCHOOLSJ3_FIELD_SHIFT_LABEL'); ?></td>
			    <td><?php
       $query =
           "SELECT description FROM #__sch3_shifts WHERE id=" .
           (int) $this->item->shi_id;
       $db = Factory::getContainer()->get("DatabaseDriver");
       $db->setQuery($query);
       $res = $db->loadResult();
       echo $res;
       ?>
			    </td>
			</tr>
			<tr><td><? echo Text::_('COM_SCHOOLSJ3_FIELD_UNITS_LABEL'); ?></td>
			    <td><?php
       $query =
           "SELECT units FROM #__sch3_units WHERE id=" .
           (int) $this->item->uni_id;
       $db = Factory::getContainer()->get("DatabaseDriver");
       $db->setQuery($query);
       $res = $db->loadResult();
       echo $res;
       ?>
			    </td>
			</tr>
			<tr>
			    <td><a href='index.php?option=com_schoolsj3&view=map&openDirections=1&schid=<?php echo $this
           ->item->id; ?>'><?php echo Text::_(
    "COM_SCHOOLSJ3_SHOW_DIR_TO_FROM_SCH"
); ?></a></td>
			</tr>
		    </table>
		</td>
	    </tr>
	    <tr>
		<td>
		    <div id='map-canvas'></div>
		    <!-- School on map -->
		    <?php
      $mapquery = "SELECT * FROM #__sch3_config WHERE id = 1";
      $db = Factory::getContainer()->get("DatabaseDriver");
      $db->setQuery($mapquery);
      $config_rows = $db->loadObjectList();
      $confData = $config_rows[0];
      ?>
		    <!--
		    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo $confData->mapAPIKey; ?>">
		    </script>
		    <script type="text/javascript">
			var slat = parseFloat(<?php echo $this->item->lat; ?>);
			var slng = parseFloat(<?php echo $this->item->lng; ?>);
			function initialize(){
			    var mapOptions = {
			    center: { lat: slat, lng: slng},
			    zoom: <?php echo $confData->mapZoomLevelAdmin; ?>
			};

			var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
			schoolpos = new google.maps.LatLng(slat, slng);
			var marker = new google.maps.Marker({
				    position: schoolpos,
				    map: map
			});

			}

			google.maps.event.addDomListener(window, 'load', initialize);
		    </script>
		    <style type="text/css">
			#map-canvas { height: 500px; margin: 0; padding: 0; }
		    </style>-->
		    <div id="mymap"></div>
		    <script type='text/javascript'>
			var slat = parseFloat(<?php echo $this->item->lat; ?>);
			var slng = parseFloat(<?php echo $this->item->lng; ?>);
			function GetMap()
			{
			    var map = new Microsoft.Maps.Map('#mymap', {
				credentials: 'AoL1WdPf6NB0Xo1PN7pH4uBEH8wY2FRH2cxWZRCs-na-F3nSbMrRoItiyHB3jyBy',
				center: new Microsoft.Maps.Location(slat, slng),
				zoom: <?php echo $confData->mapZoomLevelAdmin; ?>
			    });
			    var center = map.getCenter();

			    //Create custom Pushpin
			    var pin = new Microsoft.Maps.Pushpin(center, {
				color: 'red'
			    });

			    //Add the pushpin to the map
			    map.entities.push(pin);

			}
		    </script>
		    <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap' async defer></script>
		    <style type="text/css">
			#mymap { height: 500px; margin: 0; padding: 0; }
		    </style>
		</td>
	    </tr>
	</table>
    </div>
</form>
