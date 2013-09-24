<?php include 'php/includes/header.php';
$sql = 
"SELECT *
FROM knjiga
JOIN autor
ON knjiga.autor_ID_FK= autor_ID
JOIN izdavac
ON knjiga.izdavac_ID_FK= izdavac_ID
";
$knjige = upit($sql);

$sql1="SELECT * FROM autor";
$autori = upit($sql1);

$sql2="SELECT * FROM izdavac";
$izdavaci = upit($sql2);
?>
<h1>Knjige</h1>
<hr>
<table class="table table-striped">
<thead>
	<tr>
		<th>Rbr</th>
		<th>Naziv knjige</th>
		<th>ISBN</th>
		<th>Godina</th>
		<th>Količina</th>
		<th>Autor</th>
		<th>Izdavac</th>
		<th>Uređivanje</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i=1;	
	foreach($knjige as $knjiga)
	{
		echo "<tr>";
		echo "<td>".$i++."</td>";
		echo "<td>{$knjiga[3]}</td>";
		echo "<td>{$knjiga['isbn']}</td>";
		echo "<td>{$knjiga['godina']}</td>";
		echo "<td>{$knjiga['kolicina']}</td>";
		echo "<td>{$knjiga['ime']} {$knjiga['prezime']}</td>";
		echo "<td>{$knjiga['naziv']}</td>";
		echo "<td><a href=\"knjiga.php?id={$knjiga['knjiga_ID']}\"><i class=\"icon-pencil\"></i></a></td>";
		echo "</tr>";
	}
	?>
	</tbody>
</table>
<hr>
<a href="" class="btn btn-primary btn-large" data-toggle="modal" data-target="#modal-dodaj-knjigu">Dodaj knjigu</a>
<!-- Modal Pop-Up -->
<div class="modal hide fade" id="modal-dodaj-knjigu">
         <div class="modal-header">
             <button class="close" data-dismiss="modal">&times;</button>
             <h3>Dodaj knjigu</h3>
         </div>
         <div class="modal-body">
             <form action="knjiga.php" method="post" class="form-horizontal">
                 <div class="control-group">
                      <label for="naziv_knjige" class="control-label">Naziv knjige</label>
                      <div class="controls">
                          <input type="text" id="naziv_knjige" name="naziv_knjige" / >
                      </div>
                 </div>
                 <div class="control-group">
                      <label for="isbn" class="control-label">ISBN</label>
                      <div class="controls">
                          <input type="text" id="isbn" name="isbn" / >
                   	  </div>
                 </div>
                 <div class="control-group">
                      <label for="godina" class="control-label">Godina</label>
                      <div class="controls">
                          <input type="text" id="godina" name="godina" / >
                   	  </div>
                 </div>
                 <div class="control-group">
                      <label for="kolicina" class="control-label">Količina</label>
                      <div class="controls">
                          <input type="text" id="kolicina" name="kolicina" / >
                   	  </div>
                 </div>
                 <div class="control-group">
				    <label class="control-label" for="autor">Autori:</label>
				    <div class="controls">
				    	<select id="autor" name="autor">
				    		<?php
				    			foreach($autori as $autor):
							?>
								<option value="<?php echo $autor['autor_ID'] ?>"><?php echo $autor['ime']." ".$autor['prezime']; ?></option>
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
							?>
								<option value="<?php echo $izdavac['izdavac_ID'] ?>"><?php echo $izdavac['naziv']; ?></option>
				    		<?php
				    			endforeach;
				    		?>
				    	</select>
				    </div>
				  </div>                 
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