 <!-- Hero Section Begin -->
 <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__branch">
                        <div class="hero__branch__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                            
                            
                        </div>
                        
                        <ul>
                        <li ><a  href="?page=pm">All</a></li>

                        <?php Branch_List($conn ); ?>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__branch">
                                    All branch
                                    <span class="arrow_carrot-down"></span>
                                    
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>081 537 8057</h5>
                                <span>Support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="ATNimg/one.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Products Management</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Products Management</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


   	<?php
		
		if(isset($_GET["id"]))
		{
			$id = $_GET['id'];
			$result = pg_query($conn, "SELECT * from branch where branch_id = '$id'");
			$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
			$cat_id = $row['branch_id'];
			$cat_name = $row['branch_name'];
	?>
<div class="container">
	<h2>Updating Product Branch</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Branch ID(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Branch ID" readonly 
								  value='<?php echo $row['branch_id'] ?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Branch Name(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Branch Name" 
								  value='<?php echo $row['branch_name'] ?>'>
							</div>
					</div>
                    
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="site-btn" name="btnUpdate" id="btnUpdate" value="Update"/>
                              <input type="button" class="site-btn" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=branch'" />
                              	
						</div>
					</div>
				</form>
	</div>

	<?php
		if(isset($_POST['btnUpdate']))
		{
			$id = $_POST['txtID'];
			$name = $_POST['txtName'];
			$err="";
			if($name=="")
			{
				$err .= "</br>Enter name</br>";
			}
			if ($err !="")
			{
				echo $err;
			}
			else
			{
				pg_query($conn, "UPDATE Branch set branch_name = '$name' where branch_id = '$id'");
				echo '<meta http-equiv="refresh" content="0;URL =?page=branch"/>';
			}
		}
	?>

    <?php
		}
		else
		{
			echo '<meta http-equiv="refresh" content="0;URL =?page=pm"/>';
		}
	?>