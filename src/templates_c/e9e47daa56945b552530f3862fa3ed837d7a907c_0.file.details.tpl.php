<?php
/* Smarty version 3.1.29, created on 2017-02-20 22:08:05
  from "/var/www/html/p2/templates/asso/details.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58ab5ab58ac7d1_62972290',
  'file_dependency' => 
  array (
    'e9e47daa56945b552530f3862fa3ed837d7a907c' => 
    array (
      0 => '/var/www/html/p2/templates/asso/details.tpl',
      1 => 1487624884,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ab5ab58ac7d1_62972290 ($_smarty_tpl) {
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
            <h3 class="box-title">Ajouter un utilisateur</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="POST" name="myform" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nom</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="asso_name" value="<?php echo $_smarty_tpl->tpl_vars['asso_name']->value;?>
">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Déscription</label>
                <input type="text" class="form-control" id="exampleInputEmail1"  name="asso_description" value="<?php echo $_smarty_tpl->tpl_vars['asso_description']->value;?>
">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Mail</label>
                <input type="text" class="form-control" name="asso_mail" value="<?php echo $_smarty_tpl->tpl_vars['asso_mail']->value;?>
">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Adresse</label>
                <input type="text" class="form-control" id="exampleInputEmail1"  name="asso_adress" value="<?php echo $_smarty_tpl->tpl_vars['asso_adress']->value;?>
">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Téléphone</label>
                <input type="text" class="form-control" name="asso_mobile" value="<?php echo $_smarty_tpl->tpl_vars['asso_mobile']->value;?>
">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nom de domaine</label>
                <input type="text" class="form-control" name="asso_domainName" value="<?php echo $_smarty_tpl->tpl_vars['asso_domainName']->value;?>
">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Date de création</label>
                <input type="text" class="form-control" name="asso_dateCreation" value="<?php echo $_smarty_tpl->tpl_vars['asso_dateCreation']->value;?>
">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Noméro RNA</label>
                <input type="text" class="form-control" name="ranId" value="<?php echo $_smarty_tpl->tpl_vars['asso_rna']->value;?>
">
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
 </div>

 <?php }
}
