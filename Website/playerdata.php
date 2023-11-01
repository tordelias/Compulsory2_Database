<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="menu.css">

    <style>
        body {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .cool-table {
            background-color: #fff;
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px auto;
            max-width: 80%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 2px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }
    </style>    
</head>

<div class="menu">
        <ul>
            <li><a href="index.php">MainMenu</a></li>
            <li><a href="playerdata.php">Player Data</a></li>
            <li><a href="items.php">Items</a></li>
            <li><a href="transaction.php">Transactions</a></li>
            <li><a href="logininfo.php">Login Info</a></li>
            <li><a href="logdata.php">Log Data</a></li>
        </ul>
    </div>
    <button type="button" onclick="history.back();"><</button>
<body>
    <h1>Magic&Steel</h1>
    <form method="post">
   Enter PlayerID <input name="name" type="number">
    <input type="submit">


    <?php

    ob_start();

    $Host = 'localhost';
    $User = 'root';
    $Password = '';
    $Database = 'compulsory2';

    $mysql = mysqli_connect($Host, $User, $Password, $Database);

    if (mysqli_connect_errno()) {
    printf("Connection error: %s", mysqli_connect_error());

    exit();
    }

        $GetMaxPlayerID = "select Count(playerID) from playerdata;";
    $maxplayeriD = mysqli_query($mysql, $GetMaxPlayerID);
    $maxplayeriDCount = mysqli_fetch_assoc($maxplayeriD);
    $maxplayeriDCount = $maxplayeriDCount; 
        if ($maxplayeriDCount == 0) {
    echo '<meta http-equiv="refresh" content="2; URL=index.php">';
    }

    

if ((isset($_POST['name'])) && (is_numeric($_POST['name'])) && ($_POST['name'] > 0) && $_POST['name'] <= $maxplayeriDCount['Count(playerID)'] ) {
    echo "if is true";
    $player_search = $_POST['name'];
    $setning = "SELECT * FROM playerdata WHERE PlayerID = '$player_search'";
} else {
    $setning = "SELECT * FROM playerdata";
}
    $resultat = mysqli_query($mysql, $setning);
    $rad = mysqli_fetch_assoc($resultat);

    if ($rad == 0) {
    echo '<meta http-equiv="refresh" content="2; URL=index.php">';
    }

    echo '<table class="cool-table">
        ';
        echo '
        <caption><h3>Player data</h3></caption>';
        echo '
        <tr><th>PlayerID</th><th>PlayerName</th><th>PlayerRank</th><th>Banned</th><th>TempBans</th></tr>';

        do {
        echo '
        <tr>
            <td>' . $rad['PlayerID'] . '</td>
            <td>' . $rad['PlayerName'] . '</td>
            <td>' . $rad['PlayerRank'] . '</td>
            <td>' . $rad['Banned'] . '</td>
            <td>' . $rad['TempBans'] . '</td>
        </tr>';
        } while ($rad = mysqli_fetch_assoc($resultat));

        echo '
    </table>';






if ((isset($_POST['name2'])) && !empty($_POST['name2']))
{
    $player_search2 = $_POST['name2'];
    $insertfunktion ="Insert into playerdata (PlayerID, PlayerName, PlayerRank, Banned, TempBans) Values 
(" . $maxplayeriDCount['Count(playerID)'] + 1 . ", '" . $player_search2 . "', 'Bronze', 0 , 0)";
    $insert = mysqli_query($mysql, $insertfunktion);

    header('Location: playerdata.php');
    exit();
}

if ((isset($_POST['name3'])) && !empty($_POST['name3']))
{
        $player_searchID = $_POST['name3'];
        $player_searchBanned = $_POST['name4'];
        $UpdateFunktion = "UPDATE playerdata SET Banned = ". $player_searchBanned .  " WHERE PlayerID = ". $player_searchID;
        $Update = mysqli_query($mysql, $UpdateFunktion);
        header('Location: playerdata.php');
        exit();
}
ob_end_flush();
    ?>
            <form method="post">
   Enter PlayerName <input name="name2" type="text">
    <input type="submit">
    <p>
     <p>
      <p>
                <form method="post">
   Enter PlayerID <input name="name3" type="text">
   Change banned state <input name="name4" type="number">
    <input type="submit">


</body>
</html>
