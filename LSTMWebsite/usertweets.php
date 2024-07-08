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
    <div class="container">
        <div class="row mt-2 mb-5">
            <?php
                include "connect.php";
                $sql="select * from tweets where username='".$_SESSION['username']."'";
                $stmt = $con->prepare($sql);
                $stmt->execute();
                $res = $stmt->get_result();
                if($res->num_rows>0){
                    while($row = $res->fetch_assoc()){
            ?>
                        <div class="col-sm-2 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-warning"><?= $row['username'] ?></h4>
                                    <p class="card-text"><?=$row['tweet']?></p>
                                    <a href="userTweetDelete.php?sno=<?=$row['sno']?>" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
            <?php          
                    }
                }else{
                ?>
                    <div align="center">
                        <p>***No Tweets***</p>
                    </div>
                <?php
                }
                $stmt->close();
                $con->close();
            ?>
            <center class="mt-5"><a href="userAddTweet.php"><button class="btn btn-warning">Add New Tweet</button></a></center>
        </div>
    </div>
</body>
</html>