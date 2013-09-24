<?php include 'php/includes/header.php'; ?>
<h1>Uređivanje autora</h1>
<?php

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$sql="SELECT * FROM autor WHERE autor_ID = $id";
	$autor = upit($sql);
	
	if(isset($_POST['uredi']))
	{
		$ime = $_POST['ime'];
		$prezime = $_POST['prezime'];
		
		$sql="UPDATE autor SET ime='$ime', prezime='$prezime' WHERE autor_ID = $id";
		if(zapis($sql))
		{
			header("Location: autori.php");
		}
		else 
		{
			echo "Problem sa spremanjem u bazu";
		}
		
	}
	
	if(isset($_POST['brisanje']))
	{
		$sql="DELETE FROM autor WHERE autor_ID = $id";
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

<form class="form-horizontal" action="autor.php?id=<?php echo $id; ?>" method="post">
  <div class="control-group">
    <label class="control-label" for="ime">Ime</label>
    <div class="controls">
      <input type="text" id="ime" name="ime" value="<?php echo $autor[0]['ime'];?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="prezime">Prezime</label>
    <div class="controls">
      <input type="text" id="prezime" name="prezime" value="<?php echo $autor[0]['prezime'];?>">
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
		
		$sql="INSERT INTO autor(ime, prezime) VALUES('{$ime}','{$prezime}')";
		if(zapis($sql))
		{
			header("Location: autori.php");
		}
		else 
		{
			echo "Problem sa spremanjem u bazu";
		}
	}
}
?>
<?php include 'php/includes/footer.php'; ?>