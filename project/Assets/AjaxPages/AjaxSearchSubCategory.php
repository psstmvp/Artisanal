<?php
include("../Connection/Connection.php");
?>
<div class="mtext-102 cl2 p-b-15">
    SubCategories
</div>
<?php

$selQry = "select * from tbl_subcategory where  category_id in(" . $_GET['data'] . ")";
$res = $conn->query($selQry);
$i = 0;
while ($row = $res->fetch_assoc()) {
    $i++;
    ?>


    <li class="p-b-6 d-flex ">

        <input type="checkbox" onclick="productCheck()" class="ilter-link stext-106 trans-0 "
            value="<?php echo $row["subcat_id"]; ?>" id="subcat"><span style="padding-left: 10px;">
            <?php echo $row["subcat_name"]; ?>
        </span>

    </li>
    <?php
}
?>