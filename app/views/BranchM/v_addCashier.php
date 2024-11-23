<?php require APPROOT.'/views/inc/header.php'?>
  <?php require APPROOT.'/views/inc/components/verticalnavbar.php'?>

<div class="container">
   <!-- Main Content -->
   <div class="main-content">
            <h1>ADD CASHIER</h1>
            <div class="form-container">
                <form action="<?php echo URLROOT ;?>/BranchM/addCashier" method="POST">

                    <label for="name">Name:</label>
                    <input type="text" id="name" name="Name" value="<?php echo $data['Name'];?> ">
                    <span class="form-invalid"><?php echo $data['Name_err'];?></span>

                    <label for="contact">Contact:</label>
                    <input type="text" id="contact" name="Contact" value="<?php echo $data['Contact'];?>">
                    <span class="form-invalid"><?php echo $data['Contact_err'];?></span>

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="Address" value="<?php echo $data['Address'];?>">
                    <span class="form-invalid"><?php echo $data['Address_err'];?></span>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="Email" value="<?php echo $data['Email'];?>">
                    <span class="form-invalid"><?php echo $data['Email_err'];?></span>

                    <label for="join-date">Join Date:</label>
                    <input type="date" id="join_date" name="Join_Date" value="<?php echo $data['Join_Date'];?>">
                    <span class="form-invalid"><?php echo $data['Join_Date_err'];?></span>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="Password" value="<?php echo $data['Password'];?>">
                    <span class="form-invalid"><?php echo $data['Password_err'];?></span>

                    <div class="buttons">
                        <button type="submit" class="add-btn" name="ADD">ADD</button>
                        <button type="button" class="cancel-btn">CANCEL</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require APPROOT.'/views/inc/footer.php'?>
