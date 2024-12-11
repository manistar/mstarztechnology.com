<!-- Bottom navigation bar -->
<!-- <div class="bottom-nav">
        <a href="?p=cart" class="active">
        <i class="fas fa-shopping-cart cart-icon"></i>
            <span id="cat_no"><//?= $P->no_products($userID) ?></span>
        </a>
        <a href="#products">
            <i class="fas fa-globe"></i>
            <span>Website Script</span>
        </a>
        <a href="#updates">
            <i class="fas fa-bell"></i>
            <span>Updates</span>
        </a>
         <a href="#tools">
            <i class="fas fa-tools"></i>
            <span>Tools</span>
        </a> -->
<!-- </div>  -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>



<script>
    function newchat() {
        const chat = document.getElementById("chat").value;

        $.ajax({
            type: 'POST',
            url: 'include/ajax',
            data: {
                chatnow: "chatnow",
                chat: chat,
            },
            success: function (response) {
                document.getElementById("message").innerHTML = response;
                updatechat(); // Update the chat div

                // Clear the input field after sending
                document.getElementById("chat").value = "";

                // Play notification sound
                document.getElementById("playnote").play();
            }
        });
    }



    // updatechat(function(){ 

    //         $.ajax({
    //       type:"POST",
    //       url:"include/ajax",
    //       data: {
    //       updatechat: "updatechat",
    //     },
    //       success:function(response)
    //       {
    //         document.getElementById("chatdiv").innerHTML = response;
    //       }
    //     });
    // }, 1000);//time in milliseconds 

    // let previousChatContent = ""; // To track the last chat content

    function updatechat() {

        $.ajax({
            type: "POST",
            url: "include/ajax",
            data: {
                updatechat: "updatechat",
            },
            success: function (response) {
                document.getElementById("chatdiv").innerHTML = response;
                // document.getElementById("playnote").innerHTML = response; // Play the notification sound
            }
        });
    }

    $(document).ready(function () {

        
        $("#chatdiv").load("include/ajax?updatechat");
        setInterval(function () {
            $("#chatdiv").load("include/ajax?updatechat");
        }, 1000);
    });


// Polling to check if the message is marked as read
let lastUpdate = 0;

function checkMessageReadStatus(userID) {
    const now = Date.now();
    if (now - lastUpdate < 500) return; // Prevent updates more frequently than every 2 seconds

    $.ajax({
        url: 'include/update_status',
        type: 'POST',
        data: { userID: userID },
        dataType: 'json',
        success: function(response) {
            const statusIconId = 'statusIcon_' + userID;
            // console.log('Response:', response);
            if (response.isRead === 1) {
                $('#' + statusIconId).attr('src', 'assets/images/status/tick.png');
            } else {
                $('#' + statusIconId).attr('src', 'assets/images/status/tick_grey.png');
            }
            lastUpdate = now; // Update the last update time
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
        }
    });
}

    $(document).ready(function () {
    const userID = <?php echo json_encode($userID); ?>; // Pass the userID to JavaScript
    if (userID) {
        // Clear any existing intervals before setting a new one
        clearInterval(window.checkMessageInterval);
        window.checkMessageInterval = setInterval(function() {
            checkMessageReadStatus(userID);
        }, 500); // Check every 2 seconds
    } else {
        console.error('User  ID is not set in the session.');
    }
});

// user view Update
// Below is to pass the notification count using ajax
function updateCount(){
  chat = document.getElementById("chat-icon").value;
  userID = document.getElementById("userID").value;
// document.getElementById("messageCount").innerHTML = response;
  $.ajax({
    type: 'POST',
    url: 'include/viewMsg',
    data: { 
      updateChat: "updateChat",
      updatechat: true, 
      userID: userID },
    success: function (response) {
      $('#chat-icon').text(response.count);
      updatechat();
      // document.getElementById("chat").value = "";
    }
  });
}
// Call the function to update the user count every 10 seconds
setInterval(updateCount, 10000);
$(document).ready(function() {
  updateCount(); // Initial call to set the count immediately on page load
});

</script>




<?php echo require_once "content/foot.php"; ?>

<?php if (in_array("payment", $script)) { ?>
    <script src="https://checkout.flutterwave.com/v3.js"></script>
    <script src="js/payment.js?n=11010"></script>
<?php } ?>

<script src="https://checkout.flutterwave.com/v3.js"></script>
<script src="js/payment.js?n=11011"></script>
<script src="js/chat.js"></script>
</body>
<!-- This is to be copied and paste in the list -->
<!-- <?php $script[] = "payment" ?> -->

</html>