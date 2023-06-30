<?php
    include_once "classes/DB.php";
    $con=DB::getConnection();
    $event_count=mysqli_fetch_row((mysqli_query($con, "select count(*) from events")))[0];

?>
<header class="bgImage">
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header"><!--website name/title-->
                <a href = "index.php" class = "navbar-brand">
                    <span style="transform:rotate(135deg); font-size:30px;" class="glyphicon glyphicon-new-window"></span> Fiesta - College EMS
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right"><!--navigation-->
                <?php 
                    echo '<li><a href = "index.php">Home</a></li>';
                    echo '<li><a href = "Department.php">Departments</a></li>';
                    echo '<li><a href = "Proposal.php">Proposal</a></li>';
                    echo '<li><a href = "login_form.php">Login</a></li>';
                ?>
            </ul>
        </div><!--container div-->
    </nav>
    <div class = "col-md-12">
        <div class = "container">
            <div class = "jumbotron"><!--jumbotron-->
                <h1>University Events Hub</h1><!--jumbotron heading-->
                <p><!--jumbotron content-->
                Unleash the power of organized event management. This platform brings students and faculty together, delivering a seamless experience that's second to none. Take a tour, explore our forum, and discover a better way to manage events. </p>
                <p>"The future of events starts here."
                </p>
                <h3><b><?php echo ($event_count-1)."+";?> events and counting... </b></h3>
            </div>
        </div>
    </div>
</header>