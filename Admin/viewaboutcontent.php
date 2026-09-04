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
                    <h2>About Content</h2>
                    <h3> <a href="dashboard.php">Dashboard</a> / About Content</h3>
                </div>

                <div class="table-container">

                    <h2>About Content</h2>

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
                                <input type="search" name="search" placeholder="Search by title" value="<?php if (isset($_GET['search'])) {
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
                                    <th>Title</th>
                                    <th>Content 1</th>
                                    <th>Content 2</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (isset($_GET['search']) && !empty($_GET['search'])) {
                                    $value = $_GET['search'];
                                    $sql = "SELECT * FROM aboutcontent WHERE CONCAT(id,title) LIKE '%$value%'";
                                } else {
                                    $sql = "SELECT * FROM aboutcontent";
                                }
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);

                                if ($total > 0) {
                                    $counter = 1;
                                    while ($row = mysqli_fetch_assoc($data)) {
                                        echo "<tr>
                                                 <td>" . $counter++ . "</td>
                                                 <td>" . $row['title'] . "</td>
                                                 <td>" . $row['content1'] . "</td>
                                                 <td>" . $row['content2'] . "</td>
                                                 <td class='actionbtn'>
                                                     <a href='editaboutcontent.php?id=$row[id]' class='btn update'>Update</a>
                                                 </td>
                                             </tr>";

                                    }
                                } else {
                                    echo "<tr><td colspan='6'>No records found.</td></tr>";
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