// Full Screean
$("#fullscreenBtn").on("click", function () {
  const $gridElement = $(".grid");

  const $tabelDataDiv = $(".w-full.p-10").eq(1);

  const $iconElement = $(this).find("i");

  if ($gridElement.hasClass("md:grid-cols-2")) {
    $gridElement.removeClass("md:grid-cols-2").addClass("grid-cols-1");
    $tabelDataDiv.addClass("hidden");
    $iconElement
      .removeClass("ri-arrow-right-fill")
      .addClass("ri-arrow-left-fill");
  } else {
    $gridElement.removeClass("grid-cols-1").addClass("md:grid-cols-2");
    $tabelDataDiv.removeClass("hidden");
    $iconElement
      .removeClass("ri-arrow-left-fill")
      .addClass("ri-arrow-right-fill");
  }
});
// Hidden table
$(document).ready(function () {
  if (localStorage.getItem("tableHidden") === "true") {
    $("#data-table").hide();
  }

  $("#hidden-btn").on("click", function () {
    $("#data-table").toggle();

    if ($("#data-table").is(":visible")) {
      localStorage.setItem("tableHidden", "false");
    } else {
      localStorage.setItem("tableHidden", "true");
    }
  });
});

// Table
$(document).ready(function () {
  $("#data-soal").DataTable({
    lengthMenu: [
      [5, 10, -1],
      [5, 10, "All"],
    ],
    language: {
      lengthMenu: "_MENU_",
      search: "",
    },
  });
});

// $("#audio-btn").on("click", function () {
//   const audio = $("#hidden-audio")[0];

//   if (audio.paused) {
//     audio.play();
//     $(this).text("Pause Audio");
//   } else {
//     audio.pause();
//     $(this).text("Play Audio");
//   }
// });

// $(document).on('click', function() {
//     // Menampilkan alert login menggunakan SweetAlert
//     Swal.fire({
//         title: 'Login Required',
//         text: 'Please login to access this page',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonText: 'Login',
//         cancelButtonText: 'Cancel',
//     }).then((result) => {
//         if (result.isConfirmed) {
//             // Jika pengguna memilih untuk login, alihkan ke halaman login
//             window.location.href = 'login.html'; // Ganti dengan URL halaman login kamu
//         }
//     });
// });
