<!DOCTYPE html>
<html>
<head>
    <title> Employee Signup | Car Rentals  </title>
</head>
<link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/clientlogin.css">
<body>
    
     <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
        
        
    </nav>
    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center">Edit Account</h1>
            <br>
           
        </div>
    </div>

    <div class="container" style="margin-top: -1%; margin-bottom: 2%;">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading"> </div>
                <div class="panel-body">

                    <form role="form" action="adminupdate.php" method="GET">

                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label for="client_username"><span class="text-danger" style="margin-right: 5px;">*</span> Username: </label>
                                <div class="input-group">
                                    <input class="form-control" id="admin_username" type="text" name="admin_username" placeholder="Admin Username" required="">
                                    <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></label>
              </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label for="client_username"><span class="text-danger" style="margin-right: 5px;">*</span>New Username: </label>
                                <div class="input-group">
                                    <input class="form-control" id="new_admin_username" type="text" name="new_admin_username" placeholder="New Admin Username" required="">
                                    <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></label>
              </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label for="client_name"><span class="text-danger" style="margin-right: 5px;">*</span>New Password: </label>
                                <div class="input-group">
                                    <input class="form-control" id="admin_password" type="text" name="admin_password" placeholder="Password" required="" autofocus="">
                                    <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></label>
              </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        

                        
                        

                        <div class="row">
                            <div class="form-group col-xs-12">
                                
                                
                        </div>



                        <div class="row">
                            <div class="form-group col-xs-4">
                                <button  class="btn btn-primary" type="submit">Submit</button>
                            </div>

                        </div>
                        <label style="margin-left: 5px;">or</label> <br>
                        

                    </form>
                    <footer>
                       <a href="adminacc.php" class="btn btn-primary">BACK</a>
                    </footer>

                </div>

            </div>

        </div>
    </div>
</body>

</html>