 </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../js/myjss.js"></script>
 
 <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/myjs.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

 
 
 <!--Rich Text Editor Script-->
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<script src="../src\jquery.richtext.js"></script>
<script src="../src\jquery.richtext.min.js"></script>

    

<script>
            function check() {
                var f = document.getElementById('formid');
                var s = document.getElementById('selectid');
                if( s.selectedIndex == 1) { 
                f.setAttribute("action",s.options[1].value) ;  

                
                f.submit();
                }
                if( s.selectedIndex == 2) { 
                location.href = s.options[2].value;
                }

                if( s.selectedIndex == 3) { 
                location.href = s.options[3].value;
                }

                if( s.selectedIndex == 4) { 
                location.href = s.options[4].value;
                }

                if( s.selectedIndex == 5) { 
                location.href = s.options[5].value;
                }

                if( s.selectedIndex == 6) { 
                location.href = s.options[6].value;
                }

                if( s.selectedIndex == 7) { 
                location.href = s.options[7].value;
                }
            }


$('#custtomtextarea').richText({

// text formatting
bold: true,
italic: true,
underline: true,

// text alignment
leftAlign: true,
centerAlign: true,
rightAlign: true,
justify: true,

// lists
ol: true,
ul: true,

// title
heading: true,

// fonts
fonts: true,
fontList: [
    "Arial", 
    "Arial Black", 
    "Comic Sans MS", 
    "Courier New", 
    "Geneva", 
    "Georgia", 
    "Helvetica", 
    "Impact", 
    "Lucida Console", 
    "Tahoma", 
    "Times New Roman",
    "Verdana"
],
fontColor: true,
fontSize: true,

// uploads
imageUpload: true,
fileUpload: true,

// media
videoEmbed: true,

// link
urls: true,

// tables
table: true,

// code
removeStyles: true,
code: true,

// colors
colors: [],

// dropdowns
fileHTML: '',
imageHTML: '',

// translations
translations: {
    'title': 'Title',
    'white': 'White',
    'black': 'Black',
    'brown': 'Brown',
    'beige': 'Beige',
    'darkBlue': 'Dark Blue',
    'blue': 'Blue',
    'lightBlue': 'Light Blue',
    'darkRed': 'Dark Red',
    'red': 'Red',
    'darkGreen': 'Dark Green',
    'green': 'Green',
    'purple': 'Purple',
    'darkTurquois': 'Dark Turquois',
    'turquois': 'Turquois',
    'darkOrange': 'Dark Orange',
    'orange': 'Orange',
    'yellow': 'Yellow',
    'imageURL': 'Image URL',
    'fileURL': 'File URL',
    'linkText': 'Link text',
    'url': 'URL',
    'size': 'Size',
    'responsive': 'Responsive',
    'text': 'Text',
    'openIn': 'Open in',
    'sameTab': 'Same tab',
    'newTab': 'New tab',
    'align': 'Align',
    'left': 'Left',
    'center': 'Center',
    'right': 'Right',
    'rows': 'Rows',
    'columns': 'Columns',
    'add': 'Add',
    'pleaseEnterURL': 'Please enter an URL',
    'videoURLnotSupported': 'Video URL not supported',
    'pleaseSelectImage': 'Please select an image',
    'pleaseSelectFile': 'Please select a file',
    'bold': 'Bold',
    'italic': 'Italic',
    'underline': 'Underline',
    'alignLeft': 'Align left',
    'alignCenter': 'Align centered',
    'alignRight': 'Align right',
    'addOrderedList': 'Add ordered list',
    'addUnorderedList': 'Add unordered list',
    'addHeading': 'Add Heading/title',
    'addFont': 'Add font',
    'addFontColor': 'Add font color',
    'addFontSize' : 'Add font size',
    'addImage': 'Add image',
    'addVideo': 'Add video',
    'addFile': 'Add file',
    'addURL': 'Add URL',
    'addTable': 'Add table',
    'removeStyles': 'Remove styles',
    'code': 'Show HTML code',
    'undo': 'Undo',
    'redo': 'Redo',
    'close': 'Close'
},
          
// privacy
youtubeCookies: false,
  
// preview
preview: false,

// placeholder
placeholder: '',

// developer settings
useSingleQuotes: false,
height: 0,
heightPercentage: 0,
adaptiveHeight: false,
id: "",
class: "",
useParagraph: false,
maxlength: 0,
callback: undefined,
useTabForNext: false
});
</script>
<!--Rich Text Editor Script Above-->
 
 
<!-- ./wrapper -->
 <script>
//   var quill = new Quill('#editor', {
//     theme: 'snow'
//   });
 </script>
<!-- reload page -->
<?php 
if(isset($_POST['no'])){
  ?>
  <script>
   x = document.getElementById('modal');
     x.style.display = 'none';
  </script>

  <?php
}
unset($_POST['no']);
  ?>
<script src="../js/reload.js"></script>
        <script>
        //When the page has loaded.
        $( document ).ready(function(){
            $('.alert').fadeIn('slow', function(){
               $('.alert').delay(2000).fadeOut(); 
            });
        });
        </script>
    <!-- jQuery 2.1.3 -->
    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
   
    <!-- jQuery 2.1.3 -->
    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>    
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <script src="../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Page script -->
    <script type="text/javascript">
      $(function () {

        "use strict";

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"]').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });

        //When unchecking the checkbox
        $("#check-all").on('ifUnchecked', function (event) {
          //Uncheck all checkboxes
          $("input[type='checkbox']", ".table-mailbox").iCheck("uncheck");
        });
        //When checking the checkbox
        $("#check-all").on('ifChecked', function (event) {
          //Check all checkboxes
          $("input[type='checkbox']", ".table-mailbox").iCheck("check");
        });
        //Handle starring for glyphicon and font awesome
        $(".fa-star, .fa-star-o, .glyphicon-star, .glyphicon-star-empty").click(function (e) {
          e.preventDefault();
          //detect type
          var glyph = $(this).hasClass("glyphicon");
          var fa = $(this).hasClass("fa");

          //Switch states
          if (glyph) {
            $(this).toggleClass("glyphicon-star");
            $(this).toggleClass("glyphicon-star-empty");
          }

          if (fa) {
            $(this).toggleClass("fa-star");
            $(this).toggleClass("fa-star-o");
          }
        });

        //Initialize WYSIHTML5 - text editor
        $("#email_message").wysihtml5();
      });
    </script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
  </body>
</html>