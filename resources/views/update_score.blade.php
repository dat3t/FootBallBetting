
  <div class="modal fade" tabindex="-1" role="dialog" id="updateScoreModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:rgb(68,157,68);border-radius:3px;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalTitle" style="color:white">Update Score</h4>
                        </div>
                     <form method="post" action="" id="updateScoreForm">
                      {{ csrf_field() }}
                        <div class="modal-body" style="width:100%">
                            <div class="form-group">
                                <label for="usr">Home Team's Sccore:<span style="color:red;display:inline">(*)</span></label>
                                <div id="hometeam_score_errorMess" style="color:red"></div>
                                <input type="text" class="form-control" name="home_team_score" style="max-width:100%!important">
                            </div>
                            <div class="form-group">
                                <label for="usr">Guest Team's Sccore:<span style="color:red;display:inline">(*)</span></label>
                                 <div id="guest_score_errorMess" style="color:red"></div>
                                <input type="text" class="form-control" name="guest_score" style="max-width:100%!important">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success" onclick="$('#updateScoreForm').attr('action', '/home/saveBattleScore/'+battle_id);">Save changes</button>
                        </div>
                    </form>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->




