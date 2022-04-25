<?php
require_once('connection.php');
$connection = new Connection();
$sum=0;
$sum2=0;
$dbconnect = $connection->getConnection();
if ($dbconnect)
{

}
else
  {

  }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>School Wise section Distribution</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                      Team Creative
                    </a>
                </div>
                <ul class="nav">
                    <li >
                       <a class="nav-link" href="./class_size.php">

                            <p>Classroom Requirements</p>
                        </a>
                    </li>
                    <li >
                        <a class="nav-link" href="./analysisof_sections.php">

                            <p>Analysis of Sections</p>
                        </a>
                    </li>
                    <li >
                        <a class="nav-link" href="./departmentWise_analysis.php">

                            <p>Department Wise Analysis</p>
                        </a>
                    </li>
                    <li>
                      <a class="nav-link" href="./usage_resources.php">

                            <p>Unused Resources </p>
                        </a>
                    </li>

                    <li class="nav-item active">
                      <a class="nav-link" href="./course_distribution.php">

                            <p>School Wise Distribution</p>
                        </a>
                    </li>
                    <li>
                      <a class="nav-link" href="./available_resources.php">

                            <p>Available Resources</p>
                        </a>
                    </li>
                    <li>
                      <a class="nav-link" href="./revenue.php">

                            <p>Revenue</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> School Wise section Distribution </a>

                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">



                        </ul>
                        <ul class="navbar-nav ml-auto">


                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">

                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Size</th>
                                            <th>SBE</th>
                                            <th>SELS</th>
                                            <th>SETS</th>
                                            <th>SLASS</th>
                                            <th>SPPH</th>
                                            <th>Total</th>

                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td>1-10</td>
                                              <?php
                                              $sum_one_ten=0;
                                              $totalEnrolled = "SELECT COUNT(section.enrolled_students) AS sectionCount FROM `section` WHERE enrolled_students>=1 AND enrolled_students<=10 GROUP BY section.school_id;";
                                              $countArray= $dbconnect->query($totalEnrolled);

                                              if($countArray->num_rows>0)
                                              {
                                                while($row=$countArray->fetch_assoc())
                                                {
                                                  echo   "<td> ". $row['sectionCount']."</td>";
                                                $sum_one_ten=$sum_one_ten+$row['sectionCount'];



                                                }

                                                   echo   "<td> ". $sum_one_ten."</td>";


                                              }

                                              ?>
                                            </tr>

                                            <tr>

                                                <td>11-20</td>
                                                <?php
                                                $sum_11_20=0;
                                                $totalEnrolled = "SELECT COUNT(section.enrolled_students) AS sectionCount FROM `section` WHERE enrolled_students>=11 AND enrolled_students<=20 GROUP BY section.school_id;";
                                                $countArray= $dbconnect->query($totalEnrolled);

                                                if($countArray->num_rows>0)
                                                {
                                                  while($row=$countArray->fetch_assoc())
                                                  {
                                                    echo   "<td> ". $row['sectionCount']."</td>";
                                                    $sum_11_20=$sum_11_20+$row['sectionCount'];


                                                  }
                                                  echo  "<td> ". $sum_11_20."</td>";


                                                }
                                                 ?>

                                            </tr>
                                            <tr>


                                                <td>21-30</td>
                                                <?php
                                                $sum_21_30=0;
                                                $totalEnrolled = "SELECT COUNT(section.enrolled_students) AS sectionCount FROM `section` WHERE enrolled_students>=21 AND enrolled_students<=30 GROUP BY section.school_id;";
                                                $countArray= $dbconnect->query($totalEnrolled);

                                                if($countArray->num_rows>0)
                                                {
                                                  while($row=$countArray->fetch_assoc())
                                                  {
                                                    echo   "<td> ". $row['sectionCount']."</td>";
                                                    $sum_21_30=$sum_21_30+$row['sectionCount'];


                                                  }
                                                  echo "<td>".$sum_21_30."</td>";


                                                }
                                                 ?>

                                            </tr>
                                            <tr>


                                                <td>31-35</td>
                                                <?php
                                                $sum_31_35=0;
                                                $totalEnrolled = "SELECT COUNT(section.enrolled_students) AS sectionCount FROM `section` WHERE enrolled_students>=31 AND enrolled_students<=35 GROUP BY section.school_id;";
                                                $countArray= $dbconnect->query($totalEnrolled);

                                                if($countArray->num_rows>0)
                                                {
                                                  while($row=$countArray->fetch_assoc())
                                                  {
                                                    echo   "<td> ". $row['sectionCount']."</td>";
                                                      $sum_31_35=$sum_31_35+$row['sectionCount'];


                                                  }
                                                    echo "<td>".$sum_31_35."</td>";



                                                }
                                                 ?>

                                            </tr>
                                            <tr>

                                                <td>36-40</td>

                                                <?php
                                                $sum_36_40=0;

                                                $totalEnrolled = "SELECT COUNT(section.enrolled_students) AS sectionCount FROM `section` WHERE enrolled_students>=36 AND enrolled_students<=40 GROUP BY section.school_id;";
                                                $countArray= $dbconnect->query($totalEnrolled);

                                                if($countArray->num_rows>0)
                                                {
                                                  while($row=$countArray->fetch_assoc())
                                                  {
                                                    echo   "<td> ". $row['sectionCount']."</td>";
                                                    $sum_36_40=$sum_36_40+$row['sectionCount'];


                                                  }
                                                  echo "<td>".$sum_36_40."</td>";

                                                }
                                                ?>


                                            </tr>
                                            <tr>

                                                <td>41-50</td>
                                                <?php
                                                $sum_41_50=0;
                                                $totalEnrolled = "SELECT COUNT(section.enrolled_students) AS sectionCount FROM `section` WHERE enrolled_students>=41 AND enrolled_students<=50 GROUP BY section.school_id;";
                                                $countArray= $dbconnect->query($totalEnrolled);

                                                if($countArray->num_rows>0)
                                                {
                                                  while($row=$countArray->fetch_assoc())
                                                  {
                                                    echo   "<td> ". $row['sectionCount']."</td>";
                                                    $sum_41_50=$sum_41_50+$row['sectionCount'];


                                                  }
                                                  echo "<td>".$sum_41_50."</td>";


                                                }
                                                ?>

                                            </tr>
                                            <tr>

                                                <td>51-55</td>
                                                <?php
                                                $sum_51_55=0;
                                                $totalEnrolled = "SELECT COUNT(section.enrolled_students) AS sectionCount FROM `section` WHERE enrolled_students>=51 AND enrolled_students<=55 GROUP BY section.school_id;";
                                                $countArray= $dbconnect->query($totalEnrolled);

                                                if($countArray->num_rows>0)
                                                {
                                                  while($row=$countArray->fetch_assoc())
                                                  {
                                                    echo   "<td> ". $row['sectionCount']."</td>";
                                                    $sum_51_55=$sum_51_55+$row['sectionCount'];


                                                  }
                                                  echo "<td>".$sum_51_55."</td>";




                                                }
                                                 ?>


                                            </tr>
                                            <tr>

                                              <td>56-60</td>

                                              <?php
                                              $sum_56_60=0;
                                              $totalEnrolled = "SELECT COUNT(section.enrolled_students) AS sectionCount FROM `section` WHERE enrolled_students>=56 AND enrolled_students<=60 GROUP BY section.school_id;";
                                              $countArray= $dbconnect->query($totalEnrolled);

                                              if($countArray->num_rows>0)
                                              {
                                                while($row=$countArray->fetch_assoc())
                                                {
                                                  echo   "<td> ". $row['sectionCount']."</td>";
                                                  $sum_56_60=$sum_56_60+$row['sectionCount'];


                                                }
                                                 echo "<td>".$sum_56_60."</td>";


                                              }
                                               ?>
                                            </tr>
                                            <tr>
                                              <?php
                                              $totalEnrolled="SELECT COUNT(section.enrolled_students) AS sectionCount FROM `section` WHERE enrolled_students>=1 AND enrolled_students<=65;";
                                              $countArray=$dbconnect->query($totalEnrolled);
                                              $total=$countArray->fetch_array();
                                              ?>
                                                <td>Total : </td>
                                                <td><?php echo $total['sectionCount']; ?></td>
                                                <td> <?php echo $sum; ?></td>
                                                  <td> <?php echo $sum2; ?></td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--   -->
    <!-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
			<li class="header-title"> Sidebar Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <label class="switch">
                        <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <p>Filters</p>
                    <div class="pull-right">
                        <span class="badge filter badge-black" data-color="black"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple active" data-color="purple"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Images</li>

            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-1.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="..//assets/img/sidebar-4.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-5.jpg" alt="" />
                </a>
            </li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
                </div>
            </li>

            <li class="header-title pro-title text-center">Want more components?</li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
                </div>
            </li>

            <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>

            <li class="button-container">
				<button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 256</button>
                <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 426</button>
            </li>
        </ul>
    </div>
</div>
 -->
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

</html>
