<?php /* Smarty version 2.6.25, created on 2015-04-07 22:22:00
         compiled from site/demographics.html */ ?>

<div id="main">
  
     <div class="scroll">
     <!--     <div style="float: right;"><a href='<?php echo $this->_tpl_vars['base_url']; ?>
info/Export_Data' class='btn btn-primary '>Export CSV</a></div><br/> -->
         
               <div class="span6 ">
                  <!-- BEGIN widget widget-->
                  <div class="widget">
                     <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Portlet</h4>
                        <div class="actions">
                        </div>
                     </div>
                     <div class="widget-body">

            <div class="scroller" data-height="200px">
              <table class="table table-hover">
                  <thead>
                      <tr>
                <th><i class="icon-user"></i> <span class="hidden-phone ">Language</span></th>
                <th><i class="icon-briefcase"></i> <span class="hidden-phone"><?php echo $this->_tpl_vars['labels']['count_of_value']; ?>
</span></th>
                      </tr>
                  </thead>
                  <tbody>
                      
                      <?php if ($this->_tpl_vars['lang_data'] != ''): ?>
                <?php $_from = $this->_tpl_vars['lang_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['data']):
?>
                <tr>
                    <td><?php echo $this->_tpl_vars['data']['lang']; ?>
</td>
                    <td><a href="<?php echo $this->_tpl_vars['base_url']; ?>
language/userlanguagedetails/<?php echo $this->_tpl_vars['data']['lang']; ?>
"><?php echo $this->_tpl_vars['data']['users']; ?>
</a></td>
                </tr>
                <?php endforeach; endif; unset($_from); ?>    
            <?php else: ?>
                <tr>
                    <td>&nbsp;</td>
                    <td>No Data Available</td>
                </tr>
            <?php endif; ?>            
                    
               </tbody>
           </table>
            </div>
                     </div>
                  </div>
                  <!-- END widget widget-->
               </div>



    <div class="row-fluid">
        <div class="span6">
            <!-- BEGIN RECENT ORDERS PORTLET-->
            <div class="widget">
                <div class="widget-title">
                    <h4><i class="icon-shopping-cart"></i>Demographics</h4>
                    <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
                    <a href="javascript:;" class="icon-refresh"></a>        
                    <a href="javascript:;" class="icon-remove"></a>
                    </span>                            
                </div>
                <div class="widget-body">

                <div class="scroller" data-height="200px">
                    <table class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th><i class="icon-user"></i> <span class="hidden-phone ">Country</span></th>
                                <th><i class="icon-briefcase"></i> <span class="hidden-phone"><?php echo $this->_tpl_vars['labels']['count_of_value']; ?>
</span></th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php if ($this->_tpl_vars['country_data'] != ''): ?>
                            <?php $_from = $this->_tpl_vars['country_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['data']):
?>
                                <tr>
                                    <td><?php echo $this->_tpl_vars['data']['lang']; ?>
</td>
                                    <td><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/usercountrydetails/<?php echo $this->_tpl_vars['data']['user_country_code']; ?>
"><?php echo $this->_tpl_vars['data']['users']; ?>
</a></td>
                                </tr>
                            <?php endforeach; endif; unset($_from); ?>
                        <?php else: ?>
                            <tr>
                                <td>&nbsp;</td>
                                <td>No Data Available</td>
                            </tr>
                        <?php endif; ?>            
                    
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END RECENT ORDERS PORTLET-->
        </div>
    </div>



<div class="row-fluid">
    <div class="span11">
        <!-- BEGIN RECENT ORDERS PORTLET-->
        <div class="widget">
            <div class="widget-title">
                <h4><i class="icon-shopping-cart"></i>Demographics</h4>
                <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                <a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
                <a href="javascript:;" class="icon-refresh"></a>        
                <a href="javascript:;" class="icon-remove"></a>
                </span>                            
            </div>
            <div class="widget-body">
            <div class="scroller" data-height="200px">
                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                        <tr>
                            <th><i class="icon-user"></i> <span class="hidden-phone ">City</span></th>
                            <th><i class="icon-briefcase"></i> <span class="hidden-phone"><?php echo $this->_tpl_vars['labels']['count_of_value']; ?>
</span></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ($this->_tpl_vars['city_data'] != ''): ?>
                        <?php $_from = $this->_tpl_vars['city_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['data']):
?>
                            <tr>
                                <td><?php echo $this->_tpl_vars['data']['lang']; ?>
</td>
                                <td><a href="<?php echo $this->_tpl_vars['base_url']; ?>
city/usercitydetails/<?php echo $this->_tpl_vars['data']['lang']; ?>
"><?php echo $this->_tpl_vars['data']['users']; ?>
</a></td>
                            </tr>
                        <?php endforeach; endif; unset($_from); ?>

                    <?php else: ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td>No Data Available</td>
                        </tr>
                    <?php endif; ?>            
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END RECENT ORDERS PORTLET-->
    </div>
    </div>
    </div>
      </div>
</div>