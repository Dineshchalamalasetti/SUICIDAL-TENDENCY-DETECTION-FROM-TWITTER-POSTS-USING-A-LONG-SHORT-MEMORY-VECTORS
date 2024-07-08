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
        include "adminHeader.php";
    ?>
     <div class="container">
        <div class="row mt-2 mb-5">
            <?php
                include "connect.php";
                $sql="select * from tweets where status like 'yes%'";
                $stmt = $con->prepare($sql);
                $stmt->execute();
                $res = $stmt->get_result();
                if($res->num_rows>0){
                    while($row = $res->fetch_assoc()){
            ?>
                        <div class="col-sm-2 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-danger"><?= $row['username'] ?></h4>
                                    <p class="card-text"><?=$row['tweet']?></p>
                                    <a href="adminTrack.php?sno=<?=$row['sno']?>"><button>Track User</button></a>
                                </div>
                            </div>
                        </div>
            <?php          
                    }
                }
                $stmt->close();
                $con->close();
            ?>
</body>
</html>