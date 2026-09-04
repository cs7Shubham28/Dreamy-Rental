<footer class="footer">

    <div class="footer-top">
        <div class="container">

            <div class="footer-brand">
                <a href="#" class="logo">
                    <img src="../assets/images/logo.png" width="190" height="28" alt="logo">
                </a>

                <p class="body-medium footer-text">
                    Dreamy Rental is your go-to platform for finding the perfect rental property,
                    offering a seamless and stress-free search experience.
                </p>

                <ul class="footer-list">

                    <li>
                        <a href="#" class="body-medium footer-link">dreamyrental.com</a>
                    </li>

                    <li>
                        <address class="body-medium address">
                            Jorpati -06, Kathmandu, Nepal
                        </address>
                    </li>
                </ul>


                <li style="margin-top: 20px;">

                    <ul class="social-list">

                        <li>
                            <a href="#" class="social-link">
                                <img src="../assets/images/facebook.svg" alt="facebook">
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <img src="../assets/images/insta.svg" alt="instagram">
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <img src="../assets/images/twitter.svg" alt="twitter">
                            </a>
                        </li>

                    </ul>

                </li>
            </div>

            <nav class="footer-nav" aria-labelledby="nav-label-1">
                <p class="title-small footer-list-title" id="nav-label-1">Quick link</p>

                <ul class="footer-list">

                    <li>
                        <a href="#" class="body-medium footer-link">Home</a>
                    </li>

                    <li>
                        <a href="#" class="body-medium footer-link">About</a>
                    </li>

                    <li>
                        <a href="#" class="body-medium footer-link">Property</a>
                    </li>

                    <li>
                        <a href="#" class="body-medium footer-link">FAQs</a>
                    </li>

                </ul>
            </nav>

            <nav class="footer-nav" aria-labelledby="nav-label-2">
                <p class="title-small footer-list-title" id="nav-label-2">Support</p>

                <ul class="footer-list">

                    <li>
                        <a href="#" class="body-medium footer-link">About us</a>
                    </li>

                    <li>
                        <a href="#" class="body-medium footer-link">Contact us</a>
                    </li>

                    <li>
                        <a href="#" class="body-medium footer-link">Privacy Policy</a>
                    </li>

                    <li>
                        <a href="#" class="body-medium footer-link">Terms & Conditiona</a>
                    </li>

                </ul>
            </nav>

            <nav class="footer-nav" aria-labelledby="nav-label-4">
                <p class="title-small footer-list-title" id="nav-label-4">Feedback</p>

                <ul class="footer-list">
                    <li>
                        <form action="../User/feedback.php" method="post" class="feedback" enctype="multipart/form-data">
                            <input type="text" name="name" required maxlength="50" placeholder="Enter your Fullname"
                                class="box">

                            <textarea name="feedback" id="msg" class="box" placeholder="Enter your Feedback" required
                                cols="20" rows="10" maxlength="1000"></textarea>


                            <input type="file" name="photo" id="file" class="fileupload" accept="image/*">


                            <div align="center" style="display: flex; margin: 10px 0;" class="ratestar">
                                <span class="material-symbols-rounded rate" aria-hidden="true"
                                    data-index="0" style="display: none;">star</span>
                                <span class="material-symbols-rounded rate" aria-hidden="true"
                                    data-index="1">star</span>
                                <span class="material-symbols-rounded rate" aria-hidden="true"
                                    data-index="2">star</span>
                                <span class="material-symbols-rounded rate" aria-hidden="true"
                                    data-index="3">star</span>
                                <span class="material-symbols-rounded rate" aria-hidden="true"
                                    data-index="4">star</span>
                                <span class="material-symbols-rounded rate" aria-hidden="true"
                                    data-index="5">star</span>
                            </div>

                            <input type="hidden" name="rateIndex" id="rateIndex">

                            <input type="hidden" name="userprofile" id="userprofile">

                            <input type="submit" value="Submit" name="send" class="feedback-btn">
                        </form>


                    </li>
                </ul>
            </nav>




        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">

            <p class="copyright body-medium">
                Copyright 2024 &copy; Shubham
            </p>

        </div>
    </div>

</footer>


<!-- custome javascript link -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="/dreamyrental/JavaScripts/starrating.js"></script>
<script src="/dreamyrental/JavaScripts/script.js"></script>
<script src="/dreamyrental/JavaScripts/loginbtn.js"></script>