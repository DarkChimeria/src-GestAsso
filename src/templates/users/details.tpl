  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			{$title}
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-home"></i> Accueil</a></li>
  			<li class="active">{$title}</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">

  		<div class="row">
  			<div class="col-md-3">

  				<!-- Profile Image -->
  				<div class="box box-primary">
  					<div class="box-body box-profile">
  						<img class="profile-user-img img-responsive img-circle" src="{$user_profilPicture}" alt="User profile picture">

  						<h3 class="profile-username text-center">{$user_name} {$user_firstname}</h3>

  						<p class="text-muted text-center">{$group_name}</p>

  						<ul class="list-group list-group-unbordered">
  							<li class="list-group-item">
  								<b>Inscrit le</b> <a class="pull-right">{$user_dateCreation|date_format:"%d %B %Y"|utf8_encode}</a>
  							</li>
  							<li class="list-group-item">
  								<b>Statut</b> <a class="pull-right">{$usertype_name}</a>
  							</li>
  							<li class="list-group-item">
  								<b>Licence</b> <a class="pull-right">{$license}</a>
  							</li>
                <li class="list-group-item">
                  <b>Propriété</b> <a class="pull-right">{$user_active}</a>
                </li>
              </ul>
              <form method="POST">
                <button type="submit" name="licence" class="btn btn-primary btn-block">Envoyer la licence</button>

                {if $conditionactive eq 1}
                <button type="submit" name="archiver" class="btn btn-danger btn-block">Archiver le membre</button>
                {elseif $conditionactive eq 0}
                <button type="submit" name="activer" class="btn btn-success btn-block">Activer le membre</button>
                {/if}
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
           <div class="box-header with-border">
            <h3 class="box-title">A PROPOS</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">


          {if $conditionactive eq 1}

            <strong><i class="fa fa-book margin-r-5"></i> Groupe Actuel</strong>

            <p>
             <span class="label label-danger">{$group_name}</span>
             <span class="label label-success">Entré le : {$datestart|date_format:"%d %B %Y"|utf8_encode}</span>
