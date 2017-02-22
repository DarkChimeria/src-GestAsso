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
            <h3 class="box-title">Ajouter un utilisateur</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="POST" name="myform" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nom</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="asso_name" value="{$asso_name}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Déscription</label>
                <input type="text" class="form-control" id="exampleInputEmail1"  name="asso_description" value="{$asso_description}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Mail</label>
                <input type="text" class="form-control" name="asso_mail" value="{$asso_mail}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Adresse</label>
                <input type="text" class="form-control" id="exampleInputEmail1"  name="asso_adress" value="{$asso_adress}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Téléphone</label>
                <input type="text" class="form-control" name="asso_mobile" value="{$asso_mobile}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nom de domaine</label>
                <input type="text" class="form-control" name="asso_domainName" value="{$asso_domainName}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Date de création</label>
                <input type="text" class="form-control" name="asso_dateCreation" value="{$asso_dateCreation}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Noméro RNA</label>
                <input type="text" class="form-control" name="ranId" value="{$asso_rna}">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Logo association</label>
                <input type="file" name="asso_Image" id="asso_Image" accept="image/*>

                <p class="help-block">Vous pouvez ajouter une photo de profil. Optionnel</p>
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary" name="btn-signup">Modifier</button>
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

 