<?php /* Smarty version 2.6.25, created on 2014-11-06 23:23:37
         compiled from site/track.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'site/track.html', 11, false),)), $this); ?>
<div id="main">

<!-- wrapper-main -->
    <div class="wrapper">
    <h2>Your API Key: <span style="color: red;"><?php echo $this->_tpl_vars['api_key']; ?>
</span></h2>
    

        <!-- Graph HTML -->
        <div id="graph-wrapper">
<pre>
    <?php echo ((is_array($_tmp=$this->_tpl_vars['track'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'APIKEY', $this->_tpl_vars['api_key']) : smarty_modifier_replace($_tmp, 'APIKEY', $this->_tpl_vars['api_key'])); ?>

</pre>

        </div>
    </div>
</div>