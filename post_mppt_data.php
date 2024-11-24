<?php
/*  Rui Santos
	Complete project details at
https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
*/
$servername = "localhost";
// REPLACE with your Database name
$dbname = "mpptSolar";
// REPLACE WITH YOU TABLE NAME
$dbtable = "apontamentos";
// REPLACE with Database user
$username = "pi";
// REPLACE with Database user password
$password = "raspberry";
// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9NicolasMatheus";
$api_key = $tensao = $corrente = $potencia = $passo = $counterEsp = $chipID = "";
// START - REMOVE AFTER TEST!
// echo "<br>MPPT SOLAR - NICOLAS E MATHEUS<br>";
// echo " api_key_value = " . $api_key_value . "<br>";
// echo " RECEIVED api_key = " . $api_key . "<br>";
// echo " RECEIVED CHIPID = 0x" . $chipID . "<br>";
// echo $_SERVER["REQUEST_METHOD"];
// END -- REMOVE AFTER TEST!!!
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
// echo " api_key_value = " . $api_key_value . "<br>";
    if($api_key == $api_key_value) {
        $tensao = test_input($_POST["tensao"]);
        $corrente = test_input($_POST["corrente"]);
        $potencia = test_input($_POST["potencia"]);
        $passo = test_input($_POST["passo"]);
		$counterEsp = test_input($_POST["counterEsp"]);
        $chipID = test_input($_POST["chipID"]);
// START - REMOVE AFTER TEST!
// echo " TENSAO = " . $tensao . " V" . "<br>";
// echo " CORRENTE = " . $corrente . " mA" . "<br>";
// echo " POTENCIA = " . $potencia . " W" . "<br>";
// echo " PASSO = " . $passo . " step" . "<br>";
// echo " CHIPID = 0x" . $chipID . "<br>";
// END -- REMOVE AFTER TEST!!!
// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn -> connect_error) {
            die("Connection failed: " . $conn -> connect_error);} 
        $sql = "INSERT INTO $dbtable (`tensao`, `corrente`, `potencia`, `passo`, `counterEsp`, `chipID`)
		VALUES ('" . $tensao . "','" . $corrente . "','" . $potencia . "','" . $passo . "','" . $counterEsp . "','" . $chipID . "')";
		if ($conn -> query($sql) === TRUE) {
//          echo "New record created successfully - NCLS & MATH";} 
            echo "0K";} 
        else {echo "Error: " . $sql . "<br>" . $conn -> error;}
        $conn -> close();}		// END -     if($api_key == $api_key_value)
else { echo "Wrong API Key provided - NCLS & MATH.";}
} else {echo "<br>BANCO DE DADOS - NICOLAS E MATHEUS - SEM INFORMACOES AINDA!!!<br>";}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;}
?>