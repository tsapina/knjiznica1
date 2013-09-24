<?php include 'php/includes/header.php'; ?>
<h1>Uređivanje Izdavaća</h1>
<?php

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$sql="SELECT * FROM izdavac WHERE izdavac_ID = $id";
	$izdavac = upit($sql);
	
	if(isset($_POST['uredi']))
	{
		$naziv = $_POST['naziv'];
		$sql="UPDATE izdavac SET naziv='$naziv' WHERE izdavac_ID = $id";
		if(zapis($sql))
		{
			header("Location: izdavaci.php");
		}
		else 
		{
			echo "Problem sa spremanjem u bazu";
		}
		
	}
	
	if(isset($_POST['brisanje']))
	{
		$sql="DELETE FROM izdavac WHERE izdavac_ID = $id";
		if(zapis($sql))
		{
			header("Location: autori.php");
		}
		else 
		{
			echo "Problem sa spremanjem u bazu";
		}
		
	}
?>

<form class="form-horizontal" action="izdavac.php?id=<?php echo $id; ?>" method="post">
  <div class="control-group">
    <label class="control-label" for="naziv">Naziv</label>
    <div class="controls">
      <input type="text" id="naziv" name="naziv" value="<?php echo $izdavac[0]['naziv'];?>">
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
		$naziv = $_POST['naziv'];
		
		$sql="INSERT INTO izdavac(naziv) VALUES('{$naziv}')";
		if(zapis($sql))
		{
			header("Location: izdavaci.php");
		}
		else 
		{
			echo "Problem sa spremanjem u bazu";
		}
	}
}
?>
<?php include 'php/includes/footer.php'; ?>