     function sendmessage(){
		var post = document.getElementById('post').value;
		var id = document.getElementById('commentid').value;
		var username = document.getElementById('usermenu').innerHTML;
		username = username.replace('<span class="caret"></span>', ' ');
		var UrlToPass = 'post=' + post + "&atuser=NONE";
		var avatar = document.getElementById('ownavatar').innerHTML;
		document.getElementById('post').value = "";
		document.getElementById('sendbutton').innerHTML = '<img src="img/spinner.gif">';
		
		$.ajax({ 
            type : 'POST',
            data : UrlToPass,
            url  : 'includes/post.php',
            success: function(responseText){ // Get the result and asign to each cases
                
				$('#comment').modal('hide');
				getwell = document.getElementById('newmessage' + id);
				getwell.innerHTML ='</div></div><div id="addmessage" class="well" style="display: none;"><div class="media"><a class="media-left" style="float: left;" href="profile.php?id=' + username +'"><center><img src="' + avatar + '" width="64" alt="..."> <br /></center><center>' + username + '</center></a><div style="padding-left: 10px; padding-top: 10px;" class="media-body">' + post + '</div></div></div>'+ getwell.innerHTML ;
				 $("#addmessage").slideDown("slow");
				 document.getElementById('addmessage').id = "";
				 document.getElementById('sendbutton').innerHTML = "Verzenden"
				/*http://stackoverflow.com/questions/14094697/javascript-how-to-create-new-div-dynamically-change-it-move-it-modify-it-in */
                
            }
            });
        
         
     }
