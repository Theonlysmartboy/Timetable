<?php
require 'CORE/init.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Halls</title>
        <link rel="shortcut icon" href="images/timetable-menu-button-sm.png" type="image/x-icon"/>
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
                        <li style="margin-bottom: 10px;"><a href="index.php"><button class="btn btn-block bg-primary">Back</button></a></li>
                        <li><a href="Lecturers.php"><button class="btn btn-block btn-success">Manage Lecturers </button></a></li>
                        <li style="margin-top: 10px;"> <a href="Units.php"><button class="btn btn-block btn-warning">Manage Units</button></a></li>
                    </ul>
                </div>
            </div> 
            <div class="col-sm-9 col-md-9 well">
                <div class="form">
                    <ul class="tab-group">
                        <li class="tab"><a href="#addschools">Add HALLS</a></li>
                        <li class="tab active"><a href="#viewschools">View HALLS</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="viewschools">   
                            <?php
                            $result = $conn->query("SELECT * from lecture_halls ");
                            ?>
                            <table width="500" border="0" cellspacing="1" cellpadding="0">
                                <tr>
                                    <td>
                                        <form name="form1" method="post" action="">
                                            <table class="table table-bordered table-striped table-hover table-responsive">
                                                <thead>
                                                    <tr class="bg-primary">
                                                        <th>#</th>
                                                        <th>Name</th>
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
                                                            <td><?php echo $row['Name']; ?></td>
                                                            <td><a href='functions/deletehall.php?id=<?php echo $row['Id']; ?>' class="btn btn-block btn-danger"> delete</a></td>
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

                            <form action="functions/addhall.php" method="post">
                                <div class="top-row">
                                    <div class="form-group field-wrap">
                                        <label>Hall Name<span class="req">*ex LH101</span>
                                        </label>
                                        <input type="text" required autocomplete="on" name='name' style="color: #FFFFFF;" />
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