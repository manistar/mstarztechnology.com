<?php //require 'header.php'; ?>
<style>
    /* General Page Styles */
    .chat-page {
        font-family: Arial, sans-serif;
    }

    .page-title {
        background-color: #25d366;
        color: white;
        padding: 20px;
        text-align: center;
    }

    .page-title h1 {
        font-size: 24px;
        margin: 0;
    }

    .chat-container {
        display: flex;
        justify-content: center;
        padding: 20px;
    }

    .chat-box {
        width: 100%;
        max-width: 600px;
        background-color: #f5f5f5;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Message List Styling */
    .message-list {
        padding: 20px;
        max-height: 500px;
        overflow-y: auto;
    }

    .message {
        display: flex;
        margin-bottom: 15px;
    }

    .message.admin {
        justify-content: flex-start;
    }

    .message.user {
        justify-content: flex-end;
    }

    .message-content {
        max-width: 70%;
        padding: 10px;
        border-radius: 20px;
        font-size: 14px;
    }

    .message.admin .message-content {
        background-color: #e0e0e0;
    }

    .message.user .message-content {
        background-color: #0078ff;
        color: white;
    }

    .message-time {
        font-size: 12px;
        color: #999;
        margin-top: 5px;
    }

    /* Input Area Styling */
    .message-input {
        display: flex;
        padding: 15px;
        background-color: #fff;
        border-top: 1px solid #ddd;
        justify-content: space-between;
        /* Space between the textarea and send button */
        align-items: center;
        background-color: #fff;
        border-top: 1px solid #ddd;
    }

    .message-input textarea {
        width: 80%;
        padding: 10px;
        border-radius: 20px;
        border: 1px solid #ccc;
        font-size: 14px;
        resize: none;
    }

    .send-btn {
        width: 15%;
        height: 58px;
        background-color: #25d366;
        color: white;
        border: none;
        padding: 10px;
        font-size: 16px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 10px;
        /* Add space between the textarea and send button */
    }

    .send-btn:hover {
        background-color: #128c7e;
    }

    /* Chat Box */
    #chat-box {
        display: none;
        flex-direction: column;
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 350px;
        max-width: 90%;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        z-index: 9999;
    }

    #chat-box.visible {
        display: flex;
    }

    /* Chat Header */
    .chat-header {
        background-color: #f46b2c;
        color: white;
        padding: 10px;
        font-size: 16px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .chat-logo {
        font-size: 20px;
    }

    .chat-title {
        font-size: 16px;
        font-weight: bold;
    }

    .close-btn {
        background: none;
        border: none;
        color: white;
        font-size: 18px;
        cursor: pointer;
    }

    /* Chat Body */
    .chat-body {
        padding: 15px;
        max-height: 400px;
        overflow-y: auto;
    }

    .chat-body p {
        margin-bottom: 8px;
        font-size: 14px;
        line-height: 1.5;
    }

    .chat-link {
        color: #f46b2c;
        text-decoration: none;
        font-weight: bold;
    }

    .chat-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .chat-tag {
        background-color: #f5f5f5;
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 12px;
        color: #555;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .chat-tag:hover {
        background-color: #f46b2c;
        color: white;
    }

    /* Chat Footer */
    .chat-footer {
        padding: 10px;
        border-top: 1px solid #ddd;
        background-color: #f9f9f9;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .chat-footer input {
        flex: 1;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
    }

    #send-button {
        background-color: #f46b2c;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    #send-button:hover {
        background-color: #e35a1f;
    }

    #send-button img {
        width: 20px;
        height: 20px;
    }

    /* Admin's Chat Bubble */
    .msg_cotainer {
        max-width: 55%;
        /* Slightly narrower width */
        background-color: #ffffff;
        /* White background for admin */
        color: #000000;
        padding: 10px 15px;
        border-radius: 10px 10px 10px 0;
        /* Rounded edges */
        position: relative;
        word-wrap: break-word;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    /* User's Chat Bubble */
    .msg_cotainer_send {
        max-width: 45%;
        /* Slightly narrower width */
        background-color: #dcf8c6;
        /* WhatsApp green for user */
        color: #000000;
        padding: 10px 15px;
        border-radius: 10px 10px 0 10px;
        /* Rounded edges */
        position: relative;
        word-wrap: break-word;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    /* Timestamp styling inside the chat bubble */
    .msg_time,
    .msg_time_send {
        font-size: 12px;
        color: #6c757d !important;
        /* Ensure timestamp is always grey */
        display: block;
        text-align: right;
        margin-top: 5px;
    }

    /* Adjust for dark mode */
    /* body.dark-mode .msg_card_body {
    background-color: #e5ddd5; ;
} */

    .msg_card_body {
        background-color: #e5ddd5;
        /* WhatsApp-like background */
        background-image: linear-gradient(135deg, #f8b195, #f67280, #c06c84, #6c5b7b, #355c7d);
        /* Colorful gradient pattern */
        background-size: 400% 400%;
        animation: gradientShift 15s linear infinite;
        /* Animation for gradient shifting */
        padding: 10px;
        border-radius: 10px;
        overflow-y: auto;
        background-repeat: no-repeat;
        background-attachment: fixed;
        /* Fixed background */
        background-blur: 10px;
        /* Optional: apply background blur */
    }

    body.dark-mode .msg_cotainer {
        background-color: #e5ddd5;
        ;
        color: #ffffff;
    }

    body.dark-mode .msg_cotainer_send {
        background-color: #056162;
        color: #ffffff;
    }

    body.dark-mode .msg_time,
    body.dark-mode .msg_time_send {
        color: #6c757d !important;
    }

    /* Alignments for chat messages */
    .d-flex.justify-content-start {
        justify-content: flex-start !important;
        margin-bottom: 20px;
    }

    .d-flex.justify-content-end {
        justify-content: flex-end !important;
        margin-bottom: 20px;
    }

    /* Smooth Scrolling */
    #chatdiv {
        height: 400px;
        overflow-y: scroll;
        scrollbar-width: thin;
        /* For Firefox */
        -ms-overflow-style: none;
        /* For IE/Edge */
        background-color: #e5ddd5;
        /* background-color: #e5ddd5; / */
        /* background-image: linear-gradient(135deg, #f8b195, #f67280, #c06c84, #6c5b7b, #355c7d); Colorful gradient pattern */
        /* background-size: 400% 400%; */
        /* animation: gradientShift 15s linear infinite; */

    }

    #chatdiv::-webkit-scrollbar {
        width: 5px;
    }

    #chatdiv::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 10px;
    }

    #chatdiv::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .msg_cotainer:hover,
    .msg_cotainer_send:hover {
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    /* Chat Box Responsiveness */
    @media (max-width: 768px) {

        .msg_cotainer,
        .msg_cotainer_send {
            max-width: 85%;
            /* Adjust bubble width for smaller screens */
        }
    }

    /* General Styles */
    .tab-content {
        font-family: Arial, sans-serif;
        background-color: #ffffff;
        border-radius: 10px;
        padding: 15px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
    }

    /* Contact Link Styling */
    .contact-link {
        text-decoration: none;
        color: inherit;
        display: flex;
        align-items: center;
        padding: 8px;
        /* Reduced padding */
        transition: background-color 0.3s, transform 0.2s;
    }

    .contact-link:hover {
        background-color: #f0fdf4;
        /* WhatsApp light green */
        transform: translateY(-2px);
        border-radius: 10px;
    }

    /* Contact Card Styling */
    .contact-card {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 8px 0;
        /* Reduced padding for a more compact design */
    }

    /* Avatar Styling */
    .avatar {
        flex-shrink: 0;
        width: 40px;
        /* Smaller avatar */
        height: 40px;
        /* Smaller avatar */
        border-radius: 50%;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Contact Info */
    .contact-info {
        margin-left: 10px;
        /* Reduced margin for compactness */
        flex-grow: 1;
    }

    .contact-name {
        font-size: 14px;
        /* Reduced font size */
        font-weight: bold;
        margin: 0;
        color: #333;
    }

    .contact-status {
        font-size: 11px;
        /* Reduced font size */
        color: #25d366;
        margin-top: 2px;
    }

    /* Divider Styling */
    .divider {
        border: none;
        border-bottom: 1px solid #ddd;
        margin: 8px 0;
        /* Reduced margin for compact spacing */
    }

    /* Hover Effects */
    .contact-card:hover .contact-name {
        color: #128c7e;
    }

    .contact-card:hover .contact-status {
        color: #128c7e;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .contact-card {
            flex-direction: column;
            align-items: flex-start;
        }

        .contact-info {
            margin-left: 0;
            margin-top: 8px;
            /* Reduced margin for smaller screens */
        }

        .avatar {
            width: 35px;
            /* Smaller avatar for smaller screens */
            height: 35px;
        }

        .contact-name {
            font-size: 13px;
            /* Adjusted font size */
        }

        .contact-status {
            font-size: 10px;
            /* Adjusted font size */
        }
    }

    /* Style for the message count */
.message-count {
    display: inline-block;
    width: 30px; /* Size of the circle */
    height: 30px; /* Size of the circle */
    background-color: red; /* Red background */
    color: white; /* White text color */
    border-radius: 50%; /* Make it a circle */
    text-align: center; /* Center the text inside the circle */
    line-height: 30px; /* Vertically center the text */
    font-weight: bold; /* Make the text bold */
    font-size: 14px; /* Adjust the font size */
    margin-left: 10px; /* Add some space between the name and the message count */
}


</style>

<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <!-- START ACCORDION & CAROUSEL-->
        <!-- <h5 class="mt-4 mb-2">Your Templates</h5> -->
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Chat </h3>
                        <!-- <button id="adduser" data-url="users/add" data-id="adduser"
                            data-title="New Plan" onclick="modalcontent(this.id)" data-toggle="modal"
                            data-target="#modal-lg" class="btn btn-primary">Add new user</button> -->
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body">


                        <div class="page_title section-padding">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="page_title-content"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--  -->
                        <!-- 
                        <style>

                        </style> -->
                        <div class="page_title section-padding">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="page_title-content">
                                            <!-- <p>Welcome Back,
                                <span> <?php echo $fname; ?></span>
                            </p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="buy_sell mb-80">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-5 col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="buy-sell-widget">
                                                    <ul class="nav nav-tabs">

                                                    </ul>
                                                    <div class="tab-content tab-content-default">
                                                        <div class="tab-pane fade show active" id="buy" role="tabpanel">

                                                            <?php
                                                            // $chat = $d->getall("chat", "userID = ? ORDER BY created_at DESC LIMIT 1", [$userID], fetch: "");
                                                            // $postTime = strtotime($chat['created_at']);  
                                                            // $timeAgo = $d->ago($postTime); 
                                                            


                                                            // $allUsers = $d->getall("users", "1=1", []); // Replace with your logic to fetch all users
                                                            
                                                            foreach ($allusers as $row) {
                                                                // Get the last activity time of the user
                                                                $lastChat = $d->getall("chat", "userID = ? ORDER BY created_at DESC LIMIT 1", [$row['ID']]);

                                                                // Extract the last activity timestamp
                                                                $lastActive = $lastChat ? strtotime($lastChat['created_at']) : null;

                                                                // Determine status (Online/Offline) or time ago
                                                                $timeAgo = $d->ago($lastActive);

                                                                // Fetch the total number of messages sent by the user
                                                                $messageCount = $d->getMessageCount("chat", "userID = ? AND whois ='user'", [$row['ID']]);

                                                                // Fetch the last message sent by the user
                                                                $lastChat = $d->getall("chat", "userID = ? ORDER BY created_at DESC LIMIT 1", [$row['ID']]);

                                                                ?>

                                                                <?php //foreach ($allusers as $row) { ?>
                                                                <a href="?p=chat&ID=<?php echo $row['ID']; ?>"
                                                                    class="contact-link">
                                                                    <div class="contact-card">
                                                                        <div class="avatar">
                                                                            <img src="../upload/profile/<?= $row['upload_image']; ?>"
                                                                                alt="Avatar of <?php echo $row['first_name'];?> ">
                                                                        </div>
                                                                        <div class="contact-info">
                                                                            <h5 class="contact-name">
                                                                                <?php echo $row['first_name'] . ' ' . $row['last_name'] ?>
                                                                                <?php 
                                                                                    if ($messageCount): ?>
                                                                                        <span class="message-count" id="messageCount"><?= $messageCount; ?></span>
                                                                                        <input type="hidden" id="userID" value="<?= $userID ?>">

                                                                                    <?php endif; ?>
                                                                                
                                                                            </h5>
                                                                            <p class="contact-status">
                                                                                <?= $timeAgo; ?>
                                                                            </p>
                                                                            <!-- Display message count -->
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                                <hr class="divider">
                                                            <?php } ?>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-lg-7 col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="buyer-seller">
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <h2>Chats</h2>
                                                    </div>

                                                   
                                       

                                                    <?php
                                                    
                                                    if (isset($_GET['ID'])) {
                                                        $userID = htmlspecialchars($_GET['ID']);
                                                        // $chats  = $d->getall("chat", "userID = ?", [$userID], fetch: "moredetails");
                                                       ?>
                                                        <!-- <input type="text" id="userID" value="<?= $row['first_name'] . ' ' . $row['last_name']; ?>" disabled> -->
                                                         <input type="text" id="ID" value="<?= $userID ?>" disabled>
                                                        <?php
                                                    } else {
                                                        echo "Select a User to start chatting.";
                                                    }
                                                    ?>
                                                    <div class="chat-container">
                                                        <div class="chat-box">
                                                            <div class="message-list" id="chatdiv">
                                                                <?php foreach ($chats as $row) {
                                                                    $whois = $row['whois']; ?>

                                                                    <!-- Admin's chat message -->
                                                                    <?php if ($whois == "admin") { ?>
                                                                        <div class="d-flex justify-content-end mb-4">
                                                                            <!-- Admin message aligned to the right -->
                                                                            <div class="msg_cotainer_send">
                                                                                <?= $row['chat']; ?>
                                                                                <span
                                                                                    class="msg_time_send"><?= $row['date']; ?></span>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>

                                                                    <!-- User's chat message -->
                                                                    <?php if ($whois == "user") { ?>
                                                                        <div class="d-flex justify-content-start mb-4">
                                                                            <!-- User message aligned to the left -->
                                                                            <div class="msg_cotainer">
                                                                                <?= $row['chat']; ?>
                                                                                <span
                                                                                    class="msg_time"><?= $row['date']; ?></span>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>

                                                                <?php } ?>

                                                            </div>

                                                            <!-- Message Input Area -->
                                                            <div class="message-input">
                                                                <textarea id="chat" class="form-control"
                                                                    placeholder="Type a message..."></textarea>
                                                                <button id="sendBtn" class="send-btn"
                                                                    onclick="newchat();">
                                                                    <i class="fa fa-paper-plane"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <audio id="notification-sound" src="assets/audio/notification.mp3"></audio>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- /.row -->
    </section>

    
    <script>

        // function newchat() {
        //     const chat = document.getElementById("chat")?.value || "";
        //     const userID = document.getElementById("ID")?.value || "";

        //     let hiddenInput = document.getElementById("ID");
        //     let value = hiddenInput.value; // Outputs: "673d8ad501f4b"
        //     console.log(value);

        //     // Debugging step to verify ID and chat message
        //     console.log("Chat Message:", chat);
        //     console.log("User userID:", userID);

        //     if (!chat || !userID) {
        //         document.getElementById("message").innerHTML = "Message or User ID is missing.";
        //         return;
        //     }

        //     $.ajax({
        //         type: 'POST',
        //         url: 'include/ajax',
        //         data: {
        //             chatnow: true,
        //             chat: chat,
        //             ID: userID, // Ensure `ID` is sent correctly
        //         },
        //         success: function (response) {
        //             console.log("Response:", response); // Debugging step to check server response
        //             try {
        //                 const result = JSON.parse(response);
        //                 if (result.status === "success") {
        //                     document.getElementById("message").innerHTML = "Message sent successfully.";
        //                     updatechat();
        //                     document.getElementById("chat").value = ""; // Clear message field
        //                 } else {
        //                     document.getElementById("message").innerHTML = result.message;
        //                 }
        //             } catch (e) {
        //                 console.error("Error in response:", e);
        //                 document.getElementById("message").innerHTML = "An error occurred while processing the message.";
        //             }
        //         },
        //         error: function () {
        //             document.getElementById("message").innerHTML = "An error occurred while sending the message.";
        //         }
        //     });
        // }

        // function updatechat() {
        //     const userID = document.getElementById("ID")?.value || "";

        //     // Validate that the userID exists
        //     if (!userID) {
        //         console.error("User ID is missing for update.");
        //         return;
        //     }

        //     // Send an AJAX GET request to fetch updated chat data
        //     $.ajax({
        //         type: "GET",
        //         url: "include/ajax", // Update with your actual backend handler path
        //         data: {
        //             updatechat: true,
        //             ID: userID, // Adjusted key to match the backend logic
        //         },
        //         success: function (response) {
        //             try {
        //                 // Ensure the response is JSON
        //                 const chats = JSON.parse(response);

        //                 let chatHtml = '';
        //                 chats.forEach(chat => {
        //                     if (chat.whois === "admin") {
        //                         chatHtml += `<div class="d-flex justify-content-start mb-4">
        //                                  <div class="msg_cotainer">
        //                                      ${chat.chat}
        //                                      <span class="msg_time">${chat.date}</span>
        //                                  </div>
        //                              </div>`;
        //                     } else if (chat.whois === "user") {
        //                         chatHtml += `<div class="d-flex justify-content-end mb-4">
        //                                  <div class="msg_cotainer_send">
        //                                      ${chat.chat}
        //                                      <span class="msg_time_send">${chat.date}</span>
        //                                  </div>
        //                              </div>`;
        //                     }
        //                 });

        //                 // Update the chat container
        //                 document.getElementById("chatdiv").innerHTML = chatHtml;
        //             } catch (e) {
        //                 // Log the error and the response for debugging
        //                 console.error("Error in updatechat response:", e);
        //                 console.error("Server response:", response);
        //                 document.getElementById("chatdiv").innerHTML = "<p>An error occurred while updating the chat.</p>";
        //             }
        //         },
        //         error: function (xhr, status, error) {
        //             console.error("Failed to update chat. Status:", status, "Error:", error);
        //         }
        //     });
        // }
</script>




    