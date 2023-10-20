    <?php


            echo "<h1>Compulsory 2 Website</h1>";
            print "<p></p>";
            echo "<p></p>";
            echo "<p></p>";
            echo "<p>Paragraf</p>";



        $Host = 'localhost';
        $User = 'root';
        $Password = '';
        $Database = 'compulsory2';
        
        $mysql = mysqli_connect($Host, $User, $Password, $Database);
        
        if(mysqli_connect_errno()){
            printf("ingen forbindelse : %s", mysqli_connect_error());
            exit();
        } 
        else {
   //         printf("alt ok!");
        }
        
        $setning  = "SELECT * FROM playerdata";
   //  echo $setning;
     $resultat = mysqli_query($mysql, $setning);
     $rad = mysqli_fetch_assoc($resultat);
     if($rad == 0)
         echo '<meta http-equiv="refresh" content="2 ; URL=index.php">';
     echo "<p>";
             echo '<table border = "1">';
        
        echo '<caption><h3>Player data</h3></caption>';    
        echo '<tr><th>PlayerID</th><th>PlayerName</th><th>PlayerRank</th><th>Banned</th><th>TempBans</th></tr>';
            do
            {
                echo '<tr>
                <td>'.$rad['PlayerID'].'</td>
                <td>'.$rad['PlayerName'].'</td>
                <td>'.$rad['PlayerRank'].'</td>
                 <td>'.$rad['Banned'].'</td>
                 <td>'.$rad['TempBans'].'</td>
                </tr>';
            } while ($rad = mysqli_fetch_assoc($resultat));
            echo'</table>';

      $setning2  = "SELECT * FROM items";
   //  echo $setning;
     $resultat2 = mysqli_query($mysql, $setning2);
     $rad2 = mysqli_fetch_assoc($resultat2);
     if($rad2 == 0)
         echo '<meta http-equiv="refresh" content="2 ; URL=index.php">';
     echo "<p>";
             echo '<table border = "1">';
        
        echo '<caption><h3> Items </h3></caption>';    
        echo '<tr><th>ItemNr</th><th>Price</th><th>Item</th><th>Sold</th><th>Profit</th></tr>';
            do
            {
                echo '<tr>
                <td>'.$rad2['ItemNr'].'</td>
                <td>'.$rad2['Price'].'</td>
                <td>'.$rad2['Item'].'</td>
                 <td>'.$rad2['Sold'].'</td>
                 <td>'.$rad2['Profit'].'</td>
                </tr>';
            } while ($rad2 = mysqli_fetch_assoc($resultat2));
            echo'</table>';