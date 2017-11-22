<?php /* Smarty version 2.6.25, created on 2015-04-09 22:49:55
         compiled from site/behaviour.html */ ?>

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
    <?php if ($this->_tpl_vars['tags']): ?>
        <?php $_from = $this->_tpl_vars['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['tag']):
?>
            <div class="grid">
                <strong>Label: <?php echo $this->_tpl_vars['tag']['label']; ?>
</strong>
                <p>Total Visits: <?php echo $this->_tpl_vars['tag']['total_visits']; ?>
</p>
                <a href='<?php echo $this->_tpl_vars['base_url']; ?>
behaviour/label/<?php echo $this->_tpl_vars['tag']['label']; ?>
'><div class="meta">More</div></a>
            </div>
        <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
        <div> No Action labels are available.</div>
    <?php endif; ?>
    </div>
</section>