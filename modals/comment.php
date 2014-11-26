
<div class="modal fade bs-example-modal-lg in" id="comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-comment"></i> Reageer</h4>
      </div>
      <div class="modal-body">
			<form action="includes/comment.php" method="POST">
				<textarea class="form-control" name="commentpost" id="commentpost" rows="3"></textarea>
				<input type="hidden" id="commenton">
				<input type="hidden" id="commentid">
      </div>
      <div class="modal-footer">
      
			<button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
			<button type="button" onclick="sendcomment()" class="btn btn-primary">Verzenden</button>
			</form>
      </div>
    </div>
  </div>
</div>
                
