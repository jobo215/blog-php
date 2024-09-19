$(document).ready(function () {
  const elements = $(".card-content");
  elements.each((index, value) => {
    let elementText = $(value).text();
    if (elementText.length > 100) {
      $(value).text(elementText.substring(0, 100) + "...");
    }
  });

  $("#categoryDropdown").on("change", function () {
    let baseUrl = window.location.href.split("?")[0];
    if (this.value === "") {
      window.location.href = baseUrl;
    } else {
      window.location.href = baseUrl + "?category=" + this.value;
    }
  });
});
