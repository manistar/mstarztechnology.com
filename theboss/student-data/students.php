<?php 
include('header.php');
 ?>
<style>
.Up-load {
  color: brown;
  font-size: 20px;
}
</style>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Search Reference
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="manage_Blog.php"><i class="fa fa-book"></i> Reference</a></li>
            <li class="active"> Search Reference Number</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
<?php // require_once('../include/isset.php');?>
        <div style="width:70%; margin-left:15%; margin-top:5%;" class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Search Reference Number</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="foo" method="POST">
                <div class="box-body">

                  <input type="text" class="form-control" oninput="search(this.value, 'showresult')" placeholder="Search Reference number only. e.g 6390d4850ca81">
                  <div id="showresult"></div>
                
              </div>
             </form> 
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
 
<?php include('footer.php'); ?>