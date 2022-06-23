<?php
    include 'koneksi.php';
    if(isset($_POST['editSubmit'])){
        $id = $_POST['id'];
        $result = mysqli_query($con,"SELECT * FROM toy WHERE id='$id'");
?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<?php
        echo "<input type='hidden' name ='id' value=\"$id\">";
        while($row = mysqli_fetch_array($result)){
            echo "Nama<br>";
            echo "<input type='text' name='nama' value=\"$row[1]\"><br>";
            echo "Kode<br>";
            echo "<input type='text' name='kode' value=\"$row[2]\"><br>";
            echo "Kategori<br>";
            echo "<input type='text' name='kategori' value=\"$row[3]\"><br>";
            echo "Harga<br>";
            echo "<input type='text' name='harga' value=\"$row[4]\"><br>";
            echo "Total Stok<br>";
            echo "<input type='text' name='stok' value=\"$row[5]\"><br>";
        }
        echo "<input type='submit' name='submit' value='save'>";
        echo "</form>";
    }
?>
<?php
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $kode = $_POST['kode'];
        $kategori = $_POST['kategori'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $id = $_POST['id'];
        if($nama != '' || $kode!='' || $kategori!='' || $harga!='' || $stok!=''){
            $sql="UPDATE toy SET name='$nama', code='$kode', category='$kategori', price='$harga', stock_count='$stok' WHERE id='$id'";
            if(mysqli_query($con,$sql)){
                echo "Edit Data successfully<br>";
            }
        }else{
            echo "<script>alert('Fill in the blank space')</script>";
        }
    }
?>
<a href="index.php">back</a>