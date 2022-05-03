$("form").submit(function (event) {
  var formdata = new FormData(this);
  $.ajax({
    url: "add.php",
    data: formdata,
    contentType: false,
    cache: false,
    processData: false,
    type: "POST",
    success: function (response) {
      alert(response);
    },
    error: function () {
      alert("Something's wrong!");
    },
  });
  event.preventDefault();
});
