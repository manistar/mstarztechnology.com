


<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="foo" enctype="multipart/form-data" onsubmit="return false">
        <div class="modal-body" id="modal-body">
          <p>
            Please wait...
          </p>
        </div>
      </form>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary" onclick="addsubcat()">Save changes</button> -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script src="plugins/select2/js/select2.full.min.js"></script>

<script language="JavaScript">
  function checkall(source) {
    checkboxes = document.getElementById(source);
    for (var i = 0, n = checkboxes.length; i < n; i++) {
      checkboxes[i].checked = source.checked;
    }
  }
</script>
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $('#simpletable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });

  });

  function showmoreDiv(divId, element) {
    document.getElementById(divId).style.display = element.value == "weekly" ? 'block' : 'none';
  }
</script>

<script>
  $(document).ready(function() {
    $('input[type="radio"]').click(function() {
      var inputValue = $(this).attr("value");
      var targetBox = $("." + inputValue);
      $(".box").not(targetBox).hide();
      $(targetBox).show();
    });
  });

  // image preview
  imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
      blah.src = URL.createObjectURL(file)
    }
  }
</script>
<!-- <script src="../js/address.js"></script> -->
<script>
  function switchtab(show, hide) {
      document.getElementById(show).style.display = "block";
      document.getElementById(hide).style.display = "none";
  }
</script>



<script>

function newchat() {
    const chat = document.getElementById("chat")?.value || "";
    const userID = document.getElementById("ID")?.value || "";

    // Debugging: Verify inputs
    console.log("Chat Message:", chat);
    console.log("User ID:", userID);

    if (!chat || !userID) {
        document.getElementById("message").innerHTML = "Message or User ID is missing.";
        return;
    }

    $.ajax({
        type: 'POST',
        url: 'include/ajax',
        data: {
            chatnow: true,
            chat: chat,
            userID: userID, // Ensure correct key matches backend expectations
        },
        success: function (response) {
            console.log("Response:", response); // Debug server response
            try {
                const result = JSON.parse(response);
                if (result.status === "success") {
                    document.getElementById("message").innerHTML = "Message sent successfully.";
                    updatechat();
                    document.getElementById("chat").value = ""; // Clear input
                } else {
                    document.getElementById("message").innerHTML = result.message;
                }
            } catch (e) {
                console.error("Error parsing response:", e);
                document.getElementById("message").innerHTML = "An error occurred while processing the response.";
            }
        },
        error: function () {
            document.getElementById("message").innerHTML = "An error occurred while sending the message.";
        }
    });
}



