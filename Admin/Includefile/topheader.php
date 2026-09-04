<?php
require('../Including/db_connection.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("location: index.php");
    exit();
}

$id = $_SESSION['username'];

$sql = "SELECT * FROM adminlogin WHERE username='$id'";

$data = mysqli_query($conn, $sql);

$result = mysqli_fetch_assoc($data);

// Check for new booking requests
$sql = "SELECT property.pname, property.bookingdate, users.username AS username, users.photo, 
               CASE WHEN property.isread = 2 THEN 'Cancellation' ELSE 'Booking' END AS action_type
        FROM property 
        JOIN users ON property.user_email = email
        WHERE property.isread IN (1, 2)";

$notifications = mysqli_query($conn, $sql);

$notification_count = mysqli_num_rows($notifications);

?>


<div class="dashboard-header">
    <div class="hidden"></div>
    <h1>Room Rental Portal</h1>


    <div class="sideicon">
        <ul class="headersideicon">
            <li>
                <a href="#" id="dropdowntog">
                    <span class="material-symbols-rounded">notifications</span>
                    <?php if ($notification_count > 0): ?>
                        <span class="notification-badge"><?php echo $notification_count; ?></span>
                        <!-- Display the count of unread notifications -->
                    <?php endif; ?>
                </a>
                <ul class="notification-dropdown" data-drop>
                    <div class="notification-header">
                        <h3>Notifications</h3>
                    </div>

                    <?php
                    if ($notification_count > 0) {
                        while ($row = mysqli_fetch_assoc($notifications)) {
                            ?>
                            <ul class="notification-list">
                                <li class="notification-item">
                                    <a href="">
                                        <div class="profile">
                                            <img src="../uploadphoto/users/<?php echo !empty($row['photo']) ? $row['photo'] : 'default.png'; ?>"
                                                alt="Profile Image" id="profile-pic">
                                        </div>
                                        <div class="notification-content">
                                            <p><span><?php echo $row['username']; ?></span>
                                                <?php
                                                echo $row['action_type'] == 'Cancellation' ? 'canceled' : 'booked';
                                                ?>
                                                : <span><?php echo $row['pname']; ?></span>
                                            </p>
                                            <span class="notification-time"
                                                data-time="<?php echo $row['bookingdate']; ?>"></span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <?php
                        }
                    } else {
                        echo "<p style='color: black;'>No new notifications</p>";
                    }
                    ?>
                </ul>
            </li>

            <li>
                <a href="profile.php" class="profileholder">
                    <img src="../uploadphoto/admin/<?php echo !empty($result['photo']) ? $result['photo'] : 'default.png'; ?>"
                        alt="Profile Image" id="profile-pic">
                </a>
            </li>
        </ul>
    </div>

</div>

<script>
    const dropdown = document.querySelector("[data-drop]");
    const dropdownToggle = document.getElementById("dropdowntog");

    dropdownToggle.addEventListener("click", (event) => {
        event.preventDefault();
        dropdown.classList.toggle("active");

        fetch('mark_as_read.php', {
            method: 'POST',
        })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                const badge = document.querySelector('.notification-badge');
                if (badge) {
                    badge.style.display = 'none';
                }
            })
            .catch(error => console.error('Error:', error));
    });

    // Close dropdown if clicked outside
    document.addEventListener("click", function (event) {
        if (!dropdown.contains(event.target) && !dropdownToggle.contains(event.target)) {
            dropdown.classList.remove("active");
        }
    });

    function timeAgo(date) {
        const seconds = Math.floor((new Date() - new Date(date)) / 1000);
        let interval = Math.floor(seconds / 31536000);
        if (interval > 1) return interval + " years ago";
        interval = Math.floor(seconds / 2592000);
        if (interval > 1) return interval + " months ago";
        interval = Math.floor(seconds / 86400);
        if (interval > 1) return interval + " days ago";
        interval = Math.floor(seconds / 3600);
        if (interval > 1) return interval + " hours ago";
        interval = Math.floor(seconds / 60);
        if (interval > 1) return interval + " minutes ago";
        return seconds <= 1 ? "just now" : seconds + " seconds ago";
    }

    document.addEventListener("DOMContentLoaded", function () {
        const timeElements = document.querySelectorAll(".notification-time");

        timeElements.forEach(element => {
            const time = element.getAttribute('data-time');
            element.textContent = timeAgo(time);
        });
    });

</script>