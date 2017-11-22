<?php /* Smarty version 2.6.25, created on 2014-11-06 23:23:53
         compiled from site/add_new_site.html */ ?>

  <div id="login">
    <!-- BEGIN LOGIN FORM -->
    <form  name="siteForm" id="siteForm" class="form-vertical no-padding no-margin"  method="POST" >
    		
      <p class="response" style="color: red;"><?php echo $this->_tpl_vars['msg']; ?>
</p>

      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <input id="input_site_label" name='input_site_label' type="text" placeholder="Site Label" />
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <input id="input_site_url" name='input_site_url' type="text" placeholder="Site URL" />
          </div>
        </div>
      </div>

      <input type="submit" id="login-btn" class="btn btn-primary btn-block btn-large" value="Add New Site" />
    </form>
    <!-- END LOGIN FORM -->        
  </div>