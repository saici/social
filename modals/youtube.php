
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-youtube"></i> YouTube video invoegen</h4>
      </div>
      <div class="modal-body">
        <form action="includes/post.php" method="POST">
			<input class="form-control" id="video" autocomplete='off' onchange="check();"
 onkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange();" placeholder="Youtube URL" type="text" style="width: 100%;" name="video">
			<hr><iframe id="youtubevideo" width="560" height="315" src="//www.youtube.com/embed/" frameborder="0" allowfullscreen></iframe>
        <input type="hidden" id="videoid" name="videoid">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
        <button type="submit" class="btn btn-primary">Invoegen</button>
        </form>
      </div>
    </div>
  </div>
</div>
                </div>
