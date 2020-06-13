<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>User Registration</title>
<script src="<?php echo $js_path; ?>jquery-3.1.0.min.js"></script>
</head>
<body >
<div class="container"><h1 align="center">ServiceTicket</h1>
  	
    <form id="userSignUpFrm" name="userSignUpFrm" action="<?php echo $base_url;?>login/userRegistration" method="post" enctype="multipart/form-data">
     
      <input type="hidden" id="baseUrl" name="baseUrl" value="<?php echo $base_url; ?>" />
      <fieldset>
          <div><label id="vaiduserreg" style="color: red; display: none;"></label></div>
       <p><span>Company Code</span>
          <input type="text" name="mu_company_code" id="mu_company_code"  placeholder="Company Code">
        </p>
          <p><label><input type="radio" id="Employee" name="mu_type" value="1" checked>Employee</label></p>
          <p><label><input type="radio" id="Manager" name="mu_type" value="2">Manager</p>
          <p><label><input type="radio" id="Vendor" name="mu_type" value="3">Vendor</label></p> 
        
        <p><span>Username</span>
          <input type="text" name="mu_username" id="mu_username"  placeholder="Username" >
        </p>
        <p><span>Password</span>
          <input type="password"  name="mu_password" id="mu_password"  placeholder="Password" >
        </p>
        <p><span>Conf Password</span>
          <input type="password"  name="conf_password" id="conf_password"  placeholder="Password" >
        </p> 
         
        <p><span>Full Name</span>
          <input type="text" name="mu_name" id="mu_name"  placeholder="Full Name" >
        </p>
        <p><span>Email</span>
          <input type="text" name="mu_email" id="mu_email"  placeholder="Email" >
        </p>
        <p><span>Mobile</span>
            <input type="text" name="mu_mob" id="mu_mob"  placeholder="Mobile" class="chkNum" minlength="10" maxlength="10" required>
        </p>
        <p><span>GST</span>
          <input type="text" name="mu_gst" id="mu_gst"  placeholder="GST">
        </p>
        <p><span>PAN</span>
          <input type="text" name="mu_pan" id="mu_pan"  placeholder="PAN">
        </p>
        <p>         
          <button type="button" name="userSignUp" id="userSignUp">Sign Up</button>
        </p>
      </fieldset>
    </form>    
  </div>
  <!-- end login --> 
  <script src="<?php echo $js_path; ?>login_service.js"></script>
</body>
</html>
