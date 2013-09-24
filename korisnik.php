<?php include 'php/includes/header.php'; ?>
<h1>Uređivanje korisnika</h1>
<?php

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$sql="SELECT * FROM korisnik WHERE korisnik_ID = $id";
	$korisnik = upit($sql);
	
	if(isset($_POST['uredi']))
	{
		$ime = $_POST['ime'];
		$prezime = $_POST['prezime'];
		$kontakt = $_POST['kontakt'];
		$iskaznica = $_POST['iskaznica'];
		
		$sql="UPDATE korisnik SET ime='{$ime}', prezime='{$prezime}', kontakt={$kontakt}, iskaznica_broj={$iskaznica} WHERE korisnik_ID = $id";
		if(zapis($sql))
		{
			header("Location: korisnici.php");
		}
		else 
		{
			echo "Problem sa spremanjem u bazu";
		}
		
	}
	
	if(isset($_POST['brisanje']))
	{
		$sql="DELETE FROM korisnik WHERE korisnik_ID = $id";
		if(zapis($sql))
		{
			header("Location: korisnici.php");
		}
		else 
		{
			echo "Problem sa spremanjem u bazu";
		}
		
	}
?>

<form class="form-horizontal" action="korisnik.php?id=<?php echo $id; ?>" method="post">
  <div class="control-group">
    <label class="control-label" for="ime">Ime</label>
    <div class="controls">
      <input type="text" id="ime" name="ime" value="<?php echo $korisnik[0]['ime'];?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="prezime">Prezime</label>
    <div class="controls">
      <input type="text" id="prezime" name="prezime" value="<?php echo $korisnik[0]['prezime'];?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="kontakt">Kontakt</label>
    <div class="controls">
      <input type="text" id="kontakt" name="kontakt" value="<?php echo $korisnik[0]['kontakt'];?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="iskaznica">Iskaznica Broj</label>
    <div class="controls">
      <input type="text" id="iskaznica" name="iskaznica" value="<?php echo $korisnik[0]['iskaznica_broj'];?>">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
    	<input type="submit" type="submit" class="btn" name="uredi" value="Uredi">
      	<input type="submit" type="submit" class="btn" name="brisanje" value="Obriši">
    </div>
  </div>
</form>
<?php
}
else 
{
	if(isset($_POST['dodaj']))
	{
		$ime = $_POST['ime'];
		$prezime = $_POST['prezime'];
		$kontakt = $_POST['kontakt'];
		$iskaznica = $_POST['iskaznica'];
		
		$sql="INSERT INTO korisnik(ime, prezime, kontakt, iskaznica_broj) VALUES('{$ime}','{$prezime}',{$kontakt},{$iskaznica})";
		if(zapis($sql))
		{
			header("Location: korisnici.php");
		}
		else 
		{
			echo "Problem sa spremanjem u bazu";
		}
	}	
}
?>
<?php include 'php/includes/footer.php'; ?>