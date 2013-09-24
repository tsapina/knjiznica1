<?php include 'php/includes/header.php'; ?>
<h1>Uređivanje autora</h1>
<?php

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$sql="SELECT * FROM knjiga WHERE knjiga_ID = $id";
	$knjiga = upit($sql);
	$sql1="SELECT * FROM autor";
	$autori = upit($sql1);
	$sql2="SELECT * FROM izdavac";
	$izdavaci = upit($sql2);
	
	
	if(isset($_POST['uredi']))
	{
		$naziv_knjige = $_POST['naziv_knjige'];
		$isbn = $_POST['isbn'];
		$godina = $_POST['godina'];
		$kolicina = $_POST['kolicina'];
		$autor = $_POST['autor'];
		$izdavac = $_POST['izdavac'];
		
		$sql="UPDATE knjiga SET naziv='{$naziv_knjige}', isbn={$isbn}, godina={$godina}, kolicina={$kolicina}, autor_ID_FK={$autor}, izdavac_ID_FK={$izdavac} WHERE knjiga_ID = $id";
		if(zapis($sql))
		{
			header("Location: knjige.php");
		}
		else 
		{
			echo "Problem sa spremanjem u bazu";
		}
		
	}
	
	if(isset($_POST['brisanje']))
	{
		$sql="DELETE FROM knjiga WHERE kniga_ID = $id";
		if(zapis($sql))
		{
			header("Location: knjige.php");
		}
		else 
		{
			echo "Problem sa spremanjem u bazu";
		}
		
	}
?>

<form class="form-horizontal" action="knjiga.php?id=<?php echo $id; ?>" method="post">
  <div class="control-group">
    <label class="control-label" for="naziv_knjige">Naziv knjige:</label>
    <div class="controls">
      <input type="text" id="naziv_knjige" name="naziv_knjige" value="<?php echo $knjiga[0]['naziv'];?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="isbn">ISBN:</label>
    <div class="controls">
      <input type="text" id="isbn" name="isbn" value="<?php echo $knjiga[0]['isbn'];?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="godina">Godina:</label>
    <div class="controls">
      <input type="text" id="godina" name="godina" value="<?php echo $knjiga[0]['godina'];?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="kolicina">Količina:</label>
    <div class="controls">
      <input type="text" id="kolicina" name="kolicina" value="<?php echo $knjiga[0]['kolicina'];?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="autor">Autori:</label>
    <div class="controls">
    	<select id="autor" name="autor">
    		<?php
    			foreach($autori as $autor):
				$selected = '';
				if ($autor['autor_ID'] == $knjiga[0]['autor_ID_FK']) {
					$selected = 'selected';
				}
			?>
					<option value="<?php echo $autor['autor_ID'] ?>" <?php echo $selected; ?>><?php echo $autor['ime']." ".$autor['prezime']; ?></option>
    		<?php
    			endforeach;
    		?>
    	</select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="izdavac">Izdavaci:</label>
    <div class="controls">
    	<select id="izdavac" name="izdavac">
    		<?php
    			foreach($izdavaci as $izdavac):
				$selected = '';
				if ($izdavac['izdavac_ID'] == $knjiga[0]['izdavac_ID_FK']) {
					$selected = 'selected';
				}
			?>
					<option value="<?php echo $izdavac['izdavac_ID'] ?>" <?php echo $selected; ?>><?php echo $izdavac['naziv']; ?></option>
    		<?php
    			endforeach;
    		?>
    	</select>
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
		$naziv_knjige = $_POST['naziv_knjige'];
		$isbn = $_POST['isbn'];
		$godina = $_POST['godina'];
		$kolicina = $_POST['kolicina'];
		$autor = $_POST['autor'];
		$izdavac = $_POST['izdavac'];
		
		$sql="INSERT INTO knjiga(naziv, isbn, godina, kolicina, autor_ID_FK, izdavac_ID_FK) 
		VALUES('{$naziv_knjige}', {$isbn}, {$godina}, {$kolicina}, {$autor}, {$izdavac})";
		if(zapis($sql))
		{
			header("Location: knjige.php");
		}
		else 
		{
			echo "Problem sa spremanjem u bazu";
		}
	}
}
?>
<?php include 'php/includes/footer.php'; ?>