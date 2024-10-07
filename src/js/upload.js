$(document).ready(function () {
  // Handle file upload and show progress
  $("#file").change(function (e) {
    let file = e.target.files[0];

    // Check if file is Excel or CSV
    if (
      file &&
      (file.name.endsWith(".xls") ||
        file.name.endsWith(".xlsx") ||
        file.name.endsWith(".csv"))
    ) {
      let fileName = file.name; // Get the file name
      $("#file-name").text(fileName); // Update the displayed file name
      $(".file-upload-container")
        .addClass("animate-fade-in")
        .removeClass("opacity-0");

      let progress = 0;
      let interval = setInterval(function () {
        if (progress >= 100) {
          clearInterval(interval);
        } else {
          progress += 5;
          $(".upload-progress").css("width", progress + "%");
        }
      }, 200); // Simulate progress speed
    } else {
      alert("Please upload a valid Excel or CSV file (.xls, .xlsx, or .csv).");
      $("#file").val(""); // Reset file input
      $("#file-name").text("No file selected"); // Reset displayed file name
      $(".file-upload-container").addClass("opacity-0");
      $(".upload-progress").css("width", "0%"); // Reset progress bar
    }
  });

  // Handle file removal
  $(".remove-file").click(function () {
    $("#file").val(""); // Clear file input
    $("#file-name").text("No file selected"); // Reset file name display
    $(".file-upload-container").addClass("opacity-0"); // Hide container
    $(".upload-progress").css("width", "0%"); // Reset progress bar
  });
});
