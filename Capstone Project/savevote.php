<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>SUCCESSFULLY VOTED</title> 
 
    <!-- Bootstrap --> 
    <link href="css/bootstrap.min.css" rel="stylesheet"> 
 
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'> <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'> 
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'> 
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'> 
 
    <style> 
        .headerFont { 
            font-family: 'Ubuntu', sans-serif;             font-size: 24px; 
        } 
 
        .subFont { 
            font-family: 'Raleway', sans-serif; 
            font-size: 14px; 
        } 
         
        .specialHead { 
            font-family: 'Oswald', sans-serif; 
        } 
 
        .normalFont { 
            font-family: 'Roboto Condensed', sans-serif; 
        } 
    </style> 
</head> 
<body> 
    <div class="container"> 
        <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">             <div class="container"> 
                <button type="button" class="navbar-toggle" data-toggle="collapse" datatarget="#example-nav-collapse"> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
                </button> 
                <div class="navbar-header"> 
                    <a href="index.html" class="navbar-brand headerFont text-lg"><strong>EVoting 2024</strong></a> 
                </div> 
                <div class="collapse navbar-collapse" id="example-nav-collapse">                     <ul class="nav navbar-nav"></ul> 
                <button type="submit" class="btn btn-success navbar-right navbar-btn"><span class="normalFont"><strong>Admin Panel</strong></span></button> 
                </div> 
            </div> <!-- end of container --> 
        </nav> 
 
        <div class="container" style="padding-top:150px;"> 
            <div class="row"> 
                <div class="col-sm-4"></div> 
                <div class="col-sm-4 text-center" style="border:2px solid gray;padding:50px;"> 
                     
                    <?php 
                     
 
                    function test_input($data) { 
                        return htmlspecialchars(stripslashes(trim($data))); 
                    } 
 
                    if(isset($_POST["submit"])) { 
                        if(isset($_POST["voterName"]) && isset($_POST["voterEmail"]) && 
isset($_POST["voterID"]) && isset($_POST["selectedCandidate"])) { 
                            $name = test_input($_POST["voterName"]); 
                            $email = test_input($_POST["voterEmail"]); 
                            $voterID = test_input($_POST["voterID"]); 
                            $selection = test_input($_POST["selectedCandidate"]); 
                             
                            $DB_HOST = "localhost"; 
                            $DB_USER = "root"; 
                            $DB_PASSWORD = ""; 
                            $DB_NAME = "db_evoting"; 
                            $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, 
$DB_NAME); 
 
                            if($conn->connect_error) { 
                                die("ERROR: Could not connect. " . $conn->connect_error); 
                            } 
 
                            $stmt = $conn->prepare("INSERT INTO tbl_users (full_name, email, voter_id, voted_for) VALUES (?, ?, ?, ?)"); 
                            $stmt->bind_param("ssis", $name, $email, $voterID, $selection); 
 
                            if($stmt->execute()) { 
                                echo "<img src='images/success.png' width='70' height='70'>"; 
                            echo "<h3 class='text-info specialHead text-center'><strong> YOU'VE 
SUCCESSFULLY VOTED.</strong></h3>"; 
                                echo "<a href='index.html' class='btn btn-primary'> <span class='glyphicon glyphicon-ok'></span> <strong> Finish</strong> </a>"; 
                            } else { 
                                echo "<img src='images/error.png' width='70' height='70'>"; 
                                echo "<h3 class='text-info specialHead text-center'><strong> SORRY WE'VE SOME ISSUE..</strong></h3>"; 
                                echo "<a href='index.html' class='btn btn-primary'> <span class='glyphicon glyphicon-ok'></span> <strong> Finish</strong> </a>"; 
                            } 
 
                            $stmt->close(); 
                            $conn->close(); 
                        } else { 
                            echo "<br>All Fields Required"; 
                        } 
                    } 
                    ?> 
                </div> 
                <div class="col-sm-4"></div> 
            </div> 
        </div> 
    </div> 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed -->     <script src="js/bootstrap.min.js"></script> 
</body> 
</html> 
