 <div class="content-wrapper">
  	<section class="content-header">
 		<h1>
 			{$fil}
 			<small>Gestionnaire</small>
 		</h1>
 		<ol class="breadcrumb">
 			<li><a href="#"><i class="fa fa-dashboard"></i> Fil d'ariane</a></li>
 			<li class="active">{$fil}</li>
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
 								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Veuillez décrire le groupe" name="group_description">
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
 					{if $success eq '1'}
 					<div class='alert alert-success'>
 						<button class='close' data-dismiss='alert'>&times;</button>
 						<strong>Super !</strong>  Le produit a bien été ajouté
 						<a href="index.php?gestion=produit&action=add">Voulez-vous ajouter un autre produit ?</a>
 					</div>
 					{elseif $error eq '1'}
 					<div class='alert alert-warning'>
 						<button class='close' data-dismiss='alert'>&times;</button>
 						<strong>Attention !</strong>  Vous n'avez renseignez aucun champs
 					</div>
 					{elseif $error eq '10'}
 					<div class='alert alert-warning'>
 						<button class='close' data-dismiss='alert'>&times;</button>
 						<strong>Super !</strong>  VIDE
 					</div>
 					{elseif $error eq '11'}
 					<div class='alert alert-warning'>
 						<button class='close' data-dismiss='alert'>&times;</button>
 						<strong>Super !</strong>  Taille non respectée
 					</div>
 					{elseif $error eq '12'}
 					<div class='alert alert-warning'>
 						<button class='close' data-dismiss='alert'>&times;</button>
 						<strong>Super !</strong>  Mauvais Format
 					</div>
 					{else}
 					{/if}
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
 </div>