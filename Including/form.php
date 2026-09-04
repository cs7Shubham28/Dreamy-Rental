<?php
require('../Including/db_connection.php');
require("../including/popup.php");

?>

<div class="popup">

    <div class="close-btn">
        <span class="material-symbols-rounded loginclose">close</span>
    </div>

    <div class="form" id="signIn">
        <form action="login.php" method="post">

            <h2 class="title-medium">Log in</h2>

            <div class="form-element">

                <div class="form-content">
                    <input type="email" name="email" required maxlength="50" placeholder="Email Address" id="email">
                    <span class="material-symbols-rounded loginicon">mail</span>
                </div>

                <div class="form-content">
                    <input type="password" name="password" required maxlength="20" placeholder="Password" id="password">
                    <span class="material-symbols-rounded loginicon">lock</span>
                </div>

                <div class="checkbox-wrapper-13 form-element">
                    <input id="remember-me" type="checkbox">
                    <label for="remember-me">Remember me</label>
                </div>


                <input type="submit" class="contact-btn" name="login" value="Sign in">


                <div class="form-content forgotpsd">
                    <p class="body-small">Don't have an account?
                        <a href="#" class="link-underline" id="signUpLink">Sign up</a>
                    </p>
                    <a href="#" id="forgotPsdLink">Forgot password</a>
                </div>

            </div>

        </form>


    </div>


    <div class="form" id="signUp">

        <form action="register.php" method="post" enctype="multipart/form-data">

            <h2 class="title-medium">Sign up</h2>

            <div class="form-element">

                <div class="form-content">
                    <input type="text" name="username" maxlength="50" placeholder="Username" id="username">
                    <span class="material-symbols-rounded loginicon">person</span>
                </div>

                <div class="form-content">
                    <input type="email" name="email" required maxlength="50" placeholder="Email Address" id="email">
                    <span class="material-symbols-rounded loginicon">mail</span>
                </div>

                <div class="form-content">
                    <input type="tel" name="contact" maxlength="20" placeholder="Contact" id="contact">
                    <span class="material-symbols-rounded loginicon">phone</span>
                </div>

                <div class="form-content">
                    <input type="password" name="password" maxlength="20" placeholder="Password" id="password">
                    <span class="material-symbols-rounded loginicon">lock</span>
                </div>

                <div class="form-content">
                    <input type="password" name="cpassword" maxlength="20" placeholder="Confirm Password" id="password">
                    <span class="material-symbols-rounded loginicon">lock</span>
                </div>

                <div class="form-content">
                    <input type="file" name="photo" id="file" class="fileupload" accept="image/*" required>
                    <label for="file" class="uploadphoto contact-btn btn">
                        Upload Photo
                    </label>
                </div>


                <div class="checkbox-wrapper-13 form-element">
                    <input id="agreeFor" type="checkbox" required>
                    <label for="agreeFor">I Agree with <i style="color: var(--primary-70);">Terms and
                            Conditions</i></label>
                </div>


                <input type="submit" class="contact-btn" value="Sign up" name="register">


                <div class="form-content forgotpsd">
                    <p class="body-small">Already have an account? <a href="#" class="link-underline"
                            id="signInLink">Sign
                            in</a></p>
                </div>
            </div>
        </form>

    </div>

    <div class="form" id="forgotPsd">

        <form action="forgotpsd.php" method="post">

            <h2 class="title-medium">Password Recovery</h2>

            <div class="form-element">

                <div class="form-content">
                    <input type="email" name="email" required maxlength="50" placeholder="Your Email Address" id="email">
                    <span class="material-symbols-rounded loginicon">mail</span>
                </div>

                <div class="form-content">
                    <input type="password" name="password" required maxlength="20" placeholder="New Password"
                        id="password">
                    <span class="material-symbols-rounded loginicon">lock</span>
                </div>

                <div class="form-content">
                    <input type="password" name="cpassword" required maxlength="20" placeholder="Confirm Password"
                        id="password">
                    <span class="material-symbols-rounded loginicon">lock</span>
                </div>

                <input type="submit" name="reset" class="contact-btn" value="Reset My Password">


                <div class="form-content forgotpsd">
                    <p class="body-small">
                        For security reasons we don't store your password.
                        Your password will be reset and a new
                        one will be send.
                    </p>
                    <a href="#" id="backToLoginLink">
                        << Back to Login </a>
                </div>


            </div>

        </form>

    </div>


</div>