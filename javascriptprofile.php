<script type="text/javascript">
     function newimage(image){
		
		
		document.getElementById('modalimage').src = "http://185.13.226.55/social/images/" + image;
	

     }
     function editbio(){
		
		
		var biografie = document.getElementById('biografie').innerHTML;
		var newtext = '<textarea name="bio" class="form-control">' + biografie + '</textarea><br ><input class="btn btn-success btn-sm" type="submit" value="verzenden">';
		document.getElementById('biografie').innerHTML = newtext;
		document.getElementById('pencil').innerHTML = "";

     }
     editbio();
</script>
