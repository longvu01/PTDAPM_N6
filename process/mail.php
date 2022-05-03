<?php
    if(isset($_POST['submit'])) {
        $contact = $_POST['contact'];
        $gender = $_POST['gender'];

        $errorEmpty = false;
        $errorEmail = false;

        if(empty($contact)) {
            echo"<script>alert('Hãy nhập địa chỉ email!')</script>";
            $errorEmpty = true;
        } elseif (!filter_var($contact, FILTER_VALIDATE_EMAIL)) {
            echo"<script>alert('Vui lòng nhập email hợp lệ!')</script>";
            $errorEmail = true;
        } else {
            echo"<script>alert('Bạn đã đăng ký thành công!')</script>";
        }
    } else {
        echo "There was an error!";
    }
?>
<script>
    $("#mail-contact").classList.remove("red-shadow");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";

    if(errorEmpty) {
        $("#mail-contact").classList.add("red-shadow");
    }
    if(errorEmail) {
        $("#mail-contact").classList.add("red-shadow");
    }
    if(!errorEmpty && !errorEmail) {
        $("#mail-contact").value = "";
    }
</script>