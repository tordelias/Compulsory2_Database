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
            printf("alt ok!");
        }