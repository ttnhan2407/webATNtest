<?php 

if(isset($_GET['id'])){
$id = $_GET['id'];
$sql = "SELECT product.product_id, product.product_name, product.price, product.pro_qty, product.pro_image, category.cat_name, product.smalldesc, product.detaildesc 
from product , category  
where product.cat_id = category.cat_id and product.product_id='$id'";
$result = pg_query($conn, $sql);
$row=pg_fetch_array($result, NULL, PGSQL_ASSOC);

?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="ATNimg/one.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Detail Product</h2>
                        <div class="breadcrumb__option">
                            <a href="?page=content">Home</a>
                            <a href="?page=content">Recorded</a>
                            <span>Detail Product</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="img/<?php echo $row["pro_image"]; ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $row["product_name"]; ?></h3>
                        <div class="product__details__price">$<?php echo $row["price"]; ?></div>
                        <p><?php echo $row["smalldesc"]; ?></p>
                        <form method="POST">
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" name="txtqty" readonly  value="1">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="btnCart" class="primary-btn">ADD TO CARD</button>
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        </form>
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="ATNimg/usopp.jpg">
                            <h5><a href="#">Usopp</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="ATNimg/luffy1.jfif">
                            <h5><a href="#">Monkey D. Luffy</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="ATNimg/pika.jpg">
                            <h5><a href="#">Nami</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="ATNimg/Mikey.jpg">
                            <h5><a href="#">Vinsmoke Sanji</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

<?php }
    if(isset($_POST['btnCart']))
    {
        $qty = $_POST['txtqty'];
    if(!isset($_SESSION['cart'][$id]))
    {
        $_SESSION['cart'][$id]['img'] = $row['pro_image'];
        $_SESSION['cart'][$id]['name'] = $row['product_name'];
        $_SESSION['cart'][$id]['price'] = $row['price'];
        $_SESSION['cart'][$id]['qty'] = $qty;
        echo "<script> alert(' Add to cart successful ');location.href='?page=content';</script>";
        }
    else
    {
        $_SESSION['cart'][$id]['qty'] += $qty;
        echo "<script> alert(' Add to cart successful ');location.href='?page=content';</script>";
    }
    }
 ?>
 
  