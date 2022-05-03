jQuery(document).ready(function ($) {
  $(".product_check").click(function () {
    $("#loader").show();

    var action = "data";
    var brand = get_filter_text("cate_brand");
    var price = get_filter_text("cate_price");
    var demand = get_filter_text("cate_demand");
    var cpu = get_filter_text("cate_cpu");
    var ram = get_filter_text("cate_ram");
    var hard_drive = get_filter_text("cate_hd");
    var vga = get_filter_text("cate_vga");
    var dvdrw = get_filter_text("cate_dvdrw");
    var screen_hd = get_filter_text("cate_sc_hd");
    var screen_hz = get_filter_text("cate_sc_hz");
    var os = get_filter_text("cate_os");
    var insurance = get_filter_text("cate_insurance");
    var page = window.location.toString();

    $.ajax({
      url: "action.php",
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
        page: page,
      },
      success: function (response) {
        $("#cate_res").html(response);
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
