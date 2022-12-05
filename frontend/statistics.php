<?php

date_default_timezone_set("Africa/Nairobi");

include('../backend/setup/function.php');

$today = DATE("Y-m-d");

//CONFIRMED
$confirm_result = mysqli_query($db,"SELECT count(*) AS confirm FROM patients");
$confirm_row = mysqli_fetch_array($confirm_result);
$confirm_row['confirm'];

$confirm_result1 = mysqli_query($db,"SELECT count(*) AS confirm FROM patients WHERE DATE_FORMAT(createdon, '%Y-%m-%d') = '$today' ");
$confirm_row1 = mysqli_fetch_array($confirm_result1);
$confirm_row1['confirm'];


//DEATHS
$death_result = mysqli_query($db,"SELECT count(*) AS deaths FROM patients WHERE patient_type_id = 4");
$death_row = mysqli_fetch_array($death_result);
$death_row['deaths'];

$death_result1 = mysqli_query($db,"SELECT count(*) AS deaths FROM patients WHERE patient_type_id = 4 AND DATE_FORMAT(updatedon, '%Y-%m-%d') = '$today' ");
$death_row1 = mysqli_fetch_array($death_result1);
$death_row1['deaths'];


//NEW CASES
$new_result = mysqli_query($db,"SELECT count(*) AS new_cases FROM patients WHERE patient_type_id = 5");
$new_row = mysqli_fetch_array($new_result);
$new_row['new_cases'];

$new_result1 = mysqli_query($db,"SELECT count(*) AS new_cases FROM patients WHERE patient_type_id = 5 AND DATE_FORMAT(createdon, '%Y-%m-%d') = '$today' ");
$new_row1 = mysqli_fetch_array($new_result1);
$new_row1['new_cases'];


//RECOVERIES
$rec_result = mysqli_query($db,"SELECT count(*) AS recover FROM patients WHERE patient_type_id = 3");
$rec_row = mysqli_fetch_array($rec_result);
$rec_row['recover'];

$rec_result1 = mysqli_query($db,"SELECT count(*) AS recover FROM patients WHERE patient_type_id = 3 AND DATE_FORMAT(updatedon, '%Y-%m-%d') = '$today' ");
$rec_row1 = mysqli_fetch_array($rec_result1);
$rec_row1['recover'];


//OUTPATIENTS
$out_result = mysqli_query($db,"SELECT count(*) AS outp FROM patients WHERE patient_type_id = 1");
$out_row = mysqli_fetch_array($out_result);
$out_row['outp'];

$out_result1 = mysqli_query($db,"SELECT count(*) AS outp FROM patients WHERE patient_type_id = 1 AND DATE_FORMAT(createdon, '%Y-%m-%d') = '$today' ");
$out_row1 = mysqli_fetch_array($out_result1);
$out_row1['outp'];


//INPATIENTS
$in_result = mysqli_query($db,"SELECT count(*) AS inp FROM patients WHERE patient_type_id = 2");
$in_row = mysqli_fetch_array($in_result);
$in_row['inp'];

$in_result1 = mysqli_query($db,"SELECT count(*) AS inp FROM patients WHERE patient_type_id = 2 AND DATE_FORMAT(createdon, '%Y-%m-%d') = '$today' ");
$in_row1 = mysqli_fetch_array($in_result1);
$in_row1['inp'];



//CONTACTS
$con_result = mysqli_query($db,"SELECT count(*) AS contact FROM patients WHERE patient_type_id = 6");
$con_row = mysqli_fetch_array($con_result);
$con_row['contact'];

$con_result1 = mysqli_query($db,"SELECT count(*) AS contact FROM patients WHERE patient_type_id = 6 AND DATE_FORMAT(createdon, '%Y-%m-%d') = '$today' ");
$con_row1 = mysqli_fetch_array($con_result1);
$con_row1['contact'];


//DISTRICTS
$dis_result = mysqli_query($db,"SELECT count( DISTINCT patients.region_district_id) AS district FROM patients");
$dis_row = mysqli_fetch_array($dis_result);
$dis_row['district'];

$dis_result1 = mysqli_query($db,"SELECT count( DISTINCT patients.region_district_id) AS district FROM patients WHERE patient_type_id = 6 AND DATE_FORMAT(createdon, '%Y-%m-%d') = '$today' ");
$dis_row1 = mysqli_fetch_array($dis_result1);
$dis_row1['district'];


?>
               
            <div class="container">
                <div class="row g-5">

                    <div class="col-lg-6 col-md-6">
                        <div class="service-item bg-light card-shadow rounded d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="service-icon mb-4">
                                <h1><?php echo $new_row['new_cases']; ?></h1>
                            </div>
                            <h4 class="mb-3">New Cases</h4>
                            <p class="m-0"><?php echo $new_row1['new_cases']; ?> New cases today </p>
                            <a class="btn btn-lg btn-primary rounded-pill" href="">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="service-item bg-light card-shadow rounded d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="service-icon mb-4">
                                <h1><?php echo $confirm_row['confirm']; ?></h1>
                            </div>
                            <h4 class="mb-3">Confirmed Cases</h4>
                            <p class="m-0"><?php echo $confirm_row1['confirm']; ?> Cases today </p>
                            <a class="btn btn-lg btn-primary rounded-pill" href="">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6">
                        <div class="service-item bg-light card-shadow rounded d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="service-icon mb-4">
                                <h1><?php echo $death_row['deaths']; ?></h1>
                            </div>
                            <h4 class="mb-3">Deaths</h4>
                            <p class="m-0"><?php echo $death_row1['deaths']; ?> deaths today </p>
                            <a class="btn btn-lg btn-primary rounded-pill" href="">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6">
                        <div class="service-item bg-light card-shadow rounded d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="service-icon mb-4">
                                <h1><?php echo $rec_row['recover']; ?></h1>
                            </div>
                            <h4 class="mb-3">Recoveries</h4>
                            <p class="m-0"><?php echo $rec_row1['recover']; ?> recoveries today </p>
                            <a class="btn btn-lg btn-primary rounded-pill" href="">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    
                    
                </div>