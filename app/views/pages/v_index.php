<?php require APPROOT.'/views/inc/header.php'?>
<div class="login-container">
        <div class="image-section">
            <img src="<?php echo URLROOT;?>/img/login-signup/login.jpg" alt="Cookies" class="cookies-image">
        </div>
        <div class="login-section">
            <div class="logo">
                <!-- Add your logo image here -->
                <img src="<?php echo URLROOT;?>/img/login-signup/frostineLogo.png" alt="Logo" class="logo-image">
                <h1>WELCOME <?php echo isset($_SESSION['user_name']) ; ?></h1>
                <p>Let's make today a sweet success!</p>
            </div>
             <button type="submit" echo  class="login-btn">Service Desk</button>
            
        </div>
    </div>
<?php require APPROOT.'/views/inc/footer.php'?>