<?php
require_once('connection.php');
$connection = new Connection();
$sum=0;
$sum2=0;
$SBE_Student_count=0;
$SELS_Student_count=0;
$SETS_Student_count=0;
$SLASS_Student_count=0;
$SPPH_Student_count=0;
$grand_total=0;
$class_size=62;

if(isset($_GET['class_size']))
{

  $class_size = $_GET['class_size'];
  if($class_size=="")
  {
    $class_size=62;
  }
}

$semester_ids="";
if(isset($_GET['semester_1']))
{
  if($semester_ids=="")
  {
    $semester_ids="1";
  }
  else
  {
    $semester_ids=$semester_ids.",1";
  }
}
if(isset($_GET['semester_2']))
{
  if($semester_ids=="")
  {
    $semester_ids="2";
  }
  else
  {
    $semester_ids=$semester_ids.",2";
  }
}
if(isset($_GET['semester_3']))
{
  if($semester_ids=="")
  {
    $semester_ids="3";
  }
  else
  {
    $semester_ids=$semester_ids.",3";
  }
}
if(isset($_GET['semester_4']))
{
  if($semester_ids=="")
  {
    $semester_ids="4";
  }
  else
  {
    $semester_ids=$semester_ids.",4";
  }
}
if(isset($_GET['semester_5']))
{
  if($semester_ids=="")
  {
    $semester_ids="5";
  }
  else
  {
    $semester_ids=$semester_ids.",5";
  }
}
if(isset($_GET['semester_6']))
{
  if($semester_ids=="")
  {
    $semester_ids="6";
  }
  else
  {
    $semester_ids=$semester_ids.",6";
  }
}


$dbconnect = $connection->getConnection();

?>
<?php

$dataPoints = array(

)

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Revenue</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                    <li>
                        <a class="nav-link" href="./analysisof_sections.php">

                            <p>Analysis of Sections</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./departmentWise_analysis.php">

                            <p>Department Wise Analysis</p>
                        </a>
                    </li>
                    <li>
                      <a class="nav-link" href="./usage_resources.php">

                            <p>Unused Resources </p>
                        </a>
                    </li>

                    <li>
                      <a class="nav-link" href="./course_distribution.php">

                            <p>School Wise Distribution</p>
                        </a>
                    </li>
                    <li>
                      <a class="nav-link" href="./available_resources.php">

                            <p>Available Resources</p>
                        </a>
                    </li>
                    <li class="nav-item active">
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
                    <a class="navbar-brand" href="#pablo">Revenue </a>

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
                                            <th>Semester</th>
                                            <th>SBE</th>
                                            <th>SELS</th>
                                            <th>SETS</th>
                                            <th>SLASS</th>
                                            <th>SPPH</th>
                                            <th>Total</th>
                                            <th>Percentage</th>




                                        </thead>
                                        <tbody>
                                          <?php

                                          $classroom_info = "SELECT * FROM semester;";
                                          $countArray= $dbconnect->query($classroom_info);
                                          if($countArray->num_rows>0)
                                          {
                                            while($row=$countArray->fetch_assoc())
                                            {
                                              ?>

                                              <tr>
                                                <td> <?php echo $row['name']." ".$row['year']; ?></td>
                                                <?php
                                                 $totalEnrolled = "SELECT SUM(enrolled_students) AS section_count FROM `section` WHERE school_id=1 AND semester_id = ".$row['id'].";";

                                                 $countArray2= $dbconnect->query($totalEnrolled);
                                                 $total=$countArray2->fetch_array();

                                                ?>
                                                <td><?php   echo $total['section_count'];?></td>
                                                <?php
                                                 $totalEnrolled = "SELECT SUM(enrolled_students) AS section_count FROM `section` WHERE school_id=2 AND semester_id = ".$row['id'].";";

                                                 $countArray2= $dbconnect->query($totalEnrolled);
                                                 $total=$countArray2->fetch_array();

                                                ?>
                                                <td><?php   echo $total['section_count'];?></td>
                                                <?php
                                                 $totalEnrolled = "SELECT SUM(enrolled_students) AS section_count FROM `section` WHERE school_id=3 AND semester_id = ".$row['id'].";";

                                                 $countArray2= $dbconnect->query($totalEnrolled);
                                                 $total=$countArray2->fetch_array();

                                                ?>
                                                <td><?php   echo $total['section_count'];?></td>
                                                <?php
                                                 $totalEnrolled = "SELECT SUM(enrolled_students) AS section_count FROM `section` WHERE school_id=4 AND semester_id=".$row['id'].";";

                                                 $countArray2= $dbconnect->query($totalEnrolled);
                                                 $total=$countArray2->fetch_array();

                                                ?>
                                                <td><?php   echo $total['section_count'];?></td>
                                                <?php
                                                 $totalEnrolled = "SELECT SUM(enrolled_students) AS section_count FROM `section` WHERE school_id=5 AND semester_id = ".$row['id'].";";

                                                 $countArray2= $dbconnect->query($totalEnrolled);
                                                 $total=$countArray2->fetch_array();

                                                ?>
                                                <td><?php   echo $total['section_count'];?></td>
                                                <?php
                                                 $totalEnrolled = "SELECT SUM(enrolled_students) AS section_count FROM `section` WHERE semester_id = ".$row['id'].";";

                                                 $countArray2= $dbconnect->query($totalEnrolled);
                                                 $total=$countArray2->fetch_array();

                                                ?>
                                                <td><?php   echo $total['section_count'];?></td>
                                                <?php
                                                $percentage=0;
                                                if(($row['id']-3)>0)
                                                {

                                                $id2 = $row['id']-3;
                                                 $totalEnrolled = "SELECT SUM(enrolled_students) AS section_count FROM `section` WHERE semester_id = ".$row['id'].";";

                                                 $countArray2= $dbconnect->query($totalEnrolled);
                                                 $total=$countArray2->fetch_array();

                                                 $totalEnrolled2 = "SELECT SUM(enrolled_students) AS section_count FROM `section` WHERE semester_id = ".$id2.";";

                                                 $countArray3= $dbconnect->query($totalEnrolled2);
                                                 $total2=$countArray3->fetch_array();
                                                 $percentage = round(($total['section_count'])/($total2['section_count'])*100,2);
                                               }

                                                ?>
                                                <td><?php  if($percentage!=0)
                                                {
                                                  echo $percentage-100;$a=array("label"=>$row['name']." ".$row['year'], "y"=>$percentage-100);array_push($dataPoints,$a);
                                                }
                                                  ?>
                                                </td>
                                               </tr>

                                              <?php
                                            }
                                          }
                                          ?>


                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-header ">
                                  <script>
                              window.onload = function() {


                              var chart = new CanvasJS.Chart("chartContainer", {
                                animationEnabled: true,
                                title: {
                                  text: "Analysis of Revenue"
                                },

                                data: [{
                                  type: "column",
                                  yValueFormatString: "#,##0.00\"\"",
                                  indexLabel: "{label} ({y})",
                                  dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                }]
                              });
                              chart.render();


                              }
                              </script>
                                  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

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
