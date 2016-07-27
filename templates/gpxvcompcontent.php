<div id="sidebar" class="sidebar">
<!-- Nav tabs -->
<ul class="sidebar-tabs" role="tablist">
<li class="active"><a href="#ho" role="tab"><i class="fa fa-bars"></i></a></li>
<li><a href="#upload" role="tab"><i class="fa fa-upload"></i></a></li>
<li><a href="#help" role="tab"><i class="fa fa-question"></i></a></li>
</ul>
<!-- Tab panes -->
<div class="sidebar-content active">
<div class="sidebar-pane" id="upload">
    <div id="upload">
        <h1 class="sectiontitle"><?php p($l->t('Upload gpx files to compare')); ?> :</h1>
        <br/>
        <form id="formgpx" enctype="multipart/form-data" method="post"
        action="gpxvcompp">
        <div class="fileupdiv"><input id="gpxup1" name="gpx1" type="file"/>
        </div>
        <div class="fileupdiv"><input id="gpxup2" name="gpx2" type="file"/>
        </div>
        <button class="addFile" >
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
        </button><br/>
        <!-- it appears that gpxup* inputs are not in $_POST ...
        so we need a fake input -->
        <input type="hidden" name="nothing" value="plop"/>
        <button id="saveForm" class="uibutton"><?php p($l->t('Compare')); ?></button>
        </form>
        </div>
</div>
<div class="sidebar-pane active" id="ho">

    <div id="logo">
    </div>
    <hr/>
<?php
if ($_['python_error_output'] !== null){
    echo "<b>Python process failure : ".$_['python_return_var']."</b><br/>";
    echo "<br/>".implode("<br/>", $_['python_error_output']);
    echo "<br/>Check your input files";
    echo "<hr/>";
}
?>
        <div id="links"></div>
<?php

if (count($_['gpxs'])>0){
    echo '<p><h1 class="sectiontitle">';
    p($l->t('File pair to compare'));
    echo "</h1><br/><select id='gpxselect'>";
    $len = count($_['gpxs']);
    for ($i=0; $i<$len; $i++){
        for ($j=$i+1; $j<$len; $j++){
            echo '<option name1="'.
            str_replace(' ','_',$_['gpxs'][$i]).
            '" name2="'.
            str_replace(' ','_',$_['gpxs'][$j]).
            '">'.str_replace(' ','_',$_['gpxs'][$i]).
                 " ".$l->t('and')." ".str_replace(' ','_',$_['gpxs'][$j])."</option>\n";
        }
    }
    echo "</select></p>";
    echo "<p>";
    p($l->t('Color by'));
    echo " :";
    echo "<select id='criteria'>";
    echo "<option value='time'>";
    p($l->t('time'));
    echo "</option>";
    echo "<option value='distance'>";
    p($l->t('distance'));
    echo "</option>";
    echo "<option value='cumulative elevation gain'>";
    p($l->t('cumulative elevation gain'));
    echo "</option>";
    echo "</select></p>";
}

if (count($_['geojson'])>0){
    foreach($_['geojson'] as $geoname => $geocontent){
        echo '<p id="';
        p(str_replace(' ','_',str_replace('.gpx','',str_replace('.GPX','',$geoname))));
        echo '" style="display:none">';
        p($geocontent);
        echo '</p>'."\n";
    }
}

?>
        <div id="status"></div>
        <hr/>
        <h1 class="sectiontitle"><?php p($l->t('Global stats on loaded tracks')); ?></h1>
    <br/>
    <div id="statdiv">
<?php
if (count($_['stats'])>0){
    echo '<table id="stattable" class="tablesorter"><thead><th>';
    p($l->t('stat name / track name'));
    echo '</th>';
    foreach($_['stats'] as $trackname => $stat){
        echo '<th>';
        p($trackname);
        echo '</th>';
    }
    echo '</thead>';
    $statnames = Array(
        "length_2d"=> $l->t("Distance")." (km)",
        "length_3d"=> $l->t("Distance")." 3D (km)",
        "moving_time"=> $l->t("Moving time"),
        "stopped_time"=> $l->t("Pause time"),
        "max_speed"=> $l->t("Maximum speed")." (km/h)",
        "total_uphill"=> $l->t("Cumulative elevation gain")." (m)",
        "total_downhill"=> $l->t("Cumulative elevation loss")." (m)",
        "started"=> $l->t("Begin"),
        "ended"=> $l->t("End"),
        "nbpoints"=> $l->t("Number of points")
    );
    foreach($statnames as $statname=>$statdisplayname){
        echo '<tr><td class="statnamecol">'.$statdisplayname.'</td>';
        foreach($_['stats'] as $trackname => $stat){
            echo '<td track="'.$trackname.'">';
            echo $stat->{$statname};
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}
?>
    </div>
    </div>
<div class="sidebar-pane" id="help"><h1 class="sectiontitle"><?php p($l->t('About comparison')); ?></h1>
<br/>
<h3  class="sectiontitle"><?php p($l->t('Shortcuts')); ?></h3>
    <ul>
        <li><b>&lt;</b> : <?php p($l->t('toggle sidebar')); ?></li>
        <li><b>!</b> : <?php p($l->t('toggle minimap')); ?></li>
        <li><b>œ</b> or <b>²</b> : <?php p($l->t('toggle search')); ?></li>
    </ul>
    <br/>
    <br/>
    <h3 class="sectiontitle"><?php p($l->t('Features')); ?> :</h3>
    <ul>
        <li>Select track files to compare (two or more) and press compare to
        process a comparison between each divergent part of submitted
        track.</li>
        <li>Click on tracks lines to display details on sections
        (divergent or not).</li>
        <li>Click on sidebar current tab icon to toggle sidebar.</li>
        <li>Many leaflet plugins are active :
            <ul>
                <li>Sidebar-v2</li>
                <li>Control Geocoder (search in nominatim DB)</li>
                <li>Minimap (bottom-left corner of map)</li>
                <li>MousePosition</li>
            </ul>
        </li>
    </ul>
    <ul id="tileservers" style="display:none;">
<?php
foreach($_['tileservers'] as $name=>$url){
    echo '<li name="';
    p($name);
    echo '" title="';
    p($url);
    echo '">';
    p($name);
    echo '</li>';
}
?>
    </ul>
</div>
</div>
</div>
<!-- ============= MAP DIV =============== -->
<div id="map" class="sidebar-map"></div>
