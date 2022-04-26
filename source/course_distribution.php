<?php
require_once('connection.php');
$connection = new Connection();
$sum=0;
$sum2=0;
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
                                  <form  action="./course_distribution.php">
                                    <div class="d-flex flex-row">
                                      <?php
                                      $classroom_info = "SELECT * FROM semester;";
                                      $countArray= $dbconnect->query($classroom_info);
                                      if($countArray->num_rows>0)
                                      {
                                        while($row=$countArray->fetch_assoc())
                                        {
                                          ?>

                                            <div class="p-2"><input type="checkbox" name=<?php echo "semester_".$row['id'] ?> value=<?php echo $row['id'] ?> <?php if(isset($_GET['semester_'.$row['id']])) echo "Checked";?>><label for="vehicle1">
                                              <?php echo $row['name']." ".$row['year'] ?></label><br></div>
                                          <?php
                                        }
                                      }
                                      ?>
                                    </div>

                                    <div class="d-flex flex-row">
                                      <button type="submit" class="btn btn-primary">Show Result</button>
                                    </div>

                                   </form>

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
                                              for($j=1;$j<=5;$j++)
                                              {
                                                $totalEnrolled = "SELECT COUNT(section.enrolled_students) AS sectionCount FROM `section` WHERE enrolled_students>=1 AND enrolled_students<=10 AND school_id=".$j;
                                                if($semester_ids!="")
                                                {
                                                  $totalEnrolled=$totalEnrolled." AND semester_id IN (".$semester_ids.");";
                                                }
                                                else
                                                {
                                                 $totalEnrolled=$totalEnrolled.";";
                                                }

                                                $countArray= $dbconnect->query($totalEnrolled);
                                                $row=$countArray->fetch_array();
                                                echo   "<td> ". $row['sectionCount']."</td>";
                                               $sum_one_ten=$sum_one_ten+$row['sectionCount'];
                                              }
                                               echo   "<td> ". $sum_one_ten."</td>";
                                              ?>
                                            </tr>

                                            <tr>
                                                <td>11-20</td>
                                                <?php
                                                $sum_11_20=0;

                                                for($j=1;$j<=5;$j++)
                                                {
                                                  $totalEnrolled = "SELECT COUNT(section.enrolled_students) AS sectionCount FROM `section` WHERE enrolled_students>=11 AND enrolled_students<=20 AND school_id=".$j;
                                                  if($semester_ids!="")
                                                  {
                                                    $totalEnrolled=$totalEnrolled." AND semester_id IN (".$semester_ids.");";
                                                  }
                                                  else
                                                  {
                                                   $totalEnrolled=$totalEnrolled.";";
                                                  }
                                                  $countArray= $dbconnect->query($totalEnrolled);
                                                  $row=$countArray->fetch_array();
                                                  echo   "<td> ". $row['sectionCount']."</td>";
                                                 $sum_11_20=$sum_11_20+$row['sectionCount'];
                                                }
                                                ?>
                                                 <?php echo   "<td> ". $sum_11_20."</td>" ?>;
                                            </tr>
                                            <tr>
                                                <td>21-30</td>
                                                <?php
                                                $sum_21_30=0;
                                                for($j=1;$j<=5;$j++)
                                                {
                                                  $totalEnrolled = "SELECT COUNT(section.enrolled_students) AS sectionCount FROM `section` WHERE enrolled_students>=21 AND enrolled_students<=30 AND school_id=".$j;
                                                  if($semester_ids!="")
                                                  {
                                                    $totalEnrolled=$totalEnrolled." AND semester_id IN (".$semester_ids.");";
                                                  }
                                                  else
                                                  {
                                                   $totalEnrolled=$totalEnrolled.";";
                                                  }


                                                  $countArray= $dbconnect->query($totalEnrolled);
                                                  $row=$countArray->fetch_array();
                                                  echo   "<td> ". $row['sectionCount']."</td>";
                                                 $sum_21_30=$sum_21_30+$row['sectionCount'];
                                                }
                                                ?>
                                                 <?php echo   "<td> ". $sum_21_30."</td>" ?>;

                                            </tr>
                                            <tr>


                                                <td>31-35</td>
                                                <?php
                                                $sum_31_35=0;
                                                for($j=1;$j<=5;$j++)
                                                {
                                                  $totalEnrolled = "SELECT COUNT(section.enrolled_students) AS sectionCount FROM `section` WHERE enrolled_students>=31 AND enrolled_students<=35 AND school_id=".$j;
                                                  if($semester_ids!="")
                                                  {
                                                    $totalEnrolled=$totalEnrolled." AND semester_id IN (".$semester_ids.");";
                                                  }
                                                  else
                                                  {
                                                   $totalEnrolled=$totalEnrolled.";";
                                                  }


                                                  $countArray= $dbconnect->query($totalEnrolled);
                                                  $row=$countArray->fetch_array();
                                                  echo   "<td> ". $row['sectionCount']."</td>";
                                                 $sum_31_35=$sum_31_35+$row['sectionCount'];
                                                }
                                                ?>
                                                <?php echo   "<td> ". $sum_31_35."</td>" ?>;

                                            </tr>
                                            <tr>

                                                <td>36-40</td>

                                                <?php
                                                $sum_36_40=0;

                                                for($j=1;$j<=5;$j++)
                                                {
                                                  $totalEnrolled = "SELECT COUNT(section.enrolled_students) AS sectionCount FROM `section` WHERE enrolled_students>=36 AND enrolled_students<=40 AND school_id=".$j;
                                                  if($semester_ids!="")
                                                  {
                                                    $totalEnrolled=$totalEnrolled." AND semester_id IN (".$semester_ids.");";
                                                  }
                                                  else
                                                  {
                                                   $totalEnrolled=$totalEnrolled.";";
                                                  }


                                                  $countArray= $dbconnect->query($totalEnrolled);
                                                  $row=$countArray->fetch_array();
                                                  echo   "<td> ". $row['sectionCount']."</td>";
                                                 $sum_36_40=$sum_36_40+$row['sectionCount'];
                                                }
                                                ?>
                                                 <?php echo   "<td> ". $sum_36_40."</td>" ?>;

                                            </tr>
                                            <tr>

                                                <td>41-50</td>
                                                <?php
                                                $sum_41_50=0;
                                                for($j=1;$j<=5;$j++)
                                                {
                                                  $totalEnrolled = "SELECT COUNT(section.enrolled_students) AS sectionCount FROM `section` WHERE enrolled_students>=41 AND enrolled_students<=50 AND school_id=".$j;
                                                  if($semester_ids!="")
                                                  {
                                                    $totalEnrolled=$totalEnrolled." AND semester_id IN (".$semester_ids.");";
                                                  }
                                                  else
                                                  {
                                                   $totalEnrolled=$totalEnrolled.";";
                                                  }


                                                  $countArray= $dbconnect->query($totalEnrolled);
                                                  $row=$countArray->fetch_array();
                                                  echo   "<td> ". $row['sectionCount']."</td>";
                                                 $sum_41_50=$sum_41_50+$row['sectionCount'];
                                                }
                                                ?>
                                                <?php echo   "<td> ". $sum_41_50."</td>" ?>;

                                            </tr>
                                            <tr>

                                                <td>51-55</td>
                                                <?php
                                                $sum_51_55=0;
                                                for($j=1;$j<=5;$j++)
                                                {
                                                  $totalEnrolled = "SELECT COUNT(section.enrolled_students) AS sectionCount FROM `section` WHERE enrolled_students>=51 AND enrolled_students<=55 AND school_id=".$j;
                                                  if($semester_ids!="")
                                                  {
                                                    $totalEnrolled=$totalEnrolled." AND semester_id IN (".$semester_ids.");";
                                                  }
                                                  else
                                                  {
                                                   $totalEnrolled=$totalEnrolled.";";
                                                  }


                                                  $countArray= $dbconnect->query($totalEnrolled);
                                                  $row=$countArray->fetch_array();
                                                  echo   "<td> ". $row['sectionCount']."</td>";
                                                 $sum_51_55=$sum_51_55+$row['sectionCount'];
                                                }
                                                ?>
                                                 <?php echo   "<td> ". $sum_51_55."</td>" ?>;


                                            </tr>
                                            <tr>

                                              <td>56-60</td>

                                              <?php
                                              $sum_56_60=0;
                                              for($j=1;$j<=5;$j++)
                                              {
                                                $totalEnrolled = "SELECT COUNT(section.enrolled_students) AS sectionCount FROM `section` WHERE enrolled_students>=56 AND enrolled_students<=60 AND school_id=".$j;
                                                if($semester_ids!="")
                                                {
                                                  $totalEnrolled=$totalEnrolled." AND semester_id IN (".$semester_ids.");";
                                                }
                                                else
                                                {
                                                 $totalEnrolled=$totalEnrolled.";";
                                                }


                                                $countArray= $dbconnect->query($totalEnrolled);
                                                $row=$countArray->fetch_array();
                                                echo   "<td> ". $row['sectionCount']."</td>";
                                               $sum_56_60=$sum_56_60+$row['sectionCount'];
                                              }
                                              ?>
                                               <?php echo   "<td> ". $sum_56_60."</td>"?>;
                                            </tr>
                                            <tr>
                                              <?php
                                              $totalEnrolled="SELECT COUNT(section.enrolled_students) AS sectionCount FROM `section` WHERE enrolled_students>=1 AND enrolled_students<=65";
                                              if($semester_ids!="")
                                              {
                                                $totalEnrolled=$totalEnrolled." AND semester_id IN (".$semester_ids.");";
                                              }
                                              else
                                              {
                                               $totalEnrolled=$totalEnrolled.";";
                                              }
                                              $countArray=$dbconnect->query($totalEnrolled);
                                              $total=$countArray->fetch_array();
                                              ?>


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
