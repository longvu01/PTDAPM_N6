jQuery(document).ready(function ($) {
  $('#form-contact').submit(function (e) {
    e.preventDefault();
    var contact = $('#mail-contact').val();
    var gender = $('#mail-gender').val();
    var submit = $('#mail-submit').val();
    $('.form-message').load('mail.php', {
      contact: contact,
      gender: gender,
      submit: submit,
    });
  });
});