<!--   							<span class="label label-info">Javascript</span>
  							<span class="label label-warning">PHP</span>
  							<span class="label label-primary">Node.js</span> -->
  						</p>

  						<hr>

  						<strong><i class="fa fa-map-marker margin-r-5"></i> Adresse</strong>
  						<p class="text-muted"></p>
  						<p class="text-muted">{$user_adress}</p>
  						<p class="text-muted">{$user_cp} - {$user_city}</p>

  						<hr>

  						<strong><i class="fa fa-phone margin-r-5"></i> Informations de contact</strong>

  						
  						<p class="text-muted"></p>
  						<p class="text-muted">{$user_phone}</p>
  						<p class="text-muted">{$user_mobile}</p>
  						<p class="text-muted">{$user_mail}</p>

  						<hr>

  						<strong><i class="fa fa-file-text-o margin-r-5"></i> Commentaires</strong>

  						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              {elseif $conditionactive eq 0}
                    <span class="username">
                      <p>Le membre est archivé !<br> Pour accéder à ses informations personnelles, veuillez contacter un administrateur</p>
                    
                    </span>
                    {/if}
  					</div>
  					<!-- /.box-body -->
  				</div>
  				<!-- /.box -->
  			</div>
  			<!-- /.col -->
  			<div class="col-md-9">
  				<div class="nav-tabs-custom">
  					<ul class="nav nav-tabs">
  						<li class="active"><a href="#activity" data-toggle="tab">Tableau de bord</a></li>
  						<li><a href="#history" data-toggle="tab">Historique</a></li>
  						<li><a href="#settings" data-toggle="tab">Paramètres</a></li>
  					</ul>
  					<div class="tab-content">
  						<div class="active tab-pane" id="activity">
  							<!-- Post -->
  							<div class="post">
  								<div class="user-block">
  									{if $conditionactive eq 1}

  									<span class="username">
  										<a href="#">Licence à imprimer</a>
  										<!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
  									</span>




  									<span class="description"></span>
                    <div class="user-licence">
                    <img class="img-responsive" src="{$carteLicence}" height="600" width="381" alt="user image">
                    </div>
                    {elseif $conditionactive eq 0}
                    <span class="username">
                      <p>Le membre est archivé !<br> Pour accéder à ses informations personnelles, veuillez contacter un administrateur</p>
                    
                    </span>
                    {/if}
                  </div>

                  <!-- /.user-block -->




                </div>
                <!-- /.post -->

                <!-- Post -->

                <!-- /.post -->

                <!-- Post -->

                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="history">


               <!-- The timeline -->
               <ul class="timeline timeline-inverse">

                {foreach from=$history item=History}


                {if $History.ifActif eq '0'}
                <li class="time-label">
                 <span class="bg-red">
                  {$History.datefinish|date_format:"%d %B %Y"|utf8_encode}
                </span>
              </li>
              {else}
              <li class="time-label">
                <span class="bg-green">
                 Actif : {$History.datestart|date_format:"%d %B %Y"|utf8_encode}
               </span>
             </li>
             {/if}

             <!-- /.timeline-label -->
             <!-- timeline item -->
             <li>
              <i class="fa fa-users bg-blue"></i>

              <div class="timeline-item">
               <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

               <h3 class="timeline-header"><a href="index.php?gestion=groups&action=details&id={$History.group_id}">{$History.group_name}</a></h3>


  													<!-- {$History.datestart}
  													{$History.datefinish} -->

  													
  													<div class="timeline-body">
                             Description du groupe : 
                             {$History.group_description}<br>
                             Activité du groupe : {$History.group_activity}
                           </div>
                           <div class="timeline-footer">
                            <a class="btn btn-primary btn-xs">Voir le groupe</a>
                          </div>
                        </div>
                      </li>

                      {/foreach}

                      <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                      </li>
                    </ul>
                  </div>




                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">

                    {if $conditionactive eq 1}



                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                     <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Nom</label>

                      <div class="col-sm-10">
                       <input type="text" class="form-control" id="inputName" name="user_name" placeholder="Name" value="{$user_name}">
                     </div>
                   </div>
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Prénom</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name" name="user_firstname" value="{$user_firstname}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Pseudo</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name" name="user_pseudo" value="{$user_pseudo}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Date de naissance</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name" name="user_birth" value="{$user_birth}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Adresse</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name" name="user_adress" value="{$user_adress}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Code Postal</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name" name="user_cp" value="{$user_cp}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Ville</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name" name="user_city" value="{$user_city}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Téléphone fixe</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name" name="user_phone" value="{$user_phone}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Téléphone Mobile</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name" name="user_mobile" value="{$user_mobile}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="Email" name="user_mail" value="{$user_mail}">
                   </div>
                 </div>
                 <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Genre</label>

                  <div class="col-sm-10">
                  <select class="form-control" name="user_gender" value="{$user_gender}">
                  <option value="M">Homme</option>
                    <option value="F">Femme</option>
                  </select>
                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Avatar</label>

                  <div class="col-sm-10">
                    <label for="exampleInputFile"></label>
                    <input type="file" id="user_profilPicture" name="user_profilPicture" accept="image/*" value="test">
                    <p class="help-block">Vous pouvez ajouter une photo de couverture. Optionnel</p>
                    <img src="{$user_profilPicture}" width="25%"/>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Type Utilisateur</label>

                  <div class="col-sm-10">
                   <input type="number" class="form-control" id="inputName" placeholder="Name" name="usertype_id" min="1" max="3" value="{$usertype_id}">
                 </div>
               </div>
               <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                 <button type="submit" class="btn btn-danger" name="modifier">Modifier</button>
               </div>
             </div>
           </form>
           {elseif $conditionactive eq 0}
                    <span class="username">
                      <p>Le membre est archivé !<br> Pour accéder à ses informations personnelles, veuillez contacter un administrateur</p>
                    
                    </span>
                    {/if}
         </div>
         <!-- /.tab-pane -->
       </div>
       <!-- /.tab-content -->
     </div>
     <!-- /.nav-tabs-custom -->
   </div>
   <!-- /.col -->
 </div>
 <!-- /.row -->

</section>
<!-- /.content -->
</div>