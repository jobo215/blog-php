$(document).ready(function () {
  const elements = $(".card-content");
  elements.each((index, value) => {
    let elementText = $(value).text();
    console.log(elementText);
    if (elementText.length > 100) {
      $(value).text(elementText.substring(0, 100) + "...");
    }
  });
});
