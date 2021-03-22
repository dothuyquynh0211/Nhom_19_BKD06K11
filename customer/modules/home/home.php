<?php 
$title="Trang chủ || Chun Garden";
require_once ('layout/headerCus.php');
?>
<?php 
//sản phẩm nổi bật
$sql_noibat="SELECT id_Product, Name,Price,image FROM Product ORDER BY view DESC LIMIT 5 ";
$result_noibat=mysqli_query($conn,$sql_noibat);
if ($result_noibat==false) {
  die("Loi:".mysqli_error($conn));
} 
//sản phẩm mới nhất
$sql_moinhat="SELECT id_Product, Name,Price,image FROM Product ORDER BY id_Product DESC LIMIT 5 ";
$result_moinhat=mysqli_query($conn,$sql_moinhat);
if ($result_moinhat==false) {
  die("Loi:".mysqli_error($conn));
} 
// sản phẩm bán chạy 
$sql_banchay="SELECT DISTINCT product.id_Product,product.Name ,product.Price,product.image, invoice_detail.Quantity FROM Product join invoice_detail ON invoice_detail.id_Product=product.id_Product ORDER BY quantity DESC LIMIT 5 ";
$result_ban=mysqli_query($conn,$sql_banchay);
if ($result_ban==false) {
  die("Loi:".mysqli_error($conn));
}

?>

<link rel="stylesheet" type="text/css" href="css/style.css">

<div class="banner">
  <img src="layout/img/banner-3.jpg" alt="banner" width="100%" height="450px">
</div>
</div>
  <div class="box">
  	<h2>SẢN PHẨM NỔI BẬT</h2>
    <!-- lấy ra sản phẩm có view lớn nhất -->
    <table>
      <?php 
        $total=mysqli_num_rows($result_noibat); 
        $count=0;
        $n=5;// 5sp trên 1 hàng
        while($count != $total){
          echo "<tr>";
            while ($row=mysqli_fetch_assoc($result_noibat)) {
              $count++;
              $id=$row['id_Product'];
              echo "<td class='item'>";
                echo "<a href='index.php?module=product&action=view&id=$id'>";
                  $url=$row['image'];
                  echo "<img src='$url' width='200px'>";
                  echo "<br><b>".$row['Name']."</b><br>";
                 $price =$row['Price'];
                  $pricer=number_format("$price",0,",",".");
                            echo "<b class='gia'>".$pricer."₫</b>";
                echo "</a>";
              echo "</td>";
              if($count %$n==0) break;
            }
          echo "</tr>";
        }
      ?>
    </table>
    <div class="view_more">
       <a href="index.php?module=product&action=product" > <button> Xem thêm <i class="fas fa-angle-right"></button></i></a>
    </div>
     
  </div>
    <div class="box">
    <h2>SẢN PHẨM MỚI NHẤT</h2>
    <!-- lấy ra sp có id lơn nhất -->
    <table >
      <?php 
        $total=mysqli_num_rows($result_moinhat); 
        $count=0;
        $n=5;// 5sp trên 1 hàng
        while($count != $total){
          echo "<tr>";
            while ($row=mysqli_fetch_assoc($result_moinhat)) {
              $count++;
              $id=$row['id_Product'];
              echo "<td class='item'>";
                echo "<a href='index.php?module=product&action=view&id=$id'>";
                  $url=$row['image'];
                  echo "<img src='$url' width='200px'>";
                  echo "<br><b>".$row['Name']."</b><br>";
                 $price =$row['Price'];
                  $pricer=number_format("$price",0,",",".");
                            echo "<b class='gia'>".$pricer."₫</b>";
                echo "</a>";
              echo "</td>";
              if($count %$n==0) break;
            }
          echo "</tr>";
        }
      ?>
    </table>
    <div class="view_more">
      <a href="index.php?module=product&action=product" > 
        <button> Xem thêm <i class="fas fa-angle-right"></button></i>
      </a>
    </div>     
  </div>
  <div class="box">
    <div class="produce">
      <h2>SẢN PHẨM BÁN CHẠY</h2>
    <!-- lấy ra sản phẩm có số lượng lớn nhất trong đơn hàng -->
    <table >
      <?php 
        $total=mysqli_num_rows($result_ban); 
        $count=0;
        $n=5;// 3sp trên 1 hàng
        while($count != $total){
          echo "<tr>";
            while ($row=mysqli_fetch_assoc($result_ban)) {
              $count++;
              $id=$row['id_Product'];
              echo "<td class='item'>";
                echo "<a href='index.php?module=product&action=view&id=$id'>";
                  $url=$row['image'];
                  echo "<img src='$url' width='200px'>";
                  echo "<br><b>".$row['Name']."</b><br>";
                 $price =$row['Price'];
                  $pricer=number_format("$price",0,",",".");
                            echo "<b class='gia'>".$pricer."₫</b>";

                echo "</a>";
              echo "</td>";
              if($count %$n==0) break;
            }
          echo "</tr>";
        }
      ?>
    </table>
    <div class="view_more">
       <a href="index.php?module=product&action=product" > 
        <button> Xem thêm <i class="fas fa-angle-right"></button></i>
       </a>
    </div>     
  </div>
  
<?php  
require_once ('layout/footerCus.php');
?>