function updatechat() {
    const userID = document.getElementById("ID")?.value || "";

    if (!userID) {
        console.error("User ID is missing for update.");
        return;
    }

    $.ajax({
        type: "GET",
        url: "include/ajax",
        data: { updatechat: true, ID: userID },
        success: function (response) {
            console.log("Raw Response:", response); // Debugging
            document.getElementById("chatdiv").innerHTML = response;

            try {
                const result = JSON.parse(response);

                if (result.status === "success") {
                    const chats = result.chats || [];
                    let chatHtml = "";

                    chats.forEach(chat => {
                        chatHtml += chat.whois === "admin"
                            ? `<div class="d-flex justify-content-start mb-4">
                                    <div class="msg_cotainer">
                                        ${chat.chat}
                                        <span class="msg_time">${chat.date}</span>
                                    </div>
                               </div>`
                            : `<div class="d-flex justify-content-end mb-4">
                                    <div class="msg_cotainer_send">
                                        ${chat.chat}
                                        <span class="msg_time_send">${chat.date}</span>
                                    </div>
                               </div>`;
                    });

                    document.getElementById("chatdiv").innerHTML = chatHtml;
                    const userStatus = result.userStatus || "offline";
                    document.getElementById("userStatus").innerHTML = userStatus === "online" ? "Online" : "Offline";
                } else {
                    console.warn("No chats available.");
                    document.getElementById("chatdiv").innerHTML = "<p>No chats available.</p>";
                }
            } catch (e) {
                console.error("Error parsing response:", e);
                document.getElementById("chatdiv").innerHTML;
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", status, error);
            document.getElementById("chatdiv").innerHTML = "<p>An error occurred while updating the chat.</p>";
        }
    });
}

  // Automatically update the chat every second if an ID is present
  

//   function updatechat() {
//     const userID = document.getElementById("ID")?.value || "";

//     // Validate that userID exists
//     if (!userID) {
//         console.error("User ID is missing for update.");
//         return;
//     }

//     $.ajax({
//         type: "GET",
//         url: "include/ajax", // Replace with actual backend handler path
//         data: {
//             updatechat: true,
//             ID: userID, // Ensure proper key for backend
//         },
//         success: function (response) {
//             try {
//                 // Parse the response from the backend
//                 const result = JSON.parse(response);

//                 if (result.status === "success") {
//                     // Assuming result.chats contains the chat array
//                     const chats = result.chats;
//                     let chatHtml = "";

//                     // Build chat messages HTML
//                     chats.forEach(chat => {
//                         if (chat.whois === "admin") {
//                             chatHtml += 
//                                 <div class="d-flex justify-content-start mb-4">
//                                     <div class="msg_cotainer">
//                                         ${chat.chat}
//                                         <span class="msg_time">${chat.date}</span>
//                                     </div>
//                                 </div>;
//                         } else if (chat.whois === "user") {
//                             chatHtml += 
//                                 <div class="d-flex justify-content-end mb-4">
//                                     <div class="msg_cotainer_send">
//                                         ${chat.chat}
//                                         <span class="msg_time_send">${chat.date}</span>
//                                     </div>
//                                 </div>;
//                         }
//                     });

//                     // Update the chat container
//                     document.getElementById("chatdiv").innerHTML = chatHtml;

//                     // Optionally update user status (e.g., Online/Offline)
//                     const userStatus = result.userStatus; // Expecting backend to send userStatus
//                     document.getElementById("userStatus").innerHTML = userStatus === "online" ? "Online" : "Offline";
//                 } else {
//                     // Handle case when no chats are available
//                     document.getElementById("chatdiv").innerHTML = "<p>No chats available.</p>";
//                 }
//             } catch (e) {
//                 console.error("Error parsing updatechat response:", e);
//                 console.error("Server response:", response);
//                 document.getElementById("chatdiv").innerHTML = "<p>An error occurred while updating the chat.</p>";
//             }
//         },
//         error: function (xhr, status, error) {
//             console.error("Failed to update chat. Status:", status, "Error:", error);
//             document.getElementById("chatdiv").innerHTML = "<p>An error occurred while updating the chat.</p>";
//         }
//     });
// }
  

// Automatically update the chat every second if an ID is present

  
  $(document).ready(function () {
            const userID = document.getElementById("ID")?.value;
            if (userID) {
                setInterval(function () {
                    updatechat();
                }, 1000); // Update chat every second
            } else {
                console.warn("User ID is missing, auto-update disabled.");
            }
        });


        document.addEventListener('DOMContentLoaded', function () {
            // Auto scroll to the bottom of the chat
            const chatDiv = document.getElementById('chatdiv');
            chatDiv.scrollTop = chatDiv.scrollHeight;

            // Function to send a new chat message
            document.getElementById('sendBtn').addEventListener('click', function () {
                const messageInput = document.getElementById('chat');
                const message = messageInput.value.trim();
                if (message) {
                    // For now, append the message to the chat div (this should be sent to the server in a real app)
                    const messageElement = document.createElement('div');
                    messageElement.classList.add('message', 'user');
                    messageElement.innerHTML = `
                <div class="message-content">${message}</div>
                <div class="message-time">${new Date().toLocaleTimeString()}</div>
            `;
                    chatDiv.appendChild(messageElement);

                    // Clear the input field and auto scroll
                    messageInput.value = '';
                    chatDiv.scrollTop = chatDiv.scrollHeight;
                }
            });
        });
</script>
<script src="js/my.js"></script>
<script src="js/myjs.js"></script>  

