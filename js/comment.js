     function sendcomment(){
		var comment = document.getElementById('commentpost').value;
		var user = document.getElementById('commenton').value;
		var id = document.getElementById('commentid').value;
		var username = document.getElementById('usermenu').innerHTML;
		username = username.replace('<span class="caret"></span>', ' ');
		var UrlToPass = 'commenton=' + user + "&commentid=" + id + "&post=" + comment;
		var avatar = document.getElementById('ownavatar').innerHTML;
		
		$.ajax({ 
            type : 'POST',
            data : UrlToPass,
            url  : 'includes/comment.php',
            success: function(responseText){ // Get the result and asign to each cases
                
				$('#comment').modal('hide');
				getwell = document.getElementById('well' + id);
				getwell.innerHTML =getwell.innerHTML + '<blockquote id="newcomment" style="padding: 0 0 0 0; display:none; font-size: 12px;"><div class="media-body-wrap panel"><div class="media"><a class="media-left" style="float: left;" href="profile.php?id=' + username +'"><center><img src="' + avatar + '" width="32" alt="..."> <br /></center><center>' + username + '</center></a><div style="padding-left: 10px; padding-top: 10px;" class="media-body">' + comment + '</div></div></div></blockquote>';
				 $("#newcomment").slideDown("slow");
				 document.getElementById('newcomment').id = "";
				/*http://stackoverflow.com/questions/14094697/javascript-how-to-create-new-div-dynamically-change-it-move-it-modify-it-in */
                
            }
            });
        
         
     }
