<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<script src="<?php echo $js_path; ?>jquery-3.1.0.min.js"></script>
</head>
<body >
<div class="container"><h1 align="center">ServiceTicket</h1>
  	
    <form id="userSignInFrm" name="userSignInFrm" action="<?php echo $base_url;?>login/logIn" method="post" enctype="multipart/form-data">
      <?php echo $this->session->flashdata('message'); ?>
        <input type="hidden" id="baseUrl" name="baseUrl" value="<?php echo $base_url; ?>" />
      <fieldset>       

          <p><label><input type="radio" id="Employee" name="mu_type" value="1" checked>Employee</label></p>
          <p><label><input type="radio" id="Manager" name="mu_type" value="2">Manager</p>
          <p><label><input type="radio" id="Vendor" name="mu_type" value="3">Vendor</label></p> 
       
        <p><span>Username</span>
          <input type="text" name="username" id="username"  placeholder="Username" required>
        </p>
        <p><span>Password</span>
          <input type="password"  name="password" id="password"  placeholder="Password" required>
        </p> 
        <p>
          <input type="button" id="userSignIn" value="Sign In">
        </p>
        <p>
          <a href="<?php echo $base_url.'login/signUp'; ?>">Sign Up</a>
        </p>
      </fieldset>
    </form>    
  </div>
  <!-- end login -->
  <script src="<?php echo $js_path; ?>login_service.js"></script>
</body>
</html>
