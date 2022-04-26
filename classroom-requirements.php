<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Classroom Requirements</title>
</head>

<body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
                aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>
            <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">RRAS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar"
                aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topNavBar">
                <form class="d-flex ms-auto my-3 my-lg-0">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                            <li><a class="dropdown-item" href="#">User Settings</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3"></div>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3 active">
                            <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                            <span>Classroom Requirements</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider bg-light" />
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                            INTERFACE
                        </div>
                    </li>
                    <li>
                        <a href="dashboard.php" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="enrollment-analysis.php" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-book-fill"></i></span>
                            <span>Enrollment Analysis</span>
                        </a>
                    </li>
                    <li>
                        <a href="course-distribution.php" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-book-fill"></i></span>
                            <span>Course Distribution</span>
                        </a>
                    </li>
                    <li>
                        <a href="unused-resources.php" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-book-fill"></i></span>
                            <span>Unused Resources</span>
                        </a>
                    </li>
                    <li>
                        <a href="revenue-report.php" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-book-fill"></i></span>
                            <span>Revenue Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="classroom-requirements.php" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-book-fill"></i></span>
                            <span>Classroom Requirement</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

     <!-- Table Showing -->
     <div class="home-content">
            <table class="button_1">
                <tr>
                    <th></th>
                    <th>Spring 2009</th>
                    <th></th>
                    <th></th>
                    <th>summer 2009</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th>Class Size</th>
                    <th>Sections</th>
                    <th>Class room 6</th>
                    <th>Class room 7</th>
                    <th>Sections</th>
                    <th>Class room 6</th>
                    <th>Class room 7</th>
                </tr>

                <?php

                //Connect with the database
                include('DataBase/connection.php');

                if ($conn->connect_errno) {
                    die("Error connecting" . $conn->connect_error);
                }

                //USE the SQL query Here
                $cls_size1 = array(0, 11, 21, 31, 36, 41, 51, 56);
                $cls_size2 = array(10, 20, 30, 35, 40, 50, 55, 60);

                $section_spring = array();
                $section_summer = array();
                $class_room_6_spring = array();
                $class_room_7_spring = array();
                $class_room_6_summer = array();
                $class_room_7_summer = array();

                $section_spring_sum = 0;
                $section_summer_sum = 0;
                $class_room_6_spring_sum = 0;
                $class_room_7_spring_sum = 0;
                $class_room_6_summer_sum = 0;
                $class_room_7_summer_sum = 0;

                //For spring
                for ($i = 0; $i < count($cls_size1); $i++) {
                    //USE the SQL query Here
                    $sql = "SELECT COUNT(*) FROM section_t AS s, classroom_t AS c WHERE s.room_id=c.room_id AND
                    semester_name='spring' AND semester_year='2009' AND roomcapacity BETWEEN $cls_size1[$i] AND $cls_size2[$i];";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $section_spring[] = implode(" ", $row);
                        }
                    }
                }

                for ($i = 0; $i < count($section_spring); $i++) {
                    $class_room_6_spring[$i] = ($section_spring[$i] / 14);
                    $class_room_7_spring[$i] = ($section_spring[$i] / 16);
                }

                //For summer
                for ($i = 0; $i < count($cls_size1); $i++) {
                    //USE the SQL query Here
                    $sql = "SELECT COUNT(*) FROM section_t AS s, classroom_t AS c WHERE s.room_id=c.room_id AND
                    semester_name='summer' AND semester_year='2009' AND roomcapacity BETWEEN $cls_size1[$i] AND $cls_size2[$i];";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $section_summer[] = implode(" ", $row);
                        }
                    }
                }

                for ($i = 0; $i < count($section_summer); $i++) {
                    $class_room_6_summe[$i] = ($section_summer[$i] / 14);
                    $class_room_7_summe[$i] = ($section_summer[$i] / 16);
                }

                for ($i = 0; $i < count($section_summer); $i++) {
                    $section_spring_sum = ($section_spring_sum + $section_spring[$i]);
                    $section_summer_sum = ($section_summer_sum + $section_summer[$i]);
                    $class_room_6_spring_sum = ($class_room_6_spring_sum + $class_room_6_spring[$i]);
                    $class_room_7_spring_sum = ($class_room_7_spring_sum + $class_room_7_spring[$i]);
                    $class_room_6_summer_sum = ($class_room_6_summer_sum + $class_room_6_summe[$i]);
                    $class_room_7_summer_sum = ($class_room_7_summer_sum + $class_room_7_summe[$i]);
                }

                for ($i = 0; $i < count($section_summer); $i++) {
                    echo "<tr><td>" . "$cls_size1[$i]" . "-" . "$cls_size2[$i]" . "</td><td>" . $section_spring[$i] . "</td><td>" . round($class_room_6_spring[$i], 2) .
                        "</td><td>" . round($class_room_7_spring[$i], 2) . "</td><td>" . round($section_summer[$i], 2) . "</td><td>" . round($class_room_6_summe[$i], 2) .
                        "</td><td>" . round($class_room_7_summe[$i], 2) . "</td></tr>";
                }

                echo "<tr><td>" . '<b>TOTAL</b>' . "</td><td>" . $section_spring_sum . "</td><td>" . round($class_room_6_spring_sum, 2) . "</td><td>" .
                    round($class_room_7_spring_sum, 2) . "</td><td>" . round($section_summer_sum, 2) . "</td><td>" . round($class_room_6_summer_sum, 2) . "</td><td>" .
                    round($class_room_7_summer_sum, 2) . "</td></tr>";

                $conn->close();
                ?>

            </table>
        </div>
    
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>