<?php
require_once("../connect.php");
$showroomNewCount = $_POST['showroomNewCount'];
$sql = "SELECT * FROM showrooms LIMIT $showroomNewCount";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col-xl-3 col-md-4 info-col">';
        echo '<h2 class="info__location info__location--active">';
        echo '<span>' . $row['id'] . '</span>' . $row['name'] . '</h2>';
        echo '<h3 class="fw-bold"><i class="fas fa-map-marker-alt"></i> ';
        echo $row['location'] . '</h3>';
        echo '<a href="#"><i class="far fa-images"></i> Hình ảnh thực tế showroom</a>';
        echo '<a href="#"><i class="far fa-map"></i> Xem bản đồ đường đi</a>';
        echo '<a href="tel:' . substr($row['contacts'], 5, 9) . '">' . '';
        echo '<i class="fas fa-phone-alt"></i> ';
        echo $row['contacts'] . '</a>';
        echo '<a href="tel:' . substr($row['insurance'], 13, 9) . '">' . '';
        echo '<i class="fas fa-phone-alt"></i> ';
        echo $row['insurance'] . '</a>';
        echo '<a href="mailto:' . substr($row['email'], 7) . '">' . '';
        echo '<i class="far fa-envelope"></i> ';
        echo $row['email'] . '</a>';
        echo '<p><i class="far fa-clock"></i>';
        echo $row['open_time'] . '</p>';
        echo '</div>';
    }
} else {
    echo "no more";
}
