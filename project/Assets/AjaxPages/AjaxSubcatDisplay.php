<?php
include("../Connection/Connection.php");

?>
<thead>
<tr>
  <th style="text-align:center;">sl.no.</tH>
  <th style="text-align:center;">Subcategory name</th>
  <th style="text-align:center;">category name</th>
  <th style="text-align:center;">Action</th>
</tr>
</thead>
<tbody>
  <?php
  $selQry = "select * from tbl_subcategory p inner join tbl_category c on c.category_id= p.category_id where c.category_id=" . $_GET['ctid'] . "";
  $res = $conn->query($selQry);
  $i = 0;
  while ($row = $res->fetch_assoc()) {
    $i++;
    ?>
    <tr>
      <td align="center">
        <?php echo $i; ?>
      </td>
      <td align="center">
        <?php echo $row['subcat_name']; ?>
      </td>
      <td align="center">
        <?php echo $row['category_name']; ?>
      </td>
      <td align="center">
        <a class="btn btn-outline-danger btn-icon-text btn-sm"
          href="Subcategory.php?did=<?php echo $row['subcat_id'] ?>">Delete <i class="ti-trash btn-icon-append"></i></a>
        <a class="btn btn-outline-secondary btn-icon-text btn-sm"
          href="Subcategory.php?eid=<?php echo $row['subcat_id'] ?>">Edit <i class="ti-file btn-icon-append"></i></a>
      </td>
    </tr>
    </tbody>
    <?php
  }
  ?>