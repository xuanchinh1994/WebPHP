<!DOCTYPE html>
<html>
<head>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
<h3>My Google Maps Demo</h3>
<div id="map"></div>
<script>
    function initMap() {
        var uluru = {lat: 10.837024, lng: 106.771690};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRxuSDEVtp2AKZ_X5av6xb-S3N9O3K9p8&callback=initMap">
</script>
</body>
</html>