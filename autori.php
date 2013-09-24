<?php include 'php/includes/header.php';
$sql = "SELECT * FROM autor";
$autori = upit($sql);
?>
<h1>Autori</h1>
<hr>
<table class="table table-striped">
<thead>
	<tr>
		<th>Rbr</th>
		<th>Ime</th>
		<th>Prezime</th>
		<th>Uređivanje</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i=1;	
	foreach($autori as $autor)
	{
		echo "<tr>";
		echo "<td>".$i++."</td>";
		echo "<td>{$autor['ime']}</td>";
		echo "<td>{$autor['prezime']}</td>";
		echo "<td><a href=\"autor.php?id={$autor['autor_ID']}\"><i class=\"icon-pencil\"></i></a></td>";
		echo "</tr>";
	}
	?>
	</tbody>
</table>
<hr>
<a href="" class="btn btn-primary btn-large" data-toggle="modal" data-target="#modal-dodaj-autora">Dodaj autora</a>

<!-- Modal Pop-Up -->
    <div class="modal hide fade" id="modal-dodaj-autora">
         <div class="modal-header">
             <button class="close" data-dismiss="modal">&times;</button>
             <h3>Dodaj autora</h3>
         </div>
         <div class="modal-body">
             <form action="autor.php" method="post" class="form-horizontal">
                 <div class="control-group">
                      <label for="ime" class="control-label">Ime</label>
                      <div class="controls">
                          <input type="text" id="ime" name="ime" / >
                      </div>

                 </div>
                 <div class="control-group">
                      <label for="prezime" class="control-label">Prezime</label>
                      <div class="controls">
                          <input type="text" id="prezime" name="prezime" / >
                      </div>

                 </div>
                 <div class="control-group">
                      <div class="controls">
                          <input type="submit" class="btn btn-primary" name="dodaj" value="Dodaj autora" />
                      </div>
                 </div>
             </form>
         </div>
         <div class="modal-footer">
             <a href="" data-dismiss="modal" class="btn">Odustani</a>
         </div>
    </div><!-- end modal -->
<?php include 'php/includes/footer.php'; ?>