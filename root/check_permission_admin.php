<?php
if (($_SESSION['role']) != 1 || ($_SESSION['id']) != 1) {
  $_SESSION['info_title'] = "Thông báo!";
  $_SESSION['info_message'] = "Bạn không có quyền để thực hiện chức năng này!";
  $_SESSION['info_type'] = "warning";

  header('Location: ../');
  exit;
}
