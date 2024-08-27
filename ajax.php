<?php
include "connect.php";

    $num = $_POST['num'];
    $time =  date("Y-m-d h:i:s");

    $sql = " INSERT INTO numbers (collectedNumbers,time) VALUES ('".$num."','".$time."')  ";
    if (mysqli_query($conn, $sql)) {
        echo "
            <script>
                console.log('New record created successfully');
            </script>
        ";
    } else {
        echo "
            <script>
                console.log('  Error: ".$sql." <br> ".mysqli_error($conn)." ');
            </script>
        ";
    }

