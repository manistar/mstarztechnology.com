<?php
class content extends database
{
    private array $data;
    private array $datas;
    private String | int $key;
    private array $accepted_type = ["input", "textarea", "select", "countries"];
    private String $placeholder = "---placeholderforinput---";
   
    function create_form($datas)
    {
        if (!is_array($datas)) {
            return null;
        }
        $main_code = "";
        $this->datas = $datas;
        foreach ($datas as $key => $data) {
            if (!is_array($data)) {
                continue;
            }
            if ($key == "input_data") {
                continue;
            }
            $this->data = $data;
            $this->key = $key;
            $this->data['star'] = "";
            $this->data["value"] = $this->get_value($datas, $key);
            if (!isset($this->data['global_class'])) {
                $this->data['global_class'] = "";
            }
            if (!isset($this->data['atb'])) {
                $this->data['atb'] = "";
            }
            if (!isset($this->data['is_required']) || $this->data['is_required'] == true) {
                $this->data['is_required'] = true;
                $this->data['star'] = "*";
            }
            if (!isset($this->data['type'])) {
                $this->data['type'] = "input";
            }
            if (!isset($this->data['title'])) {
                $this->data['title'] = ucwords(str_replace("_", " ", $key));
            }
            if (!isset($this->data['id'])) {
                $this->data['id'] = $this->key;
            }
            if (!isset($this->data['class'])) {
                $this->data['class'] = $this->key;
            }
            if (!isset($this->data['placeholder'])) {
                $this->data['placeholder'] = "Enter " . ucwords(str_replace("_", " ", $key));
                if($this->data['type'] == "select"){
                    if(isset($data['title'])){
                        $this->data['placeholder'] = $data['title'];
                    }else{
                        $this->data['placeholder'] = "Select " . ucwords(str_replace("_", " ", $key));
                    }
                }
            }
            if ($this->data['type'] == "input" && !isset($this->data['input_type'])) {
                $this->data['input_type'] = "text";
            }
            if (!in_array($this->data['type'], $this->accepted_type)) {
                continue;
            }
            $type = $this->data['type'];
            if ($this->data['type'] == "input" && isset($this->data['input_type']) && $this->data['input_type'] == "hidden") {
                $main_code .=  $this->$type();
                continue;
            }

             // Handle select input for icons
            if ($this->data['type'] == "select") {
                $main_code .= $this->render_select($this->data);
                continue;
            }   
            // echo $key;
            // if ($key == "password") {
            //     $main_code .= $this->showpassword();
            // }

            $main_code .= str_replace($this->placeholder, $this->$type(), $this->get_header());
        }
        return $main_code;
    }

    // New method to render select inputs
    private function render_select($data)
    {
        $select_html = '<div class="' . htmlspecialchars($data['global_class']) . '">';
        $select_html .= '<label for="' . htmlspecialchars($data['id']) . '">' . htmlspecialchars($data['title']) . ' ' . $data['star'] . '</label>';
        $select_html .= '<select name="' . htmlspecialchars($data['id']) . '" id="' . htmlspecialchars($data['id']) . '" class="form-control" ' . ($data['is_required'] ? 'required' : '') . '>';
        
        foreach ($data['options'] as $value => $label) {
            $select_html .= '<option value="' . htmlspecialchars($value, ENT_QUOTES) . '">' . $label . '</option>';
        }
        
        $select_html .= '</select>';
        $select_html .= '</div>';
        
        return $select_html;
    }


    function showpassword() {
        return  "<input type='checkbox' onclick='showPassword()'>Show Password";
    }

    function  get_header()
    {
        $info =  "<div class='mb-3 form-groupcol-12 col-md-6 " . $this->data['global_class'] . "'>
        <label>" . ucwords($this->data['title']) . " <span class='text-danger'>" . $this->data['star'] . "</span></label>
        <div class='controls'>" . $this->placeholder;
        if (isset($this->data['description'])) {
            $info .= "<div class='form-control-feedback " . $this->data['class'] . "'>
            <div class='help-block'></div>
            <small>" . $this->data['description'] . "</small>
          </div>";
        }

        $info .= "
        </div>
      </div>";
        return $info;
    }

