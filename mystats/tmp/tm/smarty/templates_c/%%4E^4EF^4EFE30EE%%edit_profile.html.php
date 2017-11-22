<?php /* Smarty version 2.6.25, created on 2015-04-09 23:13:35
         compiled from site/edit_profile.html */ ?>

  <div id="login">
    <!-- BEGIN LOGIN FORM -->
    <form  name="profileForm" id="profileForm" class="form-vertical no-padding no-margin"  method="POST" action='<?php echo $this->_tpl_vars['base_url']; ?>
info/profileupdate' >    		
    <?php if ($this->_tpl_vars['notify'] != ''): ?>
      <p class="response" style="color: green;"><?php echo $this->_tpl_vars['notify']; ?>
</p>
<?php endif; ?>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <input id="input_username" name='input_username' type="text" placeholder="Username" value="<?php echo $this->_tpl_vars['user']['username']; ?>
" />
          </div>
        </div>
      </div>

      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <input id="input_email" name='input_email' type="text" placeholder="Email Address" value="<?php echo $this->_tpl_vars['user']['display_name']; ?>
"/>
          </div>
        </div>
      </div>

      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <input id="input_password" name='input_password' type="password" placeholder="Change Password" />
          </div>
        </div>
      </div>
      <input type="submit" id="login-btn" class="btn btn-primary btn-block btn-large" value="Update" />
    </form>
    <!-- END LOGIN FORM -->        
  </div>