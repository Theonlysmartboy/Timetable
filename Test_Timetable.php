<?php
require_once 'core/init.php';
if (Session::exists('home')) {
    $big_errors = Session::flash('home');
}
$user = new User();
if ($user->hasPermission('admin')) {
    $admin_rights = "Admin";
} else {
    $admin_rights = "User";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="images/timetable-menu-button-sm.png" type="image/x-icon"/>
        <title>Timetable</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <style>
            body {
                padding-top: 70px;
                /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
            }
        </style>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Timetable</a>
                </div>
                <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Pages <b class='caret'></b></a>
                            <ul class='dropdown-menu'>
                                <?php
                                if ($admin_rights == "Admin") {
                                    echo "<li>";
                                    echo "<a href='update_time_table.php'>Update Time Table</a>";
                                    echo "</li>";
                                } else {
                                    //Do nothing
                                }
                                echo "<li>";
                                echo "<a href='logout.php'>Log Out</a>";
                                echo "</li>";
                                ?>
                            </ul>
                        </li>
                    </ul>
                </div>          
            </div>
            <!-- /.container -->
        </nav>
        <!-- Page Content -->
        <div class="container">

            <div class="row">
                <div style="padding: 5px; font-weight: bold;">
                    <table class="table table-bordered table-striped table-hover table-responsive">
                        <thead>
                            <tr class='bg-primary'><th>Day/Time</th>
                                <?php
                                $result = $conn->query("SELECT * FROM `sessions` ");
                                $result1 = $conn->query("select timetable.Id,schedules.Day,timetable.Unit,lecture_halls.Name,lecturers.Title,lecturers.First_Name,lecturers.Middle_Name from timetable JOIN units on timetable.Unit=units.Unit_Code join lecturers on units.Lecturer=lecturers.Pf_No join schedules on timetable.Schedule=schedules.Id JOIN lecture_halls ON schedules.Lecture_Hall=lecture_halls.Id join sessions on schedules.Session=sessions.Id ");
                                $date = $conn->query("SELECT MAX(Day) FROM schedules");
                                $max = $date->fetch_assoc();
                                $maxdate = implode(" ", $max);
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<th>" . $row['Time'] . "</th>";
                                }
                                ?>
                            </tr>         
                        </thead>
                        <tbody>

                            <?php
                            while ($row = mysqli_fetch_array($result1)) {
                                echo "<tr>";
                                for ($x = 0; $x < $maxdate-1; $x++) {
                                    echo "<td><b>" . jddayofweek($x, 1) . "</b></td>";
                                    echo "<td>" . $row['Unit'] . "<span style='font-size:10px;color:#CC5B0A;'>AT</span>" . $row['Name'] . "<span style='font-size:10px;color:#CC5B0A;'>BY</span>" . $row['Title'] . " " . $row['First_Name'] . " ";
                                }
                                echo "</tr>";
                            }
                            ?>
                           
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12 text-center">

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

        <!-- jQuery Version 1.11.1 -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

</html>