    function input()
    {

        $info = "";
        $onchange = "";
        // var_dump($this->data);
        if (isset($this->data['path']) && $this->data['input_type'] == "file") {
            $path = "";
            if (isset($this->datas["input_data"][$this->key])) {
                $path = $this->data['path'] . $this->datas["input_data"][$this->key];
            }
            $onchange = "onchange=\"showPreview(event, 'image-preview-" . $this->key . "')\"";
            $info .= "<div id= 'image-preview-" . $this->key . "' class='card shadow-md w-30 h-20 bg-gray p-3'><img src='$path' style='width: 100px' alt=''></div>";
        }

        $required = "";
        if ($this->data['is_required']) {
            $required = "required";
        }
        $info .= "<input $onchange name='" . $this->key . "' value='" . $this->data['value'] . "' id='" . $this->data['id'] . "' type='" . $this->data['input_type'] . "' class='form-control " . $this->data['class'] . "' placeholder='" . $this->data['placeholder'] . "'" . $this->data['atb'];
        if (isset(Regex[$this->key]['value'])) {
            $info .= "data-validation-required-message='" . Regex[$this->key]['error_message'] . "' aria-invalid='false'";
        }
        $info .= " $required/>";
        return $info;
    }

    function get_value($datas, $key)
    {
        if (isset($_POST[$key])) {
            return htmlspecialchars($_POST[$key]);
        }
        if (isset($datas['input_data'][$key])) {
            return $datas['input_data'][$key];
        }
        return "";
    }
    // function textarea()
    // {
    //     return "<textarea id='" . $this->data['id'] . "' class='form-control' placeholder='" . $this->data['placeholder'] . "'  name='" . $this->key . "'>" . $this->data['value'] . "</textarea>";
    // }

    function textarea()
{
    // Check if a specific class is set, otherwise use 'form-control'
    $class = isset($this->data['class']) ? $this->data['class'] : 'form-control';
    
    // Add TinyMCE class dynamically
    $class .= ' tinymce-editor';

    // Generate the textarea HTML
    return "<textarea 
                id='" . $this->data['id'] . "' 
                class='" . $class . "' 
                placeholder='" . $this->data['placeholder'] . "' 
                name='" . $this->key . "' 
                style='" . (isset($this->data['style']) ? $this->data['style'] : '') . "'>" 
                . $this->data['value'] . 
            "</textarea>";
}


    function select()
    {
        if (isset($this->data['options'])) {
            $bracket = "";
            $placeholder = "";
            $word = "multiple='multiple'";
            if (strpos($this->data['atb'], $word) !== false) {
                $bracket = "[]";
                $placeholder = $this->data['placeholder'];
                unset($this->data['placeholder']);
            }

            $info = "<select data-placeholder='$placeholder' class='form-control " . $this->data['class'] . "' id='" . $this->data['class'] . "' " . $this->data['atb'] . " name='" . $this->key . $bracket . "'>";
            if (isset($this->data['placeholder'])) {
                $info .= "<option value=''>" . $this->data['placeholder'] . "</option>";
            }
            foreach ($this->data['options'] as $key => $value) {
                // if($key )
                $selected = "";
                if(is_array($this->data['value']) && in_array($key, $this->data['value'])) {
                    $selected = "selected";
                }
                if ($key == $this->data['value'] && !is_array($this->data['value'])) {
                    $selected = "selected";
                }
                $info .= "<option value='$key' $selected>$value</option>";
            }
            $info .= "</select>";
            return $info;
        }

        return null;
    }

    // function getproduct($data, $class = "col-6 col-md-3 mb-3")
    // {
    //     $u = new fontusers;
    //     $d = new database;
    //     $p = new products;}
    
