<?php

/*
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
  
  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.
  
  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
*/
include "mysql_settings.php"; //for a specific MySQL port, one needs to modify bit
$servername = "$mysql_hostname";
$dbname = "$mysql_database";
$username = "$mysql_username";
$password = "$mysql_password";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";   // user1 13str
$api_key_value2 = "6a3acWWc6c8QC";   // user2 13str

$api_key = $value1 = $value2 = $value3 = $value4 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $value0 = test_input($_POST["a0"]);
        $value1 = test_input($_POST["a1"]);
        $value2 = test_input($_POST["a2"]);
        $value3 = test_input($_POST["a3"]);
        $value4 = test_input($_POST["a4"]);
        $value5 = test_input($_POST["a5"]);
        $value6 = test_input($_POST["a6"]);
        $value7 = test_input($_POST["a7"]);
        $value8 = test_input($_POST["a8"]);
        $value9 = test_input($_POST["a9"]);
        $value10 = test_input($_POST["a10"]);
        $value11 = test_input($_POST["a11"]);
        $value12 = test_input($_POST["a12"]);
        $value13 = test_input($_POST["a13"]);
        $value14 = test_input($_POST["a14"]);
        $value15 = test_input($_POST["a15"]);
        $value16 = test_input($_POST["a16"]);
        $value17 = test_input($_POST["a17"]);
        $value18 = test_input($_POST["a18"]);
        $value19 = test_input($_POST["a19"]);
        $value20 = test_input($_POST["a20"]);
        $value21 = test_input($_POST["a21"]);
        $value22 = test_input($_POST["a22"]);
        $value23 = test_input($_POST["a23"]);
        $value24 = test_input($_POST["a24"]);
        $value25 = test_input($_POST["a25"]);
        $value26 = test_input($_POST["a26"]);
        $value27 = test_input($_POST["a27"]);
        $value28 = test_input($_POST["a28"]);
        $value29 = test_input($_POST["a29"]);
        $value30 = test_input($_POST["a30"]);
        $value31 = test_input($_POST["a31"]);
        $value32 = test_input($_POST["a32"]);
        $value33 = test_input($_POST["a33"]);
        $value34 = test_input($_POST["a34"]);
        $value35 = test_input($_POST["a35"]);
        $value36 = test_input($_POST["a36"]);
        $value37 = test_input($_POST["a37"]);
        $value38 = test_input($_POST["a38"]);
        $value39 = test_input($_POST["a39"]);
        $value40 = test_input($_POST["a40"]);
        $value41 = test_input($_POST["a41"]);
        $value42 = test_input($_POST["a42"]);
        $value43 = test_input($_POST["a43"]);
        $value44 = test_input($_POST["a44"]);
        $value45 = test_input($_POST["a45"]);
        $value46 = test_input($_POST["a46"]);
        $value47 = test_input($_POST["a47"]);
        $value48 = test_input($_POST["a48"]);
        $value49 = test_input($_POST["a49"]);
        $value50 = test_input($_POST["a50"]);
        $value51 = test_input($_POST["a51"]);
        $value52 = test_input($_POST["a52"]);
        $value53 = test_input($_POST["a53"]);
        $value54 = test_input($_POST["a54"]);
        $value55 = test_input($_POST["a55"]);
        $value56 = test_input($_POST["a56"]);
        $value57 = test_input($_POST["a57"]);
        $value58 = test_input($_POST["a58"]);
        $value59 = test_input($_POST["a59"]);
        $value60 = test_input($_POST["a60"]);
        $value61 = test_input($_POST["a61"]);
        $value62 = test_input($_POST["a62"]);
        $value63 = test_input($_POST["a63"]);
        $uniqueID = test_input($_POST["unique_no"]);
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "INSERT INTO amg8833 (reg_date, unique_no, a0, a1, a2, a3, a4, a5, a6, a7, a8, a9,
		a10, a11, a12, a13, a14, a15, a16, a17, a18, a19,
		a20, a21, a22, a23, a24, a25, a26, a27, a28, a29,
		a30, a31, a32, a33, a34, a35, a36, a37, a38, a39,
		a40, a41, a42, a43, a44, a45, a46, a47, a48, a49,
		a50, a51, a52, a53, a54, a55, a56, a57, a58, a59,
		a60, a61, a62, a63, my_note) 
		VALUES (UNIX_TIMESTAMP(), '".$uniqueID."', '".$value0."', '".$value1."', '".$value2."', '".$value3."', '".$value4."', '".$value5."', '".$value6."', '".$value7."', '".$value8."', '".$value9."',
		'".$value10."', '".$value11."', '".$value12."', '".$value13."', '".$value14."', '".$value15."', '".$value16."', '".$value17."', '".$value18."', '".$value19."',
		'".$value20."', '".$value21."', '".$value22."', '".$value23."', '".$value24."', '".$value25."', '".$value26."', '".$value27."', '".$value28."', '".$value29."',
		'".$value30."', '".$value31."', '".$value32."', '".$value33."', '".$value34."', '".$value35."', '".$value36."', '".$value37."', '".$value38."', '".$value39."',
		'".$value40."', '".$value41."', '".$value42."', '".$value43."', '".$value44."', '".$value45."', '".$value46."', '".$value47."', '".$value48."', '".$value49."',
		'".$value50."', '".$value51."', '".$value52."', '".$value53."', '".$value54."', '".$value55."', '".$value56."', '".$value57."', '".$value58."', '".$value59."',
		'".$value60."', '".$value61."', '".$value62."', '".$value63."', '".$api_key."')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
   
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
echo "<table>";
    foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }
echo "</table><BR>";
?>

