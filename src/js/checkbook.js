document.getElementById("select-all").addEventListener("click", function () {
  let checkboxes = document.querySelectorAll(".checkbox-item");
  checkboxes.forEach((checkbox) => (checkbox.checked = this.checked));
  toggleDeleteButton();
});

document.querySelectorAll(".checkbox-item").forEach((checkbox) => {
  checkbox.addEventListener("click", toggleDeleteButton);
});

function toggleDeleteButton() {
  let selected = document.querySelectorAll(".checkbox-item:checked");
  document.getElementById("delete-btn").disabled = selected.length === 0;
}

function deleteSelected() {
  let ids = [];
  document.querySelectorAll(".checkbox-item:checked").forEach((checkbox) => {
    ids.push(checkbox.getAttribute("data-id"));
  });

  if (ids.length > 0) {
    let form = document.getElementById("delete-form");

    // Clear existing hidden inputs
    form
      .querySelectorAll('input[name="ids[]"]')
      .forEach((input) => input.remove());

    // Create hidden input for each selected ID
    ids.forEach((id) => {
      let input = document.createElement("input");
      input.type = "hidden";
      input.name = "ids[]";
      input.value = id;
      form.appendChild(input);
    });

    form.submit();
  }
}
