jQuery(document).ready(function ($) {
  var rating_data = 4;

  $('#add_review').click(function () {
    $('#review_modal').modal('show');
  });

  $(document).on('mouseenter', '.submit_star', function () {
    var rating = $(this).data('rating');
    reset_background();

    for (var count = 2; count <= rating; count++) {
      $('#submit_star_' + count).addClass('text-danger');
    }
  });

  $(document).on('mouseleave', '.submit_star', function () {
    reset_background();

    for (var count = 2; count <= rating_data; count++) {
      $('#submit_star_' + count).addClass('text-danger');
    }
  });

  function reset_background() {
    for (var count = 2; count <= 5; count++) {
      $('#submit_star_' + count).removeClass('text-danger');
    }
  }

  $(document).on('click', '.submit_star', function () {
    rating_data = $(this).data('rating');
  });
  /* ----- */
  $('#save_review').click(function () {
    var user_id = $('#user_id').val();
    var user_review = $('#user_review').val();
    var product_id = $('#product_id').val();
    if (!user_id) {
      alert('Bạn chưa đăng nhập');
      return false;
    } else if (user_review.trim() === '') {
      alert('Bạn chưa nhập đánh giá');
      return false;
    } else {
      $.ajax({
        url: '../process/submit_rating.php',
        method: 'POST',
        data: {
          rating_data,
          user_id,
          user_review,
          product_id,
        },
        success: function (data) {
          $('#review_modal').modal('hide');

          load_rating_data();

          alert(data);
        },
      });
    }
  });

  /*  */
  load_rating_data();
  /*  */
  function load_rating_data() {
    var product_id = $('#product_id').val();
    $.ajax({
      url: '../process/submit_rating.php',
      method: 'POST',
      data: { action: 'load data', product_id: product_id },
      dataType: 'JSON',
      success: function (data) {
        $('#average_rating').text(data.average_rating);
        $('#total_review').text(data.total_review);

        var count_star = 0;
        $('.main_star').each(function () {
          count_star++;
          if (Math.ceil(data.average_rating) >= count_star) {
            $(this).addClass('text-danger');
          }
        });

        $('#total_five_star_review').text(data.five_star_review);
        $('#total_four_star_review').text(data.four_star_review);
        $('#total_three_star_review').text(data.three_star_review);
        $('#total_two_star_review').text(data.two_star_review);
        $('#total_one_star_review').text(data.one_star_review);

        $('#five_star_progress').css(
          'width',
          (data.five_star_review / data.total_review) * 100 + '%'
        );
        $('#four_star_progress').css(
          'width',
          (data.four_star_review / data.total_review) * 100 + '%'
        );
        $('#three_star_progress').css(
          'width',
          (data.three_star_review / data.total_review) * 100 + '%'
        );
        $('#two_star_progress').css(
          'width',
          (data.two_star_review / data.total_review) * 100 + '%'
        );
        $('#one_star_progress').css(
          'width',
          (data.one_star_review / data.total_review) * 100 + '%'
        );

        if (data.review_data.length > 0) {
          var html = '';

          for (var count = 0; count < data.review_data.length; count++) {
            html += '<div class="row mb-4">';

            html +=
              '<div class="col-sm-1 d-flex justify-content-center"><div class="rounded-circle bg-success text-white pt-2 pb-2 user_avatar"><h3 class="h-100 d-flex fs-1 justify-content-center align-items-center">' +
              data.review_data[count].user_name.charAt(0) +
              '</h3></div></div>';

            html += '<div class="col-sm-11">';

            html += '<div class="card">';

            html +=
              '<div class="card-header fs-1 text-primary"><span>' +
              data.review_data[count].user_name +
              '</span ></div>';

            html += '<div class="card-body fs-4">';

            for (var star = 1; star <= 5; star++) {
              var class_name = '';

              if (data.review_data[count].rating >= star) {
                class_name = 'text-danger';
              } else {
                class_name = 'star-light';
              }

              html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
            }

            html += '<br />';
            /* User review content */
            html += data.review_data[count].user_review;

            html += '</div>';

            html +=
              '<div class="card-footer text-end fs-4">On ' +
              data.review_data[count].datetime +
              '</div>';

            html += '</div>';

            html += '</div>';

            html += '</div>';
          }

          $('#review_content').html(html);
        }
      },
    });
  }
});
