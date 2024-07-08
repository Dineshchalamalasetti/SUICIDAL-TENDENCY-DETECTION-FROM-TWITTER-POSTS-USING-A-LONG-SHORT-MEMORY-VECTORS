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
        session_start();
        include "userHeader.php";
    ?>
    <?php
        include "connect.php";
        if(isset($_POST["add"])){
            $text = $_POST['tweet'];
            $output = shell_exec('python predict.py "' . $text . '"');
            $sql="insert into tweets (username,tweet,status) values(?,?,?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sss",$_SESSION['username'],$text,$output);
            if($stmt->execute()){
                header("location:usertweets.php");
                
            }    
            else{
                echo "<script>";
                echo "alert('Failed');";
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
                <h3 class="text-center text-danger m-2">User Add Tweet</h3>
                <div class="mb-4 mt-4">
                    <input type="text" name="username" id="username_id" class="form-control" placeholder="username" autocomplete="off" value="<?= $_SESSION['username']?>">
                </div>
                <h4>Tweet</h4>
                <div class="mb-4 mt-4">
                    <textarea name="tweet" id="tweet_id" cols="30" rows="10"></textarea>
                </div>
                <div class="mb-2 d-grid col-3 mx-auto">
                    <button type="submit" name="add" value="add" class="btn btn-warning">Add</button>
                </div>
            </form>
            </center>
        </div>
    </div>
</body>
</html>