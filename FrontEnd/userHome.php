<!DOCTYPE html>
<html lang="en">
<head>
    <title>BirdLife | Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="../js/photoUpload.js"></script>
    <link rel="stylesheet" href="../css/custStyle.css">
    <link rel="stylesheet" href="../css/photoUpload.css">
</head>

<?php
session_start();

//$userID=$_SESSION["userID"];
$userID = 1;
//$username = $_SESSION["username"];

//db connection.
require('../BackEnd/dbConn.php');

//query.
$sqlUser = "SELECT * FROM userdetails WHERE id='$userID';";
$sqlPost = "SELECT * FROM post;";

$resultUser = mysqli_query($conn, $sqlUser);
$resultPost = mysqli_query($conn, $sqlPost);

$rowUser = mysqli_fetch_array($resultUser);
?>

<body>

<nav class="navbar navbar-custom">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Bird Life</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><?php echo($rowUser['firstname']); ?></a></li>
            <li><a href="logout.php">Logout</a></li>

        </ul>
    </div>
</nav>

<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-sidebar">
                        <!-- SIDEBAR USERPIC -->
                        <div class="profile-userpic">
                            <img
                                src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg"
                                class="img-responsive" alt="">
                        </div>
                        <!-- END SIDEBAR USERPIC -->
                        <!-- SIDEBAR USER TITLE -->
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name">
                                Marcus Doe
                            </div>
                            <div class="profile-usertitle-job">
                                Developer
                            </div>
                        </div>
                        <!-- END SIDEBAR USER TITLE -->
                        <!-- SIDEBAR BUTTONS -->
                        <div class="profile-userbuttons">
                            <!--  <button type="button" class="btn btn-success btn-sm">Follow</button>
                              <button type="button" class="btn btn-danger btn-sm">Message</button> -->
                        </div>
                        <!-- END SIDEBAR BUTTONS -->
                        <!-- SIDEBAR MENU -->
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li class="active">
                                    <a href="#">
                                        <i class="glyphicon glyphicon-home"></i>
                                        News Feed </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="glyphicon glyphicon-user"></i>
                                        Account Settings </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="glyphicon glyphicon-ok"></i>
                                        Check List </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="glyphicon glyphicon-flag"></i>
                                        Location Suggestions </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END MENU -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="row">
                        <div class="col-md-12">
                            <!--create post+++++++++++++++++++++++++++++++++++++++++++-->
                            <div class="profile-content panel panel-default text-left">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <select class="form-control" id="sel1">
                                            <option value="" selected disabled>Bird Name</option>
                                            <option>Hawk</option>
                                            <option>Eagle</option>
                                            <option>Crow</option>
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="container">
                                            <div class="col-md-3 col-md-offset-3" style="margin:0;">
                                                <div class="form-group">
                                                    <div class="main-img-preview">
                                                        <img class="thumbnail img-preview"
                                                             src="../images/bird-post-logo.png"
                                                             title="Preview Image" style="max-height:255px;">
                                                    </div>
                                                    <div class="input-group">
                                                        <input id="fakeUploadLogo" class="form-control fake-shadow"
                                                               placeholder="Choose File" disabled="disabled">

                                                        <div class="input-group-btn">
                                                            <div class="fileUpload btn btn-danger fake-shadow">
                                                        <span><i
                                                                class="glyphicon glyphicon-upload"></i> Upload Image</span>
                                                                <input id="logo-id" name="logo" type="file"
                                                                       class="attachment_upload">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="help-block">* Upload image of the bird.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <textarea class="form-control" rows="11" id="txtStatus"
                                                          placeholder="How do you feel?..."></textarea>
                                            </div>

                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-primary btn-md" id="btnPost" style="float:right;">
                                        <span class="glyphicon glyphicon-share"></span> Post
                                    </button>
                                </div>
                            </div>
                            <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        </div>
                    </div>


                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="profile-content news-feed">
                        <!--posts+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <?php

                        while ($rowPost = mysqli_fetch_array($resultPost)) {
                            $postText = $rowPost['posttext'];
                            ?>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="well">
                                        <p>John</p>
                                        <img src="bird.jpg" class="img-circle" height="55" width="55" alt="Avatar">
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="well">
                                        <p>Just Forgot that I had to mention something about someone to someone about
                                            how I
                                            forgot
                                            something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I
                                            don't.</p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<script>
    $(document).ready(function () {
        $("#btnPost").click(function () {
            var vStatus = $("#txtStatus").html();
            if (vStatus == '') {
                alert('Nothing to post');
            }
            else {
                $.post("../BackEnd/createPost.php", {status: vStatus}, alert('post successful'));
            }
        });
    });
</script>
</html>