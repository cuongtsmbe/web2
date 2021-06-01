<?php if (isset($_GET['url']) && $_GET['url'] == "supplier_watch" && isset($_GET['add_supplier'])) {
?>
    <form method="POST">

        <div class="form-group">
            <label for="exampleFormControlInput1">Tên nhà cung cấp :</label>
            <input type="text" class="form-control" id="name_ncc" placeholder="Nhập tên nhà cung cấp...." name="name_ncc">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Phone :</label>
            <input type="text" class="form-control" id="phone_ncc" placeholder="Nhập số điện thoại nhà cung cấp ...." name="Phone_ncc">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Mail :</label>
            <input type="gmail" class="form-control" id="mail_ncc" placeholder="Nhập  mail. vd abced@gmail.com...." name="mail_ncc">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Address:</label>
            <input type="text" class="form-control" id="add_ncc" placeholder="Nhập địa chỉ nhà cung cấp...." name="address_ncc">
        </div>
        <div class="form-group ">
            <input type="submit" class="form-control " name="add_supplier_ncc" id="add_supplier_ncc" value="Add ">
        </div>
    </form>

<?php } ?>
<?php

if (isset($_POST['add_supplier_ncc'])) {


    if (empty($_POST['name_ncc']) || empty($_POST['Phone_ncc']) || empty($_POST['mail_ncc']) | empty($_POST['address_ncc'])) {
        echo "<script>alert('Không để trống thông tin .')</script>";
    } else {

        $Phone_add_condition = "/^[0][1-9]{8,9}/"; //vd 0123456789
        $gmail_add_condition = "/^[A-Za-z\d]+[\@][a-zA-Z]+[\.]+[a-zA-Z]+/"; //vd abced@gmail.com

        if (!preg_match($Phone_add_condition, $_POST['Phone_ncc'])) {
            echo '<script>alert("phone không đúng.10 số ");</script>';
            exit;
        }
        if (!preg_match($gmail_add_condition, $_POST['mail_ncc'])) {
            echo '<script>alert("mail không đúng. vd abced@gmail.com");</script>';
            exit;
        }

        $sql = "INSERT INTO supplieres (name,phone,mail,address) VALUES (\"" . $_POST['name_ncc'] . "\",\"" . $_POST['Phone_ncc'] . "\",\"" . $_POST['mail_ncc'] . "\",\"" . $_POST['address_ncc'] . "\") ";
        $result = mysqli_query($con, $sql);
        echo "<script> setTimeout(()=>{window.location='./index.php?success_add=1'},700);</script>";
    }
}



?>