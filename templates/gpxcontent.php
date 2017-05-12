<div id="sidebar" class="sidebar">
<!-- Nav tabs -->
<ul class="sidebar-tabs" role="tablist">
<li class="active" title="<?php p($l->t('Folder and tracks selection')); ?>"><a href="#ho" role="tab"><i class="fa fa-bars"></i></a></li>
<li title="<?php p($l->t('Settings and extra actions')); ?>"><a href="#gpxpodsettings" role="tab"><i class="fa fa-gear"></i></a></li>
<li title="<?php p($l->t('About GpxPod')); ?>"><a href="#help" role="tab"><i class="fa fa-question"></i></a></li>
</ul>
<!-- Tab panes -->
<div class="sidebar-content active">
<div class="sidebar-pane active" id="ho">
    <div id="logofolder">
        <div id="logo">
            <!--p align="center"><img src="gpxpod.png"/></p-->
            <div>
            <p>v
<?php
p($_['gpxpod_version']);
?>
            </p>
            </div>
        </div>
        <label for="subfolderselect"><?php p($l->t('Folder')); ?> :</label>
        <select name="subfolder" id="subfolderselect">
        <option style="color:red; font-weight:bold"><?php p($l->t('Choose a folder')); ?></option>
<?php

// populate select options
if (count($_['dirs']) > 0){
    foreach($_['dirs'] as $dir){
        echo '<option value="';
        p($dir);
        echo '">';
        p($dir);
        echo '</option>'."\n";
    }
}

?>
        </select>
                    <label for="processtypeselect"
                    title="<?php
p($l->t("'Process new files only' : only process new files since last process"));
echo "\n\n";
p($l->t("'Process all files' : process everything"));
echo "\n";
p($l->t('You should do it after installing a new GpxPod version'));
echo "\n";
p($l->t('Usefull if a file was modified since last process'));
echo "\n"; ?>
<?php
if (count($_['extra_scan_type']) > 0){
    echo "\n";
    p($l->t('Elevation correction is done with SRTM.py (gpxelevations)'));
}
?>
">
<?php p($l->t('Scan type')); ?> :</label>
                    <select name="processtype" id="processtypeselect"
                    title="<?php
p($l->t("'Process new files only' : only process new files since last process"));
echo "\n\n";
p($l->t("'Process all files' : process everything"));
echo "\n";
p($l->t('You should do it after installing a new GpxPod version'));
echo "\n";
p($l->t('Usefull if a file was modified since last process'));
echo "\n"; ?>
<?php
if (count($_['extra_scan_type']) > 0){
    echo "\n";
    p($l->t('Elevation correction is done with SRTM.py (gpxelevations)'));
}
?>
">
                    <option value="new" selected="selected"
                    ><?php p($l->t('Process new files only')); ?></option>
                    <option value="all"
                    ><?php p($l->t('Process all files')); ?></option>
<?php
if (count($_['extra_scan_type']) > 0){
    foreach ($_['extra_scan_type'] as $opt => $txt){
        echo '<option value="';
        p($opt);
        echo '">';
        p($txt);
        echo '</option>';
    }
}
?>
                    </select>
<?php

if (count($_['dirs']) === 0){
    echo '<p id="nofolder">';
    p($l->t('No gpx file found'));
    echo '</p><p id="nofoldertext">';
    p($l->t('You should have at least one gpx/kml/tcx file in your files'));
    echo '.</p>';
}

