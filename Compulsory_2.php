<?php



echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<style>";
echo "body { background-color: #f2f2f2; }"; // Set the background color to grayish
echo ".cool-table { background-color: #fff; border: 2px solid #ccc; border-radius: 5px; padding: 10px; margin-right: 10px; }";
echo "table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }"; // Added margin-bottom
echo "table, th, td { border: 2px solid #ddd; }"; // Increased border thickness
echo "th, td { padding: 10px; text-align: left; }";
echo "th { background-color: #333; color: #fff; }";
echo "</style>";
echo "</head>";
echo "<body>";

$Host = 'localhost';
$User = 'root';
$Password = '';
$Database = 'compulsory2';

$mysql = mysqli_connect($Host, $User, $Password, $Database);

if (mysqli_connect_errno()) {
    printf("ingen forbindelse : %s", mysqli_connect_error());
    exit();
} else {
    // printf("alt ok!");
}

echo '<div style="display: flex;">';

// First table
$setning  = "SELECT * FROM playerdata";
//  echo $setning;
$resultat = mysqli_query($mysql, $setning);
$rad = mysqli_fetch_assoc($resultat);
if ($rad == 0)
    echo '<meta http-equiv="refresh" content="2 ; URL=index.php">';
echo "<p>";
echo '<table border="1" class="cool-table">'; // Added class attribute
echo '<caption><h3>Player data</h3></caption>';
echo '<tr><th>PlayerID</th><th>PlayerName</th><th>PlayerRank</th><th>Banned</th><th>TempBans</th></tr>';
do {
    echo '<tr>
        <td>' . $rad['PlayerID'] . '</td>
        <td>' . $rad['PlayerName'] . '</td>
        <td>' . $rad['PlayerRank'] . '</td>
        <td>' . $rad['Banned'] . '</td>
        <td>' . $rad['TempBans'] . '</td>
        </tr>';
} while ($rad = mysqli_fetch_assoc($resultat));
echo '</table>';

// Second table
$setning  = "SELECT * FROM items";
//  echo $setning;
$resultat = mysqli_query($mysql, $setning);
$rad = mysqli_fetch_assoc($resultat);
if ($rad == 0)
    echo '<meta http-equiv="refresh" content="2 ; URL=index.php">';
echo "<p>";
echo '<table border="1" class="cool-table">'; // Added class attribute

echo '<caption><h3> Items </h3></caption>';
echo '<tr><th>ItemNr</th><th>Price</th><th>Item</th><th>Sold</th><th>Profit</th></tr>';
do {
    echo '<tr>
        <td>' . $rad['ItemNr'] . '</td>
        <td>' . $rad['Price'] . '</td>
        <td>' . $rad['Item'] . '</td>
        <td>' . $rad['Sold'] . '</td>
        <td>' . $rad['Profit'] . '</td>
        </tr>';
} while ($rad = mysqli_fetch_assoc($resultat));
echo '</table>';

// Third Table
$setning  = "select * from transaction";
//  echo $setning;
$resultat = mysqli_query($mysql, $setning);
$rad = mysqli_fetch_assoc($resultat);
if ($rad == 0)
    echo '<meta http-equiv="refresh" content="2 ; URL=index.php">';
echo "<p>";
echo '<table border="1" class="cool-table">'; // Added class attribute

echo '<caption><h3> Transactions </h3></caption>';
echo '<tr><th>PlayerID</th><th>ItemNr</th><th>Price</th><th>OrderNr</th><th>Date</th></tr>';
do {
    echo '<tr>
        <td>' . $rad['PlayerID'] . '</td>
        <td>' . $rad['ItemNr'] . '</td>
        <td>' . $rad['Price'] . '</td>
        <td>' . $rad['OrderNr'] . '</td>
        <td>' . $rad['Date'] . '</td>
        </tr>';
} while ($rad = mysqli_fetch_assoc($resultat));
echo '</table>';

echo '</div>';

echo "</body>";
echo "</html>";
?>
