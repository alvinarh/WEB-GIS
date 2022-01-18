<?php
include "../koneksi.php";
$sql="SELECT * FROM titik_hotel where Lng>0";
$hasil=mysqli_query($conn,$sql);
?>

var json_titikhotel_2 = {"type":"FeatureCollection","name":"titikhotel_2","crs":{"type":"name","properties":{"name":"urn:ogc:def:crs:OGC:1.3:CRS84"}},
"features":[
    <?php
        while($data=mysqli_fetch_array($hasil)){
            $id=$data['id'];
            $nama=$data['nama'];
            $alamat=$data['alamat'];
            $lat=$data['lat'];
            $lng=$data['lng'];
        ?>
    {"type":"Feature","properties":{"id":"<?php echo $id; ?>","nama":"<?php echo $nama; ?>","alamat":"<?php echo $alamat; ?>"},"geometry":{"type":"Point","coordinates":[<?php echo $lng; ?>,<?php echo $lat; ?>]}},
    <?php
    }
    ?>
    ]
}