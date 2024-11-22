const chatIcon = document.getElementById("chat-icon");
const chatBox = document.getElementById("chat-box");

chatIcon.addEventListener("click", toggleChatBox);

function toggleChatBox() {
    if (chatBox.style.display === "none" || chatBox.style.display === "") {
        chatBox.style.display = "flex"; // Open the chat box
    } else {
        chatBox.style.display = "none"; // Close the chat box
    }
}

function showDetailsForm() {
    const detailsForm = document.getElementById("details-form");
    // Toggle visibility of the form
    if (detailsForm.style.display === "none" || detailsForm.style.display === "") {
        detailsForm.style.display = "block";
    } else {
        detailsForm.style.display = "none";
    }
}

function submitDetails() {
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;

    if (email.trim() === "") {
        alert("Email is required!");
        return;
    }

    console.log("Name:", name);
    console.log("Email:", email);
    alert("Details submitted successfully!");
}

