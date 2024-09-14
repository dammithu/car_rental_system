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
            <h1 class="text-center">Edit Car Details</h1>
            <br>
           
        </div>
    </div>

    <div class="container" style="margin-top: -1%; margin-bottom: 2%;">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading"> </div>
                <div class="panel-body">

                    <form role="form" action="updatecar.php" method="GET">

                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label for="client_username"><span class="text-danger" style="margin-right: 5px;">*</span> Car id: </label>
                                <div class="input-group">
                                    <input class="form-control" id="car_id" type="text" name="car_id" placeholder="Your Car Id" required="">
                                    <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></label>
              </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label for="client_name"><span class="text-danger" style="margin-right: 5px;">*</span>Car Name: </label>
                                <div class="input-group">
                                    <input class="form-control" id="car_name" type="text" name="car_name" placeholder="Car Name" required="" autofocus="">
                                    <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></label>
              </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        

                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label for="client_email"><span class="text-danger" style="margin-right: 5px;">*</span> Ac price per KM</label>
                                <div class="input-group">
                                    <input class="form-control" id="ac_price" type="text" name="ac_price" placeholder="Ac price" required="">
                                    <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></label>
              </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label for="client_phone"><span class="text-danger" style="margin-right: 5px;">*</span> Non AC price per KM</label>
                                <div class="input-group">
                                    <input class="form-control" id="non_ac_price" type="text" name="non_ac_price" placeholder="Non Ac price" required="">
                                    <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-contact" aria-hidden="true"></span></label>
                                    </span>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label for="client_address"><span class="text-danger" style="margin-right: 5px;">*</span> AC price per day </label>
                                <div class="input-group">
                                    <input class="form-control" id="ac_price_per_day" type="text" name="ac_price_per_day" placeholder="Ac price per day" required="">
                                    <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-home" aria-hidden="true"></label>
              </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label for="client_address"><span class="text-danger" style="margin-right: 5px;">*</span> Non AC price per day </label>
                                <div class="input-group">
                                    <input class="form-control" id="non_ac_price_per_day" type="text" name="non_ac_price_per_day" placeholder="Non Ac price per day" required="">
                                    <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-home" aria-hidden="true"></label>
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
                       <a href="admincar1.php" class="btn btn-primary">BACK</a>
                    </footer>

                </div>

            </div>

        </div>
    </div>
</body>

</html>