    function music_display($row, $class = "") {
        // Assuming $trending_music is a variable or an array
        // $d = new database; 
        // $trending_music = $d->getTrendingMusic();
        // $trending_music = $d->getall("playlist", "play_count > ? order by play_count DESC Limit 20", [1], fetch: "moredetails");
    
        if ($row) {
            $html = '<li class="single-item">' .
                '<form action="passer" id="foo' . $row['userID'] . '">' .
                '<a data-link data-title="' . $row['music_title'] . '" data-artist="' . $row['artist_name'] . '"' .
                'data-img="upload/' . $row['music_thumnail'] . '" href="upload/' . $row['music_file'] . '" ' .
                'class="single-item__cover">' .
                '<img src="upload/' . $row['music_thumnail'] . '" alt>' .
                '<div id="custommessage"></div>' .
                '<button id="Button" onclick="submitform(\'foo' . $row['userID'] . '\')" type="submit" value="submit">' .
                '<i class="far fa-play"></i>' .
                '<i class="far fa-pause"></i>' .
                '</button>' .
                '</form>' .
                '</a>' .
                '<div class="single-item__title">' .
                '<h4><a href="#">' . $row['music_title'] . '</a></h4>' .
                '<span><a href="?p=artist">' . $row['artist_name'] . '</a></span>' .
                '</div>';
    
            $html .= '<span class="single-item__time">3:05</span>';
    
            // Replace $file_url with the actual URL for the download
            $file_path = 'upload/' . $row["music_file"];
            $file_name = basename($file_path);
            $file_url  = 'upload/' . $row["music_file"];
            $html .= '<div class="dropdown moremenu dropleft">' .
                '<button class="btn" type="button" data-toggle="dropdown">' .
                '<i class="far fa-ellipsis-v-alt"></i>' .
                '</button>' .
                '<div class="dropdown-menu" aria-labelledby="moremenu">' .
                '<a class="dropdown-item" href="#"><i class="far fa-layer-plus"></i> Add To Playlist</a>' .
                '<a class="dropdown-item" href="#"><i class="far fa-heart"></i> Favourite</a>' .
                '<a class="dropdown-item" href="#"><i class="far fa-share-alt"></i> Share</a>' .
                '<a class="dropdown-item" href="#"><i class="far fa-info-circle"></i> Music Info</a>' .
                '<a class="dropdown-item" href="' . $file_url . '" id="download-button"><i class="fal fa-download"></i> Download</a>' .
                '</div>' .
                '</div>' .
                '</li>';
    
            return $html;
        }
    
        return ''; // If the condition is not met, return an empty string
    }
    
