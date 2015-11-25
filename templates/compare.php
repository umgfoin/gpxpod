<?php
script('gpxpod', 'd3.min');
script('gpxpod', 'leaflet');
script('gpxpod', 'leaflet.label');
script('gpxpod', 'L.Control.MousePosition');
script('gpxpod', 'Control.Geocoder');
script('gpxpod', 'ActiveLayers');
script('gpxpod', 'Control.MiniMap');
script('gpxpod', 'L.Control.Locate.min');
script('gpxpod', 'leaflet-sidebar.min');
script('gpxpod', 'leaflet.markercluster-src');
script('gpxpod', 'Leaflet.Elevation-0.0.2.min');
script('gpxpod', 'L.activearea');
script('gpxpod', 'jquery-ui.min');
script('gpxpod', 'jquery.mousewheel');
script('gpxpod', 'tablesorter/jquery.tablesorter');
script('gpxpod', 'gpxvcomp');

style('gpxpod','style');
style('gpxpod','leaflet');
style('gpxpod','L.Control.MousePosition');
style('gpxpod','leaflet.label');
style('gpxpod','Control.Geocoder');
style('gpxpod','leaflet-sidebar');
style('gpxpod','Control.MiniMap');
style('gpxpod','jquery-ui.min');
style('gpxpod','font-awesome.min');
style('gpxpod','Leaflet.Elevation-0.0.2');
style('gpxpod','gpxvcomp');
style('gpxpod','MarkerCluster');
style('gpxpod','MarkerCluster.Default');
style('gpxpod','L.Control.Locate.min');
style('gpxpod','tablesorter/themes/blue/style');

?>

<div id="app">
	<div id="app-navigation">
		<?php print_unescaped($this->inc('part.navigation')); ?>
		<?php print_unescaped($this->inc('part.settings')); ?>
	</div>

	<div id="app-content">
		<div id="app-content-wrapper">
			<?php print_unescaped($this->inc('gpxvcompcontent')); ?>
		</div>
	</div>
</div>
