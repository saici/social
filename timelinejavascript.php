<script type="text/javascript">
     function check(){
		var loc = document.getElementById('video').value;
		var abc = loc.substring(loc.indexOf('v=') +1);
		document.getElementById('youtubevideo').src = "http://www.youtube.com/embed/" + abc;
		
		document.getElementById('videoid').value = abc;
		
	

     }
</script>
