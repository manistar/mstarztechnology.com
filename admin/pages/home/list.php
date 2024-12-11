<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Main content -->
<section class="content">
  <!-- START ACCORDION & CAROUSEL-->

  <!-- /.row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <!-- <h3 class="card-title">Users | </h3> <button id="adduser" data-url="users/add" data-id="adduser" data-title="New Plan" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg" class="btn btn-primary">Add new user</button> -->
        </div>
        <!-- ./card-header -->
        <div class="card-body">

          <!-- Start card-body here -->

          <div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-home"></i>
            Home Control
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <!-- Morris chart - Sales -->

            <form action="passer" id="foo">
                <?= $c->create_form($frontboard); ?>
                <input type="hidden" name="update_home" value="">
                <div id="custommessage"></div>
                <input type="submit" style="width:100%;" class="btn btn-primary" value="submit">
            </form>




            <!-- <div class="chart tab-pane active" id="piechart" style="position: relative; height: 300px;">

                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                  <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                </div> -->
        </div>
    </div><!-- /.card-body -->
</div>

<!-- Another -->
 <!-- Custom tabs (Charts with tabs)-->
 <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-upload"></i>
                Upload Home Control
              </h3>

            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
              
              <form id="formid" role="form" method="POST" action="passer" enctype='multipart/form-data'>
              <p class="Up-load">Choose location to upload at the Client Area Side</p>
                    <div class="form-group">
                      <select id="selectid" class="form-control" onchange="check()">
                          <option value="">Select Page to Control</option>
                          <option value="?p=what-i-do">What I Do</option>
                          <option value="?p=portfolio">My Portfolio</option>
                          <option value="?p=education">Education</option>
                          <option value="?p=job-exp">Job Experience</option>
                          <option value="?p=testimonial">Testonials</option>
                          <option value="?p=reels">Post Reels</option>
                          <option value="?p=blog">Blog</option>
                      </select>
                    </div> 
              </form>
              <!--  -->
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- Close card-body here -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
</section>

<script>
    // $(document).ready(function() {
    //     $('.customtextarea').richText();
    // });

    tinymce.init({
    selector: 'textarea',
    plugins: [
      // Core editing features
      'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
      // Your account includes a free trial of TinyMCE premium features
      // Try the most popular premium features until Dec 16, 2024:
      'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
      // Early access to document converters
      'importword', 'exportword', 'exportpdf'
    ],
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
  });
</script>