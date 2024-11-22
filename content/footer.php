 <!-- Bottom navigation bar -->
 <!-- <div class="bottom-nav">
        <a href="?p=cart" class="active">
        <i class="fas fa-shopping-cart cart-icon"></i>
            <span id="cat_no"><?= $P->no_products($userID) ?></span>
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
 function newchat(){
  chat = document.getElementById("chat").value;
  $.ajax({
    type: 'POST',
    url: 'include/ajax',
    data: {
      chatnow: "chatnow",
      chat:chat,
      
    },
    success: function (response) {
      document.getElementById("message").innerHTML = response;
      updatechat();
      document.getElementById("chat").value = "";
    }
  });
}


updatechat(function(){ 
    
        $.ajax({
      type:"POST",
      url:"include/ajax",
      data: {
      updatechat: "updatechat",
    },
      success:function(response)
      {
        document.getElementById("chatdiv").innerHTML = response;
      }
    });
}, 10000);//time in milliseconds 

function updatechat(){
    $.ajax({
      type:"POST",
      url:"include/ajax",
      data: {
      updatechat: "updatechat",
    },
      success:function(response)
      {
        document.getElementById("chatdiv").innerHTML = response;
      }
    });
}


    $(document).ready(function(){
		 $("#chatdiv").load("include/ajax?updatechat");
        setInterval(function() {
            $("#chatdiv").load("include/ajax?updatechat");
        }, 1000);
    });


</script>

<!--  -->
<script>
//    $(document).ready(function () {

//      // Add notification sound element
//      const notificationSound = new Audio("assets/audio/notification.mp3"); // Replace with the actual path to your audio file

//     // Send a new chat message
//     window.newchat = function () {
//         const chatInput = $("#chat").val().trim();
//         const userID = $("#ID").val(); // Ensure this is the correct userID
//         if (chatInput === "") {
//             alert("Please enter a message.");
//             return;
//         }

//         $.ajax({
//             type: "POST",
//             url: "include/ajax",
//             data: { chatnow: true, chat: chatInput, userID: userID },
//             dataType: "json",
//             success: function (response) {
//                 if (response.success) {
//                     $("#chat").val(""); // Clear the input field
//                     loadChatMessages(); // Reload the chat messages
//                 } else {
//                     alert("Failed to send message.");
//                 }
//             },
//             error: function () {
//                 alert("An error occurred while sending the message.");
//             },
//         });
//     };

//     // Load chat messages dynamically
//     let lastChatHtml = ""; // Store the last chat HTML to detect changes
//     function loadChatMessages() {
//         $.ajax({
//             type: "GET",
//             url: "include/ajax?updatechat=true",
//             success: function (response) {
//                 $("#chatdiv").html(response);

//                 // Auto-scroll to the bottom of the chat box
//                 const chatDiv = document.getElementById("chatdiv");

//                 if (chatDiv.innerHTML !== response) {
//                     // Play notification sound if new messages are loaded
//                     notificationSound.play().catch(error => {
//                         console.error("Error playing notification sound:", error);
//                     });

//                     // Update chat HTML
//                     chatDiv.innerHTML = response;


//                 chatDiv.scrollTop = chatDiv.scrollHeight;
//                 }
//             },
//             error: function () {
//                 console.error("Failed to load chat messages.");
//             },
//         });
//     }

//     // Auto-refresh chat every second
//     setInterval(loadChatMessages, 1000);
// });

// STart

// $(document).ready(function () {
//     // Add notification sound element
//     const notificationSound = new Audio("assets/audio/notification.mp3"); // Replace with the actual path to your audio file

//     let lastChatHtml = ""; // Store the last chat HTML to detect changes
//     let isUserSendingMessage = false; // Flag to check if the user is sending a message

//     // Send a new chat message
//     window.newchat = function () {
//         const chatInput = $("#chat").val().trim();
//         const userID = $("#ID").val(); // Ensure this is the correct userID
//         if (chatInput === "") {
//             alert("Please enter a message.");
//             return;
//         }

//         // Set flag to true when user sends a message
//         isUserSendingMessage = true;

//         $.ajax({
//             type: "POST",
//             url: "include/ajax",
//             data: { chatnow: true, chat: chatInput, userID: userID },
//             dataType: "json",
//             success: function (response) {
//                 if (response.success) {
//                     $("#chat").val(""); // Clear the input field
//                     loadChatMessages(); // Reload the chat messages
//                 } else {
//                     alert("Failed to send message.");
//                 }
//                 // Reset flag after sending message
//                 isUserSendingMessage = false;
//             },
//             error: function () {
//                 alert("An error occurred while sending the message, please login to chat.");
//                 // Reset flag if an error occurs
//                 isUserSendingMessage = false;
//             },
//         });
//     };

//     // Load chat messages dynamically
//     function loadChatMessages() {
//         $.ajax({
//             type: "GET",
//             url: "include/ajax?updatechat=true",
//             success: function (response) {
//                 // Only update and play sound if the content has changed and it's not the user's own message
//                 if (lastChatHtml !== response) {
//                     lastChatHtml = response; // Update the last chat HTML

//                     // Play notification sound if it's not the user sending a message
//                     if (!isUserSendingMessage) {
//                         notificationSound.play().catch(error => {
//                             console.error("Error playing notification sound:", error);
//                         });
//                     }

//                     // Update the chat content
//                     $("#chatdiv").html(response);

//                     // Auto-scroll to the bottom of the chat box
//                     const chatDiv = document.getElementById("chatdiv");
//                     chatDiv.scrollTop = chatDiv.scrollHeight;
//                 }
//             },
//             error: function () {
//                 console.error("Failed to load chat messages.");
//             },
//         });
//     }

//     // Auto-refresh chat every second
//     setInterval(loadChatMessages, 1000);
// });

</script>



<?php echo require_once "content/foot.php"; ?>

<?php if(in_array("payment", $script)) { ?>
    <script src="https://checkout.flutterwave.com/v3.js"></script>
    <script src="js/payment.js?n=11010"></script> 
<?php }?>

<script src="https://checkout.flutterwave.com/v3.js"></script>
<script src="js/payment.js?n=11011"></script>
<script src="js/chat.js"></script>
</body>
<!-- This is to be copied and paste in the list -->
 <!-- <?php $script[] = "payment"?> -->
</html>