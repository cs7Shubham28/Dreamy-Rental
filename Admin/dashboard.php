<?php
require('../Including/db_connection.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- primary meta tags -->
    <title>Admin_dashboard</title>
    <meta name="description" content="A website to rent rooms at affordable prices.">

    <!-- favicon -->
    <link rel="shortcut icon" href="../assets/logo/favicon.svg" type="image/svg+xml">

    <!-- custome links  -->
    <?php
    require("Includefile/customelink.php");
    ?>


</head>

<body>

    <div class="container">
        <!-- sidenavbar  -->
        <?php
        require("Includefile/sidebar.php");
        ?>


        <!-- sidenavbar  -->

        <!-- body part  -->
        <div class="dashboard">

            <?php
            require("Includefile/topheader.php");
            ?>

            <div class="dashboard-content">

                <div class="dashboard-title">
                    <h2>Welcome Admin!</h2>
                    <h3>Dashboard</h3>
                </div>

                <div class="dashboard-card">

                    <div class="card">
                        <div class="card-icon">
                            <span class="material-symbols-rounded">group</span>
                        </div>
                        <div class="card-info">
                            <span class="total">
                                <?php
                                $query = "SELECT COUNT(*) FROM users";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_array($result);
                                echo $row[0];
                                ?>
                            </span>

                            <h3>Register Users</h3>

                            <div class="line">
                                <div class="percent"></div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">
                            <span class="material-symbols-rounded">real_estate_agent</span>
                        </div>
                        <div class="card-info">
                            <span class="total">
                                <?php
                                $query = "SELECT COUNT(*) FROM property";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_array($result);
                                echo $row[0];
                                ?>
                            </span>

                            <h3>Properties</h3>

                            <div class="line">
                                <div class="percent"></div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">
                            <span class="material-symbols-rounded">person</span>
                        </div>
                        <div class="card-info">
                            <span class="total">
                                <?php
                                $query = "SELECT COUNT(*) FROM property WHERE booking = 1";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_array($result);
                                echo $row[0];
                                ?>
                            </span>

                            <h3>Booked Property</h3>

                            <div class="line">
                                <div class="percent"></div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">
                            <span class="material-symbols-rounded">groups</span>
                        </div>
                        <div class="card-info">
                            <span class="total">
                                <?php
                                $query = "SELECT COUNT(*) FROM property WHERE cancel = 1";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_array($result);
                                echo $row[0];
                                ?>
                            </span>

                            <h3>Canceled Property</h3>

                            <div class="line">
                                <div class="percent"></div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">
                            <span class="material-symbols-rounded">apartment</span>
                        </div>
                        <div class="card-info">
                            <span class="total">
                                <?php
                                $query = "SELECT COUNT(*) FROM property WHERE propertytype = 'shop'";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_array($result);
                                echo $row[0];
                                ?>
                            </span>

                            <h3>No. of shop</h3>

                            <div class="line">
                                <div class="percent"></div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">
                            <span class="material-symbols-rounded">home</span>
                        </div>
                        <div class="card-info">
                            <span class="total">
                                <?php
                                $query = "SELECT COUNT(*) FROM property WHERE propertytype = 'house'";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_array($result);
                                echo $row[0];
                                ?>
                            </span>

                            <h3>No. of Houses</h3>

                            <div class="line">
                                <div class="percent"></div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">
                            <span class="material-symbols-rounded">living</span>
                        </div>
                        <div class="card-info">
                            <span class="total">
                                <?php
                                $query = "SELECT COUNT(*) FROM property WHERE propertytype = 'flat'";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_array($result);
                                echo $row[0];
                                ?>
                            </span>

                            <h3>No. of Flats</h3>

                            <div class="line">
                                <div class="percent"></div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-icon">
                            <span class="material-symbols-rounded">trending_flat</span>
                        </div>
                        <div class="card-info">
                            <span class="total">
                                <?php
                                $query = "SELECT COUNT(*) FROM contact";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_array($result);
                                echo $row[0];
                                ?>
                            </span>

                            <h3>Tanent Message</h3>

                            <div class="line">
                                <div class="percent"></div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="table-container">

                    <h2>Recent Booked List</h2>

                    <div class="search-container">
                        <form action="" method="GET">
                            <select name="time" id="time" onchange="this.form.submit()">
                                <option value="all" <?php if (!isset($_GET['time']) || $_GET['time'] == 'all')
                                    echo 'selected'; ?>>All</option>
                                <option value="today" <?php if (isset($_GET['time']) && $_GET['time'] == 'today')
                                    echo 'selected'; ?>>Today</option>
                                <option value="yesterday" <?php if (isset($_GET['time']) && $_GET['time'] == 'yesterday')
                                    echo 'selected'; ?>>Yesterday</option>
                                <option value="lastweek" <?php if (isset($_GET['time']) && $_GET['time'] == 'lastweek')
                                    echo 'selected'; ?>>Last Week</option>
                                <option value="lastmonth" <?php if (isset($_GET['time']) && $_GET['time'] == 'lastmonth')
                                    echo 'selected'; ?>>Last Month</option>
                            </select>
                        </form>
                    </div>

                    <div class="table">
                        <table class="user-table">
                            <thead>
                                <tr>
                                    <th>Booking Id</th>
                                    <th>Property Name</th>
                                    <th>Property Address</th>
                                    <th>Property Price</th>
                                    <th>Deposite amount</th>
                                    <th>Booked By</th>
                                    <th>Booking Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $timeFilter = isset($_GET['time']) ? $_GET['time'] : 'all';
                                $sql = "SELECT property.*, users.username 
                                        FROM property 
                                        JOIN users ON property.user_email = users.email 
                                        WHERE property.booking = 1";


                                if ($timeFilter == 'today') {
                                    $sql .= " AND DATE(bookingdate) = CURDATE()";
                                } elseif ($timeFilter == 'yesterday') {
                                    $sql .= " AND DATE(bookingdate) = CURDATE() - INTERVAL 1 DAY";
                                } elseif ($timeFilter == 'lastweek') {
                                    $sql .= " AND bookingdate >= CURDATE() - INTERVAL 7 DAY";
                                } elseif ($timeFilter == 'lastmonth') {
                                    $sql .= " AND bookingdate >= CURDATE() - INTERVAL 1 MONTH";
                                }

                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);

                                if ($total > 0) {
                                    $counter = 1;
                                    while ($row = mysqli_fetch_assoc($data)) {
                                        echo "<tr>
                                                <td>" . $counter++ . "</td>
                                                <td>" . $row['pname'] . "</td>
                                                <td>" . $row['paddress'] . "</td>
                                                <td>Rs " . $row['pprice'] . " /-</td>
                                                <td>Rs " . $row['depositeamt'] . " /-</td>
                                                <td>" . $row['username'] . "</td>
                                                <td>" . $row['bookingdate'] . "</td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>No bookings found for your selected time period.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="totalcount">
                        <p>Showign 1 to <span><?php echo $total; ?></span> of <span><?php echo $total; ?></span> Entries
                        </p>
                    </div>


                </div>

            </div>


        </div>
        <!-- body part  -->


        <?php
        require("Includefile/jslink.php");
        ?>

</body>

</html>