<?php
/* Smarty version 3.1.29, created on 2017-02-11 10:17:16
  from "C:\wamp64\www\p2\p2serv\templates\users\add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_589ee4aceba156_64825210',
  'file_dependency' => 
  array (
    '033d605edbed83a3c66683a9330fb36a5168c272' => 
    array (
      0 => 'C:\\wamp64\\www\\p2\\p2serv\\templates\\users\\add.tpl',
      1 => 1486808233,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589ee4aceba156_64825210 ($_smarty_tpl) {
?>
 <div class="content-wrapper">
 	<section class="content">
 		<!-- Info boxes -->
 		<div class="row">
 			<div class="col-md-6">
 				<!-- general form elements -->
 				<div class="box box-primary">
 					<div class="box-header with-border">
 						<h3 class="box-title">Ajouter un utilisateur</h3>
 					</div>
 					<!-- /.box-header -->
 					<!-- form start -->
 					<form role="form" method="POST" name="myform" enctype="multipart/form-data">
 						<div class="box-body">
 							<div class="form-group">
 								<label for="exampleInputEmail1">Nom</label>
 								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nom" name="user_name">
 							</div>
 							<div class="form-group">
 								<label for="exampleInputEmail1">Prénom</label>
 								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Prénom" name="user_firstname">
 							</div>
 							<div class="form-group">
 								<label for="exampleInputEmail1">Date</label>
 								<input type="text" class="form-control"  placeholder="adresse@mail.fr" name="user_birth">
 							</div>
 							<div class="form-group">
 								<label for="exampleInputEmail1">Pseudo</label>
 								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Pseudo" name="user_pseudo">
 							</div>
 							<div class="form-group">
 								<label for="exampleInputEmail1">Adresse</label>
 								<input type="text" class="form-control"  placeholder="adresse@mail.fr" name="user_adress">
 							</div>
 							<div class="form-group">
 								<label for="exampleInputEmail1">Code Postal</label>
 								<input type="text" class="form-control"  placeholder="adresse@mail.fr" name="user_cp">
 							</div>
 							<div class="form-group">
 								<label for="exampleInputEmail1">Ville</label>
 								<input type="text" class="form-control"  placeholder="adresse@mail.fr" name="user_city">
 							</div>
 							<div class="form-group">
 								<label for="exampleInputEmail1">Téléphone</label>
 								<input type="text" class="form-control"  placeholder="adresse@mail.fr" name="user_phone">
 							</div>
 							<div class="form-group">
 								<label for="exampleInputEmail1">Mobile</label>
 								<input type="text" class="form-control"  placeholder="adresse@mail.fr" name="user_mobile">
 							</div>
 							<div class="form-group">
 								<label for="exampleInputEmail1">Type</label>
 								<input type="number" class="form-control" name="usertype_id" value="1">
 							</div>
 							<div class="form-group">
 								<div class="form-group">
 									<label>Genre</label>
 									<select class="form-control" name="user_gender">
 									<option value="M">Homme</option>
 										<option value="F">Femme</option>
 									</select>
 								</div>
 							</div>
 							<div class="form-group">
 								<label for="exampleInputEmail1">Adresse Email</label>
 								<input type="email" class="form-control" id="exampleInputEmail1" placeholder="adresse@mail.fr" name="user_mail">
 							</div>

 							<div class="form-group">
 								<label for="exampleInputPassword1">Mot de passe</label>
 								<!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" name="password"> -->
 								<input name="user_password" type="text" size="50" tabindex="1" class="form-control"><br/>
 								<input type="button" value="Générer" onClick="javascript:formSubmit()" tabindex="2" class="btn btn-primary"> <input type="reset" value="Effacer" tabindex="3" class="btn btn-warning"></p>
 								<input name="length" value="8" hidden>
 							</div>
 						

 							<div class="form-group">
 								<label for="exampleInputFile">Photo de profil</label>
 								<input type="file" name="user_profilPicture" id="user_profilPicture" accept="image/*>

 								<p class="help-block">Vous pouvez ajouter une photo de profil. Optionnel</p>
 							</div>
 						</div>
 						<!-- /.box-body -->

 						<div class="box-footer">
 							<button type="submit" class="btn btn-primary" name="btn-signup">Ajouter</button>
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
