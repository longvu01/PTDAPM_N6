<?php
session_start();
require_once("../../../libs/lib_db.php");

$q = isset($_REQUEST["q"]) ? $_REQUEST["q"] : "";
$q = intval($q);
// echo $q;
$qsessionname = "___Q___";
if (!isset($_REQUEST["q"])) {
  $q = isset($_SESSION[$qsessionname]) ? $_SESSION[$qsessionname] : '';
} else {
  $_SESSION[$qsessionname] = $q;
}
$cond = "";
$searchfields = array("", "");
// print_r($_SESSION);
$sql = "select * from review_table where pid = {$q}";
// die($sql);
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
  header("../../");
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
    <h1>Xóa bình luận/ đánh giá</h1>
    <hr>
    <form method="GET" action="cmt_search.php">
      <input name="q" value="<?php echo $q ?>" placeholder="Id bài cần xóa comment" />
      <button>Search (cid)</button>
    </form>
    <table>
      <tr>
        <th>Review_id</th><!--  -->
        <th>User id</th>
        <th>User rating</th>
        <th>User review</th>
        <th>Date time</th>
        <th>Delete</th>
      </tr>
      <?php
      if (isset($result)) {
        foreach ($result as $item) { ?>
          <tr>
            <td><?php echo $item['review_id']; ?></td>
            <td><?php echo $item['user_id']; ?></td>
            <td><?php echo $item['user_rating']; ?></td>
            <td><?php echo $item['user_review']; ?></td>
            <td><?php echo date('l, F d y h:i:s', $item['datetime']) ?></td>
            <td><a href="./process/cmt_del.php?id=<?php echo $item['review_id']; ?>"><i class="fas fa-comment-slash"></a></td>
          </tr>
      <?php
        }
      } ?>
    </table>
  </div>

  <?php require_once('../../../root/manage/bottom.php') ?>

  <!--  -->
  <script src="../../../assets/js/all.js"></script>
  <script src="../../../assets/js/toast_msg.js"></script>
  <?php require_once('../../../root/show_toast.php'); ?>
</body>

</html>