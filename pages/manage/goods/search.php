<?php
session_start();
require_once("../../../libs/lib_db.php");

$q = isset($_REQUEST["q"]) ? $_REQUEST["q"] : '';
$qsessionname = "___Q___";
if (!isset($_REQUEST["q"])) {
  $q = isset($_SESSION[$qsessionname]) ? $_SESSION[$qsessionname] : '';
} else {
  $_SESSION[$qsessionname] = $q;
}
$cond = "";
$searchfields = array("", "");
if ($q) {
  $sq = sql_str($q);
  $cond = "where ";
  $cond .= " (title like '%{$sq}%') ";
  $cond .= " or (product_info like '%{$sq}%') ";
  $cond .= " or (description like '%{$sq}%') ";
}
// print_r($_SESSION);
$sql = "select * from products {$cond} order by id limit 6 ";
// echo $sql;exit();
//thuc thi cau lenh sql
$result = select_list($sql);
// print_r($result);exit();

$sql = "select * from categories";
$result_parents = select_list($sql);
$sql = 'SELECT * FROM products ORDER BY id DESC LIMIT 1';
$resultLast = select_one($sql);
if (isset($_SESSION['account'])) {
  $user = $_SESSION['account'];
}
if ($user['role'] == 0) {
  header("location: ../../");
}
?>

<!-- Start HTML -->
<?php require_once('../../../root/manage/top.php') ?>
<?php top('Tìm kiếm bình luận') ?>
</head>

<body>
  <div id="toast"></div>
  <?php require_once('../../../root/manage/header.php') ?>

  <!-- SEARCH -->
  <div class="search__main wrapper">
    <h1>Quản lý sản phẩm</h1>
    <hr>
    <form method="GET" action="search.php">
      <input name="q" value="<?php echo $q ?>" placeholder="Nhập thông tin sản phẩm cần tìm kiếm" />
      <button>Tìm kiếm</button>
    </form>
    <table>
      <tr>
        <th>Id</th><!--  -->
        <th>Title</th>
        <th>Product Code</th>
        <th>Product Info</th>
        <th>Start price</th>
        <th>Price</th>
        <th>Sale</th>
        <th>Insurance</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      <?php foreach ($result as $item) { ?>
        <tr>
          <td><?php echo $item['id']; ?></td>
          <td><?php echo $item['title']; ?></td>
          <td><?php echo $item['product_code']; ?></td>
          <td><?php echo $item['product_info']; ?></td>
          <td><?php echo $item['start_price']; ?></td>
          <td><?php echo number_format($item['price'], 0, '.', '.') . 'đ' ?></td>
          <td><?php echo $item['sale']; ?></td>
          <td><?php echo $item['insurance']; ?></td>
          <td><?php echo $item['description']; ?></td>
          <td><a href="update.php?id=<?php echo $item['id']; ?>"><i class="far fa-edit"></i></a></td>
          <td><a href="delete.php?id=<?php echo $item['id']; ?>"><i class="far fa-trash-alt"></i></a></td>
        </tr>
      <?php } ?>
    </table>
    <br />
    <br />
    <div class="exec__more">
      <ul>
        <li><a href="./"><i class="fas fa-plus"></i></a></li>
      </ul>
    </div>
  </div>

  <?php require_once('../../../root/manage/bottom.php') ?>

  <script src="js/all.js"></script>
  <?php require_once('../../../root/show_toast.php'); ?>

</body>

</html>