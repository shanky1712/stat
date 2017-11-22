<?php /* Smarty version 2.6.25, created on 2015-04-08 22:31:02
         compiled from site/login.html */ ?>
            <link href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/login-form/css/style.css" rel="stylesheet" />
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/login-form/js/prefixfree.min.js"></script>

  <div class="login">
  <h3>Login</h3>
    <form name="logForm" id="logForm" class="form-vertical no-padding no-margin"  method="POST" >
          <p class="response" style="color: red;">Enter your username and password.</p>

            <input id="input_username" name='input_username' type="text" placeholder="Username" />
            <input id="input_password" name='input_password' type="password" placeholder="Password" />
        <button type="submit" class="btn btn-primary btn-block btn-large" id='login-btn'>Let me in.</button>
    </form>
</div>