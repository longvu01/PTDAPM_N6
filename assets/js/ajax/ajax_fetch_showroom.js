jQuery(document).ready(function ($) {
  var showroomCount = 2;
  $('#show_more').click(function () {
    showroomCount += 2;
    $('#showrooms').load('../process/load-showrooms.php', {
      showroomNewCount: showroomCount,
    });
  });
});
