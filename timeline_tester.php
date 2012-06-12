  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Timeline TESTER</title>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAdfDSMH-CZCXI21OHcdOBBhTo3sLfZh121E3haDr8a6443u2QgxSqovNL-fD1gltEH90wpIRAGerenA" type="text/javascript"></script>
    <script type="text/javascript" src="timemap-read-only/lib/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="timemap-read-only/lib/mxn/mxn.js?(google)"></script>
    <script type="text/javascript" src="timemap-read-only/lib/timeline-1.2.js"></script>
    <script src="timemap-read-only/src/timemap.js" type="text/javascript"></script>
    <script type="text/javascript">

var tm;
$(function() {

    tm = TimeMap.init({
        mapId: "map",               // Id of map div element (required)
        timelineId: "timeline",     // Id of timeline div element (required)
        options: {
            mapType: "physical",
            eventIconPath: "timemap-read-only/images/",
        },
        datasets: [
            {
                id: "artists",
                title: "Artists",
                theme: "orange",
                // note that the lines below are now the preferred syntax
                type: "basic",
		options: {
                    items: [
                        {
                          "start" : "1449",
                          "point" : {
                              "lat" : 43.7717,
                              "lon" : 11.2536
                           },
			  "title" : "Someone important",
                          "options" : {
                            // set the full HTML for the info window
                            "infoHtml": "<div class='custominfostyle'><b>Domenico Ghirlandaio</b> was a visual artist of some sort.</div>"
                          }
                        },
                        {
                          "start" : "1452",
                          "point" : {
                              "lat" : 43.8166666667,
                              "lon" : 10.7666666667
                           },
                          "title" : "Leonardo da Vinci",
                          "options" : {
                            // load HTML from another file via AJAX
                            // Note that this may break in IE if you're running it with
                            // a local file, due to cross-site scripting restrictions
                            "infoUrl": "ajax_content.html",
                            "theme": "red",
			    "noEventLoad" : "true",
                          }
                        },
                        {
                          "start" : "1475",
                          "point" : {
                              "lat" : 43.6433,
                              "lon" : 11.9875
                           },
                          "title" : "Michelangelo",
                          "options" : {
                            // use the default title/description info window
                            "description": "Renaissance Man",
                            "theme": "yellow",
			    "noEventLoad" : "true"
                          }
                        }
                    ]
                }
            }
        ],
        bandIntervals: [
            Timeline.DateTime.DECADE, 
            Timeline.DateTime.CENTURY
        ]
    });
    // manipulate the timemap further here if you like
});
    </script>
    <link href="plantmap.css" type="text/css" rel="stylesheet"/>
    <style>
    div#timelinecontainer{ height: 300px; }
    div#mapcontainer{ height: 300px; }
    </style>
  </head>

  <body>
    <div id="help">
    <h1>Timeline Testing</h1>
    Attempting to reformat timeline.</div>
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
