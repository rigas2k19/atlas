<?php 
    session_start();
    include("connection.php");

    #check if email exists: 
    $email = $_POST["email"];
    $sql = "SELECT * FROM students WHERE email = '$email';";
    //send query to database
    $result = mysqli_query($db, $sql);
    /* check if we have results */
    $result_rows = mysqli_num_rows($result);

    if($result_rows == 0){
        // insert the data into the database
        $query= "insert into students (fname, lname, latin_fname, latin_lname, phone, date_of_birth, university, school, department, am, email, password) values (?,?,?,?,?,?,?,?,?,?,?,?)";
        
        $stmt = $db->prepare($query);
        $stmt->bind_param("ssssssssssss", $_POST["fname"],$_POST["lname"],$_POST["latin_fname"],$_POST["latin_lname"],$_POST["phone"],$_POST["date_of_birth"],$_POST["university"],$_POST["school"],$_POST["department"],$_POST["am"],$_POST["email"],$_POST["password"]);
        $result = $stmt->execute();

        if($result){
            echo "User has been added successfully";
            header("location: ../index.php");
        } else {
            echo "There was a problem adding the user.";
        }
    }else{
        #email exists
        ?>
            <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- SEO Meta Tags -->
        <meta name="description" content="Create a stylish landing page for your business startup and get leads for the offered services with this HTML landing page template.">
        <meta name="author" content="Inovatik">

        <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
        <meta property="og:site_name" content="Atlas" /> <!-- website name -->
        <meta property="og:site" content="" /> <!-- website link -->
        <meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
        <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
        <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
        <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
        <meta property="og:type" content="article" />

        <!-- Website Title -->
        <title>Atlas</title>

        <!-- Scripts -->
        <script src="../js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
        <script src="../js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
        <script src="../js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
        <script src="../js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
        <script src="../js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
        <script src="../js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
        <script src="../js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
        <script src="../js/scripts.js"></script> <!-- Custom scripts -->
        <script src="../js/myfunctions.js"></script> <!-- My functions scripts -->
        
        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/fontawesome-all.css" rel="stylesheet">
        <link href="../css/swiper.css" rel="stylesheet">
        <link href="../css/magnific-popup.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">

        <!-- to use close-open functions for login modal -->
        <script type="text/javascript" src="../js/scripts.js"></script>

        <!-- Favicon  -->
        <link rel="icon" href="../images/atlas_logo.png">
    </head>
    <body data-spy="scroll" data-target=".fixed-top">
        
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="../index.php"><img src="../images/atlas_logo.png" alt="alternative" style="width: 143px; height:140px;"></a>

            <!-- navigation bar -->
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="../index.php">Αρχική Σελίδα</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="../search.php">Αναζήτηση</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="../index.php#student_details">Φοιτητές-ριες</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="../index.php#office_details">Φορέας Υποδοχής</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="php/under-construction.php">Γραφείο Π.Α <span class="sr-only">(current)</span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="../index.php#contact">Επικοινωνία</a>
                    </li>
                </ul>
                <span class="nav-item social-icons">
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-primary" style="border-radius: 0.6rem;background-color:#00bfd8;border-color:#00bfd8" id="login_button" data-toggle="modal" data-target="#modalLoginForm">
                        <i class="fa fa-user"></i> Σύνδεση 
                    </button>
                    <button type="button" class="btn btn-primary" style="border-radius: 0.6rem;"> Εγγραφή </button>
                </span>
            </div>
        </nav> <!-- end of navbar -->
        <!-- end of navigation -->
    </body>

    <header id="header" class="header">
        <div class="header-content">
            <div class="container" style="position: relative; width:100%; margin-top:1%;">
                <div class="card" style="border-width: 3px; display: flex; align-items: center; justify-content: center;">
                    <h4>Εγγραφή Φοιτητή-ριας</h4>  
                </div>
            </div>
            <!-- Signup Form for Students -->
            <div class="container" style="position: relative; width:100%; margin-top:1%;">
                <div class="card" style="border-width: 3px;">
                    <h6 style="margin-left:3.5%; margin-right:70%; margin-top:1%;">Προσωπικά Στοιχεία :</h6>        
                    <!-- Form inputs -->
                    <form action="submit.php" class="form-groupf" id="student-signup-form" data-toggle="validator" data-focus="false" novalidate="true" style="width: 40%;margin-left: 35%;margin-top:2%;" method="POST">
                        <!-- div row to show two inputs side by side -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group" style="width: 200%; right:170%; ">
                                    <input value="<?php echo $_POST["fname"]?>" type="text" class="form-control-input notEmpty" id="student_name_greek" name="fname" required="">
                                    <label class="label-control" for="student_name_greek">Όνομα</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div> <!-- end of col -->
                            <div class="col-lg-6">
                                <div class="form-group" style="width: 200%; left:15%; ">
                                    <input value="<?php echo $_POST["latin_fname"]?>" type="text" class="form-control-input notEmpty" id="student_name" name="latin_fname" required="">
                                    <label class="label-control" for="student_name">Όνομα (στα Λατινικά)</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div> <!-- end of row -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group" style="width: 200%; right:170%; ">
                                    <input value="<?php echo $_POST["lname"]?>" type="text" class="form-control-input notEmpty" id="student_lastname_greek" name="lname" required="">
                                    <label class="label-control" for="student_lastname_greek">Επίθετο</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div> <!-- end of col -->
                            <div class="col-lg-6">
                                <div class="form-group" style="width: 200%; left:15%; ">
                                    <input value="<?php echo $_POST["latin_fname"]?>" type="text" class="form-control-input notEmpty" id="student_lastname" name="latin_lname" required="">
                                    <label class="label-control" for="student_lastname">Επίθετο (στα Λατινικά)</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div> <!-- end of row -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group" style="width: 200%; right:170%; ">
                                    <input value="<?php echo $_POST["phone"]?>" type="number" class="form-control-input notEmpty" id="phone" name="phone" required="">
                                    <label class="label-control" for="phone">Τηλέφωνο Επικοινωνίας</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group" style="width: 200%; right:170%; ">
                                    <label for="date_of_birth" style="right:170%;">Ημερομηνία Γέννησης : </label>
                                    <input value="<?php echo $_POST["date_of_birth"]?>" type="date" id="date_of_birth" name="date_of_birth" value="2001-01-01" min="1900-01-01" max="2005-01-01" style="margin-right: 30%;" required>
                                </div>    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group" style="width: 200%; right:170%; margin-top: 20%; margin-bottom: 15%;">
                                    <h6>Στοιχεία Ιδρύματος:</h6>
                                </div>
                            </div>
                        </div>
                        
                        <!-- div row to show two inputs side by side -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group" style="width: 200%; right:170%; ">
                                    <!-- TODO load from database --> 
                                    <select class="form-control-select" id="university" name="university" required="">
                                        <option class="select-option" value="" disabled="" selected="">Ίδρυμα</option>
                                        <option class="select-option" value="ekpa">ΕΚΠΑ</option>
                                        <option class="select-option" value="assoe">ΑΣΣΟΕ</option>
                                        <option class="select-option" value="papei">ΠΑΠΕΙ</option>
                                    </select>
                                </div>
                            </div> <!-- end of col -->
                            <div class="col-lg-6">
                                <div class="form-group" style="width: 200%; left:15%; ">
                                    <input value="<?php echo $_POST["am"]?>" type="number" class="form-control-input notEmpty" id="am" name="am" required="">
                                    <label class="label-control" for="am">Αριθμός μητρώου</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div> <!-- end of row -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group" style="width: 200%; right:170%; ">
                                    <!-- TODO load from database --> 
                                    <select class="form-control-select" id="school" name="school" required="">
                                        <option class="select-option" value="" disabled="" selected="">Σχολή</option>
                                        <option class="select-option" value="natural">Θετικών Επιστημών</option>
                                        <option class="select-option" value="theoretical">Θεωρητικών Επιστημών</option>
                                    </select>
                                </div>
                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group" style="width: 200%; right:170%; ">
                                    <!-- TODO load from database --> 
                                    <select class="form-control-select" id="department" name="department" required="">
                                        <option class="select-option" value="" disabled="" selected="">Τμήμα</option>
                                        <option class="select-option" value="DI">ΠΛΗΡΟΦΟΡΙΚΗΣ ΚΑΙ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ</option>
                                        <option class="select-option" value="DP">ΦΥΣΙΚΗΣ</option>
                                        <option class="select-option" value="DM">ΜΑΘΗΜΑΤΙΚΟ</option>
                                    </select>
                                </div>
                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group" style="width: 200%; right:170%; margin-top: 20%; margin-bottom: 15%;">
                                    <h6>Στοιχεία Λογαριασμού:</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group" style="width: 200%; right:170%; ">
                                    <input type="email" class="form-control-input notEmpty" id="Email" name="email" required="">
                                    <label class="label-control" for="email">Email</label>
                                    <p style="color:red;">Το email βρίσκεται σε χρήση</p>
                                </div>
                            </div> <!-- end of col -->
                            <div class="col-lg-6">
                                <div class="form-group" style="width: 200%; left:15%; ">
                                    <input type="email" class="form-control-input notEmpty" id="confirm_email" name="confirm_email" required="">
                                    <label class="label-control" for="confirm_email">Επιβεβαίωση Email</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div> <!-- end of row -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group" style="width: 200%; right:170%; ">
                                    <input type="password" class="form-control-input notEmpty" id="password" name="password" required="">
                                    <label class="label-control" for="password">Κωδικός</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div> <!-- end of col -->
                            <div class="col-lg-6">
                                <div class="form-group" style="width: 200%; left:15%; ">
                                    <input type="password" class="form-control-input notEmpty" id="confirm_password" name="confirm_password" required="">
                                    <label class="label-control" for="confirm_password">Επιβεβαίωση Κωδικού</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div> <!-- end of row -->

                        <div class="row">
                            <div class="col-lg-6" style="left: 110%; width:200%; margin-top:10%; margin-bottom: 3%;">
                                <button id="confirmForm" name="register_btn" type="submit" class="form-control-submit-button" style="width: 80%; margin-left:2%; margin-bottom:2%;">Επιβεβαίωση Στοιχείων</button>
                            </div>
                        </div>
                    </form>
                    <!-- end of contact form -->
                </div>
            </div>        
        </div>
            
    </header>
</html>




<?php
        
    }
?>