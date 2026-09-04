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

            <!-- alertbox  -->
            <?php
            require("Includefile/alertbox.php");
            ?>

            <?php
            require("Includefile/topheader.php");
            ?>

            <div class="dashboard-content">

                <div class="dashboard-title">
                    <h2>Contact</h2>
                    <h3> <a href="dashboard.php">Dashboard</a> / Contact</h3>
                </div>

                <div class="table-container">

                    <h2>Contact List</h2>

                    <div class="search-container">
                        <form action="#">
                            <div class="showentrie">
                                <label for="entries">Show</label>
                                <select name="entrie">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <label for="entries">Entries</label>
                            </div>

                            <div class="searchbar">
                                <input type="search" name="search" placeholder="Search by Name/Email" value="<?php if (isset($_GET['search'])) {
                                    echo $_GET['search'];
                                } ?>">
                                <input type="submit" value="Search">
                            </div>
                        </form>
                    </div>

                    <div class="table">
                        <table class="user-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (isset($_GET['search']) && !empty($_GET['search'])) {
                                    $value = $_GET['search'];
                                    $sql = "SELECT * FROM contact WHERE CONCAT(id, name, email) LIKE '%$value%'";
                                } else {
                                    $sql = "SELECT * FROM contact";
                                }
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);

                                if ($total > 0) {
                                    $counter = 1;
                                    while ($row = mysqli_fetch_assoc($data)) {
                                        echo "<tr>
                                        <td>" . $counter++ . "</td>
                                        <td>" . $row['name'] . "</td>
                                        <td>" . $row['email'] . "</td>
                                        <td>" . $row['contact'] . "</td>
                                        <td>" . $row['message'] . "</td>
                                        <td class='actionbtn'>
                                            <a href='deletecontactmsg.php?id=$row[id]' class='btn delete'>Delete</a>
                                        </td>
                                    </tr>";
                                    }
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

        <script>
            $(document).ready(function () {
                $('.delete').click(function (e) {
                    e.preventDefault();
                    var id = $(this).closest('tr').find('td:first').text();
                    $('.alertbox').css({
                        "opacity": "1", "pointer-events": "auto", "transition": "top 0ms ease-in-out 0ms, opacity 200ms ease-in-out 0ms, transform 20ms ease-in-out 0ms"
                    }).data('delete-id', id);
                });

                $('.btn1').click(function (e) {
                    e.preventDefault();
                    $('.alertbox').css({
                        "opacity": "0", "pointer-events": "none", "transition": "top 0ms ease-in-out 200ms, opacity 200ms ease-in-out 0ms,transform 20ms ease-in-out 0ms"
                    });
                });

                $('.btn2').click(function (e) {
                    e.preventDefault();
                    var id = $('.alertbox').data('delete-id');
                    if (id) {
                        window.location.href = 'deletecontactmsg.php?id=' + id;
                    }
                });
            });

        </script>

        <?php
        require("Includefile/jslink.php");
        ?>

</body>

</html>