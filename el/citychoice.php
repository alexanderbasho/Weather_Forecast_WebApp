<?php
$mysqli = new mysqli('localhost', 'root', '', 'webapp');

$resultcountry = $mysqli->query("SELECT country FROM areas GROUP BY country");
$resultname= $mysqli -> query ("SELECT name FROM areas GROUP BY name ORDER BY name ASC ");

?>
<html lang ="el">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="citychoiceStylesheet.css">
  <title>Επιλογή πόλης για πρόβλεψη</title>
</head>
<body>
<nav class="navbar">
        <img class="logo" src="logo.png">
        <ul>
            <li><a href="home.html">Αρχική</a></li>
            <li><a class="active" href="citychoice.php">Πρόγνωση καιρού</a></li>
            <li><a href="about.html">Σχετικά με εμάς</a></li>
            <li><a href="contact.html">Επικοινωνία</a></li>
            <li><a href="../en/citychoice.php">Αλλαγή Γλώσσας</a></li>
        </ul>
    </nav>
<h2>Επίλεξε την περιοχή σου</h2>
<div class="main">
<div class="select1">
<form action="result.php" method="POST">
<select name = "country">
<option disabled>Επίλεξε τη χώρα σου</option>
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
  <option disabled>Επίλεξε την πόλη σου</option>
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
<button type="submit">Δείτε την πρόβλεψη καιρού</button>
</form>
</div>
</body>
</html>