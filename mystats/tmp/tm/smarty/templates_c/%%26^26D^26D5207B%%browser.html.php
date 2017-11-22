<?php /* Smarty version 2.6.25, created on 2015-04-11 18:52:08
         compiled from site/browser.html */ ?>

      <link href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/css/simplePagination.css" rel="stylesheet" />
      <link href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/css/style.css" rel="stylesheet" />
      <script type="text/javascript" src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/js/jquery.simplePagination.js"></script>

<?php echo '

<script type="text/javascript">

    $(document).ready(function(){
        
        $(\'#dark-pagination\').pagination({
            pages: "'; ?>
<?php echo $this->_tpl_vars['total_pages']; ?>
<?php echo '",
            cssStyle: \'dark-theme\',
            displayedPages: 3,
            hrefTextPrefix:"'; ?>
<?php echo $this->_tpl_vars['base_url']; ?>
<?php echo 'browser/index/'; ?>
<?php echo $this->_tpl_vars['browser_code']; ?>
<?php echo '/",
            edges: 3,
            currentPage:"'; ?>
<?php echo $this->_tpl_vars['current_page']; ?>
<?php echo '"
        }); 

    });
</script>

'; ?>

<div id="main">
  <div class="widget-body">
  
     <div class="scroll">
         <div style="float: right;"><a href='<?php echo $this->_tpl_vars['base_url']; ?>
info/Export_Data' class='btn btn-primary '><i class="icon-download-alt"></i> Export CSV</a></div><br/>
          <table class="table table-hover">
              <thead>
                  <tr>
                        <th>User IP</th>
                      <th>Browser name</th>
                        <th>Browser Version</th>
                        <th>City</th>
                      <th>Country</th>
                  </tr>
              </thead>
              <tbody>
              
    <?php $_from = $this->_tpl_vars['details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['info']):
?>
               <tr>
                   <td><?php echo $this->_tpl_vars['info']['user_ip']; ?>
</td>
                   <td><?php echo $this->_tpl_vars['info']['user_browser_name']; ?>
</td>
                   <td><?php echo $this->_tpl_vars['info']['user_browser_version']; ?>
</td>
                   <td><?php echo $this->_tpl_vars['info']['user_city']; ?>
</td>
                   <td><?php echo $this->_tpl_vars['info']['user_country']; ?>
</td>
               </tr>
    <?php endforeach; endif; unset($_from); ?>
                
                </div>
           </tbody>
       </table>
                
        <div class="pagination-holder black clearfix">
            <ul id="dark-pagination" class="pagination"></ul>
        </div>
    </div>
</div>