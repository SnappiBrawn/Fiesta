<?php
    session_start();
    $_SESSION["loggedin"]=false;

include_once "classes/DB.php";
$con= DB::getConnection();
$query = "select * from department";
$deptlist = mysqli_fetch_all(mysqli_query($con,$query));
?>

<!DOCTYPE html>
<html>
    <style>
        .content{
            background:#f8f6dd;
        }
        .image{

        }
        .item *{
            display:flex;
            justify-content: center;
            padding:2px;
            border-radius: 12px;
        }
        .item {
            display:flex;
            justify-content: center;
            border-radius: 12px;
            margin:10px;
            border: 1px #000000 solid;
        }
        .goto_events{
            background: #2ecc71;
            border: 3px solid #20272F;
            border-radius: 30px;
            color: #ffff;
            display: flex;

        }
    </style>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Fiesta | Departments</title>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
    </head>
    <body>
        <?php require 'utils/header.php'; ?>
        <div class="content">
            <div class="container">
                <div class="col-md-12">
                    <h1 style='text-align: center'>Our Departments</h1>
                </div>
            </div><hr>
        </div>

            <div class='row-lg-12' style="background:#f8f6dd; justify-content:center; display:flex; flex-wrap:wrap; padding:10px;">
                <?php foreach($deptlist as $department){
                ?>
                <div class='col-lg-4' >
                    <div class="card item" style="width:40rem; display:flex; flex-direction:column; justify-content:stretch;">
                        <img class="card-img-top" src='admin/deptimages/<?php echo $department[1];?>.jpg' style="width:40rem; height:25rem; border-radius:25px; padding:10px;" inherit alt="Card image cap">
                        <div class="card-body" style="display:flex; flex-direction:column; justify-content:center;">
                            <h3 class="card-title"><?php echo $department[1];?></h3>
                            <h4 class="card-title">HOD: <?php echo $department[3];?></h4>
                            <p class="card-text"><?php echo $department[2];?></p>
                            <button class="btn goto_events" onclick="location.href = 'Events.php?dept=<?php echo $department[0];?>'">Events > ></a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <div class="row"><!--event content-->
                <div class="container">
                    
                </div><!--container div-->
            </div><!--row div-->
			
        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
    </body>
</html>