?>
    </div>
    <hr/>
    <div id="options">
        <div>
        <h3 id="optiontitle" class="sectiontitle">
        <b id="optiontitletext"><?php p($l->t('Options')); ?> </b>
        <b id="optiontoggle"><i class="fa fa-angle-double-down"></i></b></h3>
        </div>
        <div style="clear:both"></div>
        <div id="optionscontent" style="display:none;">
        <div id="optionbuttonsdiv">
            <label for="trackwaypointdisplayselect">* <?php p($l->t('Draw')); ?> :</label>
            <select id="trackwaypointdisplayselect">
            <option value="tw" selected="selected"><?php p($l->t('track+waypoints')); ?></option>
            <option value="t"><?php p($l->t('track')); ?></option>
            <option value="w"><?php p($l->t('waypoints')); ?></option>
            </select>
            <label for="waypointstyleselect">* <?php p($l->t('Waypoint style')); ?> :</label>
            <select id="waypointstyleselect">
            </select>
            <label for="tooltipstyleselect">* <?php p($l->t('Tooltip')); ?> :</label>
            <select id="tooltipstyleselect">
                <option value="h"><?php p($l->t('on hover')); ?></option>
                <option value="p"><?php p($l->t('permanent')); ?></option>
            </select>
            <label for="colorcriteria" title="<?php
            p($l->t('Enables tracks coloring by the chosen criteria')); ?>">
            * <?php p($l->t('Color tracks by')); ?> :</label>
            <select name="colorcriteria" id="colorcriteria"
            title="<?php p($l->t('Enables tracks coloring by the chosen criteria')); ?>">
            <option value="none"><?php p($l->t('none')); ?></option>
            <option value="speed"><?php p($l->t('speed')); ?></option>
            <option value="elevation"><?php p($l->t('elevation')); ?></option>
            </select>
            <label for="picturestyleselect"><?php p($l->t('Picture style')); ?> :</label>
            <select id="picturestyleselect">
            <option value="p"><?php p($l->t('popup')); ?></option>
            <option value="sm"><?php p($l->t('small red marker')); ?></option>
            <option value="bm"><?php p($l->t('big marker with simple spiderfication')); ?></option>
            <option value="bmp"><?php p($l->t('big marker with popup spiderfication')); ?></option>
            </select>
            <select id="tzselect"></select>
            <label for="measureunitselect"><?php p($l->t('Measure units')); ?> :</label>
            <select id="measureunitselect">
            <option value="metric"><?php p($l->t('Metric')); ?></option>
            <option value="english"><?php p($l->t('English')); ?></option>
            </select>
            <button id="comparebutton">
                <i class="fa fa-balance-scale" style="color:blue;"></i>
                <?php p($l->t('Compare selected tracks')); ?>
            </button>
            <p id="astlegend">(*) <?php p($l->t('Effective on future actions')); ?></p>
        </div>
        <div id="optioncheckdiv">
            <div>
                <input id="displayclusters" type="checkbox" checked="checked">
                <label for="displayclusters"><i class="fa fa-map-marker" aria-hidden="true" style="color:blue;"></i>
                <?php p($l->t('Display markers'));?></label>
            </div>
            <div title="<?php p($l->t('Use symbols defined in the gpx file')); ?>">
                <input id="symboloverwrite" type="checkbox" checked></input>
                <label for="symboloverwrite">
                <i class="fa fa-map-pin" aria-hidden="true" style="color:blue;"></i>
                <?php p($l->t('Gpx symbols')); ?>
                </label>
            </div>
            <div id="showpicsdiv" style="display:none;" title="<?php
p($l->t('Show pictures markers'));
echo "\n\n";
p($l->t('Only pictures with EXIF geolocation data are displayed')); ?>">
                <input id="showpicscheck" type="checkbox" checked="checked">
                <label for="showpicscheck">
                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                <?php p($l->t('Show pictures')); ?></label>
            </div>
            <div title="<?php p($l->t('Open info popup when a track is drawn')); ?>">
                <input id="openpopupcheck" type="checkbox" checked="checked">
                <label for="openpopupcheck"><i class="fa fa-comment-o" aria-hidden="true"></i>
                <?php p($l->t('Auto-popup')); ?></label>
            </div>
            <div title=
