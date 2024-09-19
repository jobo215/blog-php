$(document).ready(function () {
  var passwordRegex = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?!-*\.).{8,}$/;

  $("#register-button").click(function () {
    let hasErrors = false;
    let password = $("#password").val();
    if (!passwordRegex.test(password)) {
      $("#password-error")
        .text(
          "Password must be eight characters including one uppercase letter, alphanumeric characters and special character!"
        )
        .css("display", "block");
      hasErrors = true;
    } else {
      let rePassword = $("#re-password").val();
      if (password !== rePassword) {
        $("#password-error")
          .text("Passwords do not match!")
          .css("display", "block");
        hasErrors = true;
      }
    }
    if (!hasErrors) {
      $("#register-form").submit();
    }
  });
});
