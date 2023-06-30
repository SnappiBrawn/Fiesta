<header class="bgImage">
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header"><!--website name/title-->
                <a href = "index.php" class = "navbar-brand">
                    Fiesta - College EMS
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right"><!--navigation-->
                <?php 
                    echo '<li><a href = "index.php">Hom</a></li>';
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
                <h1>Urban Events Venues & Catering</h1><!--jumbotron heading-->
                <p><!--jumbotron content-->
                "Unleash the power of organized event management. Our platform brings students and faculty together, delivering a seamless experience that's second to none. Take a tour, explore our features, and discover a better way to manage events. The future of events starts here."
                </p>
                <p id="dateAndTime"></p>
            </div>
        </div>
    </div>
</header>