"<?php p($l->t('If enabled :'));
echo "\n- ";
p($l->t('Zoom on track when it is drawn'));
echo "\n- ";
p($l->t('Zoom to show all track markers when selecting a folder'));
echo "\n";
p($l->t('If disabled :'));
echo "\n- ";
p($l->t('Do nothing when a track is drawn'));
echo "\n- ";
p($l->t('Reset zoom to world view when selecting a folder')); ?>">
                <input id="autozoomcheck" type="checkbox" checked="checked">
                <label for="autozoomcheck"><i class="fa fa-search-plus" aria-hidden="true"></i>
                <?php p($l->t('Auto-zoom')); ?></label>
            </div>
            <div title=
            "<?php p($l->t('Enables transparency when hover on table rows to display track overviews')); ?>">
                <input id="transparentcheck" type="checkbox">
                <label for="transparentcheck">
                <i class="fa fa-eye" aria-hidden="true"></i>
                <?php p($l->t('Transparency')); ?>
                </label>
            </div>
            <div title="<?php p($l->t('Table only shows tracks that are inside current map view')); ?>">
                <input id="updtracklistcheck" type="checkbox" checked="checked">
                <label for="updtracklistcheck">
                <i class="fa fa-table" aria-hidden="true"></i>
                <?php p($l->t('Dynamic table')); ?></label>
            </div>
            <div title="<?php p($l->t('Display elevation or speed chart when a track is drawn')); ?>">
                <input id="showchartcheck" type="checkbox" checked="checked">
                <label for="showchartcheck">
                <i class="fa fa-line-chart" aria-hidden="true"></i>
                <?php p($l->t('Display chart')); ?></label>
            </div>
            <button id="removeelevation">
            <i class="fa fa-eye-slash" style="color:red;"></i>
            <?php p($l->t('Hide elevation profile')); ?>
            </button>
            <div title="<?php p($l->t('Show direction arrows along lines')); ?>">
                <input id="arrowcheck" type="checkbox">
                <label for="arrowcheck">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                <?php p($l->t('Direction arrows')); ?> *</label>
            </div>
            <div title="<?php p($l->t('Draw black borders around track lines')); ?>">
                <input id="linebordercheck" type="checkbox" checked="checked">
                <label for="linebordercheck">
                <i class="fa fa-pencil" aria-hidden="true"></i>
                <?php p($l->t('Line borders')); ?> *</label>
            </div>
            <div title="<?php p($l->t('Track line width in pixels')); ?>">
                <label for="lineweight">
                <?php p($l->t('Line width')); ?> *
                </label>
                <input id="lineweight" value="5"></input>
            </div>
            <div title=
            "<?php p($l->t('For slow connections or if you have huge files, a simplified version is shown when hover')); ?>">
                <input id="simplehovercheck" type="checkbox">
                <label for="simplehovercheck">
                <i class="fa fa-eye" aria-hidden="true"></i>
                <?php p($l->t('Simplified previews')); ?>
                </label>
            </div>
            <div title=
            "<?php p($l->t('Check that to display full size pictures in the lightbox')); ?>">
                <input id="expandoriginalpicture" type="checkbox">
                <label for="expandoriginalpicture">
                <i class="fa fa-expand" aria-hidden="true"></i>
                <?php p($l->t('Full size pics')); ?>
                </label>
            </div>
        </div>
        </div>
    </div>
    <div style="clear:both"></div>
    <hr/>
    <h3 id="ticv" class="sectiontitle"><?php p($l->t('Tracks from current view')); ?></h3>
    <div id="tablecriteria"
    title="<?php
