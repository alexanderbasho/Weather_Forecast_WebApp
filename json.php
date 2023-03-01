<?php
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect, 'webapp');
$jsondata = file_get_contents('city.list.json');
$data = json_decode($jsondata, true);
foreach($data as $d_key => $d_val)
{              
    $id= $d_val['id'];
    $name = $d_val['name'];
    $country = $d_val['country'];  
    //Only Greece places    
    /*if($country ==="GR")
    {
        $query = "insert into areas (id, name, country) ". "values('$id', '$name','$country')";
        ini_set('max_execution_time', 1000);
        if(mysqli_query($connect, $query)){
            echo "Record added successfully.";
        } 
        else
        {
            echo "ERROR: Could not able to execute .$query " . mysqli_error($connect);
        }
    }*/

    //Only United Kingdom places
    if($country === "GB")
    {
        $query = "insert into areas (id, name, country) ". "values('$id', '$name','$country')";
        ini_set('max_execution_time', 1000);
        if(mysqli_query($connect, $query)){
            echo "Record added successfully.";
        } 
        else
        {
            echo "ERROR: Could not able to execute .$query " . mysqli_error($connect);
        }
    }
}
?>