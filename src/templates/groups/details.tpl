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
  						<img class="profile-user-img img-responsive img-circle" src="{$group_avatar}" alt="User profile picture">

  						<h3 class="profile-username text-center">{$group_name}</h3>

  						<p class="text-muted text-center">{$group_activity}</p>

  						<ul class="list-group list-group-unbordered">
  							<li class="list-group-item">
  								<b>Date de création</b> <a class="pull-right">{$group_dateCreation|date_format:"%d %B %Y"|utf8_encode}</a>
  							</li>
  							<li class="list-group-item">
  								<b>Nombre de membres actifs</b> <a class="pull-right">{$nbMembres}</a>
  							</li>
  							<li class="list-group-item">
  								<b>Licence</b> <a class="pull-right">N/A</a>
  							</li>
  						</ul>
              <form method="POST">
                <button type="submit" name="licence" class="btn btn-primary btn-block">Envoyer la licence</button>

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
            <strong><i class="fa fa-book margin-r-5"></i> Groupe Actuel</strong>

            <p>
             <span class="label label-danger">N/A</span>
             <span class="label label-success">Entré le : N/A</span>
<!--   							<span class="label label-info">Javascript</span>
  							<span class="label label-warning">PHP</span>
  							<span class="label label-primary">Node.js</span> -->
  						</p>

  						<hr>

  						<strong><i class="fa fa-map-marker margin-r-5"></i> Adresse</strong>
  						<p class="text-muted"></p>
  						<p class="text-muted">N/A</p>
  						<p class="text-muted">N/A - N/A</p>

  						<hr>

  						<strong><i class="fa fa-phone margin-r-5"></i> Informations de contact</strong>

  						
  						<p class="text-muted"></p>
  						<p class="text-muted">N/A</p>
  						<p class="text-muted">N/A</p>
  						<p class="text-muted">N/A</p>

  						<hr>

  						<strong><i class="fa fa-file-text-o margin-r-5"></i> Commentaires</strong>

  						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
  					</div>
  					<!-- /.box-body -->
  				</div>
  				<!-- /.box -->
  			</div>
  			<!-- /.col -->
  			<div class="col-md-9">
  				<div class="nav-tabs-custom">
  					<ul class="nav nav-tabs">
  						<li class="active"><a href="#activity" data-toggle="tab">Membres</a></li>
  						<li><a href="#history" data-toggle="tab">Historique</a></li>
              <li><a href="#add" data-toggle="tab">Ajout</a></li>
              <li><a href="#settings" data-toggle="tab">Paramètres</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
               <!-- Post -->
               <div class="post">
                <div class="content">
                 <div class="row">
                  {foreach from=$actifs item=Actifs}


                  <div class="col-md-4 col-sm-6 col-xs-12">
                   <div class="info-box"><span class="info-box-icon" style="background-color: rgb({$Actifs.couleurBG})">
                     <a href="index.php?gestion=users&action=details&id={$Actifs.user_id}"><img class="user-actifs" height="90" width="90" src="{$Actifs.user_avatar}"></span></a>
                     <!-- <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span> -->

                     <div class="info-box-content">
                       <span class="info-box-text">{$Actifs.user_pseudo}</span>
                       <span class="info-box-number">{$Actifs.user_birth}<small> ans</small></span>
                       <a href="#"> <span class="label label-danger">Retirer le membre du groupe</span></a>
                     </div>
                     <!-- /.info-box-content -->
                   </div>
                   <!-- /.info-box -->
                 </div>
                 {/foreach}
               </div>
             </div>
             <!-- /.user-block -->

           </div>
           <!-- /.post -->
     


           <script src="includes/libs/jquery/jquery-2.2.3.min.js"></script>
           <script type="text/java-script">
           <!--  {literal}
            jQuery(document).ready(function(){
            jQuery(".block_content li:even").addClass("alt");
            var test = jQuery('#test22').text();


            alert(test);
          });


          {/literal} -->
        </script>



       
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



      <!-- /.timeline-label -->
      <!-- timeline item -->
      <li>
        <i class="fa fa-users bg-blue"></i>

        <div class="timeline-item">
          <!--  <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->

          <h3 class="timeline-header"><a href="#">{$History.user_name} {$History.user_firstname}</a></h3>


  													<!-- {$History.datestart}
  													{$History.datefinish} -->

  													
  													<div class="timeline-body">
                             Date d'entrée : {$History.datestart|date_format:"%d %B %Y"|utf8_encode}
                           </div>
                           <div class="timeline-footer">
                            <a class="btn btn-primary btn-xs" href="#">Voir le membre</a>
                          </div>
                        </div>
                      </li>
                      {elseif $History.ifActif eq '1' }


                      {/if}
                      <li>




                        {/foreach}
                        <i class="fa fa-clock-o bg-gray"></i>

                      </li>
                    </ul>
                    
                  </div>
                  <div class="tab-pane" id="add">


                   <!-- Post -->
                   <div class="post">
                    <div class="content">
                     <div class="row">
                      {foreach from=$notin item=NotIn}


                      <div class="col-md-4 col-sm-6 col-xs-12">
                       <div class="info-box"><span class="info-box-icon" style="background-color: rgb({$NotIn.couleurBG})">
                         <a href="index.php?gestion=users&action=details&id={$NotIn.user_id}"><img class="user-actifs" height="90" width="90" src="{$NotIn.user_avatar}"></span></a>
                         <!-- <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span> -->

                         <div class="info-box-content">
                          <span class="info-box-text">{$NotIn.user_pseudo}</span>
                          <span class="info-box-number">{$NotIn.user_birth}<small> ans</small></span>
                          <a href="#"> <span class="label label-danger">Retirer le membre du groupe</span></a>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    {/foreach}
                  </div>
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

            <div class="tab-pane" id="settings">
              <form class="form-horizontal" method="POST" enctype="multipart/form-data">
               <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Nom</label>

                <div class="col-sm-10">
                 <input type="text" class="form-control" id="group_name" name="group_name" value="{$group_name}">
               </div>
             </div>
             <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Description</label>

              <div class="col-sm-10">
                <textarea class="form-control" id="group_description" name="group_description" placeholder="Experience" value="">{$group_description}</textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Activité</label>

              <div class="col-sm-10">
               <input type="text" class="form-control" id="group_activity" name="group_activity" placeholder="Name" value="{$group_activity}">
             </div>
           </div>
           <div class="form-group">
            <label for="inputExperience" class="col-sm-2 control-label">Photo de profil</label>

            <div class="col-sm-10">
              <label for="exampleInputFile"></label>
              <input type="file" id="group_avatar" name="group_avatar" accept="image/*">
              <p class="help-block">Vous pouvez ajouter une photo de profil. Optionnel</p>
              <img src="{$group_avatar}" width="10%"/>
            </div>
          </div>
          <div class="form-group">
            <label for="inputExperience" class="col-sm-2 control-label">Photo de couverture</label>

            <div class="col-sm-10">
              <label for="exampleInputFile"></label>
              <input type="file" id="group_cover" name="group_cover" accept="image/*">
              <p class="help-block">Vous pouvez ajouter une photo de couverture. Optionnel</p>
              <img src="{$group_cover}" width="30%"/>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
             <button type="submit" class="btn btn-danger" name="update">Modifier</button>
           </div>
         </div>
       </form>
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