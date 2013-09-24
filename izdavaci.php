<?php include 'php/includes/header.php';
$sql = "SELECT * FROM izdavac";
$izdavaci= upit($sql);
?>
<h1>Izdavaći</h1>
<hr>
<table class="table table-striped">
<thead>
	<tr>
		<th>Rbr</th>
		<th>Naziv</th>
		<th>Uređivanje</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i=1;	
	foreach($izdavaci as $izdavac)
	{
		echo "<tr>";
		echo "<td>".$i++."</td>";
		echo "<td>{$izdavac['naziv']}</td>";
		echo "<td><a href=\"izdavac.php?id={$izdavac['izdavac_ID']}\"><i class=\"icon-pencil\"></i></a></td>";
		echo "</tr>";
	}
	?>
	</tbody>
</table>
<hr>
<a href="" class="btn btn-primary btn-large" data-toggle="modal" data-target="#modal-dodaj-izdavaca">Dodaj izdavaca</a>

<!-- Modal Pop-Up -->
    <div class="modal hide fade" id="modal-dodaj-izdavaca">
         <div class="modal-header">
             <button class="close" data-dismiss="modal">&times;</button>
             <h3>Dodaj izdavaca</h3>
         </div>
         <div class="modal-body">
             <form action="izdavac.php" method="post" class="form-horizontal">
                 <div class="control-group">
                      <label for="naziv" class="control-label">Naziv</label>
                      <div class="controls">
                          <input type="text" id="naziv" name="naziv" / >
                      </div>

                 </div>
                 <div class="control-group">
                      <div class="controls">
                          <input type="submit" class="btn btn-primary" name="dodaj" value="Dodaj izdavaca" />
                      </div>
                 </div>
             </form>
         </div>
         <div class="modal-footer">
             <a href="" data-dismiss="modal" class="btn">Odustani</a>
         </div>
    </div><!-- end modal -->
<?php include 'php/includes/footer.php'; ?>