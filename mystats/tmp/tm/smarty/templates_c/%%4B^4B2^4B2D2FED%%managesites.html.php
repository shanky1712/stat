<?php /* Smarty version 2.6.25, created on 2015-04-09 23:16:34
         compiled from site/managesites.html */ ?>

<div id="main">
  <div class="widget-body">
  
     <div class="scroll">
         <div style="float: right;"><a href='<?php echo $this->_tpl_vars['base_url']; ?>
info/ExportData' class='btn btn-primary '><i class="icon-download-alt"></i> Export CSV</a></div><br/>
         <div class='notice' ></div>
          <table class="table table-hover">
              <thead>
                  <tr>
                        <th>Site Id</th>
                      <th>Site name</th>
                        <th>Site URL</th>
                        <th>Created On</th>
                  </tr>
              </thead>
              <tbody>
              
    <?php $_from = $this->_tpl_vars['sites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['site']):
?>
               <tr>
                   <td><?php echo $this->_tpl_vars['site']['site_id']; ?>
</td>
                   <td><?php echo $this->_tpl_vars['site']['site_name']; ?>
</td>
                   <td><?php echo $this->_tpl_vars['site']['site_url']; ?>
</td>
                   <td><?php echo $this->_tpl_vars['site']['site_created_on']; ?>
</td>
                   <td><a href='<?php echo $this->_tpl_vars['static_server']; ?>
site/edit/<?php echo $this->_tpl_vars['site']['site_id']; ?>
'>Edit</a></td>
                   <td><a href='#' id='<?php echo $this->_tpl_vars['site']['site_api_key']; ?>
' name='delete' class='delete_btn'>Delete</a></td>
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