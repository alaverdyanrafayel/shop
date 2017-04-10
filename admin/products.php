<?php

require_once "config.php";
require "header.php";
require "function.php";

if(!isset($_SESSION['name'])){
    header("Location: index.php");
}


    if(isset($_POST['add'])){
        $arm_name = $_POST['arm_name'];
        $eng_name = $_POST['eng_name'];
        $amount = $_POST['amount'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $arm_desc = $_POST['arm_desc'];
        $eng_desc = $_POST['eng_desc'];
        $category_id = $_POST['category_id'];
        if($arm_name != "" && $eng_name != "" && $amount != "" && $price != "" && $arm_desc != "" && $eng_desc != ""){
            $insert = "insert into products(arm_name, eng_name, amount, price, discount, arm_desc, eng_desc, category_id) 
                        values('$arm_name', '$eng_name', '$amount', '$price', '$discount', '$arm_desc', '$eng_desc', '$category_id')";
            $run_insert = mysqli_query($connect, $insert);
        }else{
            echo "Please fill all the fields in!";
        }
    }
$category_id = $_GET['id'];
$sel = "select * from products where category_id = '$category_id'";
$run_sel = mysqli_query($connect, $sel);


?>
<div class="container">
    <h2 style = "color:green; font-size:45px; font-weight:bold">Products datas</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Arm_name</th>
                <th>Eng_name</th>
                <th>Amount</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Arm_description</th>
                <th>Eng_description</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>Checkbox</th>
            </tr>
            </thead>
            <tbody>
                <?php while($row_sel= mysqli_fetch_array($run_sel)){ ?>
            <tr id="<?php echo $row_sel['id']; ?>">
                <td><?php echo $row_sel['id']; ?></td>
                <td><?php echo $row_sel['arm_name']; ?></td>
                </td><td><?php echo $row_sel['eng_name']; ?></td>
                <td><?php echo $row_sel['amount']; ?></td>
                </td><td><?php echo $row_sel['price'].'$'; ?></td>
                <td><?php echo $row_sel['discount']; ?></td>
                </td><td><?php echo $row_sel['arm_desc']; ?></td>
                <td><?php echo $row_sel['eng_desc']; ?></td>
                <td><span class="glyphicon glyphicon-remove" data-type="products" value = "<?php echo $row_sel['id']; ?>"></span></td>
                <td><a href = "edit-product.php?id=<?php echo $row_sel['id']; ?>"><span class="glyphicon glyphicon-pencil" value = "<?php echo $row_sel['id']; ?>"></span></td>
                <td><input type="checkbox" name = "id" value = "<?php echo $row_sel['id']; ?>" style = "width:35px; height:35px; margin-top:20px;margin-left:10px"></td>
            </tr>
            <?php } ?>
            </tbody>
     </table>
</div>


<div class = "container total">
    <div class="container right">
        <h2>Product table</h2>
            <form action = "" method = "post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="usr">Arm_name:</label>
                    <input type="text" class="form-control arm_name" name = "arm_name">
                </div>
                <div class="form-group">
                    <label for="usr">Eng_name:</label>
                    <input type="text" class="form-control eng_name" name = "eng_name">
                </div>
                <div class="form-group">
                    <label for="usr">Amount:</label>
                    <input type="text" class="form-control eng_num" name = "amount">
                </div>
                <div class="form-group">
                    <label for="usr">Price:</label>
                    <input type="text" class="form-control eng_price" name = "price">
                </div>
                <div class="form-group">
                    <label for="usr">Discount:</label>
                    <input type="text" class="form-control eng_discount" name = "discount">
                </div>
                <div class="form-group">
                    <label for="comment">Նկարագրություն:</label>
                    <textarea class="form-control arm_desc" rows="3" name = "arm_desc"></textarea>
                </div>
                <div class="form-group">
                    <label for="comment">English description:</label>
                    <textarea class="form-control eng_desc" rows="3" name = "eng_desc"></textarea>
                </div>
                <input type = "hidden" name = "category_id" value = "<?php echo $_GET['id'];?>">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="add" value="Add product">
                </div>
        </form>
    </div>




</div>

<?php
require "footer.php";
?>
