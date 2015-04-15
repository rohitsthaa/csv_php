

<?php

$host='localhost';
    $uname='yourusername'; //username
    $pwd='yourpassword'; //password
    $db="csv"; //db name

    $con = mysql_connect($host,$uname,$pwd) or die("connection failed");
    mysql_select_db($db,$con) or die("db selection failed");
$name= 'discounts.csv'; // filename
$deleterecords = "TRUNCATE TABLE discount"; //empty the table of its current records
mysql_query($deleterecords);


        readfile($name);
    //Import uploaded file to Database
    $handle = fopen($name, "r");

   
    $i=0;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    if($i>0){
        $import="INSERT into discount(id,title,expired_date,amount)values('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."')";
        mysql_query($import) or die(mysql_error());
    }
    $i=1;
    }

    fclose($handle);

    print "Import done";


?>

<?php



?>
