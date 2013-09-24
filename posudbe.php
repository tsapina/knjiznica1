<?php include 'php/includes/header.php';
$sql = 
"SELECT *
FROM posudba
JOIN knjiga
ON posudba.knjiga_ID_FK= knjiga_ID
JOIN korisnik
ON posudba.korisnik_ID_FK= korisnik_ID
";
$posudbe = upit($sql);

$sql1="SELECT * FROM korisnik";
$korisnici= upit($sql1);

$sql2="SELECT * FROM knjiga";
$knjige = upit($sql2);
?>
<h1>NE RADI DODAVANJE , NERADI JQUERY DATEPICKER</h1>
<hr>
<table class="table table-striped">
<thead>
	<tr>
		<th>Rbr</th>
		<th>Ime i Prezime</th>
		<th>Naziv Knjige</th>
		<th>Datum posuđivanja</th>
		<th>Datum vračanja</th>
		<th>Uređivanje</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i=1;	
	foreach($posudbe as $posudba)
	{
		echo "<tr>";
		echo "<td>".$i++."</td>";
		echo "<td>{$posudba['ime']}  {$posudba['prezime']}</td>";
		echo "<td>{$posudba['naziv']}</td>";
		echo "<td>{$posudba['datum_posudbe']}</td>";
		echo "<td>{$posudba['datum_vracanja']}</td>";
		echo "<td><a href=\"posudba.php?id={$posudba['posudba_ID']}\"><i class=\"icon-pencil\"></i></a></td>";
		echo "</tr>";
	}
	?>
	</tbody>
</table>
<hr>
<a href="" class="btn btn-primary btn-large" data-toggle="modal" data-target="#modal-dodaj-posudbu">Dodaj posudbu</a>
<!-- Modal Pop-Up -->
<div class="modal hide fade" id="modal-dodaj-posudbu">
         <div class="modal-header">
             <button class="close" data-dismiss="modal">&times;</button>
             <h3>Dodaj knjigu</h3>
         </div>
         <div class="modal-body">
             <form action="knjiga.php" method="post" class="form-horizontal">
             	<div class="control-group">
				    <label class="control-label" for="korisnik">Korisnik</label>
				    <div class="controls">
				    	<select id="korisnik" name="korisnik">
				    		<?php
				    			foreach($korisnici as $korisnik):
							?>
								<option value="<?php echo $korisnik['korisnik_ID'] ?>"><?php echo $korisnik['ime']." ".$korisnik['prezime']; ?></option>
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
							?>
								<option value="<?php echo $knjiga['knjiga_ID'] ?>"><?php echo $knjiga['naziv']; ?></option>
				    		<?php
				    			endforeach;
				    		?>
				    	</select>
				    </div>
				  </div>
				   <label for="datepicker">Datum:*</label><br>
				<input type="text" id="datepicker" name="datepicker" class="text"/>
	                 
                 
                          
                 <div class="control-group">
                      <div class="controls">
                          <input type="submit" class="btn btn-primary" name="dodaj" value="Dodaj knjigu" />
                      </div>
                 </div>
             </form>
             
         </div>
         <div class="modal-footer">
             <a href="" data-dismiss="modal" class="btn">Odustani</a>
         </div>
    </div><!-- end modal -->
    
    
<?php include 'php/includes/footer.php'; ?>