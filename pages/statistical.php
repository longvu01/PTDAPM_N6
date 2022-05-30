<?php
session_start();
require_once("../libs/lib_db.php");

$sql = 'SELECT * FROM categories';
$categories = select_list($sql);
$result_parents = select_list($sql);
$sql = 'SELECT * FROM products ORDER BY id DESC LIMIT 1';
$resultLast = select_one($sql);
$user = null;
if (isset($_SESSION['account'])) {
  $user = $_SESSION['account'];
}
?>

<!-- Start HTML -->
<?php require_once('../root/top.php') ?>
<?php top('Thống kê số lượng') ?>
<link rel='stylesheet' href='../process/statistical/css/chart_full.css'>
<link rel='stylesheet' href='../process/statistical/css/chart_detail.css'>
<!-- Chart full -->
<script defer src="https://code.highcharts.com/highcharts.js"></script>
<script defer src="https://code.highcharts.com/modules/series-label.js"></script>
<script defer src="https://code.highcharts.com/modules/exporting.js"></script>
<script defer src="https://code.highcharts.com/modules/export-data.js"></script>
<script defer src="https://code.highcharts.com/modules/accessibility.js"></script>
<!-- Chart detail -->
<script defer src="https://code.highcharts.com/modules/data.js"></script>
<script defer src="https://code.highcharts.com/modules/drilldown.js"></script>
<!--  -->
<script defer src="../process/statistical/js/get_quantity_full.js"></script>
<!-- <script defer src="../process/statistical/js/get_detail.js"></script> -->

</head>

<body>
  <div id="toast"></div>
  <?php require_once('../root/header.php') ?>

  <div class="button-add">

  </div>

  <div class="title">
    <h2>Thống kê số lượng</h2>
  </div>

  <div class="table">
    <div class="wrap">
      <!-- Chart Detail -->
      <!-- <div class="chart-container">
        <figure class="highcharts-figure">
          <div id="container_detail"></div>
        </figure> -->

      <figure class="highcharts-figure">
        <!-- Chart Full -->
        <label for="" class="chart__label">
          Chọn số ngày thống kê:
          <select name="" id="chart__select">
            <option value="7">7</option>
            <option value="30" selected>30</option>
            <option value="60">60</option>
          </select>
        </label>
        <div id="container"></div>
      </figure>
    </div>

  </div>

  <?php require_once('../root/bottom.php') ?>
  <script src="../assets/js/toast_msg.js"></script>
  <?php require_once('../root/show_toast.php') ?>
</body>

</html>