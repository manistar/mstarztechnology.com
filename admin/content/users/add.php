<form id="foo" method="POST" onsubmit="return false">
                                <?=$c->create_form($new_user);?>
                                <input type="hidden" name="create_account" id="create_account">
                                <div id="custommessage"></div>
                                <button class="btn btn-success rounded btn-lg btn-block">Create
                                    Account</button>
                            </form>