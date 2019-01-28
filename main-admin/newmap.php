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
    $result=mysqli_query($conn,"SELECT * FROM bus");
   
     $longitude=array();
     $latitude=array();
     $i=0;

     if (mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_assoc($result)) {
            $longitude[$i]=$row['longitude'];
            $latitude[$i++]=$row['latitude'];

           
          }
      }

      // echo" value of i after query:".$i;
  
      ?>

      <?php
        $i=0;
        foreach($longitude as $lang){
          // echo"<br>value of i is:".$i;
          ?>

         <text  name="longitude_area" style="display:none"><?=$longitude[$i]?></text>
         <text name="latitude_area" style="display:none"><?=$latitude[$i++]?></text>


      <?php

        } 
      ?>
     

     <div id="map" style="height:800px"></div>

<!--      <script type="text/javascript">
    initialize();
       

       function initialize() {

    var myLatLng = { lat:28.3949, long:84.1240}
        myOptions = {
            zoom: 4,
            center: myLatLng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
            },
        map = new google.maps.Map( document.getElementById( 'map' ), myOptions ),
        marker = new google.maps.Marker( {position: myLatLng, map: map} );

    marker.setMap( map );
    // moveBus( map, marker );

}

function moveBus( map, marker ) {

    marker.setPosition( new google.maps.LatLng( 0, 0 ) );
    map.panTo( new google.maps.LatLng( 0, 0 ) );

};

     </script> -->
        <script>
   //var long = document.getElementById("long").textContent;
    // console.log("log recieved in front_end:"+long);

    
// Initialize and add the 

function initMap() {


setTimeout(3000);
  //get the area of the longitude and latitude form the html page.
  var longitudes = document.getElementsByName("longitude_area");
  var latitudes = document.getElementsByName("latitude_area");
  // The location of Uluru

 //  console.log("value form longitude_area array is:"+longitudes[0].textContent);
 //  // // console.clear();
  
var length = longitudes.length;
var i=0;

var map = new google.maps.Map(
  document.getElementById("map"), {zoom:17, center: uluru}
    );


// var uluru = {lat:27.45445454, long:85.3386692 };
//  var marker = new google.maps.Marker({position: uluru, map: map ,  icon: {
//                   path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
//                   scale: 5,
//                   strokeWeight:2,
//                   strokeColor:"#B40404"
//                },
          
//                draggable:true,});

//   marker.setPosition( new google.maps.LatLng( uluru.lat, uluru.long ) );



for(;i<length;i++){


 var htmlLongText= longitudes[i].textContent;
  htmlLongFloat =parseFloat(htmlLongText);
  console.log("parsed longitude:"+htmlLongFloat);

  var htmlLatText= latitudes[i].textContent;
  htmlLatFloat =parseFloat(htmlLatText);
  console.log("parsed latitude:"+htmlLatFloat);

  var uluru = {lat: htmlLatFloat, long: htmlLongFloat, lng:htmlLongFloat };

// var uluru = {lat:27.45945454+i/2, long:85.3336692+i/2 };
 var marker = new google.maps.Marker({position: uluru, map: map ,  icon: {
                  path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
                  scale: 10,
                  strokeWeight: 9 ,
                  strokeColor:"#B40404"
               },
          
               draggable:true,});

  marker.setPosition( new google.maps.LatLng( uluru.lat, uluru.lng ) );
  console.log("marker added to"+uluru.lng);
}




    map.panTo( new google.maps.LatLng( uluru.lat, uluru.long) );

}
  

    </script>
   <!--  Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function -->
   
    <script async defer

    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYZDQAJkA_MkxqF85q9REcoNxiq2cOptw&callback=initMap">
    </script>
  </body>


 <!-- AIzaSyD4RgqBkWbu7zboLi19HjXYQZ9uGVvJ5sk  -->
  </html>
