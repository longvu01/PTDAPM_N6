jQuery(document).ready(function ($) {
  $(".product_check").click(function () {
    $("#loader").show();

    var action = "data";
    var brand = get_filter_text("search_brand");
    var price = get_filter_text("search_price");
    var demand = get_filter_text("search_demand");
    var cpu = get_filter_text("search_cpu");
    var ram = get_filter_text("search_ram");
    var hard_drive = get_filter_text("search_hd");
    var vga = get_filter_text("search_vga");
    var dvdrw = get_filter_text("search_dvdrw");
    var screen_hd = get_filter_text("search_sc_hd");
    var screen_hz = get_filter_text("search_sc_hz");
    var os = get_filter_text("search_os");
    var insurance = get_filter_text("search_insurance");
    /*  */
    var new_product = get_filter_text("cate_new");
    var high_view = get_filter_text("cate_high-view");
    var much_lower = get_filter_text("cate_much-lower");
    var price_upper = get_filter_text("cate_price-upper");
    var price_lower = get_filter_text("cate_price-lower");
    /*  */
    var sql_search = window.location.toString();
    $.ajax({
      url: "action-search.php",
      method: "POST",
      data: {
        action: action,
        brand: brand,
        price: price,
        demand: demand,
        cpu: cpu,
        ram: ram,
        hard_drive: hard_drive,
        vga: vga,
        dvdrw: dvdrw,
        screen_hd: screen_hd,
        screen_hz: screen_hz,
        os: os,
        insurance: insurance,
        new_product: new_product,
        high_view: high_view,
        much_lower: much_lower,
        price_upper: price_upper,
        price_lower: price_lower,
        sql_search: sql_search,
      },
      success: function (response) {
        $("#search_res").html(response);
        $("#loader").hide();
        $("#textChange").text("Filterd Products");
      },
    });
  });

  function get_filter_text(text_id) {
    var filterData = [];
    $("#" + text_id + ":checked").each(function () {
      filterData.push($(this).val());
    });
    return filterData;
  }
});
