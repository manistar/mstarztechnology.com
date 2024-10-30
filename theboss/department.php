<?php 
include('department_header.php');
?>
       <!-- Right side column. Contains the navbar and content of the page -->
       <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          <?php echo $dep['name'];?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Department</a></li>
            <li class="active"><?php echo $dep['name'];?>t</li>
          </ol>
        </section>
        <?php 
      
        include('isset.php');
        ?>
 <section class="content">
          <div class="row">
            <!-- left column -->
          <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Department Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  </form>
                <form role="form" action="department.php" method="post" enctype='multipart/form-data'>
                  <div class="box-body">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Department Name</label>
                      <input type="text" name="name"class="form-control" id="exampleInputEmail1" value="<?php if(!empty($dep['name'])){echo $dep['name'];} ?>" placeholder="Name" required/>
                    </div>

                     <div class="form-group">
                      <label for="exampleInputEmail1">Department Email</label>
                      <input type="text" name="email"class="form-control" id="exampleInputEmail1" value="<?php if(!empty($dep['email'])){echo $dep['email'];} ?>" placeholder="Email" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Department Details</label>
                      <textarea id="email_message" type="text" style="height:310px;" name="details"class="form-control" placeholder="Department Details" >
                    
                      <?php 
                      if(!empty($dep['details'])){
                        echo $dep['details']; 
                      }else{
                          ?>
                      <body marginwidth="0" marginheight="0" contenteditable="true" class="form-control wysihtml5-editor" spellcheck="true" style="background-color: rgb(255, 255, 255); color: rgb(85, 85, 85); cursor: text; font-family: &quot;Source Sans Pro&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 20px; letter-spacing: normal; text-align: start; text-decoration: none solid rgb(85, 85, 85); text-indent: 0px; text-rendering: auto; word-break: normal; overflow-wrap: break-word; word-spacing: 0px;">                      <h2>Introduction 
</h2>text here
<br><h2>History </h2>&nbsp;text here
<br><h2>Services
</h2>text here
<br><h2>Time of Operation</h2><span id="_wysihtml5-undo" class="_wysihtml5-temp"></span>
                    </body>
                      <?php } ?>
                    </textarea>

                    </div>
                    
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->

            <!-- left column -->
          <!-- left column -->
          <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">HOD's Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">HOD Full Name</label>
                      <input value="<?php if(!empty($dep['HODname'])){echo $dep['HODname'];} ?>" type="text" name="HODname"class="form-control" id="exampleInputEmail1" placeholder="Name" >
                    </div>
                    <div class="box-body">
                    <div style="display:none!important" class="form-group">
                      <input value="<?php if(!empty($dep['ID'])){echo $dep['ID'];} ?>" type="text" name="id"class="form-control" id="exampleInputEmail1" placeholder="ID" >
                    </div>
                    <div class="modal-body">
                     <div class="form-group">
                      <label for="exampleInputEmail1">HOD Profile</label>
                      <textarea id="email_message" type="text" style="height:310px;" name="HODprofile" class="form-control" placeholder="HOD Profile" /><?php if(!empty($dep['HODprofile'])){echo $dep['HODprofile'];} ?></textarea>
                    </div>
                    <div class="form-group">
                    <img style="width:100px;" src="../upload/<?php if(!empty($dep['HODpassport'])){echo $dep['HODpassport'];} ?>" alt="">
                      <label for="exampleInputEmail1">Upload HOD passport <br>
                      <b style="color:red"> NB: Please don't save your image with special characters like *-/</b>
                      </label>
                      <input type="file" accept="image/*" name="file">
                      <input style="display:none" type="text" name="HODpassport" value="<?php if(!empty($dep['HODpassport'])){echo $dep['HODpassport'];} ?>">
                    </div>
             

            <div class="box-footer">
                    <input  style="width:60%; float:right;" type="submit" name="update_mydept" value="Update Department" class="btn btn-primary">
                  </div>
          
                </form>
            
        </section><!-- /.content -->
         </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
      </div><!-- /.content-wrapper -->
      <?php include('footer.php');?>