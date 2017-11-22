<?php /* Smarty version 2.6.25, created on 2015-04-02 22:19:07
         compiled from site/dashboard.html */ ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/css/grid.css" />
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/js/blocksit.min.js"></script> 
        <?php echo '
        <script type="text/javascript">
            $(document).ready(function() {
                
                //blocksit define
                $(window).load( function() {
                    $(\'#grid-container\').BlocksIt({
                        numOfCol: 4,
                        offsetX: 8,
                        offsetY: 8
                    });
                });
                
                //window resize
                var currentWidth = 1100;
                $(window).resize(function() {
                    var winWidth = $(window).width();
                    var conWidth;
                    if(winWidth < 660) {
                        conWidth = 440;
                        col = 2
                    } else if(winWidth < 880) {
                        conWidth = 660;
                        col = 3
                    } else if(winWidth < 1100) {
                        conWidth = 880;
                        col = 4;
                    } else {
                        conWidth = 1100;
                        col = 5;
                    }
                    
                    if(conWidth != currentWidth) {
                        currentWidth = conWidth;
                        $(\'#grid-container\').width(conWidth);
                        $(\'#grid-container\').BlocksIt({
                            numOfCol: col,
                            offsetX: 8,
                            offsetY: 8
                        });
                    }
                });
            });
        </script>

        '; ?>


<section id="grid-wrapper">
<div id="grid-container">
<?php $_from = $this->_tpl_vars['list_of_sites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['site']):
?>
    <div class="grid">
        <a href="<?php echo $this->_tpl_vars['base_url']; ?>
home/index/<?php echo $this->_tpl_vars['site']['site_api_key']; ?>
"><strong><?php echo $this->_tpl_vars['site']['site_name']; ?>
</strong>
        <p><?php echo $this->_tpl_vars['site']['site_url']; ?>
</p></a>
        <a href='<?php echo $this->_tpl_vars['base_url']; ?>
home/index/<?php echo $this->_tpl_vars['site']['site_api_key']; ?>
'><div class="meta">More</div></a>
    </div>
<?php endforeach; endif; unset($_from); ?>
</div>
</section>