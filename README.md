# GpxPod owncloud/nextcloud application

This app's purpose is to display gpx, kml and tcx files collections,
view elevation profiles and tracks stats, filter tracks,
 color tracks by speed, slope, elevation and compare divergent parts of similar tracks.

It works with gpx/kml/tcx files anywhere in your files, files shared with you, files in folders shared with you.
kml and tcx files will be displayed only if GpsBabel is found on the server system.

Elevations can be corrected for entire folders or specific track if SRTM.py (gpxelevations) is found.

Personal map tile servers can be added.

It works with encrypted data folder (server side encryption).

A public link pointing to a specific track can be shared if the corresponding gpx file is already shared by public link.

!!! GpxPod now uses the owncloud database to store meta-information. If you want to get rid of the .geojson, .geojson.colored and .markers produced by previous versions, there are two buttons at the bottom of the "Help" tab in user interface. !!!

GpxPod proudly uses Leaflet with lots of plugins to display the map.

This app is tested under Owncloud 9.0 with Firefox and Chromium.
This app is under development.

Link to Owncloud application website : https://apps.owncloud.com/content/show.php/GpxPod?content=174248

## Install

No special installation instruction except :
!! Server needs python2.x or 3.x "gpxpy" and "geojson" module to work !!
They may be installed with pip.

For example, on debian-like systems :

```
sudo apt-get install python-pip
sudo pip install gpxpy geojson
```

Then put this repo in the apps folder to install GpxPod :

```
cd /path/to/owncloud/apps
git checkout https://gitlab.com/eneiluj/gpxpod-oc.git gpxpod
```

## Known issues

* bad management of file names including simple or double quotes
* _WARNING_, kml conversion will NOT work with recent kml files using the proprietary "gx:track" extension tag.

Any feedback will be appreciated.
