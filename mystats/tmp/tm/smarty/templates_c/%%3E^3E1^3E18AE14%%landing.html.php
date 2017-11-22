<?php /* Smarty version 2.6.25, created on 2015-04-09 22:49:35
         compiled from site/landing.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'site/landing.html', 124, false),)), $this); ?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <?php echo '

<script type="text/javascript">

    //var input_data = [ ["Year", "Sales"], ["2004",  1000], ["2005",  1170], ["2006",  660,], ["2007",  1030]  ];

  
     google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable( [ '; ?>
<?php echo $this->_tpl_vars['visits']; ?>
<?php echo ' ] );

        var options = {
          title: \'Company Performance\'
        };

        var chart = new google.visualization.LineChart(document.getElementById(\'unique_container\'));
        chart.draw(data, options);
      }
    

        function sample()
    {
        $.removeCookie(\'country\', {expires: -1, path: \'/\'});
        $.removeCookie(\'country_code\', {expires: -1, path: \'/\'});
        
        window.location.reload();
        
    }

    
</script>

'; ?>


    <?php if ($this->_tpl_vars['success_message']): ?>
        <div align="center" id="proc_msg" style="align: center; color: green; font-weight: bold; ">
            <br><?php echo $this->_tpl_vars['success_message']; ?>

        </div>                    
    <?php endif; ?>

    <?php if ($this->_tpl_vars['error_message']): ?>
        <div align="center" id="proc_msg" style="align: center; color: red; font-weight: bold;">
            <br><?php echo $this->_tpl_vars['error_message']; ?>

        </div>                    
    <?php endif; ?>
<div id="main">
<!-- wrapper-main -->

        <input type='hidden' name='start_date' id='start_date' />
        <input type='hidden' name='end_date' id='end_date' />
        
        <?php if ($this->_tpl_vars['country_code'] != '' || $this->_tpl_vars['country'] != ''): ?>
            <div class='alert alert-success country'>You are seeing <?php echo $this->_tpl_vars['country']; ?>
 Report. If you want to see the complete report <a href='#' onClick="sample()">Click Here</a></div>
        <?php endif; ?>
                <!-- BEGIN PAGE CONTENT-->
                <div id="page" class="dashboard">
                    <!-- BEGIN OVERVIEW STATISTIC BARS-->
                    <div class="row-fluid stats-overview-cont">
                        <div class="span2 responsive" data-tablet="span4" data-desktop="span2">
                            <div class="stats-overview block clearfix">
                                <div class="display stat ok huge">
                                    <div class="percent"></div>
                                </div>
                                <div class="details">
                                    <div class="title">Pageviews</div>
                                    <div class="numbers"><?php echo $this->_tpl_vars['total_visits']; ?>
</div>
                                </div>
                                <div class="progress progress-info">
                                    <div class="bar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span4" data-desktop="span2">
                            <div class="stats-overview block clearfix">
                                <div class="display stat good huge">
                                    <div class="percent"></div>
                                </div>
                                <div class="details">
                                    <div class="title">Unique Visits</div>
                                    <div class="numbers"><?php echo $this->_tpl_vars['unique_visits']; ?>
</div>
                                    <div class="progress progress-warning">
                                        <div class="bar" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span2 responsive " data-tablet="span4" data-desktop="span2">
                            <div class="stats-overview block clearfix">
                                <div class="display stat bad huge">
                                    <div class="percent"></div>
                                </div>
                                <div class="details">
                                    <div class="title">Repeat Visits</div>
                                    <div class="numbers"><?php echo $this->_tpl_vars['count_repeat']; ?>
</div>
                                    <div class="progress progress-success">
                                        <div class="bar" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span2 responsive " data-tablet="span4 fix-margin" data-desktop="span2">
                            <div class="stats-overview block clearfix">
                                <div class="display stat good huge">
                                    <div class="percent"></div>
                                </div>
                                <div class="details">
                                    <div class="title">Chrome / Firefox</div>
                                    <div class="numbers"><?php echo $this->_tpl_vars['browser_chrome']; ?>
 / <?php echo $this->_tpl_vars['browser_firefox']; ?>
</div>
                                    <div class="progress progress-warning">
                                        <div class="bar" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span2 responsive " data-tablet="span4" data-desktop="span2">
                            <div class="stats-overview block clearfix">
                                <div class="display stat ok huge">
                                    <div class="percent"></div>
                                </div>
                                <div class="details">
                                    <div class="title"><?php echo ((is_array($_tmp=@$this->_tpl_vars['top_1_country']['user_country'])) ? $this->_run_mod_handler('default', true, $_tmp, 'NULL') : smarty_modifier_default($_tmp, 'NULL')); ?>
 / <?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['top_2_country']['user_country'])) ? $this->_run_mod_handler('default', true, $_tmp, 'NULL') : smarty_modifier_default($_tmp, 'NULL')))) ? $this->_run_mod_handler('default', true, $_tmp, 'NULL') : smarty_modifier_default($_tmp, 'NULL')); ?>
</div>
                                    <div class="numbers"><?php echo ((is_array($_tmp=@$this->_tpl_vars['top_1_country']['count_of_hits'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 / <?php echo ((is_array($_tmp=@$this->_tpl_vars['top_2_country']['count_of_hits'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
</div>
                                    <div class="progress progress-danger">
                                        <div class="bar" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span4" data-desktop="span2">
                            <div class="stats-overview block clearfix">
                                <div class="display stat bad huge">
                                    <div class="percent"></div>
                                </div>
                                <div class="details">
                                    <div class="title"><?php echo ((is_array($_tmp=@$this->_tpl_vars['top_1_language']['user_agent_lang'])) ? $this->_run_mod_handler('default', true, $_tmp, 'NULL') : smarty_modifier_default($_tmp, 'NULL')); ?>
 / <?php echo ((is_array($_tmp=@$this->_tpl_vars['top_2_language']['user_agent_lang'])) ? $this->_run_mod_handler('default', true, $_tmp, 'NULL') : smarty_modifier_default($_tmp, 'NULL')); ?>
</div>
                                    <div class="numbers"><?php echo ((is_array($_tmp=@$this->_tpl_vars['top_1_language']['count_of_hits'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 / <?php echo ((is_array($_tmp=@$this->_tpl_vars['top_2_language']['count_of_hits'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
</div>
                                    <div class="progress progress-success">
                                        <div class="bar" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OVERVIEW STATISTIC BARS-->
                    <div class="row-fluid">
                        <div class="span8">
                            <!-- BEGIN SITE VISITS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-signal"></i>Site Visits</h4>
                                    <span class="tools">
                                    <a href="javascript:;" class="icon-chevron-down"></a>
                                    <a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
                                    <a href="javascript:;" class="icon-refresh"></a>        
                                    <a href="javascript:;" class="icon-remove"></a>
                                    </span>                            
                                </div>
                                <div class="widget-body">
                                    <div id='unique_container' style="height: 400px;"></div>
                                </div>
                            </div>
                            <!-- END SITE VISITS PORTLET-->
                        </div>
                        <div class="span4">
                            <!-- BEGIN NOTIFICATIONS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-bell"></i>Notifications</h4>
                                    <span class="tools">
                                    <a href="javascript:;" class="icon-chevron-down"></a>
                                    <a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
                                    <a href="javascript:;" class="icon-refresh"></a>
                                    </span>                            
                                </div>
                                <div class="widget-body" style="height: 399px;">
                                    <ul class="item-list scroller padding" data-height="377" data-always-visible="1">

                                    <?php if ($this->_tpl_vars['latest_events'] != ''): ?>
                                        <?php $_from = $this->_tpl_vars['latest_events']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['hits']):
?>
                                            <?php if (isset ( $this->_tpl_vars['hits']['user_ip'] )): ?> 
                                            <li>
                                                <span class="label label-success"><i class="icon-bell"></i></span>
                                                <span>Visits from <?php echo $this->_tpl_vars['hits']['user_ip']; ?>
</span>
                                                <span> ( <?php if ($this->_tpl_vars['hits']['user_country'] != ''): ?> <?php echo $this->_tpl_vars['hits']['user_country']; ?>
 <?php else: ?> undefined <?php endif; ?> )</span>
                                                <span class="small italic"><?php echo $this->_tpl_vars['hits']['time_ago']; ?>
</span>
                                            </li>
                                            <?php else: ?>
                                            <li>
                                                <h4 style="color: blue; text-align: center;">Empty Visits. Waiting for the New Visits...</h4>
                                            </li>
                                            <?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?>
                                    <?php else: ?>

                                        <li>
                                            <h4 style="color: blue; text-align: center;">Empty Visits. Waiting for the New Visits...</h4>
                                        </li>

                                    <?php endif; ?>
                                    </ul>
                                    <div class="space5"></div>
                                    <a href="<?php echo $this->_tpl_vars['base_url']; ?>
info/allvisits/" class="pull-right">View all notifications</a>                                        
                                    <div class="clearfix no-top-space no-bottom-space"></div>
                                </div>
                            </div>
                            <!-- END NOTIFICATIONS PORTLET-->
                        </div>
                    </div>
                    <!-- END OVERVIEW STATISTIC BLOCKS-->
                    <div class="row-fluid">
                        <div class="span6">
                            <!-- BEGIN REGIONAL STATS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-globe"></i>Regional Stats</h4>
                                    <span class="tools">
                                    <a href="javascript:;" class="icon-chevron-down"></a>
                                    <a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
                                    <a href="javascript:;" class="icon-refresh"></a>        
                                    <a href="javascript:;" class="icon-remove"></a>                                        
                                    </span>                            
                                </div>
                                <div class="widget-body">
                                    <div id="region_statistics_loading">
                                        <img src="assets/img/loading.gif" alt="loading" />
                                    </div>
                                    <div id="region_statistics_content" class="hide">
                                        <div class="btn-toolbar no-top-space clearfix">
                                        </div>
                                        <div id="vmap_world" class="vmaps  chart hide"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END REGIONAL STATS PORTLET-->
                        </div>
                        <div class="span6">
                            <!-- BEGIN RECENT ORDERS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-info-sign"></i>Demographics</h4>
                                    <span class="tools">
                                    <a href="javascript:;" class="icon-chevron-down"></a>
                                    <a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
                                    <a href="javascript:;" class="icon-refresh"></a>        
                                    <a href="javascript:;" class="icon-remove"></a>
                                    </span>                            
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped table-bordered table-advance table-hover">
                                        <thead>
                                            <tr>
                                                <th><i class="icon-user"></i> <span class="hidden-phone ">Country</span></th>
                                                <th><i class="icon-briefcase"></i> <span class="hidden-phone">Visits</span></th>
                                                <th><i class="icon-eye-open"></i> <span class="hidden-phone "></span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if ($this->_tpl_vars['country_data'] != ''): ?>
                                            <?php $_from = $this->_tpl_vars['country_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['data']):
?>
                                            <?php if ($this->_tpl_vars['i'] < 9 && $this->_tpl_vars['data']['lang'] != ''): ?>
                                                <tr>
                                                    <td class="highlight">
                                                        <div class="success"></div>
                                                        <a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/usercountrydetails/<?php echo $this->_tpl_vars['data']['user_country_code']; ?>
"><?php echo $this->_tpl_vars['data']['lang']; ?>
</a>
                                                    </td>
                                                    <td><?php echo $this->_tpl_vars['data']['users']; ?>
 <a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/usercountrydetails/<?php echo $this->_tpl_vars['data']['user_country_code']; ?>
" class="btn btn-mini visible-phone hidden-tablet">View</a> </td>
                                                    <td><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/usercountrydetails/<?php echo $this->_tpl_vars['data']['user_country_code']; ?>
" class="btn btn-mini hidden-phone hidden-tablet">View</a></td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php endforeach; endif; unset($_from); ?>
                                        <?php else: ?>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td align="center">None</td>
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
                <!-- END PAGE CONTENT-->

    <div class="row-fluid">
        <div class="span6">
            <!-- BEGIN SITE VISITS PORTLET-->
            <div class="widget">
                <div class="widget-title">
                    <h4><i class="icon-shopping-cart"></i>Browser</h4>
                    <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
                    <a href="javascript:;" class="icon-refresh"></a>        
                    <a href="javascript:;" class="icon-remove"></a>
                    </span>            
                </div>
                <div class="widget-body">
                    <table class="table table-striped table-bordered table-advance table-hover">
                        <tbody>
                        <?php if ($this->_tpl_vars['browsers'] != ''): ?>
                            <?php $_from = $this->_tpl_vars['browsers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['browser']):
?>
                                <tr>
                                    <td><a href="<?php echo $this->_tpl_vars['base_url']; ?>
browser/index/<?php echo $this->_tpl_vars['browser']['browser_name']; ?>
"><?php echo $this->_tpl_vars['browser']['browser_name']; ?>
</a></td>
                                </tr>
                            <?php endforeach; endif; unset($_from); ?>
                        <?php else: ?>
                            <tr>
                                <td>&nbsp;</td>
                                <td>None</td>
                            </tr>
                        <?php endif; ?>    
                        </tbody>
                    </table>
                </div>
            </div>

                        </div>
        <div class="span6">
        
        <!-- BEGIN SITE VISITS PORTLET-->
            <div class="widget">
                <div class="widget-title">
                    <h4><i class="icon-info-sign"></i>Demographics</h4>
                    <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
                    <a href="javascript:;" class="icon-refresh"></a>        
                    <a href="javascript:;" class="icon-remove"></a>
                    </span>            
                </div>
            <div class="widget-body">
                <table class="table table-striped table-bordered table-advance table-hover">
                    <tbody>
                        <tr>
                            <td><a href="<?php echo $this->_tpl_vars['base_url']; ?>
language/index" >Language</a></td>            
                        </tr>
                        <tr>
                            <td><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/index">Country / Territory </a></td>
                        </tr>
                        <tr>
            <td><a href="<?php echo $this->_tpl_vars['base_url']; ?>
city/index">City</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    </div>
    
</div>