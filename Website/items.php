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
    <?php
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

    $setning  = "SELECT * FROM items";
    //  echo $setning;
    $resultat = mysqli_query($mysql, $setning);
    $rad = mysqli_fetch_assoc($resultat);
    if ($rad == 0)
    echo '<meta http-equiv="refresh" content="2 ; URL=index.php">';
    echo "<p>
        ";
        echo '<table border="1" class="cool-table">
            '; // Added class attribute

            echo '
            <caption><h3> Items </h3></caption>';
            echo '
            <tr><th>ItemNr</th><th>Price</th><th>Item</th><th>Sold</th><th>Profit</th></tr>';
            do {
            echo '
            <tr>
                <td>' . $rad['ItemNr'] . '</td>
                <td>' . $rad['Price'] . '</td>
                <td>' . $rad['Item'] . '</td>
                <td>' . $rad['Sold'] . '</td>
                <td>' . $rad['Profit'] . '</td>
            </tr>';
            } while ($rad = mysqli_fetch_assoc($resultat));
            echo '
        </table>';
        ?>
</body>
</html>
