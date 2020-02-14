 lat = "";
 long = "";
 var Direccion;
 var BingMapsKey = 'waa0OVAIKFoFTxQhJmmz~LgnlIZ7aFnqZdryWOk-U1Q~An1_BTTeFUmx127gm-QIdAEfn_Oza3pCpPlAfrfje_aCqlKn96CCvK4R7SP7VveN';
 var map;

 function GetMap() {
     console.log("lat:", lat);
     console.log("long:", long);
     map = new Microsoft.Maps.Map('#myMap', {
         center: new Microsoft.Maps.Location(lat, long),
         mapTypeId: Microsoft.Maps.MapTypeId.road,
         zoom: 12
     });

     var center = map.getCenter();

     //Create an infobox that will render in the center of the map.
     var pin = new Microsoft.Maps.Pushpin(center, {
         icon: 'https://www.bingmapsportal.com/Content/images/poi_custom.png',
         anchor: new Microsoft.Maps.Point(12, 39),
         title: Direccion

     });

     //Add the pushpin to the map
     map.entities.push(pin);

     //Add your post map load code here.
 }

 function geocode(param, dir) {
     var query = param;
     Direccion = dir;
     console.log("busqueda", encodeURIComponent(query));
     var geocodeRequest = "http://dev.virtualearth.net/REST/v1/Locations?query=" + encodeURIComponent(query) + "&jsonp=GeocodeCallback&key=" + BingMapsKey;

     CallRestService(geocodeRequest, GeocodeCallback);


 }

 function GeocodeCallback(response) {
     var output = document.getElementById('direccion');

     if (response &&
         response.resourceSets &&
         response.resourceSets.length > 0 &&
         response.resourceSets[0].resources) {

         var results = response.resourceSets[0].resources;




         lat = results[0].point.coordinates[0];
         long = results[0].point.coordinates[1];

     } else {
         console.log("Fallo");
     }
 }

 function CallRestService(request) {
     var script = document.createElement("script");
     script.setAttribute("type", "text/javascript");
     script.setAttribute("src", request);
     document.body.appendChild(script);
 }