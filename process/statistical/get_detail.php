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
  id,
  title,
  DATE_FORMAT(products.create_at, '%e-%m') AS 'date',
  SUM(qty_sold) AS 'total_sold'
FROM products
WHERE DATE(products.create_at) >= CURDATE() - INTERVAL 7 DAY
GROUP BY DATE_FORMAT(products.create_at, '%e-%m'), id, title
ORDER BY qty_sold DESC LIMIT 10";
// die($sql);
$result = mysqli_query($conn, $sql);
// Array 1
$arr = [];
foreach ($result as $each) {
  $id = $each['id'];
  if (empty($arr[$id])) {
    $arr[$id] = [
      'name' => $each['title'],
      'y' => (int)$each['total_sold'],
      'drilldown' => (int)$each['id'],
    ];
  } else {
    $arr[$id]['y'] += $each['total_sold'];
  }
}
// Array 2
$arr2 = [];
foreach ($arr as $id => $each) {
  $arr2[$id] = [
    'name' => $each['name'],
    'id' => $id,
  ];

  if (isset($start_day_of_last_month)) {
    for ($i = $start_day_of_last_month; $i <= $max_day_of_last_month; ++$i) {
      $key = $i . '-' . $last_month;
      $arr2[$id]['data'][$key] = [
        $key,
        0
      ];
    }
  }

  for ($i = $start_day_of_cur_month; $i <= $today; ++$i) {
    $key = $i . '-' . $cur_month;
    $arr2[$id]['data'][$key] = [
      $key,
      0
    ];
  }
}

foreach ($result as $each) {
  $id = $each['id'];
  $key = $each['date'];
  $arr2[$id]['data'][$key] = [
    $key,
    (int)$each['total_sold']
  ];
}

echo json_encode([$arr, $arr2]);
