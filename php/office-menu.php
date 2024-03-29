<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../includes.php";
    include "../connection.php"; ?>
    <script>
        $(document).ready(function() {
            $('.sub-menu').hide(); //hide the sub-menu by default
            $('#left-menu > ul > li:nth-child(2) > a').click(function() { //select the "Παρακολούθηση Αγγελιών" list item
                $(this).next('.sub-menu').slideToggle(); //show or hide the sub-menu
            });
        });
        $(document).ready(function() {
            $('.sub-menu').hide(); //hide the sub-menu by default
            $('#left-menu > ul > li:nth-child(3) > a').click(function() { //select the "Αιτήσεις Ενδιαφέροντος" list item
                $(this).next('.sub-menu').slideToggle(); //show or hide the sub-menu
            });
        });
    </script>
</head>
<?php 
        #get notifications
        $sql = "SELECT * FROM company_notifications WHERE company_id = " . $_SESSION['user']['id'] . " AND is_read = 0;";
        $result = mysqli_query($db, $sql);
        $num_rows = mysqli_num_rows($result);
?>
<body data-spy="scroll" data-target=".fixed-top">
   
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="../../index.php"><img src="../../images/atlas_logo.png" alt="alternative" style="width: 143px; height:140px;"></a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <!-- navigation bar -->
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="http://localhost/sdi1900168/atlas/index.php">Αρχική Σελίδα <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="http://localhost/sdi1900168/atlas/php/jobs/search.php">Θέσεις Πρακτικής</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="http://localhost/sdi1900168/atlas/index.php#student_details">Φοιτητές-ριες</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="http://localhost/sdi1900168/atlas/index.php#office_details">Φορέας Υποδοχής</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="http://localhost/sdi1900168/atlas/php/other/under-construction.php">Γραφείο Π.Α</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="http://localhost/sdi1900168/atlas/index.php#contact">Επικοινωνία</a>
                </li>

                <!-- Dropdown Menu -->          
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="#profile" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> Το προφιλ μου
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="http://localhost/sdi1900168/atlas/php/edit-user-details/edit-company.php"><span class="item-text">Επεξεργασία Προφίλ</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <?php if ($num_rows > 0) { ?>
                        <a class="dropdown-item" href="http://localhost/sdi1900168/atlas/php/notifications/company-notifications.php"><div class="top-line"> <div><span class="item-text">Ειδοποιήσεις</div> <div class="notification"> <?php echo $num_rows; ?></div> </span></div></a>
                        <?php }else{ ?>
                            <a class="dropdown-item" href="http://localhost/sdi1900168/atlas/php/notifications/company-notifications.php"><span class="item-text">Ειδοποιήσεις</span></a>
                        <?php } ?>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="http://localhost/sdi1900168/atlas/php/logout.php"><span class="item-text">Αποσύνδεση</span></a>
                    </div>
                </li>
                <li class="nav-item">
                    <?php if ($num_rows > 0) { ?> <div class="notification"> <?php echo $num_rows;} ?> </div>
                </li>
                <!-- end of dropdown menu -->
            
            </ul>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->

    <header class="header" style="height: 80%;">
        <div class="header-content">
            <div class="row" style="width: 50%; margin-left: 10%; overflow: hidden; height: 10%;">
                <?php include 'breadcrumbs.php' ?>
            </div>
            <div class="row" style="width: 100%; margin-top: 1%;">
                <!-- vertical menu left of page -->
                <div id="left-menu">
                    <ul>
                        <li><a href="http://localhost/sdi1900168/atlas/php/jobs/create-job-offer.php">Δημιουργία Αγγελίας</a></li>
                        <li class="has-sub-menu">
                            <a>Παρακολούθηση Αγγελιών <i class="fa fa-caret-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="http://localhost/sdi1900168/atlas/php/jobs/watch-jobs-active.php">Ενεργές Αγγελίες</a></li>
                                <li><a href="http://localhost/sdi1900168/atlas/php/jobs/watch-jobs-temp.php">Προσωρινά Αποθηκευμένες Αγγελίες</a></li>
                                <li><a href="http://localhost/sdi1900168/atlas/php/jobs/watch-jobs.php">Όλες Αγγελίες</a></li>
                            </ul>
                        </li>
                        <li class="has-sub-menu">
                            <a>Αιτήσεις Ενδιαφέροντος <i class="fa fa-caret-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="http://localhost/sdi1900168/atlas/php/jobs/jobs-pending.php">Εκκρεμείς Αιτήσεις</a></li>
                                <li><a href="http://localhost/sdi1900168/atlas/php/jobs/jobs-approved.php">Εγκεκριμένες Αιτήσεις</a></li>
                                <li><a href="http://localhost/sdi1900168/atlas/php/jobs/jobs-rejected.php">Απορριφθείσες Αιτήσεις</a></li>
                                <li><a href="http://localhost/sdi1900168/atlas/php/jobs/jobs-all.php">Όλες οι Αιτήσεις</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- To start next page we need to create a <div class="col-lg-6"> and add whatever we want to be on center of page -->

                