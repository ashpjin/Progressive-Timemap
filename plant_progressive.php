<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Progressive Tweet Loading</title>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAdfDSMH-CZCXI21OHcdOBBhTo3sLfZh121E3haDr8a6443u2QgxSqovNL-fD1gltEH90wpIRAGerenA"
      type="text/javascript"></script>
    <script type="text/javascript" src="timemap-read-only/lib/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="timemap-read-only/lib/mxn/mxn.js?(google)"></script>
    <script type="text/javascript" src="timemap-read-only/lib/timeline-2.3.0.js"></script>
    <script src="timemap-read-only/src/timemap.js" type="text/javascript"></script>
    <script src="timemap-read-only/src/loaders/json.js" type="text/javascript"></script>
    <script src="timemap-read-only/src/loaders/progressive.js" type="text/javascript"></script>
	<script type="text/javascript">

var tm;
$(function() {
    tm = TimeMap.init({
        mapId: "map",               // Id of map div element (required)
        timelineId: "timeline",     // Id of timeline div element (required) 
        options: {
            eventIconPath: "timemap-read-only/images/"
        },
        datasets: [
            {
                title: "Progressive Plant Dataset",
                theme: "green",
                type: "progressive",
                options: {
                    // Data to be loaded in JSON from a remote URL
                    type: "json", 
                    // url with start/end placeholders
                    url: "http://www.cens.solidnetdns.com/~ashpjin/progressive/loader.php?start=[start]&end=[end]&callback=?",
                    start: "2009-10-15",
                    // lower cutoff date for data
                    dataMinDate: "2009-03-09",
                    // one week in milliseconds
                    interval: 604800000,   
                    // function to turn date into string appropriate for service
                    formatDate: function(d) {
                        return TimeMap.util.formatDate(d, 1);
                    }
                }
            }
        ],
        bandIntervals:[
		Timeline.DateTime.WEEK,
		Timeline.DateTime.MONTH
	]
    });
});
    </script>
    <link href="plantmap.css" type="text/css" rel="stylesheet"/>
  </head>

  <body>
    <div id="help">
    <h1>Progressive Plant Loading</h1>
    Attempting to use Progressive Loading to get points from the current/updating database instead of the static/non-updating one. Obviously, there are too many datapoints to load simultaneously.</div>
    <div id="timemap">
        <div id="timelinecontainer">
          <div id="timeline"></div>
        </div>
        <div id="mapcontainer">
          <div id="map"></div>
        </div>
    </div>
  </body>
</html>
