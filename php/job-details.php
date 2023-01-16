<!DOCTYPE html>
<html lang="en">

<?php include "includes.php"; ?> 
<script type="text/javascript" src="../js/myfunctions.js"></script>
<head>
    <link href="../css/job-details.css" rel="stylesheet">
    <link href="../css/customstyles.css" rel="stylesheet">
</head>



    <body data-spy="scroll" data-target=".fixed-top">
        <!-- Preloader -->
        <div class="spinner-wrapper">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <!-- end of preloader -->
        <?php include "navigation.php"; ?>
        <!-- Header - Student info and search -->
    <header id="header" class="header">
        <div class="header-content">
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->

    <!-- start of main box -->
    <div class="container">
        <div class="top-line">
            <h3>Τίτλος θέσης</h3>
            <button type="submit" class="form-control-submit-button" id="favorite">Αποθήκευση
            </button>
        </div>
        <p style="font-size: 18px; padding: 5px;">Τμήμα</p>
        <div class="line"></div>
        <div class="details">
            <ul class="job-features">
                <li>Τοποθεσία</li>
                <li>Πλήρες/Μερικό ωράριο</li>
                <li>Διάρκεια: έναρξη - λήξη</li>
                <li>Μισθός</li>
            </ul>
            <div style="padding: 5px;"></div>
            <h6>Περιγραφή:</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in.</p>
            <h6>Παροχές:</h6>
            <p >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in.</p>
        <div class="bottom">
            <button type="submit" class="form-control-submit-button" style="height: 20%; width: 15%; margin: 10px;" onclick="hideShow()"><a class="nav-link page-scroll" href="#application-form" style="all:unset;">Υποβολή αίτησης</a></button>    
        </div>
        
        </div>
    </div>
    <!-- end of main box -->

    
    <div id="application-form" style="display:none">
       <div class="container">
            <!-- form start -->
            <form action="forms/application-form.php" method="POST">
                <h3>Αίτηση για πρακτική</h3>

                <div class="line"></div>
                    <div class="attachment">
                        <div class="label-attach"> 
                            <label for="myfile" ><h6>Επισυνάψτε το έγγραφο</h6></label>
                            <div id="tooltip"><h6><u>αναλυτικής βαθμολογίας</u>:</h6>
                                <span id="tooltiptext">Η αναλυτική βαθμολογία δίνεται από τη γραμματεία κάθε τμήματος</span>
                            </div>
                        </div>
                        <div class="input-attach">
                            <input type="file" id="myfile" name="myfile">
                        </div>
                    </div>

                <div class="form-group">
                    <textarea class="form-control-textarea" id="cmessage" placeholder="Σχόλια" name="comments" ></textarea>
                    <div class="help-block with-errors"></div>
                </div>
                
                <div class="form-group bottom">
                    <button type="submit" name="submit" class="form-control-submit-button"  style="height: 20%; width: 15%; margin: 10px;" onclick="SubmitApplicationForm">Τελική Υποβολή</button>
                </div>
            </form>
            <!-- form end -->
        </div>
    </div> 
</body>



</html>