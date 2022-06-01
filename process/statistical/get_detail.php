<?php
require_once("../../connect.php");
require_once("../../root/decode_ajax.php");

$max_date = $decoded['days'];

if ($max_date != 7) $max_date = 7;

$cur_month = date('m');
$today = date('d');
if ($today < $max_date) {
  // Last month
  $qty_day_last_month = $max_date - $today;
  $last_month = date('m', strtotime(" -1 month"));
  $last_month_date = date('Y-m-d', strtotime(" -1 month"));
  $max_day_of_last_month = (new DateTime($last_month_date))->format('t');
  $start_day_of_last_month = $max_day_of_last_month - $qty_day_last_month;

  $start_day_of_cur_month = 1;
} else {
  $start_day_of_cur_month = $today - $max_date;
}

// Query
$sql = "SELECT
  ma,
  ten_hang,
  DATE_FORMAT(hang_hoa.create_at, '%e-%m') AS 'date',
  SUM(so_luong_da_ban) AS 'tong_ban'
FROM hang_hoa
WHERE DATE(hang_hoa.create_at) >= CURDATE() - INTERVAL 7 DAY
GROUP BY DATE_FORMAT(hang_hoa.create_at, '%e-%m'), ma, ten_hang
ORDER BY so_luong_da_ban DESC LIMIT 10";
// die($sql);
$result = mysqli_query($conn, $sql);
// Array 1
$arr = [];
foreach ($result as $each) {
  $ma = $each['ma'];
  if (empty($arr[$ma])) {
    $arr[$ma] = [
      'name' => $each['ten_hang'],
      'y' => (int)$each['tong_ban'],
      'drilldown' => (int)$each['ma'],
    ];
  } else {
    $arr[$ma]['y'] += $each['tong_ban'];
  }
}
// Array 2
$arr2 = [];
foreach ($arr as $ma => $each) {
  $arr2[$ma] = [
    'name' => $each['name'],
    'id' => $ma,
  ];

  if (isset($start_day_of_last_month)) {
    for ($i = $start_day_of_last_month; $i <= $max_day_of_last_month; ++$i) {
      $key = $i . '-' . $last_month;
      $arr2[$ma]['data'][$key] = [
        $key,
        0
      ];
    }
  }

  for ($i = $start_day_of_cur_month; $i <= $today; ++$i) {
    $key = $i . '-' . $cur_month;
    $arr2[$ma]['data'][$key] = [
      $key,
      0
    ];
  }
}

foreach ($result as $each) {
  $ma = $each['ma'];
  $key = $each['date'];
  $arr2[$ma]['data'][$key] = [
    $key,
    (int)$each['tong_ban']
  ];
}

echo json_encode([$arr, $arr2]);
