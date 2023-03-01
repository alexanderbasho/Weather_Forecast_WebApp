<?php
$mysqli = new mysqli('localhost', 'root', '', 'webapp');

$resultcountry = $mysqli->query("SELECT country FROM areas GROUP BY country");
$resultname= $mysqli -> query ("SELECT name FROM areas GROUP BY name ORDER BY name ASC ");

?>
<html>
<head>
  <link rel="stylesheet" href="citychoiceStylesheet.css">
  <title>City Choice for Forcast</title>
</head>
<body>
<nav class="navbar">
        <img class="logo" src="logo.png">
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a class="active" href="citychoice.php">Forecast</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="contact.html">Contact Us</a></li>
            <li><a href="../el/citychoice.php">Change Language</a></li>
        </ul>
    </nav>
<h2>Choose Your Area</h2>
<div class="main">
<div class="select1">
<form action="result.php" method="POST">
<select name = "country">
<option disabled>Choose Your Country</option>
  <?php
  while($rows  = $resultcountry->fetch_assoc())
  {
    $country = $rows['country'];
    echo "<option value='$country''>$country</option>";
  }
  ?>
</select>
</div>
<?php
/*if($country==="GR")
{
?>
  <select name = "name">
  <?php
  while($rows  = $resultname->fetch_assoc())
    {
      foreach ($rows as $row) {
        $color == $color1 ? $color = $color2 : $color = $color1;
        $name = $rows['name'];
        echo "<option value='$name' style='background:$color;'>$name</option>";
      }
        }
        ?>
  </select>
<?php
}*/
?>
<br>
<div class="select1">
  <select name = "name">
  <option disabled>Choose Your City</option>
  <?php
  while($rows  = $resultname->fetch_assoc())
    {
      foreach ($rows as $row) {
        $name = $rows['name'];
        echo "<option value='$name''>$name</option>";
      }
        }
        ?>
  </select>
</div>
<br>
<button type="submit">Find Your Forecast</button>
</form>
</div>
</body>
</html>