    // userstable
    function userstable($row)
    { 
        $d = new database;
        ?>
       
                <tr data-widget="expandable-table" aria-expanded="false">

                    <th>
                        <b id="success<?= $row['ID'] ?>" style="display:<?php if ($row['status'] == 1) {
                                                                            echo "block";
                                                                        } else {
                                                                            echo "none";
                                                                        } ?>; color:green">Active</b>
                        <b id="danger<?= $row['ID'] ?>" style="display:<?php if ($row['status'] == 1) {
                                                                            echo "none";
                                                                        } else {
                                                                            echo "block";
                                                                        } ?>; color:red">Deactivated<b>
                    </th>
                    <td><?= $row['ID']; ?></td>
                    <td><?= $row['first_name'] . ' ' . $row['last_name']; ?></td>
                    <td><?= $row['phone_number'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['street'] . ' ' . $d->getaddress(["cities" => $row['city'], "states" => $row['state'], "countries" => $row['country']]); ?></td>
                    <th><?= $row['status']; ?></th> 
                    <th><?= $row['ip_address']; ?></th> 
                    <td><?php echo date("F d, Y", strtotime($row['date'])); ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" id="" class="btn btn-default">Action</button>
                            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                
                            
                              
                                <!-- <a class="dropdown-item" href="users.php?p=edit&id=<?php echo $row['ID']; ?>">Edit Account</a> -->
                                <a class="dropdown-item" href="?p=users&action=edit&id=<?php echo $row['ID']; ?>">Edit Account</a>
                                <div class="dropdown-divider"></div>
                                
                                   
                                   
                                   <button class="dropdown-item" id="<?= $row['ID'] ?>" data-url="users/status" data-id="<?= $row['ID']; ?>" data-title="User Status" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg">Active/Deactive Account</button>
                                   <div class="dropdown-divider"></div>
                                   
                                <a class="dropdown-item" href="?p=ads&action=post&id=<?php echo $row['ID']; ?>">Post ADS</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="?p=users&action=view&id=<?= $row['ID'] ?>">View Account</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php }
        
       

    //
    function adstable($row)
    {
        $d = new database;
        // if (is_array($row)) {
             ?>
            <tr id="row<?= $row['ID']; ?>" data-widget="expandable-table" aria-expanded="false">
                <td>
                    <?php if ($row['status'] == "1") { ?>
                        <span class="badge bg-success float-right"> <span style="display:none">status:</span>View</span>
                    <?php } else if ($row['status'] == "2") { ?>
                        <span class="badge bg-primary float-right"> <span style="display:none">status:</span>Delete</span>
                    <?php } else if ($row['status'] == "3") { ?>
                        <!-- <span class="badge bg-dark float-right"> <span style="display:none">status:</span>Draft</span> -->
                    <?php } else { ?>
                        <span class="badge bg-danger float-right"> <span style="display:none">status:</span>Blocked</span>
                    <?php } ?>
                </td>
                <td><?php echo $id = $row['ID']; ?></td>
                <td><a href="users.php?a=view&id=<?= $row['userID']; ?>"><?php echo $name = $d->getusername($row['userID']); ?></a></td>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['categories']; ?></td>
                <td><img src="../upload/cart/<?= $row['upload_image']; ?>" style="width: 55px; height: 50px !important;" alt="Image-HasTech"></td>
                <!-- <td><?php echo $row['likes'] ?></td> -->
                <td><?php echo $row['amount'] ?></td>
                <td><?php echo $row['description'] ?></td>
                
                
                
                
                <td><?php echo date("F d, Y", strtotime($row['date'])); ?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" id="" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <!-- <a class="dropdown-item" href="staff.php">Assign to staff</a> -->
                            <!-- <a class="dropdown-item" href="#">Loan</a> -->
                            <!-- <a class="dropdown-item" href="ads.php?a=edit&id=<?php echo $row['ID']; ?>"></a> -->
                            <button class="dropdown-item" id="<?= $row['ID'] ?>" data-url="ads/edit" data-id="<?= $row['ID']; ?>" data-title="<?= $row['userID'] ?>" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg">Edit Ads</button>
                            <div class="dropdown-divider"></div>
                            <!-- <button class="dropdown-item" id="e<?= $row['ID'] ?>" data-url="ads/edit" data-id="<?= $row['ID']; ?>" data-title="<?= $name ?>" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg">Edit Ads</button> -->
                            <a class="dropdown-item" href="?p=ads&action=upload&id=<?= $row['ID'] ?>&userID=<?= $row['userID'] ?>">Manage Image</a>

                            <div class="dropdown-divider"></div>
                            <!-- <a class="dropdown-item" href="?p=contact&id=<?= $row['ID'] ?>">View Account</a> -->
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="?p=ads&pID=<?=$row['ID']; ?>&products">Delete Account</a>
                            <!-- <button class="dropdown-item" id="<?= $row['ID'] ?>" data-url="users/ban" data-id="<?= $row['ID']; ?>" data-title="User Status" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg">Ban Account</button> -->
                            <!-- <button class="dropdown-item" id="s<?= $row['ID'] ?>" data-url="users/status" data-id="<?= $row['ID']; ?>" data-title="Update Ads Status" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg">Update status</button> -->
                            <!-- <button class="dropdown-item" id="<?= $row['ID'] ?>" data-url="users/status" data-id="<?= $row['ID']; ?>" data-title="User Status" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg">Remove</button> -->
                            <!-- <a class="dropdown-item" href="#"></a> -->
                            <div class="dropdown-divider"></div>
                            <!-- <a class="dropdown-item" href="users.php?a=view&id=<?= $row['ID'] ?>">View Ads</a> -->
                        </div>
                    </div>
                </td>
            </tr>
            <?php  
            // }
            // require_once 'content/modal.php';
           
    }

    function feedback($row)
    {
        $d = new database;
        // if (is_array($row)) {
             ?>
            <tr id="row<?= $row['ID']; ?>" data-widget="expandable-table" aria-expanded="false">
                <!-- <td> -->
                    <?php //if ($row['status'] == "1") { ?>
                        <!-- <span class="badge bg-success float-right"> <span style="display:none">status:</span>View</span> -->
                    <?php //} else if ($row['status'] == "2") { ?>
                        <!-- <span class="badge bg-primary float-right"> <span style="display:none">status:</span>Delete</span> -->
                    <?php //} else if ($row['status'] == "3") { ?>
                        <!-- <span class="badge bg-dark float-right"> <span style="display:none">status:</span>Draft</span> -->
                    <?php// } else { ?>
                        <!-- <span class="badge bg-danger float-right"> <span style="display:none">status:</span>Blocked</span> -->
                    <?php //} ?>
                <!-- </td> -->
                <td><?php echo $id = $row['ID']; ?></td>
                <!-- <td><a href="users.php?a=view&id=<?= $row['userID']; ?>"><?php echo $name = $d->getusername($row['userID']); ?></a></td> -->
                <td><?php echo $row['fname'] ?></td>
                <td><?php echo $row['email']; ?></td>
                <!-- <td><img src="../upload/cart/<?= $row['upload_image']; ?>" style="width: 55px; height: 50px !important;" alt="Image-HasTech"></td> -->
                <td><?php echo $row['website'] ?></td>
                <td><?php echo $row['message'] ?></td>
                <td><?php echo $row['ip_address'] ?></td>
                
                
                
                
                <td><?php echo date("F d, Y", strtotime($row['date'])); ?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" id="" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <!-- <button class="dropdown-item" id="<?= $row['ID'] ?>" data-url="ads/edit" data-id="<?= $row['ID']; ?>" data-title="<?= $row['userID'] ?>" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg">Edit Ads</button> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="?p=feedbacks&pID=<?=$row['ID']; ?>&feedbacks">Delete Account</a>
                            <div class="dropdown-divider"></div>
                           
                        </div>
                    </div>
                </td>
            </tr>
            <?php  
            // }
            // require_once 'content/modal.php';
           
    }

    function contacttable($row)
    {
        $d = new database;
        // if (is_array($row)) {
             ?>
            <tr id="row<?= $row['ID']; ?>" data-widget="expandable-table" aria-expanded="false">
                <td>
                    <?php if ($row['status'] == "1") { ?>
                        <span class="badge bg-success float-right"> <span style="display:none">status:</span>View</span>
                    <?php } else if ($row['status'] == "2") { ?>
                        <span class="badge bg-primary float-right"> <span style="display:none">status:</span>Delete</span>
                    <?php } else if ($row['status'] == "3") { ?>
                        <!-- <span class="badge bg-dark float-right"> <span style="display:none">status:</span>Draft</span> -->
                    <?php } else { ?>
                        <span class="badge bg-danger float-right"> <span style="display:none">status:</span>Blocked</span>
                    <?php } ?>
                </td>
                <td><?php echo $id = $row['ID']; ?></td>
                <!-- <td><a href="users.php?a=view&id=<?= $row['userID']; ?>"><?php echo $name = $d->getusername($row['userID']); ?></a></td> -->
                <td><?php echo $row['fname'] ?></td>
                <td><?php echo $row['ip_address']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?php echo $row['phone'] ?></td>
                <!-- <td><?php echo $row['description'] ?></td> -->
                
                
                
                
                <td><?php echo date("F d, Y", strtotime($row['date'])); ?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" id="" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                        
                            <button class="dropdown-item" id="<?= $row['ID'] ?>" data-url="ads/edit" data-id="<?= $row['ID']; ?>" data-title="<?= $row['userID'] ?>" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg">Edit Ads</button>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="users.php?a=post&upload=<?= $row['ID'] ?>&id=<?= $row['userID'] ?>">Manage Image</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="?p=contact&id=<?= $row['ID'] ?>">View Account</a>
                            
                            <!-- <a class="dropdown-item" href="#"></a> -->
                            <div class="dropdown-divider"></div>
                            <!-- <a class="dropdown-item" href="users.php?a=view&id=<?= $row['ID'] ?>">View Ads</a> -->
                        </div>
                    </div>
                </td>
            </tr>
            <?php  
            // }
            // require_once 'content/modal.php';
           
    }
    

    function carttable($carting)
    {
        $d = new database;
        // if (is_array($row)) {
             ?>
            <tr id="row<?= $carting['productID']; ?>" data-widget="expandable-table" aria-expanded="false">
                <!-- <td>
                    <?php if ($carting['status'] == "1") { ?>
                        <span class="badge bg-success float-right"> <span style="display:none">status:</span>View</span>
                    <?php } else if ($carting['status'] == "2") { ?>
                        <span class="badge bg-primary float-right"> <span style="display:none">status:</span>Delete</span>
                    <?php } else if ($carting['status'] == "3") { ?>
                        <!-- <span class="badge bg-dark float-right"> <span style="display:none">status:</span>Draft</span> -->
                    <?php } else { ?>
                        <span class="badge bg-danger float-right"> <span style="display:none">status:</span>Blocked</span>
                    <?php } ?>
                </td> -->
                <td><?php echo $id = $carting['productID']; ?></td>
                <!-- <td><a href="users.php?a=view&id=<?= $row['userID']; ?>"><?php echo $name = $d->getusername($row['userID']); ?></a></td> -->
                <!-- <td><?php echo $carting['title'] ?></td> -->
                <td><?php echo $carting['userID']; ?></td>
                <!-- <td><?= $carting['category']; ?></td> -->
                <!-- <td><?php echo $row['phone'] ?></td> -->
                <!-- <td><?php echo $row['description'] ?></td> -->
                
                
                
                
                <td><?php echo date("F d, Y", strtotime($carting['date'])); ?></td>
                <!-- <td> -->
                    <!-- <div class="btn-group"> -->
                        <!-- <button type="button" id="" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button> -->
                        <!-- <div class="dropdown-menu" role="menu"> -->
                        
                            <!-- <button class="dropdown-item" id="<?= $row['ID'] ?>" data-url="ads/edit" data-id="<?= $row['ID']; ?>" data-title="<?= $row['userID'] ?>" onclick="modalcontent(this.id)" data-toggle="modal" data-target="#modal-lg">Edit Ads</button> -->
                            <!-- <div class="dropdown-divider"></div> -->
                            <!-- <a class="dropdown-item" href="users.php?a=post&upload=<?= $row['ID'] ?>&id=<?= $row['userID'] ?>">Manage Image</a> -->
                            <!-- <div class="dropdown-divider"></div> -->
                            <!-- <a class="dropdown-item" href="?p=contact&id=<?= $row['ID'] ?>">View Account</a> -->
                            
                            <!-- <a class="dropdown-item" href="#"></a> -->
                            <!-- <div class="dropdown-divider"></div> -->
                            <!-- <a class="dropdown-item" href="users.php?a=view&id=<?= $row['ID'] ?>">View Ads</a> -->
                        <!-- </div> -->
                    <!-- </div> -->
                <!-- </td> -->
            </tr>
            <?php  
            // }
            // require_once 'content/modal.php';
           
    }
    

    function countries()
    {
        if (isset($this->data['data'])) {
            $info = "<select name='" . $this->key . "' class='form-control select2 " . $this->data['class'] . "' id='template-with-flag-icons " . $this->data['class'] . "' " . $this->data['atb'] . ">";
            if ($this->data['placeholder']) {
                $info .= "<option value=''>" . $this->data['placeholder'] . "</option>";
            }
            foreach ($this->data['data'] as $value) {
                $selected = "";
                $key = $value['id'];
                if ($key == $this->data['value']) {
                    $selected = "selected";
                }
                $info .= "<option value='$key' data-flag='ad' $selected> " . $value['name'] . "</option>";
            }
            $info .= "</select>";
            return $info;
        }

        return null;
    }

    function get_users_option_data()
    {
        $info = [];
        $users = $this->getall("users", "status = ?", ["active"], "ID, first_name, last_name", "moredetails");
        if ($users->rowCount() == 0) {
            return $info;
        }
        foreach ($users as $row) {
            $info[$row['ID']] = $row['first_name'] . ' ' . $row['last_name'];
        }
        return $info;
    }
    function badge($data)
    {
        $data = ucfirst($data);
        $info = "<span class='badge bg-light-primary text-primary fw-semibold fs-2'>$data</span>";
        $info = match ($data) {
            'Active', 'Approved','Success'   => "<span class='badge bg-light-success text-success fw-semibold fs-2'>$data</span>",
            'Disable', 'Rejected' => "<span class='badge bg-light-danger text-danger fw-semibold fs-2'>$data</span>",
            'Pending' => "<span class='badge bg-light-warning text-warning fw-semibold fs-2'>$data</span>",
            "" => "<span class='badge bg-light-primary text-primary fw-semibold fs-2'>$data</span>"
        };
        return $info;
    }

    function empty_page($message, $btn= "", $h1 = "Nothing here!!", $icon = "<i class='ti ti-alert-square-rounded text-warning h1'></i>")
    {
        return "
        <div class='mt-3 col-12 text-center'>
    $icon
    <h4 class=''>$h1</h4>
    <p>$message</p>
    <div class='mt-3'>
        $btn
    </div>
</div>
        ";
    }
    

    function get_compound_profits_btn($investID, $data) {
        if($data == false) {
            echo "<a class='btn btn-success rounded-pill' href='index?p=compound_profits&action=new&investID=$investID'>Activate compound profits</a>";
            return null;
        }
        $id = $data['ID'];
        $status = $data['status'];
        $acheck = "";
        $dcheck = "";
        if($status == "active") {
            $acheck = "checked";
        }else{
            $dcheck = "checked";
        }

        echo '
        <div class="d-flex">
        <input type="radio" class="btn-check" name="options" id="option1"value="active" onclick="update_compound_profits(this.value, \''.$id.'\')" autocomplete="off" '.$acheck.'>
        <label class="btn btn-outline-success rounded-pill font-medium" for="option1">Active</label>
        
        <input type="radio" class="btn-check" name="options" value="deactive" id="option4" onclick="update_compound_profits(this.value, \''.$id.'\')" autocomplete="off" '.$dcheck.'>
        <label class="btn btn-outline-danger rounded-pill font-medium ms-2" for="option4">Deactive</label>
        </div>
        ';
    }


    function plan_list($data, $class = "")
    {
        $min = '';
        if ($data['plan_name'] != "") {
            $min = $data['plan_name'] . ": ";
        }
        $min .= currency . number_format((float)$data['min_amount'], 2,);
        $max = currency . number_format((float)$data['max_amount'], 2,);
        $retrun = $data['return_range_to'] . "%";
        $retrun_interval = $data['retrun_interval'];
        return "<a href='?p=investment&action=new&planid=" . $data['ID'] . "' class='card shadow-md p-3 col-12 col-md-5 m-1 zoom $class'>
                <h6 class='mr-auto p-2 m-0'>$min - $max</h6>
                <div class='ps-2 ml-auto text-right '>Retun up to <b class='text-success'>$retrun $retrun_interval</b></div>
            </a>";
    }

    function terms_message()
    {
        return "<b>By proceeding you agree to our <a href='https://proloomtrading.com/page.php?t=terms_and_conditions'>team and conditions</a> and <a href='https://proloomtrading.com/page.php?t=policy'> privacy policy</a>.</b>";
    }

    function arrow_percentage($percent, $word = "profit")
    {
        $percent = round($percent, 2);
        $arrow = "up";
        $color = "success";
        if ($percent < 0) {
            $arrow = "down";
            $color = "danger";
        }

        return "<div class='d-flex align-items-center pb-1'>
        <span class='me-2 rounded-circle bg-light-$color round-20 d-flex align-items-center justify-content-center'>
          <i class='ti ti-arrow-$arrow-right text-$color'></i>
        </span>
        <p class='text-dark me-1 fs-3 mb-0'> $percent%</p>
        <p class='fs-3 mb-0'>$word</p>
      </div>";
    }
}
