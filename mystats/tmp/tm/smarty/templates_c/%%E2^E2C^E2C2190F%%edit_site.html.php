<?php /* Smarty version 2.6.25, created on 2015-04-28 22:30:20
         compiled from site/edit_site.html */ ?>

  <div id="login">
    <!-- BEGIN LOGIN FORM -->
    <form  name="esitsiteForm" id="esitsiteForm" class="form-vertical no-padding no-margin"  method="POST" >
    		
      <p class="response" style="color: red;"><?php echo $this->_tpl_vars['msg']; ?>
</p>

      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <input id="input_site_label" name='input_site_label' type="text" placeholder="Site Label" value="<?php echo $this->_tpl_vars['info']['site_name']; ?>
"/>
            <input type='hidden' name='id' id='id' value="<?php echo $this->_tpl_vars['info']['site_id']; ?>
" />
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <input id="input_site_url" name='input_site_url' type="text" placeholder="Site URL" value="<?php echo $this->_tpl_vars['info']['site_url']; ?>
" />
          </div>
        </div>
      </div>

      <input type="submit" id="update-btn" class="button button-size-large" value="Update" />
    </form>
    <!-- END LOGIN FORM -->        
  </div>