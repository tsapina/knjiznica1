<?php include 'php/includes/header.php'; ?>
<h1>Uređivanje posudbe</h1>
<?php

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$sql="SELECT * FROM posudba WHERE posudba_ID = $id";
	$posudba = upit($sql);
	$sql1="SELECT * FROM korisnik";
	$korisnici = upit($sql1);
	$sql2="SELECT * FROM knjiga";
	$knjige = upit($sql2);
	
	if(isset($_POST['uredi']))
	{
		$korisnik = $_POST['korisnik'];
		echo $knjiga = $_POST['knjiga'];
		$datum_posudbe = $_POST['datum_posudbe'];
		$datum_vracanja = $_POST['datum_vracanja'];
				
		$sql="UPDATE posudba SET korisnik_ID_FK={$korisnik}, knjiga_ID_FK={$knjiga}, datum_posudbe ='{$datum_posudbe}', datum_vracanja ='{$datum_vracanja}' WHERE posudba_ID = $id";
		if(zapis($sql))
		{
			header("Location: posudbe.php");
		}
		else 
		{
			echo "Problem sa spremanjem u bazu";
		}
		
	}
	
	if(isset($_POST['brisanje']))
	{
		$sql="DELETE FROM posudba WHERE posudba_ID = $id";
		if(zapis($sql))
		{
			header("Location: posudbe.php");
		}
		else 
		{
			echo "Problem sa spremanjem u bazu";
		}
		
	}
}

?>

<form class="form-horizontal" action="posudba.php?id=<?php echo $id; ?>" method="post">
	<div class="control-group">
		<label class="control-label" for="korisnik">Ime i prezime:</label>
		<div class="controls">
			<select id="korisnik" name="korisnik">
				<?php
					foreach($korisnici as $korisnik):
					$selected = '';
					if ($korisnik['korisnik_ID'] == $posudba[0]['korisnik_ID_FK']) {
						$selected = 'selected';
					}
				?>
						<option value="<?php echo $korisnik['korisnik_ID'] ?>" <?php echo $selected; ?>><?php echo $korisnik['ime']." ".$korisnik['prezime']; ?></option>
				<?php
					endforeach;
				?>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="knjiga">Knjiga:</label>
		<div class="controls">
			<select id="knjiga" name="knjiga">
				<?php
					foreach($knjige as $knjiga):
					$selected = '';
					if ($knjiga['knjiga_ID'] == $posudba[0]['knjiga_ID_FK']) {
						$selected = 'selected';
					}
				?>
						<option value="<?php echo $knjiga['knjiga_ID'];?>" <?php echo $selected; ?>><?php echo $knjiga['naziv']; ?></option>
				<?php
					endforeach;
				?>
			</select>
		</div>
	</div>
	
  <div class="control-group">
    <label class="control-label" for="datum_posudbe">Datum posudbe:</label>
    <div class="controls">
      <input type="text" id="datum_posudbe" name="datum_posudbe" value="<?php echo $posudba[0]['datum_posudbe'];?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="datum_vracanja">Datum vracanja:</label>
    <div class="controls">
      <input type="text" id="datum_vracanja" name="datum_vracanja" value="<?php echo $posudba[0]['datum_vracanja'];?>">
    </div>
  </div>
 

  <div class="control-group">
    <div class="controls">
    	<input type="submit" type="submit" class="btn" name="uredi" value="Uredi">
      	<input type="submit" type="submit" class="btn" name="brisanje" value="Obriši">
    </div>
  </div>
  
</form>
<?php include 'php/includes/footer.php'; ?>