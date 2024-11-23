<?php require APPROOT.'/views/inc/header.php'?>
<!-- TOP NAVIGATION BAR-->
  <!--?php require APPROOT.'/views/inc/components/topnavbar.php'?-->

  <div class="login-container">
        <div class="image-section">
            <img src="<?php echo URLROOT;?>/img/login-signup/login.jpg" alt="Cookies" class="cookies-image">
        </div>
        <div class="login-section">
            <div class="logo">
                <img src="<?php echo URLROOT;?>/img/login-signup/frostineLogo.png" alt="Logo" class="logo-image">
                <h1>FROSTINE</h1>
                <p>From Oven to Doorstep, Effortlessly YC</p>
            </div>
            <h2>Welcome Back!</h2>
            <?php if (!empty($loginError)) : ?>
                <div class="error-message"><?= htmlspecialchars($loginError); ?></div>
            <?php endif; ?>
            <form action="<?php echo URLROOT; ?>/Users/login" method="POST">
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" value="<?php echo $data['email']; ?>" >
                    <span class="form-invalid"> <?php echo $data['email_err']; ?></span>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" value="<?php echo $data['password']; ?>">
                    <span class="form-invalid"> <?php echo $data['password_err']; ?></span>
                </div>
                <button type="submit" name="login" class="login-btn">Login</button>
            </form>
            <a href="forgotPassword.php" class="forgot-password">Forgot Password?</a>
            <a href="<?php echo URLROOT; ?>/Users/register" class="forgot-password">New Account</a>
        </div>
    </div>
    <?php require APPROOT.'/views/inc/footer.php'?>

