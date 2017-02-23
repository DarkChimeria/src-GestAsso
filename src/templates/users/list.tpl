 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
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

 	<!-- Main content -->
 	<section class="content">
 		<!-- Info boxes -->
 		<div class="container-fluid">
 			<div class="row">
 				<div class="col-xs-12">
 					<div class="box">
 						<div class="box-header">
 							<h3 class="box-title">{$fil}</h3>

 							
 						</div>
 						<!-- /.box-header -->
 						<div class="box-body table-responsive no-padding">
 							<table class="table table-hover">
 								<tr>
 									<th>ID</th>
 									<th>Nom</th>
 									<th>Prénom</th>
 									<th>Etat</th>
 									<th>Action</th>
 								</tr>
 								{foreach from=$pagination item=Users}
 								<tr>
 									<td>{$Users.user_id}</td>
 									<td>{$Users.user_name}</td>
 									<td>{$Users.user_firstname}</td>
 									<td>{$Users.user_active}</td>
 									<td>
 										<a href="index.php?gestion=users&action=details&id={$Users.user_id}"><i class="fa fa-eye text-infos"></i></a>
 										<!-- <a href="index.php?gestion=Users&action=edit&id={$Users.user_id}"><i class="fa fa-pencil text-warning"></i></a>
 										<a href="index.php?gestion=Users&action=delete&id={$Users.user_id}"><i class="fa fa-close text-danger"></i></a> -->
 									</td>

 									{/foreach}

 									

 								</table>
 								<table>
 									<div class="box-footer clearfix">
 										<ul class="pagination pagination-sm no-margin pull-right">
 											{foreach from=$numero item=num}
 											<li><a class="btn btn-success" role="button" href="index.php?gestion=users&action=liste&page={$num}">{$num}</a></li>
 											{/foreach}
 										</ul>
 									</div>

 								</table>
 							</div>
 							<!-- /.box-body -->
 						</div>
 						<!-- /.box -->
 					</div>
 				</div>
 			</div>

 		</section>
 		<!-- /.content -->
 	</div>