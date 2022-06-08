jQuery(document).ready(function ($) {
  $('.product_check').click(function () {
    $('#loader').show();

    var action = 'data';
    var q = document.getElementById('q').value;
    var brand = get_filter_text('search_brand');
    var price = get_filter_text('search_price');
    var demand = get_filter_text('search_demand');
    var cpu = get_filter_text('search_cpu');
    var ram = get_filter_text('search_ram');
    var hard_drive = get_filter_text('search_hd');
    var vga = get_filter_text('search_vga');
    var dvdrw = get_filter_text('search_dvdrw');
    var screen_hd = get_filter_text('search_sc_hd');
    var screen_hz = get_filter_text('search_sc_hz');
    var os = get_filter_text('search_os');
    var insurance = get_filter_text('search_insurance');
    /*  */
    var new_product = get_filter_text('cate_new');
    var high_view = get_filter_text('cate_high-view');
    var much_lower = get_filter_text('cate_much-lower');
    var price_upper = get_filter_text('cate_price-upper');
    var price_lower = get_filter_text('cate_price-lower');
    /*  */
    var sql_search = window.location.toString();
    $.ajax({
      url: './actions/action-search.php',
      method: 'POST',
      data: {
        action,
        q,
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
        sql_search,
      },
      success: function (response) {
        $('#search_res').html(response);
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
