<?php
if (isset($_POST['id'])) {
  $id   = htmlspecialchars($_POST['id']);
  $data = $d->getall("products", "ID = ?", [$id], fetch: "details");
  if (!is_array($data)) {
    echo "<h3>No Ads Found</h3>";
    exit();
  }
} else {
  echo "<h3>No Ads selected</h3>";
  exit();
}
?>
<div class="tab-content">
  <div class="" id="edit">
    <div class="d-flex align-items-center mb-2">
      <h5 class="m-0">Edit Ads</h5>
      <!-- <button class="dropdown-item" id="e<?= $row['ID'] ?>" data-url="ads/edit" data-id="<?= $row['ID']; ?>" data-title="Edit Ads" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg">Edit Ads Image</button> -->
      <a href="?p=ads&action=upload=<?= $data['ID'] ?>&id=<?= $data['userID'] ?>"
        class="ml-auto text-success btn btn-success" style="color:white!important">Manage Ads Images</a>
    </div>

    <div class="form-group">
      <form action="passer" id="foo" onsubmit="return false">
        <?= $c->create_form($store_edit); ?>
        <input type="hidden" name="edit_product">
        <div id="custommessage"></div>
        <input type="submit" value="Update" class="btn btn-success">
      </form>
    </div>

  </div>
</div>
  <!-- Place the first <script> tag in your HTML's <head> -->
<!-- <script src="https://cdn.tiny.cloud/1/50n2ohr67wgiyqnrp26mtqlq05jj34o7hz531pvbzovdlta8/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script> -->
 

<!-- <div style="display:none;" id="upload">
  <?php // require_once "content/ads/upload.php"; ?>
</div> -->