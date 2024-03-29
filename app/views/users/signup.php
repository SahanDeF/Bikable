<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/signup.css">
    <link rel="icon" href="<?php echo URLROOT;?>/public/images/general/favicon.png">
    <title>Signup</title>
</head>
<body>
    <section class="signupView">
        <div class="signupView__logoSide">
            <div class="signupView__logoSide--imagecard">
            <img src="<?php echo URLROOT;?>/public/images/z_bikableLogo/logo.PNG" alt="BikableLogo" class="imglogo">
            </div>
        </div>

        <div class="signupView___dataSide">
            <!-- header and subtitle -->
            <div class="signupView__title">Create an account</div>
            <div class="signupView__subtitle">You're almost all set to ride.</div>
        
            <!-- user entered details-->
            <form action="<?php echo URLROOT; ?>/users/signup" method="POST">
                <div class="signupView__Detail">
                    <div class="signupView__Detail--data">
                        <div class="label">First Name</div>
                        <input type="text" class="signupDetailbox" name="first_name" placeholder="First name" value="<?php echo $data['first name'];?>">
                        <br><span class="error_text"><?php echo $data['first_name_err'];?></span>
                    </div>

                    <div class="signupView__Detail--data">
                        <div class="label">Last Name</div>
                        <input type="text" class="signupDetailbox" name="last_name" placeholder="Last name" value="<?php echo $data['last name'];?>">
                        <br><span class="error_text"><?php echo $data['second_name_err'];?></span>
                    </div>

                    <div class="signupView__Detail--data">
                        <div class="label">Email</div>
                        <input type="email" class="signupDetailbox" name="email" placeholder="Email" value="<?php echo $data['email'];?>">
                        <br><span class="error_text"><?php echo $data['email_err'];?></span>
                    </div>

                    <div class="signupView__Detail--data">
                        <div class="label">Phone Number</div>
                        <input type="number" class="signupDetailbox" name="phone_number" placeholder="Phone number" value="<?php echo $data['phone no'];?>">
                        <br><span class="error_text"><?php echo $data['phone_no_err'];?></span>
                    </div>

                    <div class="signupView__Detail--data">
                        <div class="label">NIC</div>
                        <input type="text" class="signupDetailbox" name="nic_number" placeholder="NIC" value="<?php echo $data['nic no'];?>">
                        <br><span class="error_text"><?php echo $data['nic_no_err'];?></span>
                    </div>

                    <div class="signupView__Detail--data">
                        <div class="label">Password</div>
                        <input type="password" class="signupDetailbox" name="password" placeholder="Password">
                        <br><span class="error_text"><?php echo $data['password_err'];?></span>
                    </div>

                    <div class="signupView__Detail--data">
                        <div class="label">Confirm Password</div>
                        <input type="password" class="signupDetailbox" name="confirm_password" placeholder="Confirm Password">
                        <br><span class="error_text"><?php echo $data['confirm_password_err'];?></span>
                    </div>

                    <!-- <div class="signupView__Detail--data">
                        <input type="text" class="signupDetailbox" name="first_name" placeholder="Confirm Password">
                    </div> -->
                </div>

                <div class="signupButtoCondtionform">
                    <!-- <div class="activeArea"> -->
                        <div class="signupText">
                        <input type="checkbox" name="selected" value="1"> Agree to our <a href="<?php echo URLROOT; ?>/public/files/ToS.pdf" download="terms_of_service.pdf" class="downloadLink">terms of service</a>
                        <br><span class="error_text"><?php echo $data['selected_err'];?></span>
                        </div>
                        <div class="submitbutton">
                            <input type="submit" value="SIGNUP" class="btn" >                  
                        </div>
                    <!-- </div> -->
                </div>
            </form>
        </div>
    </section>
</body>
</html>
