<!DOCTYPE html>
<html>
<head>
    <style>
        #map {
            height: 450px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
<!--        <div class="col-lg-12">-->
<!--            <section class="content-header">-->
<!--                <h1>SMARTCUBE LOCATION</h1>-->
<!--            </section>-->
<!---->
<!--        </div>-->
        <div id="map"></div>
    </div>


<script>
    window.onload = function () {
        initMap();
    };
</script>
<script>
    var kinhdo;
    var vido;
    function initMap() {
        $.ajax({
            url: 'ajax/get_maps.php',
            type: 'POST',
//            data: {name: 'test'},
            dataType: 'html',
            success: function (data) {
                var vals = data.split(",");
                kinhdo = parseFloat( vals[0]);
                vido = parseFloat(vals[1]);
            }, error: function (xhr, ajaxOptions, thrownError) {
                console.log("ERROR:" + xhr.responseText + " - " + thrownError);
            }
        });

//        console.log(kinhdo);
//        console.log(vido);
        var uluru = {lat: kinhdo, lng: vido};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });

    }
    window.setInterval(initMap, 5000);
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRxuSDEVtp2AKZ_X5av6xb-S3N9O3K9p8&callback=initMap">
</script>
</body>
</html>