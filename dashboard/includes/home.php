<hr class="style-four">
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12" id="gas">
        <div class="info-box">
            <span class="info-box-icon bg-green"><span class="glyphicon glyphicon-leaf" aria-hidden="true"></span></span>
            <div class="info-box-content">
                <span class="info-box-text text-muted">SMOKE/GAS</span>
                <span id="smokeSpan" class="info-box-number" ></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-6 col-sm-6 col-xs-12" id="light">
        <div class="info-box">
            <span class="info-box-icon bg-orange"><span class="glyphicon glyphicon-adjust" aria-hidden="true"></span></span></span>
            <div class="info-box-content">
                <span class="info-box-text text-muted">LIGHT</span>
                <span id="lightSpan" class="info-box-number"></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
</div>
<script>
    function get_smoke_element() {
        $.post("ajax/smoke/get_smoke_1.php", function (data) {
            document.getElementById("smokeSpan").innerText = data
        });
    }
    setInterval(get_smoke_element, 5000);
    function get_light_element() {
        $.post("ajax/light/get_light_1.php", function (data) {
            document.getElementById("lightSpan").innerText = data
        });
    }
    setInterval(get_light_element, 5000);
</script>
<script>
    function formatDate(date) {
        var day = date.getDate();
        var monthIndex = date.getMonth();
        var year = date.getFullYear();

        return day + '/' + (monthIndex + 1) + '/' + year;
    }
</script>

<hr class="style-four">
<div class="row">
    <div class="col-md-3 col-md-3 col-sm-3">
        <div id="tempGauge" class="gauge float-right"></div>
    </div>
    <?php
    // GET LAST TEMP
    $query = "SELECT value FROM temperature_1 ORDER BY ID DESC LIMIT 1;";
    $result = mysqli_query($con, $query);
    $result = mysqli_fetch_assoc($result);
    $result = $result['value'];
    ?>
    <script>
        var temp = 0;
        var temps_data = [];
        function get_temp_element_1() {
            $.post("ajax/temp_1/get_temp.php?last=true", function (data) {
                temp = data;
            });
        }

        function draw_temp_graph_1() {
            var tempGauge = new JustGage({
                id: "tempGauge",
                value:  <?php if (isset($result)) echo $result; else echo 0; ?>,
                min: 0,
                max: 50,
                title: "Live Temperature",
                label: "Temp",
                gaugeWidthScale: 0.5
            });

            setInterval(function () {
                tempGauge.refresh(temp);
            }, 5000);
        }
        setInterval(get_temp_element_1, 10000);
    </script>

    <div class="col-md-3 col-md-3 col-sm-3">
        <div class="box  box-stat">
            <div class="box-body">
                <div style="display: block;">
                    <h4>
                        <small class="pull-right"> Statistic</small>
                    </h4>
                    <table class="table table-condensed">
                        <tbody>
                        <tr>
                            <td><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> &nbsp;Max</td>
                            <td id="max_temp"></td>
                            <td id="temp_max_time"></td>
                        </tr>
                        <tr>
                            <td><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span> &nbsp;Min</td>
                            <td id="min_temp"></td>
                            <td id="temp_min_time"></td>
                        </tr>
                        <tr>
                            <td><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> &nbsp;Average</td>
                            <td id="ave_temp"></td>
                            <td>Today</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-md-6 col-sm-6">
        <div class="row">
            <div style="width:100%; padding-left: 20px; padding-right: 20px;">
                <div>
                    <canvas id="canvas-temp" height="75px"></canvas>
                </div>
            </div>

            <script>
                var today = new Date();
                var firstDay = new Date();
                firstDay.setDate(today.getDate() - 7);

                function get_temps_data_1() {
                    temps_data = [];
                    $.post("ajax/temp_1/get_avg_temp.php", function (data) {
                        temps_data = JSON.parse(data);
                        var tempChartData = {
                            labels: [formatDate(firstDay), "", "", "", "", "", formatDate(today)],
                            datasets: [
                                {
                                    label: "My Second dataset",
                                    fillColor: "rgba(151,187,205,0.2)",
                                    strokeColor: "rgba(151,187,205,1)",
                                    pointColor: "rgba(151,187,205,1)",
                                    pointStrokeColor: "#fff",
                                    pointHighlightFill: "#fff",
                                    pointHighlightStroke: "rgba(151,187,205,1)",
                                    data: temps_data
                                }
                            ]
                        }
                        var tempCtx = document.getElementById("canvas-temp").getContext("2d");
                        new Chart(tempCtx).Line(tempChartData, {
                            responsive: true
                        });
                    });
                }
            </script>
        </div>
    </div>