p($l->t('what determines if a track is shown in the table :'));
echo "\n\n- ";
p($l->t('crosses : at least one track point is inside current view'));
echo "\n- ";
p($l->t('begins : beginning point marker is inside current view'));
echo "\n- ";
p($l->t('track N,S,E,W bounds intersect current view bounds square'));
echo "\n\n";
p($l->t('If nothing ever shows up in the table, try to \'process all files\'.'));
echo "\n";
p($l->t('Anyway, if you recently changed GpxPod version, do a \'process all files\' once.'));
?>
">
        <label for="tablecriteriasel" id="tablecriterialabel">
            <?php p($l->t('List tracks that')); ?> :
        </label>
        <select name="tablecriteriasel" id="tablecriteriasel">
        <option value="cross"><?php p($l->t('cross current view')); ?></option>
        <option value="start"><?php p($l->t('begin in current view')); ?></option>
       <option value="bounds"><?php p($l->t('have N,S,E,W bounds crossing current view')); ?></option>
        </select>
    </div>
    <div id="tablebuttons">
        <button id="selectall" class="smallbutton"><i class="fa fa-check-square" aria-hidden="true" style="color:green;"></i>
        <?php p($l->t('Select visible')); ?>
        </button>
        <button id="deselectall" class="smallbutton"><i class="fa fa-square-o" aria-hidden="true" style="color:red;"></i>
        <?php p($l->t('Deselect all')); ?>
        </button>
        <button id="deselectallv" class="smallbutton"><i class="fa fa-square-o" aria-hidden="true" style="color:red;"></i>
        <?php p($l->t('Deselect visible')); ?>
        </button>
        <button id="deleteselected" class="smallbutton"><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i>
        <?php p($l->t('Delete selected')); ?>
        </button>
    </div>
    <div id="loading"><p>
        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
        <?php p($l->t('loading track')); ?>&nbsp;<b id="loadingpc"></b></p>
    </div>
    <div id="correcting"><p>
        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
        <?php p($l->t('correcting elevations')); ?>&nbsp;</p>
    </div>
    <div id="loadingmarkers"><p>
        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
        <?php p($l->t('processing files')); ?><br/>
        <?php p($l->t('this may take a long time')); ?>
        </p>
    </div>
    <div id="gpxlist"></div>
<?php

echo '<p id="gpxcomprooturl" style="display:none">';
p($_['gpxcomp_root_url']);
echo '</p>'."\n";
echo '<p id="publicgpx" style="display:none">';
p($_['publicgpx']);
echo '</p>'."\n";
echo '<p id="publicmarker" style="display:none">';
p($_['publicmarker']);
echo '</p>'."\n";
echo '<p id="publicdir" style="display:none">';
p($_['publicdir']);
echo '</p>'."\n";
echo '<p id="username" style="display:none">';
p($_['username']);
echo '</p>'."\n";
echo '<p id="pictures" style="display:none">';
p($_['pictures']);
echo '</p>'."\n";
echo '<p id="token" style="display:none">';
p($_['token']);
echo '</p>'."\n";
echo '<p id="gpxedit_version" style="display:none">';
p($_['gpxedit_version']);
echo '</p>'."\n";
echo '<ul id="extrasymbols" style="display:none">';
foreach($_['extrasymbols'] as $symbol){
    echo '<li name="';
    p($symbol['name']);
    echo '">';
    p($symbol['smallname']);
    echo '</li>';
}
echo '</ul>'."\n";
echo '<ul id="basetileservers" style="display:none">';
foreach($_['basetileservers'] as $ts){
    echo '<li name="';
    p($ts['name']);
    echo '" type="';
    p($ts['type']);
    echo '" url="';
    p($ts['url']);
    echo '" minzoom="';
    p($ts['minzoom']);
    echo '" maxzoom="';
    p($ts['maxzoom']);
    echo '" attribution="';
    p($ts['attribution']);
    echo '"></li>';
}
echo '</ul>'."\n";

?>
</div>
<div class="sidebar-pane" id="gpxpodsettings">
<h1 class="sectiontitle"><?php p($l->t('Settings and extra actions')); ?></h1>
<hr/>
<br/>
<div id="filtertabtitle">
    <h3 class="sectiontitle"><?php p($l->t('Filters')); ?></h3>
    <button id="clearfilter" class="filterbutton">
        <i class="fa fa-trash" aria-hidden="true" style="color:red;"></i>
        <?php p($l->t('Clear')); ?>
    </button>
    <button id="applyfilter" class="filterbutton">
        <i class="fa fa-check" aria-hidden="true" style="color:green;"></i>
        <?php p($l->t('Apply')); ?>
    </button>
</div>
<br/>
<br/>
<ul id="filterlist" class="disclist">
    <li>
        <b><?php p($l->t('Date')); ?></b><br/>
        <?php p($l->t('min')); ?> : <input type="text" id="datemin"><br/>
        <?php p($l->t('max')); ?> : <input type="text" id="datemax">
    </li>
    <li>
        <b><?php p($l->t('Distance'));?> (<i class="distanceunit">m</i>)</b><br/>
        <?php p($l->t('min')); ?> : <input id="distmin"><br/>
        <?php p($l->t('max')); ?> : <input id="distmax">
    </li>
    <li>
        <b><?php p($l->t('Cumulative elevation gain')); ?> (<i class="elevationunit">m</i>)</b><br/>
        <?php p($l->t('min')); ?> : <input id="cegmin"><br/>
        <?php p($l->t('max')); ?> : <input id="cegmax">
    </li>
