

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="ATNimg/one.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Category Management</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Category Management</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
<!-- Bootstrap --> 
        <form name="frm" method="post" action="">
        <h1>Category Management</h1>
        <p>
        <i class="fa fa-plus"></i> <a href="?page=addc"> Add</a>
        </p>
        <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Category Name</strong></th>
                     <th><strong>Description</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
                include_once("connection.php");
                if(isset($_GET["function"])=="del")
                {
                    if(isset($_GET["id"]))
                    {
                       $id = $_GET["id"];
                        pg_query($conn, "delete from category where cat_id='$id'");
                    }
                         
                }

                $No = 1;
                $result = pg_query($conn, "select * from category");
                while ($row=pg_fetch_array($result, NULL, PGSQL_ASSOC))
                {
                ?>
			<tr>
                <td class="cotCheckBox"><?php echo $No; ?></td>
                <td><?php echo $row['cat_name']?></td>
                <td><?php echo $row['cat_des']?></td>
                <td style='text-align:center'><a href="?page=upc&&id=<?php echo $row['cat_id'];?>"><i class="fa fa-edit"></i></td>
                <td style='text-align:center'><a href="?page=cat&&function=del&&id=<?php echo $row['cat_id']; ?>"
                 onclick="return ConfirmDelete()"><i class="fa fa-close"></i></td>
            </tr>
            <?php
                $No++;
                }
                
                ?>
			</tbody>
        </table>   
 </form>