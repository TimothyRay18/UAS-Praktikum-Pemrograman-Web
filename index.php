<!DOCTYPE html>
<html>
<head>
    <title>Toy City Admin</title>
    <style>
        th{
            text-align:center;
        }
    </style>
</head>
<body>
<?php
    include 'koneksi.php';
?>
    <h1>Toy City Admin</h1>
    <p style="text-align:right"><a href="add.php">Add new</a></p>
    <form action="index.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="code" placeholder="Code">
        <input type="submit" name="searchSubmit" value="search">
        <input type="submit" name="reset" value="reset">
    </form>
    <table>
        <tr><th>Nama</th><th>Kode</th><th>Kategori</th><th>Harga</th><th>Total Stok</th><th colspan="2">Aksi</th></tr>
<?php
    if(isset($_POST['searchSubmit'])){
        $name = $_POST['name'];
        $code = $_POST['code'];
        if($name != ''){
            $result = mysqli_query($con,"SELECT * FROM toy WHERE name='$name'");
            while($row = mysqli_fetch_array($result)){
                echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td>";
                echo "<td><form action='edit.php' method='post'><input type='hidden' name='id' value=\"$row[0]\"><input type='submit' name='editSubmit' value='Edit'></form></td>";
                echo "<td><form action='index.php' method='post'><input type='hidden' name='id' value=\"$row[0]\"><input type='submit' name='delete' value='Delete'></form></td></tr>";
            }
        }else{
            $result = mysqli_query($con,"SELECT * FROM toy WHERE code='$code'");
            while($row = mysqli_fetch_array($result)){
                echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td>";
                echo "<td><form action='edit.php' method='post'><input type='hidden' name='id' value=\"$row[0]\"><input type='submit' name='editSubmit' value='Edit'></form></td>";
                echo "<td><form action='index.php' method='post'><input type='hidden' name='id' value=\"$row[0]\"><input type='submit' name='delete' value='Delete'></form></td></tr>";
            }
        }
    }else if(isset($_POST['reset'])){
        $result = mysqli_query($con,"SELECT * FROM toy");
        while($row = mysqli_fetch_array($result)){
            echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td>";
            echo "<td><form action='edit.php' method='post'><input type='hidden' name='id' value=\"$row[0]\"><input type='submit' name='editSubmit' value='Edit'></form></td>";
            echo "<td><form action='index.php' method='post'><input type='hidden' name='id' value=\"$row[0]\"><input type='submit' name='delete' value='Delete'></form></td></tr>";
        }
    }else{
        $result = mysqli_query($con,"SELECT * FROM toy");
        while($row = mysqli_fetch_array($result)){
            echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td>";
            echo "<td><form action='edit.php' method='post'><input type='hidden' name='id' value=\"$row[0]\"><input type='submit' name='editSubmit' value='Edit'></form></td>";
            echo "<td><form action='index.php' method='post'><input type='hidden' name='id' value=\"$row[0]\"><input type='submit' name='delete' value='Delete'></form></td></tr>";
        }
    }
?>
    </table>
    <a href="convertXml.php">Convert-To-XML</a><br>
<?php
    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $sql= "DELETE FROM toy WHERE id='$id'";
        if(mysqli_query($con,$sql)){
            echo "<script>alert('Delete Successfully')</script>";
        }else{
            echo mysqli_error($con);
        }
    }
?>
</body>
</html>