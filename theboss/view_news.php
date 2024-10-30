<?php include('header.php');
$post= database::getInstance()->fastget($what_to_get="blog",$order_by="userID",$limit=";");
?>
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            News
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">News</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
          <center class="box-body">
            
            <p>
            <a title="Add New News" href="add_articles.php"><i style="color: rgba(0, 0, 0, 0.171);font-size:50px;" class="fa fa-plus"></i></a>  
            </p>
</center>
<?php include('include/isset.php');?>
<?php foreach($post as $row){ ?>
<div class="col-md-4">
              <!-- Default box -->
              <div class="box box-solid box-default">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $row['title'];?></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button title="Edit News" class="btn btn-default btn-sm" data-widget=""><i  class="fa fa-pencil-square-o"></i></button>
                    <button name="delete" class="btn btn-primary btn-xs"><a style="color:white;" title="Delete Articles" href="view_news.php?uID=<?php echo $row['userID'];?>"><i class="fa fa-times"></i> </a></button>
                  </div>
                </div>
                <div class="box-body">
                <p>
                  <img style="width:330px; height:200px;" src="../download-project/upload/<?php echo $row['img'];?>" alt="">
                  </p>
                  Date: <code><?php echo $row['date'];?></code>
                  <p>
              
                  <?php echo $row['content_brief'];?>
                  </p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php } ?>
            </div>
<?php include('footer.php');?>
