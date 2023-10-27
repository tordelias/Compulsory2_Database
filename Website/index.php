<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="menu.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('Gif/Dwarf.Gif'); /* Replace with your GIF file path */
            background-size: cover;
        }

        .menu {
            position: relative;
            z-index: 1; /* Ensure the menu appears above the background */
        }

            .menu ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .menu li {
                display: inline;
                margin-right: 20px;
            }

            .menu a {
                text-decoration: none;
            }
    </style>
</head>
<body>
    <div class="background"></div>
    <div class="menu">
        <ul>
            <li><a href="playerdata.php">Player Data</a></li>
            <li><a href="items.php">Items</a></li>
            <li><a href="transaction.php">Transactions</a></li>
            <li><a href="logininfo.php">Login Info</a></li>
            <li><a href="logdata.php">Log Data</a></li>
        </ul>
    </div>
</body>
</html>
