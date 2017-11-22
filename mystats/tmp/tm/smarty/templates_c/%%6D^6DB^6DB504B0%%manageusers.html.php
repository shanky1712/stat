<?php /* Smarty version 2.6.25, created on 2015-04-09 23:19:09
         compiled from site/manageusers.html */ ?>

<div id="main">
  <div class="widget-body">
  <a href='<?php echo $this->_tpl_vars['static_server']; ?>
manageusers/add'>Add New User</a>
     <div class="scroll">
         <div style="float: right;"><a href='<?php echo $this->_tpl_vars['base_url']; ?>
info/ExportData' class='btn btn-primary '><i class="icon-download-alt"></i> Export CSV</a></div><br/>
         <div class='notice' ></div>
          <table class="table table-hover">
              <thead>
                  <tr>
                        <th>User Id</th>
                      <th>User Email</th>
                        <th>Site URL</th>
                        <th>Created On</th>
                  </tr>
              </thead>
              <tbody>
              
    <?php $_from = $this->_tpl_vars['manageusers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['user']):
?>
               <tr>
                   <td><?php echo $this->_tpl_vars['user']['user_id']; ?>
</td>
                   <td><?php echo $this->_tpl_vars['user']['user_email']; ?>
</td>
                   <td><?php echo $this->_tpl_vars['site']['site_url']; ?>
</td>
                   <td><?php echo $this->_tpl_vars['site']['site_created_on']; ?>
</td>
                   <td><a href='<?php echo $this->_tpl_vars['static_server']; ?>
manageusers/edit/<?php echo $this->_tpl_vars['user']['user_id']; ?>
'>Edit</a></td>
                   <td><a href='#' id='<?php echo $this->_tpl_vars['user']['user_id']; ?>
' name='delete' class='delete_user'>Delete</a></td>
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