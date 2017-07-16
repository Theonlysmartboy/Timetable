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
<html>
    <head>
        <meta charset="UTF-8">
        <title>New TimeTable</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
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
        <div class="container" style="margin-top: 70px;">
            <h3 class="text-capitalize text-danger">Note!</h3>
            <p>To add a schedule to the timetable, select unit and schedule.<br>
                the schedule alredy has the time, lecture hall and day the day is such that<br>
            <ol>
                <li>Is MONDAY</li>
                <li>Is TUESDAY</li>
                <li>Is WEDNESDAY</li>
                <li>Is THURSDAY</li>
                <li>Is FRIDAY</li>
                <li>Is MONDAY</li>
                <li>Is SATURDAY</li>
                <li>Is SUNDAY</li>
            </ol></p>
        <form action="includes/addp.php" method="post">
            <div class="form-group">
                <label for="SC">Schedule</label>
                <select name="Schedule" id="Schedule" class="form-control">
                    <option value="Select School">Select Shool</option>
                    <?php
                    $result = $conn->query("select schedules.Id, schedules.Day,lecture_halls.Name,sessions.Time from schedules join sessions on schedules.Session=sessions.Id JOIN lecture_halls ON schedules.Lecture_Hall=lecture_halls.Id ") or die($conn->error);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row['Id'] . "'>" . $row['Day'] . " " . $row['Name'] . " " . $row['Time'] . "</option>";
                    }
                    ?>        
                </select>
            </div>
            <div class="form-group">
                <label for="SC">Unit</label>
                <select name="Unit" id="Unit" class="form-control">
                    <option value="Select School">Select Shool</option>
                    <?php
                    $result1 = $conn->query("SELECT * FROM units") or die($conn->error);
                    while ($row = mysqli_fetch_array($result1)) {
                        echo "<option value='" . $row['Unit_Code'] . "'>" . $row['Unit_Code'] . "</option>";
                    }
                    ?>        
                </select>
            </div>
            <div class="form-group field-wrap">
                <button type="submit" class="button button-block" name="register" />SUBMIT</button>
            </div>
        </form>
    </div>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/index.js" type="text/javascript"></script>
</body>
</html>
