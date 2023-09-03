
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Harita Kullanımı</title>
  
  <!-- Önce leaflet.css, sonra leaflet.js olmalı -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

  <style>
    #map {
      width: auto;
      height: 700px;
    }
  </style>

</head>
<body>

  <div id='map'></div>

  <?php
  
  require_once('db.php');

$SORGU = $DB->prepare("SELECT * FROM sehirler");
$SORGU->execute();
$sehirler = $SORGU->fetchAll(PDO::FETCH_ASSOC);
//echo '<pre>'; print_r($users);
?>
  <script>
    var konumlar = [
      <?php
        foreach ($sehirler as $sehir) {
          $sehir['sehir']. $sehir['enlem']. $sehir['boylam']; 
          echo "['{$sehir['sehir']}' ,{$sehir['enlem']}, {$sehir['boylam']}, '{$sehir['nufus']}'],\n";
          
        } 
        ?>
    ];

    var map = L.map('map');

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    
    var isaretciler = [];
    for (var i = 0; i < konumlar.length; i++) {
        let KonumAdi = konumlar[i][0];
        let Enlem    = konumlar[i][1];
        let Boylam   = konumlar[i][2];
        let Nufus   = konumlar[i][3];
        isaretciler.push( L.marker([Enlem, Boylam]).bindPopup(KonumAdi + "\nSehrinin nufusu: " + Nufus) );
    }
    var isaretciGrubu = L.featureGroup(isaretciler).addTo(map);
    
    // Tüm işaretçiler ekranda görünecek şekilde haritayı ortala
    map.fitBounds(isaretciGrubu.getBounds());

  </script>


</body>
</html>