</div>

<script>
    function get_day_temp_stat_1() {
        $.ajax({
            url: 'ajax/temp_1/get_day_stat.php',
            type: 'POST',
            data: {name: 'test'},
            dataType: 'html',
            success: function (data) {
                //data string format
                //min,min_time,max,temp_max_time,average
                var vals = data.split(",");
                document.getElementById("min_temp").innerHTML = vals[0] + "&deg c";
                document.getElementById("temp_min_time").innerHTML = vals[1];
                document.getElementById("max_temp").innerHTML = vals[2] + "&deg c";
                document.getElementById("temp_max_time").innerHTML = vals[3];
                document.getElementById("ave_temp").innerHTML = vals[4] + "&deg c";
            }, error: function (xhr, ajaxOptions, thrownError) {
                console.log("ERROR:" + xhr.responseText + " - " + thrownError);
            }
        });
    }


    // Execute every 5 seconds
    window.setInterval(get_day_temp_stat_1, 1000);
</script>

<hr class="style-four">
<div class="row">
    <div class="col-md-3 col-md-3 col-sm-3">
        <div id="humGauge" class="gauge float-right"></div>
    </div>
    <?php
    // GET LAST HUMIDITY
    $query = "SELECT value FROM humidity_1 ORDER BY ID DESC LIMIT 1;";
    $result = mysqli_query($con, $query);
    $result = mysqli_fetch_assoc($result);
    $result = $result['value'];
    ?>
    <script>
        var humidity = 0;
        function get_hum_element_1() {
            $.post("ajax/hum_1/get_hum.php?last=true", function (data) {
                humidity = data;
            });
        }

        function draw_hum_graph_1() {
            var humGauge = new JustGage({
                id: "humGauge",
                value: <?php if (isset($result)) echo $result; else echo 0; ?>,
                min: 20,
                max: 95,
                title: "Live Humidity",
                label: "%",
                gaugeWidthScale: 0.5
            });

            setInterval(function () {
                humGauge.refresh(humidity);
            }, 5000);
        }
        setInterval(get_hum_element_1, 10000);
    </script>

    <div class="col-md-3 col-md-3 col-sm-3">
        <div class="box  box-stat">
            <div class="box-body">
                <div style="display: block;">
                    <h4>
                        <small class="pull-right"> Statistic</small>
                    </h4>
                    <table class="table table-condensed">
                        <tbody>
                        <tr>
                            <td><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> &nbsp;Max</td>
                            <td id="max_hum"></td>
                            <td id="hum_max_time"></td>
                        </tr>
                        <tr>
                            <td><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span> &nbsp;Min</td>
                            <td id="min_hum"></td>
                            <td id="hum_min_time"></td>
                        </tr>
                        <tr>
                            <td><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> &nbsp;Average</td>
                            <td id="ave_hum"></td>
                            <td>Today</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-md-6 col-sm-6">
        <div class="row">
            <div style="width:100%; padding-left: 20px; padding-right: 20px;">
                <div>
                    <canvas id="canvas-hum" height="75px"></canvas>
                </div>
            </div>

            <script>
                var today = new Date();
                var firstDay = new Date();
                firstDay.setDate(today.getDate() - 6);
                function get_hum_data_1() {
                    hum_data = [];
                    $.post("ajax/hum_1/get_avg_hum.php", function (data) {
                        hum_data = JSON.parse(data);
                        var humChartData = {
                            labels: [formatDate(firstDay), "", "", "", "", "", formatDate(today)],
                            datasets: [
                                {
                                    label: "My Second dataset",
                                    fillColor: "rgba(151,187,205,0.2)",
                                    strokeColor: "rgba(151,187,205,1)",
                                    pointColor: "rgba(151,187,205,1)",
                                    pointStrokeColor: "#fff",
                                    pointHighlightFill: "#fff",
                                    pointHighlightStroke: "rgba(151,187,205,1)",
                                    data: hum_data
                                }
                            ]
                        }
                        var humCtx = document.getElementById("canvas-hum").getContext("2d");
                        new Chart(humCtx).Line(humChartData, {
                            responsive: true
                        });
                    });
                }
            </script>
        </div>
    </div>
