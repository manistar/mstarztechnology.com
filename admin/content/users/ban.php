<?php
    if(isset($_POST['id'])){
        $id = htmlspecialchars($_POST['id']);
        if($u->basiccontactstatus($id)){
            $user = $d->getall("contact", "ID = ?", [$id], fetch: "details"); ?>
            <p>If you ban this account: <br> <?= $user['fname'] ?> will not have access to this account and all <?= $user['fname']; ?> messages will not be visible on your website.</p>
           <label for="why">Tell <?= $user['fname'] ?> why you ban his/her account. </label> <br>
            <small class="p-0 m-0">You can leave it empty if you don't have a reason</small>
            <textarea name="why_block" class="form-control" id="why" cols="10" rows="3" placeholder="Why are you banning this account?"></textarea>
            <input type="hidden" name="userID" value="<?= $id ?>">
            <input type="hidden" name="ban">
            <br>
            <div id="custommessage"></div>
            <button type="submit" class="btn btn-danger"> Ban</button>
            <?php 
        }else{
            $user = $d->getall("contact", "ID = ?", [$id], fetch: "details"); ?>
            <p>Are you sure you want to Unban <?= $user['fname'] ?>'s account now?</p>
            <input type="hidden" name="userID" value="<?= $id ?>">
            <input type="hidden" name="unban">
            <br>
            <div id="custommessage"></div>
            <button type="submit" class="btn btn-success"> Yes Unban</button>  
        <?php  //echo  $u->activateuser($id);
        }
    }
?>