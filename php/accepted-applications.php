<!DOCTYPE html>
<html lang="en">

<?php include "includes.php"; 
    session_start();
    include "connection.php";
    include "student-menu.php";
    include "includes.php";
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

    <!-- main container -->
    <div class="container">
        <div class="main-box" style="background-color: transparent;">

        <!-- php to get saved applications -->
        <?php 
            $sql = "SELECT * FROM application WHERE student_id = ".$_SESSION['user']['id']." AND status = 'Εγκεκριμένη';";
            //send query to database
            $result = mysqli_query($db, $sql);
            /* check if we have results */
            $result_rows = mysqli_num_rows($result);
            if($result_rows > 0){
            /* print data to html */
        ?>
            <ul class="joblist">
            <?php
            #for every application:
            while($row = mysqli_fetch_assoc($result)){
                #find corresponding ad.
                $sql_ad = "SELECT * FROM ads WHERE id = ".$row['ad_id'].";";
                $result_ad = mysqli_query($db, $sql_ad);
                $ad = mysqli_fetch_assoc($result_ad);
            ?>
            <li class="job">
                  <!-- individual job advertisment -->
                  <div class="job-card">
                    <!-- top line -->
                    <div class="top-line">
                        <!-- TITLE -->
                        <div class="zoom">
                            <form method="POST" action="job-details.php">
                                <input type="hidden" name="show-submit-application" value=0>
                                <input type="hidden" name="ad-id" value="<?php echo $ad['id']; ?>">
                                <h3><button type="submit" name="show-details" class="job-title-button"> <?php echo $ad['title']?> </button></h3>
                            </form>
                        </div>
                        <!-- END OF TITLE -->

                        <div style=" display:flex; flex-direction:row; order:2;">
                            <!-- DELETE BUTTON -->
                            <div style="width: 5px; opacity:0; order:2;"></div>
                            <form method="POST" action="delete-application.php" style="order:3;">
                                <input type="hidden" name="application-id" value="<?php echo $row['application_id']; ?>">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteApplication">Διαγραφή</button>
                                
                                <!-- Confirmation modal for deleting application -->
                                <div class="modal fade" id="modalDeleteApplication" tabindex="-1" role="dialog" aria-labelledby="modalDeleteApplication" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title w-100 font-weight-bold">Είστε σίγουροι ότι θέλετε να διαγράψετε την αίτηση οριστικά;</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="top-line">
                                                <!-- Confirm Button  -->
                                                <div class="modal-footer d-flex justify-content-center" style="order:2;">
                                                    <button type="submit" name="delete-application" class="form-control-submit-button" style="border-radius: 2rem; width:100px; height: 30px;">Ναι</button>
                                                </div>
                                                <!-- Cancel Button -->
                                                <div class="modal-footer d-flex justify-content-center" style="order:1;">
                                                    <a data-toggle="modal" data-target="#modalDeleteApplication" href="">Ακύρωση</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of confirmation modal for deleting application -->

                            </form>
                            <!-- END OF DELETE BUTTON -->
                        </div>
                    </div> 
                    <!-- end of top line -->

                    <!-- job and application information -->
                    <p><?php echo $ad['subject']?></p>
                    <ul class="job-features" style="columns:1;">
                        <li><strong>Κατάσταση: </strong><?php echo$row['status']?></li>
                        <li><strong><a href="<?php echo "../uploads/".$row['grades'].""; ?>">Αναλυτική βαθμολογία</strong></a></li>
                        <li><strong>Σχόλια: <br> <p></strong><?php echo $row['comments'];?></p></li>
                        <li><strong>Ημερομηνία υποβολής:</strong> <?php echo $row['date']; ?> </li>
                    </ul>
                    <!-- end of job and application information -->
                </div>
                <!-- end of individual job advertisement-->
            </li>  
            <!-- end of individual job application -->

        <!-- end of while -->
        <?php } ?>
            
        </ul>
    </jobs>
</div>
<!-- end of if $result rows > 0 -->
<?php } ?>


</div>
</div>
    <!-- end of main container -->
</header>
</body>
</html>