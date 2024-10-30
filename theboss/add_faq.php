<?php 
include('header.php');
//  $faqu = $d->fastget("faq", "ID", "detail");
 ?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            FAQ Utility
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="add_faq.php"><i class="fa fa-book"></i> FAQ Utility</a></li>
            <li class="active"> Add FAQ</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
<?php include('include/isset.php');?>
        <div style="width:70%; margin-left:15%; margin-top:5%;" class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add FAQ</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="add_faq.php" enctype='multipart/form-data'>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">FAQ Question</label>
                      <input type="text" name="title" class="form-control" id="" placeholder="Enter FAQ Title" required/>
                    </div>
                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputEmail1">Admin Name</label>-->
                    <!--  <input type="text" name="name" class="form-control" id="" placeholder="Enter your name" required/>-->
                    <!--</div>-->

                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputEmail1">Amount</label>-->
                    <!--  <input type="text" name="amount" class="form-control" id="" placeholder="Enter Video Amount" required/>-->
                    <!--</div>-->

                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputPassword1">Short Video Content for Readmore</label>-->
                    <!--  <textarea class="form-control" style="height:50px;" name="title_content" id="" cols="30" rows="10" required="" ></textarea>-->
                    <!--</div>-->
                     
                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputEmail1">YouTube Video Link</label>-->
                    <!--  <input type="text" name="youtube" class="form-control" id="" placeholder="Kindly Upload YouTube Embeded Link e.g https://www.youtube.com/embed/Ohe_JzKksvA" required/>-->
                    <!--</div>-->
                    
                    <div class="modal-body">
                            <!--mytextarea-->
                    <div class="form-group">
                    <label for="exampleInputEmail1">FAQ Answer</label>
                    <textarea id="custtomtextarea" type="text" name="content" cols="30" rows="10"></textarea>
                    </div>
                    
                    
                    <!--<div class="modal-body">-->
                            <!--mytextarea-->
                    <!-- <div class="form-group">-->
                    <!--  <label for="exampleInputEmail1">FAQ Content (Full)</label>-->
                    <!--  <textarea id="email_message" type="text" style="height:310px; width:100%" name="content" class="form-control" placeholder="Enter details here" /><?php if(!empty($data['content'])){echo $data['content'];} ?></textarea>-->
                    <!--</div>-->
                    
                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputPassword1">Main Content</label>-->
                    <!--  <textarea class="form-control" style="height:100px;" name="content" id="" cols="30" rows="10" required="" ></textarea>-->
                    <!--</div>-->

                    <!-- <div class="form-group"> -->
                      <!-- <label for="exampleInputFile">Upload Image</label> -->
                      <!-- <input type="hidden" name="img" > -->
                    <!-- </div> -->

                    <!--<div class="form-group">-->
                    <!--  <label for="exampleInputFile">Upload FAQ Image</label>-->
                    <!--  <input type="file" name="uploaded_file" >-->
                    <!--</div>-->

                    <!-- <div class="form-group"> -->
                      <!-- <label for="exampleInputFile">Upload Image</label> -->
                      <!-- <input type="hidden" name="uploaded_file" > -->
                    <!-- </div> -->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="add_faq" class="btn btn-primary">Add FAQ</button>
                  </div>
                </form>
              </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php include('footer.php'); ?>