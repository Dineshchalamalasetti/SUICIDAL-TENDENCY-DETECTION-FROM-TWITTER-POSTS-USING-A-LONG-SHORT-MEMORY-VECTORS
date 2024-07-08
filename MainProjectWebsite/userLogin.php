<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUICIDAL IDEATION DETECTION</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/buttons.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
        include "indexHeader.php";
    ?>
    <div class="container">
        <div class="row">
            <center>
            <form method="POST" style="width: 50%; height: 100%; background-color:beige">
                <h3 class="text-center text-danger m-2">User Login</h3>
                <div class="mb-4 mt-4">
                    <input type="text" name="username" id="username_id" class="form-control" placeholder="User Name" autocomplete="off">
                </div>
                <div class="mb-3">
                    <input type="password" name="pwd" id="pwd_id" class="form-control" placeholder="Password">
                </div>
                <div class="mb-2 d-grid col-3 mx-auto">
                    <button type="submit" name="login" value="login" class="btn btn-primary">Login</button>
                </div>
                <div class="mb-2 d-grid col-3 mx-auto">
                    <p>Don't have account?<a href="userRegister.php">register</a></p>
                </div>
            </form>
            <?php
                session_start();
                include "connect.php";
                if(isset($_POST["login"])){
                    $sql="select * from users where username=? and password=?";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("ss",$_POST['username'],$_POST['pwd']);
                    $stmt->execute();
                    $res = $stmt->get_result();
                    $stmt->close();
                    $_SESSION['username']=$_POST['username'];
                    if($res->num_rows>0){
                        header("location:userHome.php");
                    }    
                    else{
            ?>
                        <p class="alert alert-danger">Invalid User!<p>
            <?php
                    }
                }
                $con->close();
            ?>
            </center>
        </div>
    </div>
</body>
</html>