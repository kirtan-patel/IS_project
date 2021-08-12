<?php
    $host='localhost';
    $user_db='root';
    $pass='';
    $db_name='draft';

    $connect_error='Cant connect to sql';

    $con=mysqli_connect($host,$user_db,$pass,$db_name);

    if(mysqli_connect_error()){
        die($connect_error);
    }

?>