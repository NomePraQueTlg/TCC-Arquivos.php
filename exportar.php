  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="./estilo.css" rel="stylesheet">
    <script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("exportCSV").addEventListener("click", function() {
        // Prepare the data for export
        var csvData = "Data,Hora, Tensao (V),Corrente (mA),Potencia (mW),Passo,counterEsp\n";
        var rows = document.querySelectorAll("table tr");

        for (var i = 1; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            for (var j = 0; j < cells.length; j++) {
                csvData += cells[j].innerText + ",";
            }
            csvData = csvData.slice(0, -1); // Remove the trailing comma
            csvData += "\n";
        }

        // Create a Blob and download the CSV file
        var blob = new Blob([csvData], { type: "text/csv;charset=utf-8;" });
        var link = document.createElement("a");
        var url = URL.createObjectURL(blob);
        link.setAttribute("href", url);
        link.setAttribute("download", "data.csv");
        link.style.visibility = "hidden";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });
});

</script>
          <form>
<input class="demobutton" type="button" value="Dashboard" onclick="window.location.href='http://10.0.0.220/mpptSolar/index.php'"/>
</form>
  </head>

  <body class="bg-light">
    <main class="mb-4">
      <header class="py-3 mb-4 border-bottom bg-white sticky-top">
        <div class="container d-flex flex-wrap justify-content-center text-center px-4">
          <h3>Banco de Dados</h3>
        </div>
      </header>
<form action="exportar.php" method="post">
            <label for="startDateTime">Data e Hora Inicial:</label>
            <input type="datetime-local" id="startDateTime" name="startDateTime">
            
            <label for="endDateTime">Data e Hora Final:</label>
            <input type="datetime-local" id="endDateTime" name="endDateTime">
            
            <input type="submit" value="Filtrar">
            <input type="button" value="Exportar CSV" id="exportCSV">
        </form>
      <?php
  echo "<style>";
echo "table {";
echo "    width: 100%;";
echo "    border-collapse: collapse;";
echo "}";
echo "th, td {";
echo "    border: 1px solid #ddd;";
echo "    padding: 8px;";
echo "}";
echo "th {";
echo "    background-color: #f2f2f2;";
echo "}";
echo "tr:nth-child(even) {";
echo "    background-color: #f2f2f2;";
echo "}";
echo "</style>";

$servername = "localhost";
$dbname = "mpptSolar";
$username = "pi";
$password = "raspberry";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $startDateTime = $_POST["startDateTime"];
    $endDateTime = $_POST["endDateTime"];

    $sql = "SELECT 
            id,
            DATE(timeStamp) AS data,
            TIME(timeStamp) AS hora,
            tensao,
            corrente,
            potencia,
            passo,
            counterEsp
        FROM apontamentos 
		WHERE timeStamp >= '$startDateTime' AND timeStamp <= '$endDateTime' 
        ORDER BY id DESC;";


    // Execute a consulta e exiba os resultados como antes
}
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<h1>Registros Encontrados</h1>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Data</th>";
	echo "<th>Hora</th>";
    echo "<th>Tensao (V)</th>";
    echo "<th>Corrente (mA)</th>";
 	echo "<th>Potencia (mW)</th>";
 	echo "<th>Passo</th>";
 	echo "<th>CounterEsp</th>";
    echo "</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["data"] . "</td>";
    echo "<td>" . $row["hora"] . "</td>";
    echo "<td>" . $row["tensao"] . "</td>";
    echo "<td>" . $row["corrente"] . "</td>";
    echo "<td>" . $row["potencia"] . "</td>";
    echo "<td>" . $row["passo"] . "</td>";
    echo "<td>" . $row["counterEsp"] . "</td>";
    echo "</tr>";
}


echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
    </main>
  </body>

  </html>