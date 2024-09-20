$(document).ready(function () {
  $("#delete-btn").click(function () {
    $("#deleteOverlay").css("display", "block");
  });

  $("#cancel-btn").click(function () {
    $("#deleteOverlay").css("display", "none");
  });

  $("#overlay-delete").click(function () {
    $("#delete-form").submit();
  });
});
