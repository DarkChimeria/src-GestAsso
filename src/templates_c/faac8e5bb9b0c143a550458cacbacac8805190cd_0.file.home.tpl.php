<?php
/* Smarty version 3.1.29, created on 2017-02-20 12:25:17
  from "/var/www/html/p2/templates/home/home.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58aad21dddf9e0_41922006',
  'file_dependency' => 
  array (
    'faac8e5bb9b0c143a550458cacbacac8805190cd' => 
    array (
      0 => '/var/www/html/p2/templates/home/home.tpl',
      1 => 1487589916,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58aad21dddf9e0_41922006 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/html/p2/includes/libs/Smarty/plugins/modifier.date_format.php';
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $_smarty_tpl->tpl_vars['fil']->value;?>

        <small>Gestionnaire</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> <?php echo $_smarty_tpl->tpl_vars['fil']->value;?>
</a></li>
<!--         <li class="active"><?php echo $_smarty_tpl->tpl_vars['fil']->value;?>
</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-person"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Utilisateurs</span>
              <span class="info-box-number"><?php echo $_smarty_tpl->tpl_vars['countUsers']->value;?>
</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-people"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Groupes</span>
              <span class="info-box-number"><?php echo $_smarty_tpl->tpl_vars['countGroups']->value;?>
</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-card"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Trésorerie</span>
              <span class="info-box-number"><?php echo $_smarty_tpl->tpl_vars['sumTresorerie']->value;?>
<small>€</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-person-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Nouveaux membres</span>
              <span class="info-box-number"><?php echo $_smarty_tpl->tpl_vars['newUsers']->value;?>
</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <section class="content-header">
          <h1>
            <?php echo mb_strtoupper($_smarty_tpl->tpl_vars['titleUser']->value, 'UTF-8');?>

            <small></small>
          </h1>
        </section>
        <br>

        <!-- BOUCLE DES UTILISATEURS RECENTS -->

        <?php
$_from = $_smarty_tpl->tpl_vars['recentsUsers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_Users_0_saved_item = isset($_smarty_tpl->tpl_vars['Users']) ? $_smarty_tpl->tpl_vars['Users'] : false;
$_smarty_tpl->tpl_vars['Users'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['Users']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['Users']->value) {
$_smarty_tpl->tpl_vars['Users']->_loop = true;
$__foreach_Users_0_saved_local_item = $_smarty_tpl->tpl_vars['Users'];
?>
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active"  style="background: url('<?php echo $_smarty_tpl->tpl_vars['Users']->value['group_cover'];?>
') center center;">
                <!-- <div class="caption-title"> -->
              <a href="index.php?gestion=users&action=details&id=<?php echo $_smarty_tpl->tpl_vars['Users']->value['user_id'];?>
"><h3 class="widget-user-username caption-title_user"><?php echo $_smarty_tpl->tpl_vars['Users']->value['user_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['Users']->value['user_firstname'];?>
 - <?php echo $_smarty_tpl->tpl_vars['Users']->value['group_name'];?>
</h3></a>
       <!--        </div> -->
              <h5 class="widget-user-desc"></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" style="background: #FFFFFF; border-color: lightgray" src="<?php echo $_smarty_tpl->tpl_vars['Users']->value['user_profilPicture'];?>
" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $_smarty_tpl->tpl_vars['Users']->value['user_birth'];?>
</h5>
                    <span class="description-text">ANS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $_smarty_tpl->tpl_vars['Users']->value['usertype_name'];?>
</h5>
                    <span class="description-text"><?php echo $_smarty_tpl->tpl_vars['Users']->value['paid'];?>
</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo utf8_encode(smarty_modifier_date_format($_smarty_tpl->tpl_vars['Users']->value['user_dateCreation'],"%d %B %Y"));?>
</h5>
                    <span class="description-text">MEMBRE DEPUIS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>

        <?php
$_smarty_tpl->tpl_vars['Users'] = $__foreach_Users_0_saved_local_item;
}
if ($__foreach_Users_0_saved_item) {
$_smarty_tpl->tpl_vars['Users'] = $__foreach_Users_0_saved_item;
}
?>

        <!-- FIN BOUCLE DES UTILISATEURS RECENTS -->

        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="row">
        <section class="content-header">
          <h1>
            <?php echo mb_strtoupper($_smarty_tpl->tpl_vars['titleGroup']->value, 'UTF-8');?>

            <small></small>
          </h1>
        </section>
        
        <br>
        <?php
$_from = $_smarty_tpl->tpl_vars['recentsGroups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_Groups_1_saved_item = isset($_smarty_tpl->tpl_vars['Groups']) ? $_smarty_tpl->tpl_vars['Groups'] : false;
$_smarty_tpl->tpl_vars['Groups'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['Groups']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['Groups']->value) {
$_smarty_tpl->tpl_vars['Groups']->_loop = true;
$__foreach_Groups_1_saved_local_item = $_smarty_tpl->tpl_vars['Groups'];
?>
        <div class="col-md-4">
          
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow" style="background: url('<?php echo $_smarty_tpl->tpl_vars['Groups']->value['group_cover'];?>
') center center;">
            <!-- <img class="img" src="upload_files/group_cover/<?php echo $_smarty_tpl->tpl_vars['Groups']->value['group_cover'];?>
" alt="User Avatar"> -->
              <div class="widget-user-image">
              <img class="img-circle" src="<?php echo $_smarty_tpl->tpl_vars['Groups']->value['group_avatar'];?>
" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <a href="index.php?gestion=groups&action=details&id=<?php echo $_smarty_tpl->tpl_vars['Groups']->value['group_id'];?>
"><h3 class="widget-user-username caption-title-group"><?php echo $_smarty_tpl->tpl_vars['Groups']->value['group_name'];?>
</h3>
             <a href="index.php?gestion=groups&action=details&id=<?php echo $_smarty_tpl->tpl_vars['Groups']->value['group_id'];?>
"><h5 class="widget-user-desc caption-title-activity"><?php echo $_smarty_tpl->tpl_vars['Groups']->value['group_activity'];?>
</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Membres <span class="pull-right badge bg-blue"><?php echo $_smarty_tpl->tpl_vars['Groups']->value['count_users_per_group'];?>
</span></a></li>
                <li><a href="#">Créé le <span class="pull-right badge bg-green"><?php echo utf8_encode(smarty_modifier_date_format($_smarty_tpl->tpl_vars['Groups']->value['group_dateCreation'],"%d %B %Y"));?>
</span></a></li>
              </ul>
            </div>
          </div>
         
          <!-- /.widget-user -->
        </div>
         <?php
$_smarty_tpl->tpl_vars['Groups'] = $__foreach_Groups_1_saved_local_item;
}
if ($__foreach_Groups_1_saved_item) {
$_smarty_tpl->tpl_vars['Groups'] = $__foreach_Groups_1_saved_item;
}
?>
     
      <!-- /.box -->
    </div>


  </section>
  <!-- /.content -->
</div><?php }
}
