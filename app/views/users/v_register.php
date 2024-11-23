<?php require APPROOT.'/views/inc/header.php'?>
<!-- TOP NAVIGATION BAR-->
  <!--?php require APPROOT.'/views/inc/components/topnavbar.php'?-->

  <div class="signup-container">
        <div class="image-section">
            <img src="<?php echo URLROOT;?>/img/login-signup/login.jpg" alt="Cookies" class="cookies-image">
        </div>
        <div class="signup-section">
            <div class="logo">
                <!- Add your logo image here ->
                <img src="<?php echo URLROOT;?>/img/login-signup/frostineLogo.png" alt="Logo" class="logo-image">
                <h1>FROSTINE</h1>
                <p>From Oven to Doorstep, Effortlessly YC</p>
            </div>
            <h2>Create an Account</h2>
            <form action="<?php echo URLROOT?>/Users/register" method="POST">
                <div class="input-group">
                    <input type="text" name="name" placeholder="User Name" value="<?php echo $data['name'];?>" >
                    <span class="form-invalid"><?php echo $data['name_err'];?></span>
                </div>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" value="<?php echo $data['email'];?>">
                    <span class="form-invalid"><?php echo $data['email_err'];?></span>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password"  value="<?php echo $data['password'];?>">
                    <span class="form-invalid"><?php echo $data['password_err'];?></span>
                </div>
                <div class="input-group">
                    <input type="password" name="confirm_password" placeholder="Confirm Password" value="<?php echo $data['confirm_password'];?>">
                    <span class="form-invalid"><?php echo $data['confirm_password_err'];?></span>
                </div>
                <button type="submit" name="submit" class="signup-btn">Sign Up</button>
            </form>
            <a href="<?php echo URLROOT; ?>/Users/login" class="login-link">Already have an account? Log in</a>
        </div>
    </div>
  <?php require APPROOT.'/views/inc/footer.php'?>

