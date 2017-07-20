<?php
require 'CORE/init.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Units</title>
        <link rel="shortcut icon" href="../resources/images/student-portal_icon.png"  type="image/x-icon"/>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/Appearance.css" rel="stylesheet" type="text/css"/>
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <!--  JavaScript files-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="//fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    </head>
    <body>
        <div class="row">
            <div class="col-sm-3 col-md-3 well">
                <div class="bg-info">
                </div>
                <div class="buttons">
                    <ul style="list-style: none; float: contour;">
                        <li style="margin-bottom: 10px;"><a href="Admin.php"><button class="btn btn-block bg-primary">Back</button></a></li>
                        <li style="margin-bottom: 10px; margin-top: 10px;"><a href="manage_admins.php"><button class="btn btn-block btn-success">Manage Admin </button></a></li>
                        <li><a href="manage_departments.php"><button class="btn btn-block btn-success">Manage Departments </button></a></li>
                        <li style="margin-top: 10px;"> <a href="../Controller/logout.php"><button class="btn btn-block btn-danger">LOG OUT</button></a></li>
                    </ul>
                </div>
            </div> 
            <div class="col-sm-9 col-md-9 well">
                <div class="form">
                    <ul class="tab-group">
                        <li class="tab"><a href="#addschools">Add schools</a></li>
                        <li class="tab active"><a href="#viewschools">View Schools</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="viewschools">   
                            <?php
                            $result = $conn->query("SELECT units.Unit_Code,units.Unit_Name,programs.Prog_name,lecturers.Title,lecturers.First_Name,lecturers.Middle_Name,lecturers.Last_Name"
                                    . " FROM units JOIN programs on units.Prog_Id=programs.Prog_Id "
                                    . "JOIN lecturers on units.Lecturer=lecturers.Pf_No "
                                    . "ORDER BY programs.Prog_name ASC ");
                            ?>
                            <table width="400" border="0" cellspacing="1" cellpadding="0">
                                <tr>
                                    <td>
                                        <form name="form1" method="post" action="">
                                            <table class="table table-bordered table-striped table-hover table-responsive">
                                                <thead>
                                                    <tr class="bg-primary">
                                                        <th>#</th>
                                                        <th>Program Name</th>
                                                        <th>Unit Code</th>
                                                        <th>Unit Name</th>
                                                        <th>Lecturer</th>
                                                        <th>action</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                $a = 1;
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <tbody>
                                                        <tr>
                                                            <td align="center"><?php echo $a++; ?></td>
                                                            <td><?php echo $row['Prog_name']; ?></td>
                                                            <td><?php echo $row['Unit_Code']; ?></td>
                                                            <td><?php echo $row['Unit_Name']; ?></td>
                                                            <td><?php echo $row['Title'] . " " . $row['First_Name'] . " " . $row['Middle_Name'] . " " . $row['Last_Name']; ?></td>
                                                            <td><a href='../Controller/deletesc.php?id=<?php echo $row['Unit_Code']; ?>' class="btn btn-block btn-danger"> delete</a></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    $conn->close();
                                                    ?>
                                                </tbody>
                                            </table>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                            ?>
                        </div>
                        <div id="addschools">   
                            <h1 style="color: #FFFFFF;">Enter all the relevant details here</h1>

                            <form action="../Controller/addsc.php" method="post">

                                <div class="top-row">
                                    <div class="form-group field-wrap">
                                        <label>Name<span class="req">*ex education</span>
                                        </label>
                                        <input type="text" required autocomplete="on" name='scname' style="color: #FFFFFF;" />
                                    </div>
                                </div>
                                <div class="form-group field-wrap">
                                    <button type="submit" class="button button-block" name="register" />SUBMIT</button>
                                </div>
                            </form>
                        </div>  
                    </div><!-- tab-content -->
                </div> <!-- /form -->
            </div>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js" type="text/javascript"></script>
        <script src="js/Copyright.js" type="text/javascript"></script>
            </body>
</html>