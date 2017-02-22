<?php
/* Smarty version 3.1.29, created on 2017-02-20 11:21:34
  from "/var/www/html/p2/templates/groups/add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58aac32e37c769_37912719',
  'file_dependency' => 
  array (
    '83351ffc774d79948d0598be3515c89b36fdb8ef' => 
    array (
      0 => '/var/www/html/p2/templates/groups/add.tpl',
      1 => 1487335538,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58aac32e37c769_37912719 ($_smarty_tpl) {
?>
 <div class="content-wrapper">
  	<section class="content-header">
 		<h1>
 			<?php echo $_smarty_tpl->tpl_vars['fil']->value;?>

 			<small>Gestionnaire</small>
 		</h1>
 		<ol class="breadcrumb">
 			<li><a href="#"><i class="fa fa-dashboard"></i> Fil d'ariane</a></li>
 			<li class="active"><?php echo $_smarty_tpl->tpl_vars['fil']->value;?>
</li>
 		</ol>
 	</section>
 	<section class="content">
 		<!-- Info boxes -->
 		<div class="row">
 			<div class="col-md-6">
 				<!-- general form elements -->
 				<div class="box box-primary">
 					<div class="box-header with-border">
 						<h3 class="box-title">Ajouter un groupe</h3>
 					</div>
 					<!-- /.box-header -->
 					<!-- form start -->
 					<form role="form" method="POST" name="myform" enctype="multipart/form-data">
 						<div class="box-body">
 							<div class="form-group">
 								<label for="exampleInputEmail1">Nom</label>
 								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nom" name="group_name">
 							</div>
 							<div class="form-group">
 								<label for="exampleInputEmail1">Description</label>
 								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Prénom" name="group_description">
 							</div>
 							<div class="form-group">
 								<label for="exampleInputEmail1">Activité</label>
 								<input type="text" class="form-control"  placeholder="FPS" name="group_activity">
 							</div>
 							<div class="form-group">
 								<label for="exampleInputEmail1">Avatar du groupe</label>
 								<input type="file" name="group_avatar" id="group_avatar" accept="image/*">

 							</div>
 							<div class="form-group">
 								<label for="exampleInputEmail1">Photo de couverture</label>
 								<input type="file" name="group_cover" id="group_cover" accept="image/*">

 								<p class="help-block">Vous pouvez ajouter une photo de profil. Optionnel</p>
 							</div>
 				
 						</div>
 						<!-- /.box-body -->

 						<div class="box-footer">
 							<button type="submit" class="btn btn-primary" name="add">Ajouter</button>
 						</div>
 					</form>
 				</div>
 				<!-- /.box -->

 				<!-- Form Element sizes -->

 				<!-- /.box-body -->
 			</div>
 			<!-- /.box -->
 			<div class="col-md-6">
 				<!-- general form elements -->
 				<div class="box box-success">
 					<div class="box-header with-border">
 						<h3 class="box-title">Informations</h3>
 					</div>
 					<!-- /.box-header -->
 					<!-- form start -->
 					<?php if ($_smarty_tpl->tpl_vars['success']->value == '1') {?>
 					<div class='alert alert-success'>
 						<button class='close' data-dismiss='alert'>&times;</button>
 						<strong>Super !</strong>  Le produit a bien été ajouté
 						<a href="index.php?gestion=produit&action=add">Voulez-vous ajouter un autre produit ?</a>
 					</div>
 					<?php } elseif ($_smarty_tpl->tpl_vars['error']->value == '1') {?>
 					<div class='alert alert-warning'>
 						<button class='close' data-dismiss='alert'>&times;</button>
 						<strong>Attention !</strong>  Vous n'avez renseignez aucun champs
 					</div>
 					<?php } elseif ($_smarty_tpl->tpl_vars['error']->value == '10') {?>
 					<div class='alert alert-warning'>
 						<button class='close' data-dismiss='alert'>&times;</button>
 						<strong>Super !</strong>  VIDE
 					</div>
 					<?php } elseif ($_smarty_tpl->tpl_vars['error']->value == '11') {?>
 					<div class='alert alert-warning'>
 						<button class='close' data-dismiss='alert'>&times;</button>
 						<strong>Super !</strong>  Taille non respectée
 					</div>
 					<?php } elseif ($_smarty_tpl->tpl_vars['error']->value == '12') {?>
 					<div class='alert alert-warning'>
 						<button class='close' data-dismiss='alert'>&times;</button>
 						<strong>Super !</strong>  Mauvais Format
 					</div>
 					<?php } else { ?>
 					<?php }?>
 					<br>
 				</div>
 				<!-- /.box -->

 				<!-- Form Element sizes -->

 				<!-- /.box-body -->
 			</div>

 			<!-- /.col -->

 			<!-- /.col -->

 			<!-- fix for small devices only -->
 			<div class="clearfix visible-sm-block"></div>


 			<!-- /.col -->

 			<!-- /.col -->
 		</div>


 	</section>
 </div><?php }
}
