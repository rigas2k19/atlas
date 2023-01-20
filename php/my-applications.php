<!DOCTYPE html>
<html lang="en">

<?php include "includes.php"; 
    session_start();
    include "connection.php";
    include "navigation.php";
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


<div class="container">

    <div class="main-box" style="background-color: transparent;">
    <!-- get data -->
    <?php
    $sql = "SELECT * FROM application WHERE student_id = ".$_SESSION['user']['id'].";";
    //send query to database
    $result = mysqli_query($db, $sql);
    /* check if we have results */
    $result_rows = mysqli_num_rows($result);
    if($result_rows > 0){
        /* print data to html */ ?>
        <jobs>
            <ul class="joblist">
<?php        while($row = mysqli_fetch_assoc($result)){ ?>
                    <li class="job">
                        <!-- individual job advertisment -->
                        <div class="job-card">
                            <div class="top-line">
                                <div class="zoom">
                                    <h3><a href="job-details.php">Τίτλος θέσης</a></h3>
                                </div>
                                <div style=" display:flex; flex-direction:row; order:2;">
                                    <!-- user can edit only saved applications -->
                                    <?php if($row['status'] == "saved"){ ?>
                                        <button class="btn btn-primary" style="order:1;" >Επεξεργασία</button>
                                    <?php } ?>
                                    <!-- user can delete only saved and completed applications -->
                                    <?php if($row['status'] == "saved" || $row['status'] == "completed"){ ?>
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

                                    </form>
                                    <?php } ?>
                                </div>
                            </div> 
                            <p>Τμήμα</p>
                            <ul class="job-features" style="columns:1;">
                                <li><strong>Κατάσταση: </strong><?php echo$row['status']?></li>
                                <li><strong>Σχόλια: <br> <p></strong><?php echo $row['comments']?></p></li>
                                <li><strong>Ημερομηνία υποβολής:</strong> 26/12/2022</li>
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