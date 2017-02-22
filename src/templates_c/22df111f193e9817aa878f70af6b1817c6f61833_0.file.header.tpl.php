<?php
/* Smarty version 3.1.29, created on 2017-02-22 14:01:17
  from "/var/www/html/p2/templates/header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58ad8b9d4a9230_87642024',
  'file_dependency' => 
  array (
    '22df111f193e9817aa878f70af6b1817c6f61833' => 
    array (
      0 => '/var/www/html/p2/templates/header.tpl',
      1 => 1487768473,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ad8b9d4a9230_87642024 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Gestionnaire | Accueil</title>
	<link rel="icon" href="includes/libs/design/img/favicon.ico" type="image/x-icon">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="includes/libs/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="includes/libs/design/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="includes/libs/design/css/style.css">
    <link rel="stylesheet" href="includes/libs/design/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<!-- Main Header -->
		<header class="main-header">

			<!-- Logo -->
			<a href="index.php" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>GS</b>A</span>
				<!-- logo for regular state and mobile devices -->
				<img src="upload_files/association_settings/<?php echo $_smarty_tpl->tpl_vars['assoLogo']->value;?>
" class="img" alt="User Image">
				<b><?php echo $_smarty_tpl->tpl_vars['assoName']->value;?>
</b>
			</a>

			<!-- Header Navbar -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">MENU</span>
				</a>
				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown messages-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-bell-o"></i>
								<span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['countMembresSansGroupe']->value;?>
</span>
							</a>
							<ul class="dropdown-menu">
								<li class="header">Vous avez <?php echo $_smarty_tpl->tpl_vars['countMembresSansGroupe']->value;?>
 alertes</li>
								<li>
									<!-- inner menu: contains the actual data -->
									<ul class="menu">
										<li><!-- start message -->
											<a href="#">
												<div class="pull-left">
													<img src="upload_files/association_settings/bot.png" class="img-circle" alt="User Image">
												</div>
												<h4>
													Gestionnaire
													<!-- <small><i class="fa fa-clock-o"></i> 5 mins</small> -->
												</h4>
												<p><?php echo $_smarty_tpl->tpl_vars['countMembresSansGroupe']->value;?>
 Membres créés sans groupe !</p>
											</a>
										</li>
										<!-- end message -->
									</ul>
								</li>
								<!-- <li class="footer"><a href="#">Voir les membres</a></li> -->
							</ul>
						</li>
						<!-- Messages: style can be found in dropdown.less-->
						<!-- User Account Menu -->
						<li class="dropdown user user-menu">
							<!-- Menu Toggle Button -->
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<!-- The user image in the navbar-->
								<img src="<?php echo $_smarty_tpl->tpl_vars['avatarConnect']->value;?>
" class="user-image" alt="User Image">
								<!-- hidden-xs hides the username on small devices so only the image appears. -->
								<span class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['nameConnect']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['firstnameConnect']->value;?>
</span>
							</a>
							<ul class="dropdown-menu">
								<!-- The user image in the menu -->
								<li class="user-header">
									<img src="<?php echo $_smarty_tpl->tpl_vars['avatarConnect']->value;?>
" class="img-circle" alt="User Image">

									<p>
										<?php echo $_smarty_tpl->tpl_vars['nameConnect']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['firstnameConnect']->value;?>

										<small>Membre depuis Nov. 2012</small>
									</p>
								</li>
								<!-- Menu Body -->
								<li class="user-body">
									<div class="row">
										<div class="col-xs-4 text-center">
											<a href="#">Followers</a>
										</div>
										<div class="col-xs-4 text-center">
											<a href="#">Sales</a>
										</div>
										<div class="col-xs-4 text-center">
											<a href="#">Friends</a>
										</div>
									</div>
									<!-- /.row -->
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="index.php?gestion=users&action=details&id=<?php echo $_smarty_tpl->tpl_vars['idConnect']->value;?>
" class="btn btn-default btn-flat">Profil</a>
									</div>
									<div class="pull-right">
										<a href="index.php?gestion=login&action=disconnect" class="btn btn-default btn-flat">Déconnexion</a>
									</div>
								</li>
							</ul>
						</li>
						<!-- Control Sidebar Toggle Button -->

					</ul>
				</div>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">

			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo $_smarty_tpl->tpl_vars['avatarConnect']->value;?>
" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p><?php echo $_smarty_tpl->tpl_vars['nameConnect']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['firstnameConnect']->value;?>
</p>
						<!-- Status -->
						<a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
					</div>
				</div>

				<!-- search form (Optional) -->
				<form action="#" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Rechercher...">
						<span class="input-group-btn">
							<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</form>
				<!-- /.search form -->

				<!-- Sidebar Menu -->
				<?php echo $_smarty_tpl->tpl_vars['menuTypeMembre']->value;?>

				<!-- /.sidebar-menu -->
			</section>
			<!-- /.sidebar -->
		</aside><?php }
}
