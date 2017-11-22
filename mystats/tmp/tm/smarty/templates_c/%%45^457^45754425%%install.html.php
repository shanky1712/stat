<?php /* Smarty version 2.6.25, created on 2015-03-31 22:06:26
         compiled from site/auth/install.html */ ?>

  <div id="login">
    <!-- BEGIN LOGIN FORM -->
    <form  name="authForm" id="authForm" class="form-vertical no-padding no-margin"  method="POST" >
      <p class="response" style="color: red;"></p>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
        <h3>Configuration: </h3>
          <label>Host Name:</label>
            <input id="input_hostname" name='input_hostname' type="text" placeholder="Host Name" />
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <label>Database Name:</label>
            <input id="input_dbname" name='input_dbname' type="text" placeholder="DB User Name" />
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <label>DB User Name:</label>
            <input id="input_dbusername" name='input_dbusername' type="text" placeholder="Database Name" />
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <label>DB Password:</label>
            <input id="input_dbpassword" name='input_dbpassword' type="password" placeholder="DB Password" />
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <label>Admin User Name ( Email ID ):</label>
            <input id="input_useremail" name='input_useremail' type="email" placeholder="Email ID" />
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <label>Admin Password:</label>
            <input id="input_userpassword" name='input_userpassword' type="password" placeholder="Password" />
          </div>
        </div>
      </div>
      <input type="submit" id="auth-btn" class="button button-size-large" value="Install" />
    </form>
    <!-- END LOGIN FORM -->        
  </div>