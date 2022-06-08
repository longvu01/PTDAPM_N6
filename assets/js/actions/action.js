jQuery(document).ready(function ($) {
  $('.product_check').click(function () {
    $('#loader').show();

    var action = 'data';

    var cid = document.getElementById('cid').value;

    var brand = get_filter_text('cate_brand');
    var price = get_filter_text('cate_price');
    var demand = get_filter_text('cate_demand');
    var cpu = get_filter_text('cate_cpu');
    var ram = get_filter_text('cate_ram');
    var hard_drive = get_filter_text('cate_hd');
    var vga = get_filter_text('cate_vga');
    var dvdrw = get_filter_text('cate_dvdrw');
    var screen_hd = get_filter_text('cate_sc_hd');
    var screen_hz = get_filter_text('cate_sc_hz');
    var os = get_filter_text('cate_os');
    var insurance = get_filter_text('cate_insurance');
    /*  */
    var new_product = get_filter_text('cate_new');
    var high_view = get_filter_text('cate_high-view');
    var much_lower = get_filter_text('cate_much-lower');
    var price_upper = get_filter_text('cate_price-upper');
    var price_lower = get_filter_text('cate_price-lower');
    /*  */
    var page = window.location.toString();

    $.ajax({
      url: './actions/action.php',
      method: 'POST',
      data: {
        action,
        cid,
        brand,
        price,
        demand,
        cpu,
        ram,
        hard_drive,
        vga,
        dvdrw,
        screen_hd,
        screen_hz,
        os,
        insurance,
        new_product,
        high_view,
        much_lower,
        price_upper,
        price_lower,
        page,
      },
      success: function (response) {
        $('#cate_res').html(response);
        $('#loader').hide();
        $('#textChange').text('Filterd Products');
      },
    });
  });

  function get_filter_text(text_id) {
    var filterData = [];
    $('#' + text_id + ':checked').each(function () {
      filterData.push($(this).val());
    });
    return filterData;
  }
});