</ul>
<br/>
<hr/>
<br/>
    <h3 class="sectiontitle"><?php p($l->t('Custom tile servers')); ?></h3>
    <br/>
    <div id="tileserveradd">
        <?php p($l->t('Server name (for example \'my custom server\')')); ?> :
        <input type="text" id="tileservername"><br/>
        <?php p($l->t('Server url (\'http://tile.server.org/cycle/{z}/{x}/{y}.png\')')); ?> :
        <input type="text" id="tileserverurl"><br/>
        <button id="addtileserver"><i class="fa fa-plus-circle" aria-hidden="true" style="color:green;"></i> <?php p($l->t('Add')); ?></button>
    </div>
    <br/>
    <div id="tileserverlist">
        <h2><?php p($l->t('Your servers')); ?> :</h2>
        <ul class="disclist">
<?php
if (count($_['tileservers']) > 0){
    foreach($_['tileservers'] as $name=>$url){
        echo '<li name="';
        p($name);
        echo '" title="';
        p($url);
        echo '">';
        p($name);
        echo '<button><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i> ';
        p($l->t('Delete'));
        echo '</button></li>';
    }
}
?>
        </ul>
    </div>
<br/>
<hr/>
<br/>
    <h3 class="sectiontitle"><?php p($l->t('Custom overlay servers')); ?></h3>
    <br/>
    <div id="overlayserveradd">
        <?php p($l->t('Server name (for example \'my custom server\')')); ?> :
        <input type="text" id="overlayservername"><br/>
        <?php p($l->t('Server url (\'http://overlay.server.org/cycle/{z}/{x}/{y}.png\')')); ?> :
        <input type="text" id="overlayserverurl"><br/>
        <button id="addoverlayserver"><i class="fa fa-plus-circle" aria-hidden="true" style="color:green;"></i> <?php p($l->t('Add')); ?></button>
    </div>
    <br/>
    <div id="overlayserverlist">
        <h2><?php p($l->t('Your servers')); ?> :</h2>
        <ul class="disclist">
<?php
if (count($_['overlayservers']) > 0){
    foreach($_['overlayservers'] as $name=>$url){
        echo '<li name="';
        p($name);
        echo '" title="';
        p($url);
        echo '">';
        p($name);
        echo '<button><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i> ';
        p($l->t('Delete'));
        echo '</button></li>';
    }
}
?>
        </ul>
    </div>

    <br/>
    <hr/>
    <br/>
    <h3 class="sectiontitle"><?php p($l->t('Clean files')); ?></h3>
    <button id="cleanall"><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i> <?php p($l->t('Delete all markers and geojson files')); ?></button>
    <button id="clean"><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i> <?php p($l->t('Delete markers and geojson files for existing gpx')); ?></button>
    <div id="clean_results"></div>
    <div id="deleting"><p>
        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
        <?php p($l->t('deleting')); ?></p>
    </div>
    <div id="linkdialog" style="display:none;" title="Public link">
        <label id="linklabel" for="linkinput"></label>
        <br/>
        <input id="linkinput" type="text"></input>
        <div id="linkhint">
        <?php p($l->t('Append "&track=all" to the link to display all tracks when public folder page loads.')); ?>
        </div>
    </div>
    <input id="tracknamecolor" type="text" style="display:none;"></input>
    <input id="colorinput" type="color" style="display:none;"></input>

