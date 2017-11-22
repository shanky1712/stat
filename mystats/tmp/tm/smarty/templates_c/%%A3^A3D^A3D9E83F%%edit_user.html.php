<?php /* Smarty version 2.6.25, created on 2015-04-28 23:14:28
         compiled from site/edit_user.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'in_array', 'site/edit_user.html', 44, false),)), $this); ?>

  <div id="login">
    <!-- BEGIN LOGIN FORM -->
    <form  name="euserForm" id="euserForm" class="form-vertical no-padding no-margin"  method="POST" >
    		
      <p class="response" style="color: red;"><?php echo $this->_tpl_vars['msg']; ?>
</p>

      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <select name='user_type' id='user_type'>
                  <?php $_from = $this->_tpl_vars['user_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['usertype']):
?>
                  <?php if ($this->_tpl_vars['usertype']['user_type_id'] == $this->_tpl_vars['info']['user_type']): ?>
                        <option value="<?php echo $this->_tpl_vars['usertype']['user_type_id']; ?>
" selected><?php echo $this->_tpl_vars['usertype']['user_type_name']; ?>
</option>
                  <?php else: ?>
                         <option value="<?php echo $this->_tpl_vars['usertype']['user_type_id']; ?>
"><?php echo $this->_tpl_vars['usertype']['user_type_name']; ?>
</option>
                    <?php endif; ?>
                  <?php endforeach; endif; unset($_from); ?>
            </select> 
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
          <input type='hidden' name='user_id' id='user_id' value="<?php echo $this->_tpl_vars['info']['user_id']; ?>
" />
            <input id="input_useremail" name='input_useremail' type="text" placeholder="Email ID" value="<?php echo $this->_tpl_vars['info']['user_name']; ?>
" />
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <input id="input_pwd" name='input_pwd' type="text" placeholder="Change Password" value="" />
          </div>
        </div>
      </div>

      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
           SItes: <br />
                <?php $_from = $this->_tpl_vars['sites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['site']):
?>
                  <?php if (((is_array($_tmp=$this->_tpl_vars['site']['site_id'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['accessable_sites']) : in_array($_tmp, $this->_tpl_vars['accessable_sites']))): ?>
                  <input id="sites[]" name='sites[]' type="checkbox" value="<?php echo $this->_tpl_vars['site']['site_id']; ?>
" checked="checked"><?php echo $this->_tpl_vars['site']['site_name']; ?>
</input><br />
                  <?php else: ?>
                  <input id="sites[]" name='sites[]' type="checkbox" value="<?php echo $this->_tpl_vars['site']['site_id']; ?>
" ><?php echo $this->_tpl_vars['site']['site_name']; ?>
</input><br />
                  <?php endif; ?>
                  <?php endforeach; endif; unset($_from); ?>
          </div>
        </div>
      </div>

      <input type="submit" id="update-btn" class="btn btn-primary btn-block btn-large" value="Update" />
    </form>
    <!-- END LOGIN FORM -->        
  </div>