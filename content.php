    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="ATNimg/zr.jpg">
                            <h5><a href="#">Roronoa Zoro</a></h5>
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
    <?php 
                if(isset( $_POST['btnSearch']))
                {
                    $search = $_POST['txtSearch'];
                    $result = pg_query($conn,"SELECT product_id, product_name, price, pro_qty, pro_image, cat_name 
                    from product a, category b 
                    where a.cat_id = b.cat_id AND product_name like '%$search%' order by pro_image desc");
                    ?>
                    <section class="featured spad">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title">
                                        <h2>Search Results</h2>
                                    </div>
                                <div class="featured__controls">
                            </div>
                            <div class="row featured__filter">
                    <?php
                    while($row=pg_fetch_array($result, NULL, PGSQL_ASSOC)) { 
                    ?>
                   
                                <div class="col-lg-3 col-md-4 col-sm-6 mix ">
                                    <div class="featured__item">
                                        <div class="featured__item__pic set-bg" data-setbg="img/<?php echo $row['pro_image'] ?>">
                                            <ul class="featured__item__pic__hover">
                                            
                                                <li><a href="#"><span class="fa fa-heart"></span></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="?page=shop-details&&id=<?php echo  $row['product_id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="featured__item__text">
                                            <h6><a href="?page=shop-details&&id=<?php echo  $row['product_id'] ?>"><?php echo $row["product_name"] ?></a></h6>
                                            <h5>$<?php echo $row["price"] ?></h5>
                                        </div>
                                    </div>
                                </div>
                    <?php
                    }
                    ?>
                            </div>
                        </div>
                    </section>
                    <?php
                }else
                {
                    include_once('Featured.php');
                }
                ?>

    


    



