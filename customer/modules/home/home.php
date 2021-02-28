<?php 
$title="Home || Chun Garden";
require_once ('layout/headerCus.php');
?>
<?php 
//sản phẩm nổi bật
$sql_noibat="SELECT id_Product, Name,Price,image FROM Product ORDER BY view DESC LIMIT 3";
$result_noibat=mysqli_query($conn,$sql_noibat);
if ($result_noibat==false) {
  die("Loi:".mysqli_error($conn));
} 
//sản phẩm mới nhất
$sql="SELECT id_Product, Name,Price,image FROM Product ORDER BY id_Product DESC LIMIT 3 ";
$result=mysqli_query($conn,$sql);
if ($result==false) {
  die("Loi:".mysqli_error($conn));
} 
// sản phẩm bán chạy 
$sql_banchay="SELECT DISTINCT product.id_Product,product.Name ,product.Price,product.image, invoice_detail.Quantity FROM Product join invoice_detail ON invoice_detail.id_Product=product.id_Product ORDER BY quantity DESC LIMIT 3";
$result_ban=mysqli_query($conn,$sql_banchay);
if ($result_ban==false) {
  die("Loi:".mysqli_error($conn));
}

?>
<!-- <style type="text/css">
  .list_caydeban{
    padding: 16px;
  }
  .list_caydeban{
    margin: auto;
    text-align: center;
  }
  .list_caydeban table{
    width:100%;
  }
  .list_caydeban table .item {
    text-align: center;
    box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 0px 8px;
  }
  .list_caydeban table .item:hover {
    box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 48px;
  }
</style> -->
<link rel="stylesheet" type="text/css" href="css/style.css">
  <div class="box">
  	<h2>Sản phẩm nổi bật</h2>
    <!-- lấy ra sản phẩm có view lớn nhất -->
    <a href="index.php?module=product&action=product"> xem thêm > </a>
    <table>
      <?php 
        $total=mysqli_num_rows($result_noibat); 
        $count=0;
        $n=3;// 3sp trên 1 hàng
        while($count != $total){
          echo "<tr>";
            while ($row=mysqli_fetch_assoc($result_noibat)) {
              $count++;
              $id=$row['id_Product'];
              echo "<td class='item'>";
                echo "<a href='index.php?module=product&action=detail&id=$id'>";
                  $url=$row['image'];
                  echo "<img src='$url' width='200px'>";
                  echo "<br><b>".$row['Name']."</b><br>";
                  echo "<b>".$row['Price']."VND</b>";
                echo "</a>";
              echo "</td>";
              if($count %$n==0) break;
            }
          echo "</tr>";
        }
      ?>
    </table>
  </div>
  <div class="box">
  	<h2>Sản phẩm mới nhất</h2>
  	<!-- lấy ra sp có id lơn nhất -->
    <a href="index.php?module=product&action=product"> xem thêm > </a>
    <table >
      <?php 
        $total=mysqli_num_rows($result); 
        $count=0;
        $n=3;// 3sp trên 1 hàng
        while($count != $total){
          echo "<tr>";
            while ($row=mysqli_fetch_assoc($result)) {
              $count++;
              $id=$row['id_Product'];
              echo "<td class='item'>";
                echo "<a href='index.php?module=product&action=detail&id=$id'>";
                  $url=$row['image'];
                  echo "<img src='$url' width='200px'>";
                  echo "<br><b>".$row['Name']."</b><br>";
                  echo "<b>".$row['Price']."VND</b>";
                echo "</a>";
              echo "</td>";
              if($count %$n==0) break;
            }
          echo "</tr>";
        }
      ?>
    </table>
  </div>
  <div class="box">
  	<h2>Sản phẩm bán chạy</h2>
  	<!-- lấy ra sản phẩm có số lượng lớn nhất trong đơn hàng -->
    <a href="index.php?module=product&action=product"> xem thêm > </a>
    <table >
      <?php 
        $total=mysqli_num_rows($result_ban); 
        $count=0;
        $n=3;// 3sp trên 1 hàng
        while($count != $total){
          echo "<tr>";
            while ($row=mysqli_fetch_assoc($result_ban)) {
              $count++;
              $id=$row['id_Product'];
              echo "<td class='item'>";
                echo "<a href='index.php?module=product&action=detail&id=$id'>";
                  $url=$row['image'];
                  echo "<img src='$url' width='200px'>";
                  echo "<br><b>".$row['Name']."</b><br>";
                  echo "<b>".$row['Price']."VND</b>";
                echo "</a>";
              echo "</td>";
              if($count %$n==0) break;
            }
          echo "</tr>";
        }
      ?>
    </table>
  </div>
<?php  
require_once ('layout/footerCus.php');
?>