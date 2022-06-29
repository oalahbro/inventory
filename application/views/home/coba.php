<?php
foreach($planet as $new) {
    echo $new['id_kamera'] . "<br>";
    echo $new['bb'] . "<br>";
    echo $new['tahun'] . "<br>";
    echo $new['seating'] . "<br>";
    echo $this->format_rupiah->format($new['harga'])."<br>";
}
?>