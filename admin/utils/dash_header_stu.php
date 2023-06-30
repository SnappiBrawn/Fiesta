<header class="bgImage2">
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header"><!--website name/title-->
                <a href = "Dashboard.php" class = "navbar-brand">
                <span style="transform:rotate(135deg); font-size:30px;" class="glyphicon glyphicon-new-window"></span> Fiesta - College EMS
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right"><!--navigation-->
                <?php
                    echo '<li><a href = "ShowProposals.php">View Proposals</a></li>';
                    echo '<li><a href = "UpdateDetails.php">Update Profile</a></li>';
                    echo '<li><a href = "../index.php">Log Out</a></li>';
                ?>
            </ul>
        </div><!--container div-->
    </nav>
</header>