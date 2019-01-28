<?php include '../partials/header.php' ?>
<html>
  <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
    </head>
<body>

   <?php 
   // to retrieve data from table
    
    $result=mysqli_query($conn,"SELECT log,lat FROM bus");
    ?>
    <?php
   
      while ($res = mysqli_fetch_assoc($result)) {?>
         
      <text id="lat">?= $res['log']?></text>
      <text id="long">$res['lat']</text>
      <?php
  }
      ?>

     <div id="map"></div>
    <script>
    var long = document.getElementById("long").textContent;
    console.log("log recieved in front_end:"+long);
    
// Initialize and add the map
function initMap() {

  // The location of Uluru
  // console.clear();
   var htmlLatText= document.getElementById("long").textContent;
   htmlLatFloat =parseFloat(htmlLatText);
    console.log("log recieved in front_end:"+htmlLatText);

   var htmlLongText= document.getElementById("long").textContent;
   htmlLongFloat =parseFloat(htmlLongText);
    console.log("log recieved in front_end:"+htmlLongText);


  var uluru = {lat: htmlLatFloat, lng: htmlLongFloat };

  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById("map"), {zoom: 12, center: uluru});
 
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map ,  icon: {
                  path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
                  scale: 5,
                  strokeWeight:2,
                  strokeColor:"#B40404"
               },
          
               draggable:true,});
 
 // var marker=new google.Marker<i class="material-icons">({position: uluru, map: map})

}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer

    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4RgqBkWbu7zboLi19HjXYQZ9uGVvJ5sk&callback=initMap">
    </script>
  </body>
  </html>
