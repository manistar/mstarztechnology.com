<?php require_once "inis/ini.php"; ?>
<!-- Select2 -->

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
            <form action="passer" id="foo" onsubmit="return false">

               <!-- Icon Selection -->
            


              <?= $c->create_form($what_i_do); ?>

              <input type="hidden" name="create_products">
              <div id="custommessage"></div>
             
              <input type="submit" value="Submit" class="btn btn-primary">
            </form>
            <!-- /.card-body -->
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