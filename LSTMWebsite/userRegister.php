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
    <?php
        include "connect.php";
        if(isset($_POST["register"])){
            $sql="insert into users values(?,?,?,?,?,?,?,?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ssssssss",$_POST['firstname'],$_POST['lastname'],$_POST['gender'],$_POST['email'],$_POST['username'],$_POST['pwd'],$_POST['phonenumber'],$_POST['address']);
            if($stmt->execute()){
                echo "<script>";
                echo "alert('successfully registered');";
                echo "</script>";
                header("location:userLogin.php");
            }    
            else{
                echo "<script>";
                echo "alert('registration failed');";
                echo "</script>"; 
            }
            $stmt->close();
        }
        $con->close();
    ?>
    <div class="container">
        <div class="row">
            <center>
            <form method="POST" style="width: 50%; height: 100%; background-color:beige">
                <h3 class="text-center text-danger m-2">User Registration</h3>
                <div class="mb-4 mt-4">
                    <input type="text" name="firstname" id="firstname_id" class="form-control" placeholder="First Name" autocomplete="off" required>
                </div>
                <div class="mb-4 mt-4">
                    <input type="text" name="lastname" id="lastname_id" class="form-control" placeholder="Last Name" autocomplete="off" required>
                </div>
                <div class="mb-4 mt-4" align="left">
                    <select name="gender" id="gender_id" required>
                        <option value="">select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="mb-4 mt-4">
                    <input type="text" name="email" id="email_id" class="form-control" placeholder="Email ID" autocomplete="off" required>
                </div>
                <div class="mb-4 mt-4">
                    <input type="text" name="username" id="username_id" class="form-control" placeholder="User Name" autocomplete="off">
                </div>
                <div class="mb-3">
                    <input type="password" name="pwd" id="pwd_id" class="form-control" placeholder="Password">
                </div>
                <div class="mb-4 mt-4">
                    <input type="text" name="phonenumber" id="phonenumber_id" class="form-control" placeholder="Phone Number" autocomplete="off" required>
                </div>
                <div class="mb-4 mt-4">
                    <input type="text" name="address" id="address_id" class="form-control" placeholder="Address" autocomplete="off" required>
                </div>
                <div class="mb-2 d-grid col-3 mx-auto">
                    <button type="submit" name="register" value="register" class="btn btn-warning">Register</button>
                </div>
            </form>
            </center>
        </div>
    </div>
</body>
</html>