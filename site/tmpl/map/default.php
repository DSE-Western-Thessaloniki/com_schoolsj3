<?php

use DSEWestThessaloniki\Component\Schoolsj3\Site\Helper\MapHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

defined("_JEXEC") or die();
?>

<form action="" method="post" name="adminForm" id="adminForm">

	<!-- Filterbar -->
	<div id="filter-bar" class="btn-toolbar">
	    <div class="btn-group pull-left">
		<button class="btn" type="button" onclick="window.location.href='<?php echo Route::_("index.php?view=allSch&format=xls"); ?>'"><?php echo Text::_(
      "COM_SCHOOLSJ3_EXPORT_XLS"
  ); ?></button>
		<button class="btn" type="button" onclick="window.location.href='<?php echo Route::_("index.php?view=schools"); ?>'"><?php echo Text::_(
      "COM_SCHOOLSJ3_SHOW_TABLE"
  ); ?></button>
	    </div>
	</div>

	<div class="clearfix">
	<table class="table table-striped" id="Schoolsj3List">
	    <thead>
		<tr>
		    <th width="1%" class="hidden-phone">
			<?php echo "#"; ?>
		    </th>
		    <th>
			<?php echo Text::_("JGLOBAL_TITLE"); ?>
		    </th>
		    <th>
			<?php echo Text::_("COM_SCHOOLSJ3_HEADING_CATEGORY"); ?>
		    </th>
		    <th>
			<?php echo Text::_("COM_SCHOOLSJ3_HEADING_OFFICE"); ?>
		    </th>
		    <th>
			<?php echo Text::_("COM_SCHOOLSJ3_HEADING_MUNICIPALITY"); ?>
		    </th>
		    <th>
			<?php echo Text::_("COM_SCHOOLSJ3_HEADING_SHIFT"); ?>
		    </th>
		    <th>
			<?php echo Text::_("COM_SCHOOLSJ3_HEADING_UNITS"); ?>
		    </th>
		    <th>
			<?php echo Text::_("COM_SCHOOLSJ3_HEADING_DISTRICT"); ?>
		    </th>
		</tr>
		<tr>
		    <th></th>
		    <th class="sectiontableheader">
			<input type="text" name="filter_search" id="filter_search"
			    placeholder="<?php echo Text::_("COM_SCHOOLSJ3_SEARCH_IN_TITLE"); ?>"
			    value="<?php echo $this->escape($this->state->get("filter.search")); ?>"
			    title="<?php echo Text::_("COM_SCHOOLSJ3_SEARCH_IN_TITLE"); ?>" />
		    </th>
		    <th class="sectiontableheader">
		       <select class="inputbox" name="filter_category" id="filter_category" onchange="this.form.submit()">
			   <option value="">
			       <?php echo Text::_("COM_SCHOOLSJ3_FILTER_CATEGORY"); ?>
			   </option>
			   <?php
      $db = Factory::getContainer()->get("DatabaseDriver");
      $query = "SELECT id, description FROM #__sch3_categories";
      $db->setQuery($query);
      $rows = $db->loadObjectList();
      $options = [];
      foreach ($rows as $row) {
          $options[] = HTMLHelper::_(
              "select.option",
              "$row->id",
              Text::_($row->description)
          );
      }
      echo HTMLHelper::_(
          "select.options",
          $options,
          "value",
          "text",
          $this->state->get("filter.category"),
          true
      );
      ?>
			</select>
		    </th>
		    <th class="sectiontableheader">
		       <select class="inputbox" name="filter_office" id="filter_office" onchange="this.form.submit()">
			   <option value="">
			       <?php echo Text::_("COM_SCHOOLSJ3_FILTER_OFFICE"); ?>
			   </option>
			   <?php
      $db = Factory::getContainer()->get("DatabaseDriver");
      $query = "SELECT id, description FROM #__sch3_offices";
      $db->setQuery($query);
      $rows = $db->loadObjectList();
      $options = [];
      foreach ($rows as $row) {
          $options[] = HTMLHelper::_(
              "select.option",
              "$row->id",
              Text::_($row->description)
          );
      }
      echo HTMLHelper::_(
          "select.options",
          $options,
          "value",
          "text",
          $this->state->get("filter.office"),
          true
      );
      ?>
			</select>
		    </th>
		    <th class="sectiontableheader">
		       <select class="inputbox" name="filter_municipality" id="filter_municipality" onchange="this.form.submit()">
			   <option value="">
			       <?php echo Text::_("COM_SCHOOLSJ3_FILTER_MUNICIPALITY"); ?>
			   </option>
			   <?php
      $db = Factory::getContainer()->get("DatabaseDriver");
      $query = "SELECT id, description FROM #__sch3_municipalities";
      $db->setQuery($query);
      $rows = $db->loadObjectList();
      $options = [];
      foreach ($rows as $row) {
          $options[] = HTMLHelper::_(
              "select.option",
              "$row->id",
              Text::_($row->description)
          );
      }
      echo HTMLHelper::_(
          "select.options",
          $options,
          "value",
          "text",
          $this->state->get("filter.municipality"),
          true
      );
      ?>
			</select>
		    </th>
		    <th class="sectiontableheader">
		       <select class="inputbox" name="filter_shift" id="filter_shift" onchange="this.form.submit()">
			   <option value="">
			       <?php echo Text::_("COM_SCHOOLSJ3_FILTER_SHIFT"); ?>
			   </option>
			   <?php
      $db = Factory::getContainer()->get("DatabaseDriver");
      $query = "SELECT id, description FROM #__sch3_shifts";
      $db->setQuery($query);
      $rows = $db->loadObjectList();
      $options = [];
      foreach ($rows as $row) {
          $options[] = HTMLHelper::_(
              "select.option",
              "$row->id",
              Text::_($row->description)
          );
      }
      echo HTMLHelper::_(
          "select.options",
          $options,
          "value",
          "text",
          $this->state->get("filter.shift"),
          true
      );
      ?>
			</select>
		    </th>
		    <th class="sectiontableheader">
		       <select class="inputbox" name="filter_units" id="filter_units" onchange="this.form.submit()">
			   <option value="">
			       <?php echo Text::_("COM_SCHOOLSJ3_FILTER_UNITS"); ?>
			   </option>
			   <?php
      $db = Factory::getContainer()->get("DatabaseDriver");
      $query = "SELECT id, units FROM #__sch3_units";
      $db->setQuery($query);
      $rows = $db->loadObjectList();
      $options = [];
      foreach ($rows as $row) {
          $options[] = HTMLHelper::_(
              "select.option",
              "$row->id",
              Text::_($row->units)
          );
      }
      echo HTMLHelper::_(
          "select.options",
          $options,
          "value",
          "text",
          $this->state->get("filter.units"),
          true
      );
      ?>
			</select>
		    </th>
		    <th class="sectiontableheader">
		       <select class="inputbox" name="filter_district" id="filter_district" onchange="this.form.submit()">
			   <option value="">
			       <?php echo Text::_("COM_SCHOOLSJ3_FILTER_DISTRICT"); ?>
			   </option>
			   <?php
      $db = Factory::getContainer()->get("DatabaseDriver");
      $query = "SELECT id, description FROM #__sch3_districts";
      $db->setQuery($query);
      $rows = $db->loadObjectList();
      $options = [];
      foreach ($rows as $row) {
          $options[] = HTMLHelper::_(
              "select.option",
              "$row->id",
              Text::_($row->description)
          );
      }
      echo HTMLHelper::_(
          "select.options",
          $options,
          "value",
          "text",
          $this->state->get("filter.district"),
          true
      );
      ?>
			</select>
		    </th>
		</tr>
	    </thead>
	    <tbody>
		<tr>
		    <td colspan="8">
			<div id="controlDiv" style="display:none">
			    <div id="controlUI">
				<div id="controlText">
				    <button id="directionsbutton"><?php echo Text::_(
            "COM_SCHOOLSJ3_GET_DIRECTIONS"
        ); ?></button>
				    <table id="directionsmainform" style="display:none">
					<tr>
					    <td>
						<table>
						    <tr>
							<td><?php echo Text::_("COM_SCHOOLSJ3_FROM"); ?>:</td>
							<td id="autocomptd"><input class="inputbox" id="autocomplete"></input></td>
						    </tr>
						    <tr>
							<td><?php echo Text::_("COM_SCHOOLSJ3_TO"); ?>:</td>
							<td id="schoolcombotd">
							   <select class="inputbox" name="schoolcombo" id="schoolcombo">
							       <option value="">
								   <?php echo Text::_("COM_SCHOOLSJ3_SCHOOLS_COMBO"); ?>
							       </option>
							       <?php
              $db = Factory::getContainer()->get("DatabaseDriver");
              $query = "SELECT id, description, lat, lng FROM #__sch3_schools";
              $db->setQuery($query);
              $rows = $db->loadObjectList();
              $options = [];
              ?>
								<script type="text/javascript">
								var schdb = {};
								<?php foreach ($rows as $row) {
            $options[] = HTMLHelper::_(
                "select.option",
                "$row->id",
                Text::_($row->description)
            ); ?>
								   schdb['<?php echo $row->id; ?>'] = { lat:<?php echo $row->lat; ?> , lng:<?php echo $row->lng; ?> };<?php
        } ?>
								</script>
								<?php echo HTMLHelper::_(
            "select.options",
            $options,
            "value",
            "text",
            null,
            true
        ); ?>
							    </select>
							</td>
						    </tr>
						    <tr>
							<td id="direrror"></td>
						    </tr>
						</table>
					    </td>
					    <td>
						<button id="swapbutton">&#8645;</button>
					    </td>
					</tr>
					<tr>
					    <td>
						<select class="inputbox" name="travelMode" id="travelMode">
						<?php
      $options = [];
      $options[] = HTMLHelper::_(
          "select.option",
          "DRIVING",
          Text::_("COM_SCHOOLSJ3_TRAVEL_BYCAR")
      );
      $options[] = HTMLHelper::_(
          "select.option",
          "BICYCLING",
          Text::_("COM_SCHOOLSJ3_TRAVEL_BYBICYCLE")
      );
      $options[] = HTMLHelper::_(
          "select.option",
          "TRANSIT",
          Text::_("COM_SCHOOLSJ3_TRAVEL_BYTRANSIT")
      );
      $options[] = HTMLHelper::_(
          "select.option",
          "WALKING",
          Text::_("COM_SCHOOLSJ3_TRAVEL_ONFOOT")
      );
      echo HTMLHelper::_(
          "select.options",
          $options,
          "value",
          "text",
          "1",
          true
      );
      ?>
						</select>
						<button id="getDirections"><?php echo Text::_(
          "COM_SCHOOLSJ3_GET_DIRECTIONS"
      ); ?></button>
					    </td>
					</tr>
				    </table>
				</div>
			    </div>
			</div>
			<?php HTMLHelper::_("jquery.framework"); ?>

			<?php $mapcfg = (new MapHelper())->getMapConfig(); ?>

			<div id="map-wrapper" style="width:<?php echo $mapcfg->mapWidth; ?>;height:<?php echo $mapcfg->mapHeight; ?>;">
			    <div id="msmap-canvas"></div>
			</div>

			<script type="text/javascript">
			    var msmap;
			    var clusterLayer;
			    var pins = [];
			    var tooltipTemplate = '<div style="background-color:white;height:30px;width:250px;padding:5px;text-align:center"><b>{title}</b></div>';

			    function GetMap()
			    {
				msmap = new Microsoft.Maps.Map('#msmap-canvas', {
				credentials: <?php echo "'" . $mapcfg->mapAPIKey . "'"; ?>,
				    center: new Microsoft.Maps.Location(<?php echo $mapcfg->mapCenterLat; ?>, <?php echo $mapcfg->mapCenterLng; ?>),
				    zoom: <?php echo $mapcfg->mapZoomLevel; ?>
				});
				var center = msmap.getCenter();
				var i=0;

				//Create an infobox at the center of the map but don't show it.
				infobox = new Microsoft.Maps.Infobox(msmap.getCenter(), {
				    maxWidth: 400,
				    maxHeight: 200,
				    visible: false
				});
				infobox.setMap(msmap);

				//Create a second infobox to use as a tooltip when hovering.
				tooltip = new Microsoft.Maps.Infobox(msmap.getCenter(), {
				    visible: false,
				    showPointer: false,
				    showCloseButton: false,
				    offset: new Microsoft.Maps.Point(-75, 30)
				});
				tooltip.setMap(msmap);

				//Load the Clustering module.
				Microsoft.Maps.loadModule("Microsoft.Maps.Clustering", function () {

				    <?php foreach ($this->items as $i => $item): ?>
					var latLng = new Microsoft.Maps.Location(<?php echo $item->lat; ?>, <?php echo $item->lng; ?>);
					<?php
     $iconpath = Uri::base() . "components/com_schoolsj3/assets/icons/";
     if ($item->category === "ΓΕΝΙΚΟ ΛΥΚΕΙΟ") {
         $schicon = "icon-gel.png";
     } elseif ($item->category === "ΓΥΜΝΑΣΙΟ") {
         $schicon = "icon-gym.png";
     } elseif ($item->category === "ΕΠΑΛ") {
         $schicon = "icon-epal.png";
     } elseif ($item->category === "ΕΠΑΣ") {
         $schicon = "icon-epas.png";
     } elseif ($item->category === "ΕΕΕΕΚ") {
         $schicon = "icon-eeeek.png";
     }
     ?>

					//var pin = new Microsoft.Maps.Pushpin(latLng, {'title': '<?php echo $item->schoolname; ?>', 'icon': '<?php echo $iconpath .
    $schicon; ?>'});
					var pin = new Microsoft.Maps.Pushpin(latLng, {
					    icon: '<?php echo $iconpath . $schicon; ?>'
					});
					pin.mid = i;
					i++;
					pin.title = '<?php echo $item->schoolname; ?>';
					pin.description = '<div class="infoWindow">' +
							'<?php echo Text::_(
           "COM_SCHOOLSJ3_ADDRESS"
       ); ?>:<?php echo $item->address; ?>, <?php echo Text::_(
    "COM_SCHOOLSJ3_POSTALCODE"
); ?>: <?php echo $item->postcode; ?> <?php echo $item->area; ?><br/>' +
							'<?php echo Text::_(
           "COM_SCHOOLSJ3_EMAIL"
       ); ?>: <a href=mailto:"<?php echo $item->email; ?>"><?php echo $item->email; ?></a><br/><br/>' +
							'<?php echo Text::_(
           "COM_SCHOOLSJ3_TELEPHONE"
       ); ?>: <?php echo $item->phone; ?><br/>' +
							'<?php echo Text::_("COM_SCHOOLSJ3_FAX"); ?>: <?php echo $item->fax; ?><br/>' +
							'<?php echo Text::_("COM_SCHOOLSJ3_WEBSITE"); ?>: <?php echo HTMLHelper::link(
    substr($item->website, 0, 4) === "http"
        ? $item->website
        : "http://" . $item->website,
    $item->website
); ?> <!-- <a href="<?php echo $item->website; ?>"><?php echo $item->website; ?></a> --> <br/><br/>' +
							//'<?php echo Text::_(
           "COM_SCHOOLSJ3_OFFICE"
       ); ?>: ' + '<?php echo $item->office; ?>' + '<br/>' +
							'<?php echo Text::_(
           "COM_SCHOOLSJ3_DISTRICT"
       ); ?>: ' + '<?php echo $item->district; ?>' + '<br/>' +
							'<?php echo Text::_(
           "COM_SCHOOLSJ3_SHIFT"
       ); ?>: ' + '<?php echo $item->shift; ?>' + '<br/>' +
							'<?php echo Text::_(
           "COM_SCHOOLSJ3_UNITS"
       ); ?>: ' + '<?php echo $item->units; ?>' + '<br/>' +
							'<?php echo Text::_(
           "COM_SCHOOLSJ3_CATEGORY"
       ); ?>: ' + '<?php echo $item->category; ?>' + '<br/>' +
							'<?php echo Text::_(
           "COM_SCHOOLSJ3_MINISTRY_CODE"
       ); ?>: ' + '<?php echo $item->edu_id; ?>' + '<br/></div>';
					//Microsoft.Maps.Events.addHandler(pin, 'click', pushpinClicked);
					Microsoft.Maps.Events.addHandler(pin, 'mouseover', pushpinHovered);
					Microsoft.Maps.Events.addHandler(pin, 'mouseout', closeTooltip);
					pins.push(pin);
				    <?php endforeach; ?>

				    //Create a ClusterLayer and add it to the map.
				    var clusterLayer = new Microsoft.Maps.ClusterLayer(pins, {
					clusteredPinCallback: function (cluster) {
					    //Customize clustered pushpin.
					    cluster.setOptions({
						color: 'red',
						    /*icon: <?php echo "'" .
              Uri::base() .
              "components/com_schoolsj3/assets/icons/icon-clustermarker.gif" .
              "'"; ?>*/
					    });
					    cluster.title = '' + cluster.containedPushpins.length + ' σχολεία';
					},
					callback: createPushpinList
				    });
				    //Add a click event to the clustering layer.
				    //Microsoft.Maps.Events.addHandler(clusterLayer, 'click', clusterPushpinClicked);
				    Microsoft.Maps.Events.addHandler(clusterLayer, 'click', pushpinClicked);
				    msmap.layers.insert(clusterLayer);
				});
			    }

			    function pushpinClicked(e) {
				    var description = [];
				    pin = e.target;

				    tooltip.setOptions({
					visible: false
				    });
				    
				    //Check to see if the pushpin is a cluster.
				    if (pin.containedPushpins) {
					//Create a list of all pushpins that are in the cluster.
					description.push('<div style="max-height:75px;overflow-y:auto;"><ul>');
					for (var i = 0; i < pin.containedPushpins.length; i++) {
					    description.push("<li><a href='javascript:void(0);' onclick='zoomTo(",pin.containedPushpins[i].getLocation().latitude,",",pin.containedPushpins[i].getLocation().longitude,")'>", pin.containedPushpins[i].title, "</a></li>");
					}
					description.push('</ul></div>');
				    }
				    else {
					description.push(pin.description);
				    }

				    infobox.setOptions({
					location: pin.getLocation(),
					title: pin.title,
					description: description.join(' '),
					offset: new Microsoft.Maps.Point(0,15),
					visible: true
				    });
			    }

			    function zoomTo(lat, lng) {
				infobox.setOptions({
				    visible: false
				});
				msmap.setView({
				    center: new Microsoft.Maps.Location(lat, lng),
				    zoom: 18
				});
			    }

			    function showInfoboxByGridKey(gridKey) {
				//Look up the cluster or pushpin by gridKey.
				var clusterPin = clusterLayer.getClusterPushpinByGridKey(gridKey);

				//Show an infobox for the cluster or pushpin.
				pushpinClicked(clusterPin);
			    }


			    function pushpinHovered(e) {
				//Hide the infobox
				infobox.setOptions({ visible: false });

				//Make sure the infobox has metadata to display.
				if (e.target.title) {
				    //Set the infobox options with the metadata of the pushpin.
				    tooltip.setOptions({
					location: e.target.getLocation(),
					htmlContent: tooltipTemplate.replace('{title}', e.target.title),
					visible: true
				    });
				}
			    }

			    function closeTooltip() {
				tooltip.setOptions({
				    htmlContent: ' ',
				    visible: false
				});
			    }

			    function createPushpinList() {
				//Create a list of displayed pushpins each time clustering layer updates.

				if (clusterLayer != null) {
				    //infobox.setOptions({ visible: false });

				    //Get all pushpins that are currently displayed.
				    var data = clusterLayer.getDisplayedPushpins();
				    var output = [];

				    //Create a list of links for each pushpin that opens up the infobox for it.
				    for (var i = 0; i < data.length; i++) {
					output.push("<a href='javascript:void(0);' onclick='showInfoboxByGridKey(", data[i].gridKey, ");'>");
					output.push(data[i].getTitle(), "</a><br/>");
				    }
				}
			    }

			    function loadScript() {
				var script2 = document.createElement('script');
				script2.type = 'text/javascript';
				script2.src = 'https://www.bing.com/api/maps/mapcontrol?callback=GetMap';
				document.body.appendChild(script2);
			    }

			    window.onload = loadScript;
			</script>
		    </td>
		</tr>
	    </tbody>
	</table>
	<div id="mapDirections"></div>
	</div>

	<input type="hidden" name="task" value="" />
	<input type="hidden" id="dirdir" value="1" />
	<?php echo HTMLHelper::_("form.token"); ?>
    </div>
</form>