</div>
<div class="sidebar-pane" id="help">
    <h1 class="sectiontitle"><?php p($l->t('About GpxPod')); ?></h1>
    <hr/><br/>
    <h3 class="sectiontitle"><?php p($l->t('Shortcuts')); ?> :</h3>
    <ul class="disclist">
        <li><b>&lt;</b> : <?php p($l->t('toggle sidebar')); ?></li>
        <li><b>!</b> : <?php p($l->t('toggle minimap')); ?></li>
    </ul>
    <br/><hr/><br/>
    <h3 class="sectiontitle"><?php p($l->t('Features')); ?> :</h3>
    <ul class="disclist">
        <li>View :
        <ul class="circlist">
        <li>Click on marker cluster to zoom in.</li>
        <li>Click on track line or track marker to show popup with track stats
        and a link to draw track elevation profile.</li>
        <li>In main sidebar tab, the table lists all track that fits into
        current map bounds. This table is kept up to date when you zoom or move.</li>
        <li>Sidebar table columns are sortable.</li>
        <li>In sidebar table and track popup, click on track links to download
        the GPX file.</li>
        <li>"Transparency" option : enable sidebar transparency when hover on
        table rows to display track overviews.</li>
        <li>"Display markers" option : hide all map markers. Sidebar table still
        lists available tracks in current map bounds.</li>
        <li>Auto popup : toggle popup opening when drawing a track</li>
        <li>Auto zoom : toggle zoom when changing folder or drawing a track</li>
        <li>Dynamic table : Always show all tracks if disabled. Otherwise
        , update the table when zooming or moving the map view.</li>
        <li>Track coloration : color each track segment depending on elevation or speed.</li>
        <li>Browser timezone detection.</li>
        <li>Manual timezone setting.</li>
        <li>Several criterias to list tracks in sidebar table</li>
        <li>Filter visible tracks by length, date, cumulative elevation gain.</li>
        <li>Add personnal custom tile servers.</li>
        </ul>
        </li>

        <li>Share :
        <ul class="circlist">
        <li>Share track : In sidebar table, [p] link near the track name is a public link which
        works only if the track (or one of its parent directories) is shared in
        "Files" app with public without password.</li>
        <li>Share folder : Near the selected folder, the [p] link is a public link to currently selected folder.
        This link will work only if the folder is shared in "Files" app with public without password.</li>
        </ul>
        </li>

        <li>Other :
        <ul class="circlist">
        <li>Ability to clean old files produced by old GpxPod versions.</li>
        <li>Pre-process tracks with SRTM.py (if installed and found
        on server's system) to correct elevations.
        This can be done on a single track (with a link in track popup) or on a whole folder (with scan type).</li>
        <li>Convert KML and TCX files to gpx if GpsBabel is found on server's system.</li>
        </ul>
        </li>

        <li>Many leaflet plugins are active :
            <ul class="circlist">
                <li>Markercluster</li>
                <li>Elevation (modified to display time when hover on graph)</li>
                <li>Sidebar-v2</li>
                <li>Control Geocoder (search in nominatim DB)</li>
                <li>Minimap (bottom-left corner of map)</li>
                <li>MousePosition</li>
            </ul>
        </li>
    </ul>

    <br/><hr/><br/>
    <h3 class="sectiontitle"><?php p($l->t('Documentation')); ?></h3>
    <a class="toplink" target="_blank" href="https://gitlab.com/eneiluj/gpxpod-oc/wikis/home">
    <i class="fa fa-gitlab" aria-hidden="true"></i>
    Project wiki
    </a>
    <br/>

    <br/><hr/><br/>
    <h3 class="sectiontitle"><?php p($l->t('Source management')); ?></h3>
    <ul class="disclist">
        <li><a class="toplink" target="_blank" href="https://gitlab.com/eneiluj/gpxpod-oc">
        <i class="fa fa-gitlab" aria-hidden="true"></i>
        Gitlab project main page</a></li>
        <li><a class="toplink" target="_blank" href="https://gitlab.com/eneiluj/gpxpod-oc/issues">
        <i class="fa fa-gitlab" aria-hidden="true"></i>
        Gitlab project issue tracker</a></li>
    </ul>

    <br/><hr/><br/>
    <h3 class="sectiontitle"><?php p($l->t('Authors')); ?> :</h3>
    <ul class="disclist">
        <li>Julien Veyssier</li>
        <li>Fritz Kleinschroth (german translation)</li>
    </ul>

</div>
</div>
</div>
<!-- ============= MAP DIV =============== -->
<div id="map" class="sidebar-map"></div>

