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

  $("#edit-btn").click(function () {
    let url = window.location.href;
    url = url.substring(0, url.lastIndexOf("/"));
    window.location.href = url + "/edit.php?id=" + $("#postID").val();
  });
});
