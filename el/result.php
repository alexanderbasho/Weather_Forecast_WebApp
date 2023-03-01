<?php
$apiKey = "fdd18799953f7ab9985ce812701426ce";
$city = $_POST['name'];
$country = $_POST['country'];
if(empty($country))
{
    $country = "GB";
}
if(empty($city))
{
    $city = "London";
}
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&lang=en&units=metric&APPID=".$apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response);
$currentTime = time();
?>

<!doctype html>
<html>
<head>
<title>Αποτελέσματα πρόγνωσης καιρού Basho</title>

<style>
body {
    font-family: Arial;
    font-size: 0.95em;
    color: black;
    background: url(resultbg.jpg) no-repeat;
    background-size: cover;
    text-align:center;
}

.report-container {
    border: white 1px solid;
    padding: 20px 40px 40px 40px;
    border-radius: 2px;
    width: 550px;
    background-color: white;
    box-shadow: 0 0 20px 10px white;
    margin-top: 15%;
    margin-left: 30%;
    border-radius:10px;
}

.weather-icon {
    vertical-align: middle;
    margin-right: 20px;
}

.weather-forecast {
    font-size: 1.2em;
    font-weight: bold;
    margin: 20px 0px;
    color: red;
}

span.min-temperature {
    margin-left: 15px;
    color: blue;
}

.time {
    line-height: 25px;
}
.navbar{
	position: fixed;
	height: 80px;
	width: 100%;
	top: 0;
	left: 0;
	background: rgba(0,0,0,0.4);
}
.navbar .logo {
    width: 200px;
    height: auto;
    padding: 0px 40px;
    margin-top: -60px;
    margin-right: 600px;
}
.navbar ul{
	float: right;
    margin-right: 20px;
    margin: 0px;
}
.navbar ul li{
	list-style: none;
	margin: 0 8px;
	display: inline-block;
	line-height: 80px;
}
.navbar ul li a{
	font-size: 20px;
	font-family: Arial, Helvetica, sans-serif;
	color: white;
	padding: 6px 13px;
    text-decoration: none;
}
.navbar ul li a.active{
	background: linear-gradient(to right,#64b3f4,#c2e59c);
	border-radius: 2px;
}
.navbar ul li a:hover{
	background: linear-gradient(to right,#c2e59c,#64b3f4);
	border-radius: 2px;
}
</style>

</head>
<body>
<nav class="navbar">
        <img class="logo" src="logo.png">
        <ul>
            <li><a href="home.html">Αρχική</a></li>
            <li><a class="active" href="citychoice.php">Πρόγνωση καιρού</a></li>
            <li><a href="about.html">Σχετικά με εμάς</a></li>
            <li><a href="contact.html">Επικοινωνία</a></li>
        </ul>
    </nav>
    <div class="report-container">
        <h2><?php echo $data->name; ?> Κατάσταση καιρού</h2>
        <div class="time">
            <div><?php echo date("l g:i a", $currentTime); ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($data->weather[0]->description); ?></div>
        </div>
        <div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon" /> <?php echo $data->main->temp_max; ?>&deg;C<span
                class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;C</span>
        </div>
        <div class="time">
            <div>Υγρασία: <?php echo $data->main->humidity; ?> %</div>
            <div>Άνεμος: <?php echo $data->wind->speed; ?> km/h</div>
            <p id="demo"></p>
                <script>
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        myFunction(this);
                    }
                };
                xhttp.open("GET", "https://api.hostip.info/", true);
                xhttp.send();

                function myFunction(xml) {
                    var xmlDoc = xml.responseXML;
                    var x = xmlDoc.getElementsByTagName('ip')[0];
                    var y = x.childNodes[0];
                    document.getElementById("demo").innerHTML ="Η διεύθυνση IP σου: " + y.nodeValue; 
                }
                </script>
        </div>
    </div>


</body>
</html>