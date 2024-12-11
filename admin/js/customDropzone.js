// Disable automatic Dropzone initialization
Dropzone.autoDiscover = false;

// Initialize Dropzone
const customDropzone = new Dropzone("#customDropzone", {
    url: "index?p=file_upload&transid=<?= $id ?>&userID=<?= isset($_GET['userID']) ? htmlspecialchars($_GET['userID']) : ''; ?>", // Upload URL
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 5, // Max file size in MB
    acceptedFiles: ".jpeg,.jpg,.png,.gif", // Restrict to specific file formats
    uploadMultiple: false, // Single file uploads
    autoProcessQueue: true, // Automatically upload files
    addRemoveLinks: true, // Option to remove files from queue
    dictDefaultMessage: "Drag & drop files or click here to upload",
    dictInvalidFileType: "Invalid file type. Only images are allowed.",
    dictFileTooBig: "File size exceeds limit of 5MB.",
    init: function () {
        this.on("sending", function (file, xhr, formData) {
            console.log("Sending file:", file);
        });

        this.on("success", function (file, response) {
            console.log("File uploaded successfully:", response);
        });

        this.on("error", function (file, errorMessage) {
            console.error("Error during upload:", errorMessage);
        });

        this.on("removedfile", function (file) {
            console.log("File removed:", file.name);
        });
    }
});
