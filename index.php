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
  			<div class="col-12"><h1>Kredi Bilgileri</h1></div>
  			<div class="col-12">
  				<form action="hesapla.php" method="post">
  					<div class="form-group">
  						<label>Kredi Tutarı</label>
  						<input type="text" class="form-control" name="kredi" placeholder="Kredi Tutarı" required />
  					</div>
  					<div class="form-group">
  						<label>Vade</label>
  						<select class="form-control" name="vade" required>
  							<option value="12">12 Ay</option>
  							<option value="24">24 Ay</option>
  							<option value="36">36 Ay</option>
  							<option value="48">48 Ay</option>
  						</select>
  					</div>
  					<div class="form-group">
  						<label>Faiz Oranı</label>
  						<input type="text" class="form-control" name="faiz" placeholder="Faiz Oranı" required />
  					</div>
  					<div class="form-group">
  						<label>BSMV</label>
  						<input type="text" class="form-control" name="bsmv" value="0.05" placeholder="BSMV" />
  					</div>
  					<div class="form-group">
  						<label>KKDF</label>
  						<input type="text" class="form-control" name="kkdf" value="0.15" placeholder="KKDF" />
  					</div>
  					<div class="form-group">
  						<button type="submit" class="btn btn-primary">Hesapla</button>
  					</div>
  				</form>
  			</div>
  		</div>
  	</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>