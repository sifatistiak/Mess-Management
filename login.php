<?php
require_once './api/connection.php';

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['usertype'])) {
    $username = escape($_POST['username']);
    $password = escape($_POST['password']);
    $usertype = escape($_POST['usertype']);
    if ($usertype == 'student') {
        $sql = "select * from members where username = '$username' and password = '$password';";

        $res = $conn->query($sql);
        if ($res && $row = $res->fetch_assoc()) {
            $_SESSION['loggedin'] = true;
            $_SESSION['usertype'] = 'student';
            $_SESSION['name'] = $row['membername'];
            $_SESSION['memberid'] = $row['memberid'];

            header('Location: student.php');
        } else {
            //error
            $errmsg = "Sorry. Username/Password doesn't match.";
        }
    } else if ($usertype == 'messadmin') {
        $sql = "select * from messadmin where messmanager = '$username' and password = '$password';";
        $res = $conn->query($sql);
        if ($res && $row = $res->fetch_assoc()) {

            $_SESSION['loggedin'] = true;
            $_SESSION['usertype'] = 'mess';
            $_SESSION['messname'] = $row['messname'];
            $_SESSION['messmanager'] = $row['messmanager'];
            //$_SESSION['mess_id'] = $row['MessID'];
            header('Location: ./admin/admin.php');
        } else {
            $errmsg = "Sorry. Username/Password doesn't match.";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mess Management System 1.0</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen"/>
        <link rel="stylesheet" href="css/login.css" media="screen">


        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-3167377388817554",
                enable_page_level_ads: true
            });
        </script>
       
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3" style="margin-top: 100px">
                    <div style="position: relative">
                        <img src="./images/mess.png" class="himg" />
                        <h1>Mess Management System 1.0</h1>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 80px">
                <div class="col-md-6 col-md-offset-3">
                    <div class="flip-container">
                        <div class="flipper">  
                            <div class="front">
                                <form method="POST" action="login.php">
                                    <input type="hidden" name="type" value="login" />
                                    <p style="color:#ff6666"><?= isset($errmsg) ? $errmsg : "" ?></p>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control"  placeholder="Username/AdminUser">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="usertype" value="student" checked>
                                            Student
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="usertype" value="messadmin">
                                            Mess Admin
                                        </label>
                                    </div>

                                    <button type="submit" class="btn btn-default">Log in </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            var front = $(".front");
            var back = $(".back");


            
            $(".login").click(function () {
                back.slideToggle(500);
                front.delay(550).slideToggle(500);
            });
            
        </script>


    </body>
</html>