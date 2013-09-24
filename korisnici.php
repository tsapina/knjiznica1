<?php include 'php/includes/header.php';
$sql = "SELECT * FROM korisnik";
$korisnici = upit($sql);
?>
<h1>Korisnici</h1>
<hr>
<table class="table table-striped">
<thead>
	<tr>
		<th>Rbr</th>
		<th>Ime</th>
		<th>Prezime</th>
		<th>Kontakt</th>
		<th>Iskaznica Broj</th>
		<th>Uređivanje</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i=1;	
	foreach($korisnici as $korisnik)
	{
		echo "<tr>";
		echo "<td>".$i++."</td>";
		echo "<td>{$korisnik['ime']}</td>";
		echo "<td>{$korisnik['prezime']}</td>";
		echo "<td>{$korisnik['kontakt']}</td>";
		echo "<td>{$korisnik['iskaznica_broj']}</td>";
		echo "<td><a href=\"korisnik.php?id={$korisnik['korisnik_ID']}\"><i class=\"icon-pencil\"></i></a></td>";
		echo "</tr>";
	}
	?>
	</tbody>
</table>
<hr>
<a href="" class="btn btn-primary btn-large" data-toggle="modal" data-target="#modal-dodaj-korisnika">Dodaj korisnika</a>

<!-- Modal Pop-Up -->
    <div class="modal hide fade" id="modal-dodaj-korisnika">
         <div class="modal-header">
             <button class="close" data-dismiss="modal">&times;</button>
             <h3>Dodaj korisnika</h3>
         </div>
         <div class="modal-body">
             <form action="korisnik.php" method="post" class="form-horizontal">
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
                      <label for="kontakt" class="control-label">Kontakt</label>
                      <div class="controls">
                          <input type="text" id="kontakt" name="kontakt" / >
                      </div>

                 </div>
                 <div class="control-group">
                      <label for="prezime" class="control-label">Iskaznica Broj</label>
                      <div class="controls">
                          <input type="text" id="iskaznica" name="iskaznica" / >
                      </div>

                 </div>
                 <div class="control-group">
                      <div class="controls">
                          <input type="submit" class="btn btn-primary" name="dodaj" value="Dodaj korisnika" />
                      </div>
                 </div>
             </form>
         </div>
         <div class="modal-footer">
             <a href="" data-dismiss="modal" class="btn">Odustani</a>
         </div>
    </div><!-- end modal -->
<?php include 'php/includes/footer.php'; ?>