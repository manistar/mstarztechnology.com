function updateUserCount(){
    chat = document.getElementById("messageCount").value;
    // userID = document.getElementById("adminSession").value;
  // document.getElementById("messageCount").innerHTML = response;
    $.ajax({
      type: 'GET',
      url: 'include/ajaxNotCount',
      dataType: 'json', // Specify the expected response type
      success: function (response) {
        
        updatechat();
        // document.getElementById("messageCount").value = "";
      }
    });
  }
  // Call the function to update the user count every 10 seconds
  setInterval(updateUserCount, 10000);
  $(document).ready(function() {
    updateUserCount(); // Initial call to set the count immediately on page load
  });