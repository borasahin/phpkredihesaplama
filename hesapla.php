<?php
  /* Kredi Tutarı */
    $bul = array(' ',',','.');
    $degistir = array('','','');
	  $kredi = str_replace($bul, $degistir, $_POST['kredi']); // Bu alanda kredi tutarında boşluk virgül veya nokta varsa onları kaldırıyoruz.
  /* Kredi Tutarı */
  /* Kredi Tutarı */
    $vade = $_POST['vade']; // Kaç taksit olacak
  /* Kredi Tutarı */
  /* Faiz Oranı */
    $bul = array(',',' ');
    $degistir = array('.','');
    $faiz = str_replace($bul, $degistir, $_POST['faiz']); // Bu alanda faiz oranı virgül ile yazılıdı ise nokta ile değiştiriyoruz ve boşluk varsa onu siliyoruz.
  /* Faiz Oranı */
  /* (Banka Sigorta Muamele Vergisi) ve (Kredi Kaynak Destekleme Fonu) */
    $bul = array(',',' ');
    $degistir = array('.','');
  	$bsmv = str_replace($bul, $degistir, $_POST['bsmv']);
  	$kkdf = str_replace($bul, $degistir, $_POST['kkdf']);
  /* (Banka Sigorta Muamele Vergisi) ve (Kredi Kaynak Destekleme Fonu) */
  /* Vergiiler ile beraber toplam faiz oranı hesaplanıyor */
	  $vergi_faiz = ($faiz / 100) * (1 + $bsmv + $kkdf);
  /* Vergiiler ile beraber toplam faiz oranı hesaplanıyor */
  /* Kredimizin aylık taksit tutarını hesaplıyoruz */
		$deger1 = $vergi_faiz * pow((1+$vergi_faiz),$vade);
		$deger2 = pow((1+$vergi_faiz),$vade) - 1;
		$taksit = $kredi * $deger1/$deger2;
	/* Kredimizin aylık taksit tutarını hesaplıyoruz */
?>
<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Php Kredi Hesaplama - BS Web Tools</title>
  </head>
  <body>
  	<div class="container">
  		<div class="row">
  			<div class="col-12"><h1>Kredi Sonuç ve Ödeme Tablosu</h1></div>
  			<div class="col-12">
  				<table class="table table-bordered">
  					<tr>
  						<th>Kredi Tutarı</th>
  						<th>Kredi Vadesi</th>
  						<th>Kredi Faizi</th>
  						<th>BSMV</th>
  						<th>KKDF</th>
  						<th>Taksit Tutarı</th>
  					</tr>
  					<tr>
  						<td><?=number_format($kredi, 2, ',', '.')?></td>
  						<td><?=$vade?></td>
  						<td><?=$faiz?></td>
  						<td><?=$bsmv?></td>
  						<td><?=$kkdf?></td>
  						<td><?=number_format($taksit, 2, ',', '.')?></td>
  					</tr>
  				</table>
  				<table class="table table-bordered table-striped">
  					<tr>
  						<th>Dönem</th>
  						<th>Taksit Tutarı</th>
  						<th>Anapara</th>
  						<th>Faiz</th>
  						<th>KKDF</th>
  						<th>BSMV</th>
  						<th>Kalan Anapara</th>
  					</tr>
  					<?php
  						for ($row = '1'; $row <= $vade; $row++) {
  							if ($row == '1') {
                  // Birinci Satır
	  							$_faiz = $kredi * ($faiz / 100);
	  							$_kkdf = $_faiz * $kkdf;
	  							$_bsmv = $_faiz * $bsmv;
	  							$_anapara = $taksit - ($_faiz + $_kkdf + $_bsmv);
	  							$_kalananapara = $kredi - $_anapara;
	  							echo '<tr>';
	  							echo '<td>'.$row.'</td>';
	  							echo '<td>'.number_format($taksit, 2, ',', '.').' TL</td>';
	  							echo '<td>'.number_format($_anapara, 2, ',', '.').'</td>';
	  							echo '<td>'.number_format($_faiz, 2, ',', '.').'</td>';
	  							echo '<td>'.$_kkdf.'</td>';
	  							echo '<td>'.$_bsmv.'</td>';
	  							echo '<td>'.number_format($_kalananapara, 2, ',', '.').'</td>';
	  							echo '</tr>';
  							}else{
                  // Diğer Satırlar
	  							$_faiz = $_kalananapara * ($faiz / 100);
	  							$_kkdf = $_faiz * $kkdf;
	  							$_bsmv = $_faiz * $bsmv;
	  							$_anapara = $taksit - ($_faiz + $_kkdf + $_bsmv);
	  							$_kalananapara = $_kalananapara - $_anapara;
	  							echo '<tr>';
	  							echo '<td>'.$row.'</td>';
	  							echo '<td>'.number_format($taksit, 2, ',', '.').' TL</td>';
	  							echo '<td>'.number_format($_anapara, 2, ',', '.').'</td>';
	  							echo '<td>'.number_format($_faiz, 2, ',', '.').'</td>';
	  							echo '<td>'.number_format($_kkdf, 2, ',', '.').'</td>';
	  							echo '<td>'.number_format($_bsmv, 2, ',', '.').'</td>';
	  							echo '<td>'.number_format($_kalananapara, 2, ',', '.').'</td>';
	  							echo '</tr>';
  							}
  						}
  					?>
  				</table>
  			</div>
  		</div>
  	</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>