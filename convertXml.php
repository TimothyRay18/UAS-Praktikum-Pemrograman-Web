<?php
    include 'koneksi.php';
    $result = mysqli_query($con,"SELECT * FROM toy");
    $data = "<toko>";
    while($row=mysqli_fetch_array($result)){
        $data.= "<toy>";
        $data.= "<id>".$row['id']."</id>";
        $data.= "<name>".$row['name']."</name>";
        $data.= "<code>".$row['code']."</code>";
        $data.= "<category>".$row['category']."</category>";
        $data.= "<harga>".$row['stock_count']."</harga>";
        $data.= "</toy>";
    }
    $data.="</toko>";
    $x = new SimpleXMLElement($data);
    $x->asXML("toy.xml");
    echo "XML file has been created<br>";
?>
<a href="index.php">back</a>