<?php
/* Smarty version 3.1.29, created on 2017-02-12 22:58:18
  from "/var/www/html/p2/templates/footer.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58a0da7ad3fb82_77553885',
  'file_dependency' => 
  array (
    '046f7ad2561446f8426815bb06287e1ae9f58437' => 
    array (
      0 => '/var/www/html/p2/templates/footer.tpl',
      1 => 1486804082,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58a0da7ad3fb82_77553885 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/html/p2/includes/libs/Smarty/plugins/modifier.date_format.php';
?>
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <?php echo $_smarty_tpl->tpl_vars['assoName']->value;?>
 - Nous sommes le : <?php echo smarty_modifier_date_format(time(),'%d-%m-%Y %H:%M:%S');?>

    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">SF</a>.</strong> Tous droits réservés.
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<?php echo '<script'; ?>
 src="includes/libs/jquery/jquery-2.2.3.min.js"><?php echo '</script'; ?>
>
<!-- Bootstrap 3.3.6 -->
<?php echo '<script'; ?>
 src="includes/libs/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<!-- AdminLTE App -->
<?php echo '<script'; ?>
 src="includes/libs/design/js/app.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 language="JavaScript">

<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://www.javascriptsource.com -->

<!-- Begin
function randomPassword(length)
{
  chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
  pass = "";
  for(x=0;x<length;x++)
  {
    i = Math.floor(Math.random() * 62);
    pass += chars.charAt(i);
  }
  return pass;
}
function formSubmit()
{
  myform.user_password.value = randomPassword(myform.length.value);
  return false;
}
//  End -->
<?php echo '</script'; ?>
>
   </body>
   </html>
<?php }
}
