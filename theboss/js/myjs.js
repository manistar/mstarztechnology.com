$(document).ready(function () {
    $('#make').on('change', function () {//change function on country to display all state 
        var makeID = $(this).val();
        if (makeID) {
            $.ajax({
                type: 'POST',
                url: 'passer.php',
                data: 'makeID=' + makeID,
                success: function (html) {
                    $('#model').html(html);
                    // $('#sub_category').html('<option value="">Select state first</option>'); 
                }
            });
        } else {
            $('#model').html('<option value="">Select a make first</option>');
        }
    });
    
    
    // Login password Validation
        function myFunction() {
          var x = document.getElementById("myInput");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }


    $('#model').on('change', function () {//change function on country to display all state 
        var modelID = $(this).val();
        if (modelID) {
            $.ajax({
                type: 'POST',
                url: 'passer.php',
                data: 'modelID=' + modelID,
                success: function (html) {
                    $('#year').html(html);
                    // $('#sub_category').html('<option value="">Select state first</option>'); 
                }
            });
        } else {
            $('#year').html('<option value="">Select a make first</option>');
        }
    });


    $('#country').on('change', function () {//change function on country to display all state 
        var countryID = $(this).val();
        if (countryID) {
            $.ajax({
                type: 'POST',
                url: 'address-ajax.php',
                data: 'country_id=' + countryID,
                success: function (html) {
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>');
                }
            });
        } else {
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>');
        }
    });

    $('#state').on('change', function () {//change state to display all city
        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                type: 'POST',
                url: 'address-ajax.php',
                data: 'state_id=' + stateID,
                success: function (html) {
                    $('#city').html(html);
                }
            });
        } else {
            $('#city').html('<option value="">Select state first</option>');
        }
    });



});


