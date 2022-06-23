<?php
    include 'koneksi.php';
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    Name<br>
    <input type="text" name="name"><br>
    Code<br>
    <input type="text" name="code"><br>
    Category<br>
    <input type="text" name="category"><br>
    Price<br>
    <input type="text" name="price"><br>
    Stock Count<br>
    <input type="text" name="stock"><br>
    <input type="submit" name="Add" value="Add">
</form>
<?php
    if(isset($_POST['Add'])){
        $name = $_POST['name'];
        $code = $_POST['code'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        if($name != '' || $code!='' || $category!='' || $price!='' || $stock!=''){
            $sql= "INSERT INTO toy(name,code,category,price,stock_count) VALUES ('$name','$code','$category','$price','$stock')";
            if(mysqli_query($con,$sql)){
                echo "Add Successfully";
            }else{
                echo mysqli_error($con);
            }
        }else{
            echo "<script>alert('Fill in the blank space')</script>";
        }
    }
?>
<a href="index.php">back</a>