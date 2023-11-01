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
    Enter New Item Name: <input name="item_name" type="text">
    Item Price: <input name="item_price" type="number">
    <input type="submit" value="Insert">
    <p>
    <form method="post">
    Enter Item Number: <input name="update_item_id" type="number">
    New Price: <input name="update_item_price" type="number">
    <input type="submit" value="Update">
    </form>


    <?php

    ob_start();

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

        if ((isset($_POST['item_name'])) && !empty($_POST['item_name']) && (isset($_POST['item_price']))) {
        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];

        $max_item_query = "SELECT MAX(ItemNr) AS max_item_nr FROM items";
        $max_item_result = mysqli_query($mysql, $max_item_query);
        $max_item_row = mysqli_fetch_assoc($max_item_result);
        $max_item_nr = $max_item_row['max_item_nr'] + 1;

        $insert_query = "INSERT INTO items (ItemNr, Item, Price, Sold, Profit) VALUES (" . $max_item_nr . ", '" . $item_name . "', " . $item_price . ", 0, 0)";
        $insert_result = mysqli_query($mysql, $insert_query);

        if($insert_result) {
            echo "Item inserted successfully!";
        } else {
            echo "Failed to insert item.";
        }
        header('Location: items.php');
        exit();
    }

    if ((isset($_POST['update_item_id'])) && !empty($_POST['update_item_id']) && (isset($_POST['update_item_price']))) {
        $update_item_id = $_POST['update_item_id'];
        $update_item_price = $_POST['update_item_price'];
        $update_query = "UPDATE items SET Price = " . $update_item_price . " WHERE ItemNr = " . $update_item_id;
        $update_result = mysqli_query($mysql, $update_query);

        if($update_result) {
            echo "Item updated successfully!";
        } else {
            echo "Failed to update item.";
        }
        header('Location: items.php');
        exit();
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

        ob_end_flush();
        ?>
</body>
</html>
