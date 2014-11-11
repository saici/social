
<div class="modal fade" id="avatarmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-cloud-upload "></i> Avatar uploaden</h4>
      </div>
      <div class="modal-body">
        <form action="includes/uploadavatar.php" method="POST"  enctype="multipart/form-data">		
	<input type="file" name="uploadFile"><br />
    <button type="submit" class="btn btn-primary">Uploaden</button>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
        <button type="submit" class="btn btn-primary">Invoegen</button>
        </form>
      </div>
    </div>
  </div>
</div>
                
