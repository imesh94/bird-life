<?php
/**
 * Created by PhpStorm.
 * User: imesh
 * Date: 2017-02-28
 * Time: 8:21 PM
 */

if($_POST["status"]){

    $userID=$_SESSION["userID"];
    $date=date("Y/m/d");
    $time=date("h:i:sa");

    //read status text
    $status=$_POST["status"];
    $photo=$_POST["photo"];
    $bird=$_POST["bid"];

    //db connection.
    require('dbConn.php');

    $sql = "INSERT INTO post (postid,userid,posttext,postphoto,postlikes,postdislikes,postdate,posttime,postbird) VALUES (NULL, '$userID','$status','$photo','0','0','$date','$time','$bird')";

    if (mysqli_query($conn, $sql)) {
        echo("Post Successful.");
        die();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

?>