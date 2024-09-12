<?php
include("../Connection/Connection.php");

?>
<thead>

<tr>
  <th style="text-align:center;">sl.no.</tH>
  <th style="text-align:center;">City</th>
  <th style="text-align:center;">Pincode</th>
  <th style="text-align:center;">district</th>
  <th style="text-align:center;">Action</th>
</tr>
</thead>
<tbody>


  <?php
  $selQry = "select * from tbl_city c inner join tbl_district d on d.district_id =c.district_id where c.district_id=" . $_GET['ddid'] . "";


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
        <?php echo $row['city_name']; ?>
      </td>
      <td align="center">
        <?php echo $row['pincode']; ?>
      </td>
      <td align="center">
        <?php echo $row['district_name']; ?>
      </td>
      <td align="center">
        <a class="btn btn-outline-danger btn-icon-text btn-sm" href="City.php ?did=<?php echo $row['city_id'] ?>">Delete <i
            class="ti-trash btn-icon-append"></i></a>
        <a class="btn btn-outline-secondary btn-icon-text btn-sm" <a href="City.php?eid=<?php echo $row['city_id'] ?>">Edit
          <i class="ti-file btn-icon-append"></i></a>
      </td>
    </tr>
    </tbody>
    <?php
  }
  ?>