<h2>Banner uploaden</h2>
<i>Banners kunnen soms te groot zijn!</i>
<form action="../includes/uploadbanner.php" method="POST"  enctype="multipart/form-data">		
	<input type="file" name="uploadFile"><br />
    <button type="submit" class="btn btn-primary">Uploaden</button>
</form>
<h2>Banner uit URL</h2>
<form action="includes/setbanner.php" method="POST"  enctype="multipart/form-data">		
	<input type="text" class="form-control" style="width: 300px;" placeholder="URL" name="uploadFile"><br />
    <button type="submit" class="btn btn-primary">Uploaden</button>
</form>
