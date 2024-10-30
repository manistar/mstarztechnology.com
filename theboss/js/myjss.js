// Variable to hold request
var request;

// Bind to the submit event of our form
$("#foo").submit(function (event) {

    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();

    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // Fire off the request to /form.php
    request = $.ajax({
        url: "ajax.php",
        type: "post",
        data: serializedData
    }); 

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR) {
        // Log a message to the console
        // Log a message to the console
        var res = response.substring(0, 30);
        console.log(res);
        if (res === "<div class='card card-primary'") {
            document.getElementById("custommessage").innerHTML = "";
            // document.getElementById("accordion").innerHTML += response;
            $("#accordion").prepend(response);
            $inputs.prop("disabled", false);

        } else {
            document.getElementById("custommessage").innerHTML = response;
        }
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown) {
        // Log the error to the console
        console.error(
            "The following error occurred: " +
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

});

function showcontent(title, link, id) {
    modaltitle = document.getElementById('modal-title').innerHTML = title;
    $.ajax({
        type: 'post',
        url: 'modaldisplay.php',
        data: {
            urlink: link,
            id: id,
        },
        success: function (response) {
            document.getElementById("modal-body").innerHTML = response;

        }
    });

}

function search(key, contentshow) {
    document.getElementById(contentshow).innerHTML = "Loading...";
    $.ajax({
        type: 'post',
        url: 'ajax.php',
        data: {
            searchkey: key,
        },
        success: function (response) {
            document.getElementById(contentshow).innerHTML = response;

        }
    });
}

function deletecat(id) {
    var r = confirm("You are about to delete an item!");
    if (r == true) {
        $.ajax({
            type: 'post',
            url: 'ajax.php',
            data: {
                deletecat: id,
                subid: id,
            },
            success: function (response) {
                console.log("yes");
                document.getElementById("group" + id).innerHTML = "";

            }
        });
    }
}

function deletemaincat(id) {
    var r = confirm("You are about to delete an item!");
    if (r == true) {
        $.ajax({
            type: 'post',
            url: 'ajax.php',
            data: {
                deletemaincat: id,
                catid: id,
            },
            success: function (response) {
                document.getElementById("mcat" + id).innerHTML = "";
                console.log("mcat" + id);
            }
        });
    }
}

function editcat(id) {
    catvalue = document.getElementById("input" + id).value;
    $.ajax({
        type: 'post',
        url: 'ajax.php',
        data: {
            editcat: id,
            catvalue: catvalue,
        },
        success: function (response) {
            document.getElementById("custommessage").innerHTML = response;
        }
    });
}

function addinput(id) {
    document.getElementById("catid").value = id;
}

function addsubcat() {
    document.getElementById("subcustommessage").innerHTML = "Please Wait...";
    catid = document.getElementById("catid").value;
    subcatname = document.getElementById("subcatname").value;
    $.ajax({
        type: 'post',
        url: 'ajax.php',
        data: {
            catid: catid,
            subcatname: subcatname,
        },
        success: function (response) {
            var res = response.substring(0, 30);
            if (res === "<div class='card card-primary'") {
                document.getElementById("subcustommessage").innerHTML = response;
            } else {
                $("#value" + catid).prepend(response);
                document.getElementById("subcustommessage").innerHTML = "Item Added";
                document.getElementById("subcatname").value = "";
                console.log("value" + catid);
                // document.getElementById("value"+id).innerHTML = response;
            }
        }
    });
}

function submitform() {
    // Variable to hold request
    var request;

    // Bind to the submit event of our form
    $("#foo2").submit(function (event) {

        // Prevent default posting of form - put here to work in case of errors
        event.preventDefault();

        // Abort any pending request
        if (request) {
            request.abort();
        }
        // setup some local variables
        var $form = $(this);

        // Let's select and cache all the fields
        var $inputs = $form.find("input, select, button, textarea");

        // Serialize the data in the form
        var serializedData = $form.serialize();

        // Let's disable the inputs for the duration of the Ajax request.
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
        $inputs.prop("disabled", true);

        // Fire off the request to /form.php
        request = $.ajax({
            url: "ajax.php",
            type: "post",
            data: serializedData
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR) {
            // Log a message to the console
            // Log a message to the console
            var res = response.substring(0, 30);
            console.log(res);
            if (res === "<div class='card card-primary'") {
                document.getElementById("custommessage").innerHTML = "";
                // document.getElementById("accordion").innerHTML += response;
                $("#accordion").prepend(response);
                $inputs.prop("disabled", false);

            } else {
                document.getElementById("custommessage").innerHTML = response;
            }
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });

        // Callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
            // Reenable the inputs
            $inputs.prop("disabled", false);
        });

    });
}

// check task
function checktask(id) {
    var r = confirm("You are about to confirm a task. Please note that you might not be able to undo this action");
    if (r == true) {
        document.getElementById('button-' + id).disabled = true;
        paid_amount = document.getElementById('pay-'+id).value;
        $.ajax({
            type: 'post',
            url: 'ajax.php',
            data: {
                comfirmtask: id,
                paid_amount: paid_amount,
            },
            success: function (response) {
                if (response === 1) {
                    document.getElementById('tr-' + id).innerHTML = "";
                }else{
                    var res = response.substring(0, 5);
                    console.log(res);
                    if (res === "Error") {
                        alert(response);
                    }
                } 
            }
        });
    }
}


// check task
function cooperative_payin_form(id, name, amount) {
        $.ajax({
            type: 'post',
            url: 'ajax.php',
            data: {
                cooperative_payin_form: id,
                amount: amount,
                name: name,
            },
            success: function (response) {
                    document.getElementById('modal-body').innerHTML = response;
             
            }
        });
}

function saymyname(){
    document.getElementById('custommessage').innerHTML = "Please wait...";
    document.getElementsByTagName('submit-button').disabled;
   var name = document.getElementById('name').value;
   var id = document.getElementById('id').value;
   var amount = document.getElementById('amount').value;
   var date = document.getElementById('date').value;
   var payin_coopertaive = document.getElementById('payin_coopertaive').value;
   
    $.ajax({
        type: 'post',
        url: 'ajax.php',
        data: {
            id:id,
            date: date,
            payin_coopertaive: payin_coopertaive,
            amount: amount,
            name: name,
        },
        success: function (response) {
                document.getElementById('custommessage').innerHTML = response;
         
        }
    });
}