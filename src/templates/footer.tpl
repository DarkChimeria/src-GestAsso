  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      {$assoName} - Nous sommes le : {$smarty.now|date_format:'%d-%m-%Y %H:%M:%S'}
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
<script src="includes/libs/jquery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="includes/libs/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="includes/libs/design/js/app.min.js"></script>

<script language="JavaScript">

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
</script>
   </body>
   </html>
