<?php
    require('../Including/db_connection.php');

    if(!isset($_SESSION['username'])) {
        header("Location: login.php");
    }
?>        
        
        <!-- sidenavbar  -->
        <div class="sidebar">

            <div class="menu-btn" style="z-index: 100;"> 
                <span class="material-symbols-rounded open" aria-hidden="true">menu</span>
            </div>

            <!-- logo space  -->
            <div class="head">

                <div class="user-img">
                    <img src="../assets/images/logo only.png" alt="">
                </div>

                <div class="user-detail">
                    <p class="title">DreamyRental</p>
                    <p class="name">Admin</p>
                </div>

            </div>
            <!-- logo space  -->

            <!-- nav list space  -->
            <div class="nav">
                <div class="menu">
                    <p class="title">Main</p>
                    <ul>
                        <li>
                            <a href="dashboard.php">
                                <span class="material-symbols-rounded">dashboard</span>
                                <span class="text">Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="material-symbols-rounded">group</span>
                                <span class="text">All Users</span>
                                <i class="fa-solid fa-caret-down arrow"></i>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="admin.php">
                                        <span class="material-symbols-rounded">person</span>
                                        <span class="text">Admin</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="user.php">
                                        <span class="material-symbols-rounded">groups</span>
                                        <span class="text">User</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="#">
                                <span class="material-symbols-rounded">real_estate_agent</span>
                                <span class="text">All Properties</span>
                                <i class="fa-solid fa-caret-down arrow"></i>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="addproperty.php">
                                        <span class="material-symbols-rounded">add_circle</span>
                                        <span class="text">Add Property</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="viewproperty.php">
                                        <span class="material-symbols-rounded">list_alt</span>
                                        <span class="text">View Property</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="#">
                                <span class="material-symbols-rounded">location_on</span>
                                <span class="text">Location</span>
                                <i class="fa-solid fa-caret-down arrow"></i>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="addlocation.php">
                                        <span class="material-symbols-rounded">add_circle</span>
                                        <span class="text">Add location</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="viewlocation.php">
                                        <span class="material-symbols-rounded">list_alt</span>
                                        <span class="text">View Location</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="#">
                                <span class="material-symbols-rounded">forum</span>
                                <span class="text">Contact & feedback</span>
                                <i class="fa-solid fa-caret-down arrow"></i>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="contactmsg.php">
                                        <span class="material-symbols-rounded">contact_mail</span>
                                        <span class="text">Contact</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="feedbackmsg.php">
                                        <span class="material-symbols-rounded">feedback</span>
                                        <span class="text">Feedback</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="#">
                                <span class="material-symbols-rounded">article</span>
                                <span class="text">About Page</span>
                                <i class="fa-solid fa-caret-down arrow"></i>
                            </a>
                            <ul class="sub-menu">

                                <li>
                                    <a href="viewaboutcontent.php">
                                        <span class="material-symbols-rounded">pages</span>
                                        <span class="text">View Content</span>
                                    </a>
                                </li>

                            </ul>
                        </li>




                    </ul>
                </div>


            </div>

            <hr>
            <div class="menu">
                <p class="title">Privacy</p>
                <ul>
                    <li>
                         <a href="logout.php">
                            <span class="material-symbols-rounded">logout</span>
                            <span class="text">Logout</span>
                         </a> 
                    </li>

                </ul>
            </div>
            <!-- nav list space  -->
        </div>
        <!-- sidenavbar  -->