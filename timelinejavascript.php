<script type="text/javascript">
     function check(){
		var loc = document.getElementById('video').value;
		var abc = loc.substring(loc.indexOf('v=') +2);
		abc.replace("=", "");
		abc = abc.split('&')[0]
		document.getElementById('youtubevideo').src = "https://www.youtube.com/embed/" + abc;

		document.getElementById('videoid').value = abc;
		
	

     }
</script>
