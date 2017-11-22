<?php /* Smarty version 2.6.25, created on 2015-04-08 22:31:02
         compiled from site/header.html */ ?>
<!DOCTYPE  html>
<html>
    <head>
        <meta charset="utf-8">
        <title>mySTATS</title>
        
      <link href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
      <link href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
      <link href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" />
      <link href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/css/style.css" rel="stylesheet" />
      <link href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/css/style-responsive.css" rel="stylesheet" />
      <link href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/css/themes/default.css" rel="stylesheet" id="style_color" />
      <link href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />

      <link href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/css/pages/login.css" rel="stylesheet" type="text/css" />
      
      <link href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" rel="stylesheet" type="text/css" />
      <link href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" type="text/css"  />
      <link href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
      <link href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/css/zebra_datepicker.css" rel="stylesheet" />
      

    </head>
    
    <?php if ($this->_tpl_vars['user']['user_id'] > 0): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'site/dashboard-header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <?php else: ?>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'site/base-header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <?php endif; ?>
    
        <script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/js/highcharts.js"></script>
        <script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/js/exporting.js"></script>
        
        <!--  FOR OVERVIEW-->
        
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/js/jquery.validate.min.js"></script>
             <script type="text/javascript" src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/js/zebra_datepicker.js"></script>
             <script type="text/javascript" src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/js/functions.js"></script>
             <script language="JavaScript" src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/js/user.js"></script>

    