</div>


<hr class="style-four">

<div class="spacer"></div>

<script>
    function get_day_hum_stat_1() {
        $.ajax({
            url: 'ajax/hum_1/get_day_stat.php',
            type: 'POST',
            data: {name: 'test'},
            dataType: 'html',
            success: function (data) {
                //data string format
                //min,hum_min_time,max,hum_max_time,average
                var vals = data.split(",");
                document.getElementById("min_hum").innerHTML = vals[0] + "%";
                document.getElementById("hum_min_time").innerHTML = vals[1];
                document.getElementById("max_hum").innerHTML = vals[2] + "%";
                document.getElementById("hum_max_time").innerHTML = vals[3];
                document.getElementById("ave_hum").innerHTML = vals[4] + "%";
            }, error: function (xhr, ajaxOptions, thrownError) {
                console.log("ERROR:" + xhr.responseText + " - " + thrownError);
            }
        });
    }


    // Execute every 5 seconds
    window.setInterval(get_day_hum_stat_1, 1000);
</script>

<script>
    window.onload = function () {
        get_hum_element_1();
        draw_hum_graph_1();
        get_day_hum_stat_1();
        get_temp_element_1();
        draw_temp_graph_1();
        get_day_temp_stat_1();
        get_temps_data_1();
        get_hum_data_1();
        get_light_element();
        get_smoke_element();
        get_sw1_element();
    };
</script>

<!--<!--<hr class="style-four">-->-->
<!--<div class="row">-->
<!--    <div class="container-fluid">-->
<!--        <div class="col-lg-12">-->
<!--            <div class="row">-->
<!--                <div class="col-lg-10">-->
<!--                    <table class="table table-condensed">-->
<!--                        <tbody>-->
<!--                        <tr>-->
<!--                            <td class="vert-align">Central Room</td>-->
<!--                            <td>-->
<!--                                <input id="switch-1" type="checkbox" onchange=handleSw1(this)>-->
<!--                            </td>-->
<!--                            <td class="vert-align">Bed Room</td>-->
<!--                            <td>-->
<!--                                <input id="switch-2" type="checkbox" onchange=handleSw2(this)>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        </tbody>-->
<!--                    </table>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--<script>-->
<!--    function get_sw1_element() {-->
<!--        $.post("ajax/switch/get_sw_1.php", function (data) {-->
<!--//            console.log(data);-->
<!--            if (data == 1){-->
<!--                document.getElementById("switch-1").checked = true-->
<!--            }-->
<!--            else {-->
<!--                document.getElementById("switch-1").checked = false-->
<!--            }-->
<!--//                console.log(data);-->
<!--        });-->
<!--    }-->
<!--    setInterval(get_sw1_element, 5000);-->
<!--    function handleSw1(obj){-->
<!--        $.post("ajax/switch/switch_1.php?checked=" + obj.checked, function (data) {-->
<!--//            console.log(data);-->
<!--        });-->
<!--    }-->
<!--    function handleSw2(obj){-->
<!--        $.post("ajax/switch/switch_2.php?checked=" + obj.checked, function (data) {-->
<!--//            console.log(data);-->
<!--        });-->
<!--    }-->
<!--</script>-->
