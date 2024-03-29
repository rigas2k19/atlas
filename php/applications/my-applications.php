<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    include "../connection.php";
    include "../student-menu.php";
    include "../includes.php";
?> 


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

    <div class="container" style="position: relative; width:100%; margin-top:-1%;">
        <div class="card" style="border-width: 2px; width:110%;">
            <h4 style="margin-left: 40%;">Οι Αιτήσεις Μου</h4>
        </div>
    </div>

</div>


    <div class="container" style="position: relative; width:110%; margin-top:1%;">
        <div class="card" style="border-width: 2px; width: 110%; height: 100%;  margin-bottom:1%;background-color: transparent;border:none;">
            <jobs style="width: 110%;">
    <!-- get data -->
    <?php
    $sql = "SELECT * FROM application WHERE student_id = ".$_SESSION['user']['id'].";";
    //send query to database
    $result = mysqli_query($db, $sql);
    /* check if we have results */
    $result_rows = mysqli_num_rows($result);
    if($result_rows > 0){
        /* print data to html */ ?>

            <ul class="joblist">
<?php        while($row = mysqli_fetch_assoc($result)){ ?>
                    <?php 
                        #find corresponding ad.
                        $sql_ad = "SELECT * FROM ads WHERE id = ".$row['ad_id'].";";
                        $result_ad = mysqli_query($db, $sql_ad);
                        $ad = mysqli_fetch_assoc($result_ad);
                        ?>
                    <li class="job">
                        <!-- individual job advertisment -->
                        <div class="job-card">
                            <div class="top-line">
                                <div class="zoom">
                                <form method="POST" action="../jobs/job-details.php">
                                    <input type="hidden" name="show-submit-application" value=0>
                                    <input type="hidden" name="ad-id" value="<?php echo $ad['id']; ?>">
                                    <h3><button type="submit" name="show-details" class="job-title-button"> <?php echo $ad['title']?> </button></h3>
                                </form>
                                </div>
                                <div style=" display:flex; flex-direction:row; order:2;">
                                    <!-- user can edit only saved applications -->
                                    <?php if($row['status'] == "Μη-υποβεβλημένη"){ ?>
                                        <form method="POST" action="update-application.php" style="order:2;">
                                            <input type="hidden" name="application-id" value="<?php echo $row['application_id']; ?>">
                                            <button class="btn btn-primary" style="order:1;" type="submit" name="edit-application">Επεξεργασία</button>
                                        </form>
                                    <?php } ?>
                                    <!-- user can delete only saved and completed applications -->
                                    <?php if($row['status'] == "Μη-υποβεβλημένη" || $row['status'] == "Εκκρεμής"){ ?>
                                    <div style="width: 5px; opacity:0; order:2;"></div>
                                    <form method="POST" action="delete-application.php" style="order:3;">
                                        <input type="hidden" name="application-id" value="<?php echo $row['application_id']; ?>">
                                        <button type="submit" class="btn btn-danger" name="delete-application">Διαγραφή</button>
                                    </form>
                                    <?php } ?>
                                </div>
                            </div> 
                            <p><?php echo $ad['subject']?></p>
                            <ul class="job-features" style="columns:1;">
                                <li><strong>Κατάσταση: </strong>
                                <?php
                                    if($row['status'] == 'Εγκεκριμένη'){
                                        echo '<p style="color: darkgreen;">';
                                    }
                                    else if($row['status'] == 'Απορριφθείσα'){
                                        echo '<p style="color: crimson;">';                           
                                    } else if ($row['status'] == 'Μη-υποβεβλημένη') {
                                        echo '<p style="color: darkcyan;">';
                                    }else{
                                        echo '<p style="color: coral;">';
                                    }
                                ?>
                                <?php echo$row['status']?></p></li>
                                <?php if($row['grades']){ ?>
                                <li><strong><a href="<?php echo "../../uploads/".$row['grades'].""; ?>">Αναλυτική βαθμολογία</strong></a></li>
                                <?php } ?>
                                <li><strong>Σχόλια: <br> <p></strong><?php echo $row['comments'];?></p></li>
                                <li><strong>Ημερομηνία υποβολής:</strong> <?php echo $row['date']; ?> </li>
                            </ul>
                        </div>
                        <!-- end of individual job advertisement-->
                    </li>
    <?php   } ?>
        </ul>
        </jobs>
        </div>
    <?php } ?>


</div>


</div>

</header>



</body>

</html>