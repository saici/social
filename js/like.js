     function like(id){
		
		var UrlToPass = 'action=username_availability&like='+id;
		
		$.ajax({ 
            type : 'POST',
            data : UrlToPass,
            url  : 'like.php',
            success: function(responseText){ // Get the result and asign to each cases
                if(responseText == 0){
					var numberPattern = document.getElementById('like' + id).innerHTML;
					 numberPattern = numberPattern.replace('<span class="glyphicon glyphicon-thumbs-up"></span>', " "); 
					 var likes = parseInt(numberPattern);
					 likes = likes - 1;
					 document.getElementById('like' + id).innerHTML = '<span class="glyphicon glyphicon-thumbs-up"></span> ' + likes;
					 document.getElementById('like' + id).className = 'btn btn-success btn-sm';
                }
                else if(responseText = 1){
                     var numberPattern = document.getElementById('like' + id).innerHTML;
					 numberPattern = numberPattern.replace('<span class="glyphicon glyphicon-thumbs-up"></span>', " "); 
					 var likes = parseInt(numberPattern);
					 likes = likes + 1;
					 document.getElementById('like' + id).innerHTML = '<span class="glyphicon glyphicon-thumbs-up"></span> ' + likes;
					 document.getElementById('like' + id).className = 'btn btn-success btn-sm active';
                }
                else{
                    alert('Problem with sql query');
                }
            }
            });
        
         
     }
