<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Fiesta | Login</title>
        <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        <?php require 'utils/scripts.php'; ?><!--js links. file found in utils folder-->

        <style>
            .form_class{
                padding:20px;
                display:flex;
                flex-direction:column;
                width:475px;
                align-items:center;
                border:solid rgba(140,140,140,.5) 2px;
                border-radius:5px;
                font-size:20px;
                gap:25px;
            
            }
            .radios{
                display:flex;
                flex-direction:row;
                width:425px;
            }
            .submit-btn{
                margin:10px;
                width:100px;    
                transition-duration: 0.4s;
            }
            .submit-btn:hover{
                text-align:center; 
                border-style:none;
                margin:10px;
                background-color:grey;
                color:lightgrey;

            }
        </style>
    </head>
    <body>
        <header class="pgLogin">
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
        </header>
        <div class = "content"><!--body content holder-->
            <div class = "container">
                <div class = "col-md-12"><!--body content title holder with 12 grid columns-->
                    <h1 style='text-align:center; padding-bottom:10px;'><b>Login</b></h1><!--body content title-->
                </div>
            </div>
            <div class="container" style="width:500px">
                <form class="login_form" action="login.php" method="POST">
                    <div class="col-lg-6 form_class">
                        <div class="container radios text-center">
                            <div class="col-md-6 text-center">
                                <input type="radio" value="F" name="type" id="1" required>
                                <label for="1">Faculty</label>
                            </div>
                            <div class="col-md-6 text-center">
                                <input type="radio" value="S" name="type" id="2" required>
                                <label for="2">Student</label>
                            </div>
                        </div>
                        <div class="row-lg-6 set">
                            <input type="text" name="uname" placeholder="Username" required autofocus>
                        </div>
                        <div class="row-lg-6 set">
                            <input type="password" name="pword" placeholder="Password" required>
                        </div>
                        <button type="submit" name="submit" class="button submit-btn">Log In</button>
                        </div>   
                </form>
            </div>
			
            
        </div><!--body content div-->
        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
    </body>
</html>
