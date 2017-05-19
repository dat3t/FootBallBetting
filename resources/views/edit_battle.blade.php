
  <div class="modal fade" tabindex="-1" role="dialog" id="editBattleModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:rgb(68,157,68);border-radius:3px;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalTitle" style="color:white">Edit Battle Info</h4>
                        </div>
                     <form method="post"  id="editBattleForm" action="/home/saveEditBattle">
                      {{ csrf_field() }}
                        <div class="modal-body" style="width:100%">
                            <div class="form-group">
                                <label for="usr">Home Team:<span style="color:red;display:inline">(*)</span></label>
                                <div id="hometeam_errorMess" style="color:red"></div>
                                <input type="text" class="form-control" name="home_team_edit" style="max-width:100%!important">
                            </div>
                            <div class="form-group">
                                <label for="usr">Guest Team:<span style="color:red;display:inline">(*)</span></label>
                                 <div id="guest_errorMess" style="color:red"></div>
                                <input type="text" class="form-control" name="guest_edit" style="max-width:100%!important">
                            </div>
                            <div class="form-group">
                                <label for="usr">Start Time:<span style="color:red;display:inline">(*)</span></label>
                                 <div id="start_date_errorMess" style="color:red"></div>
                                <div class='input-group date' id='datetimepicker4'>
                                    <input type='text' class="form-control" name="start_at_edit" disabled="disabled" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                 </div>
                             </div>
                               <div class="form-group">
                                <label for="usr">End Time:<span style="color:red;display:inline">(*)</span></label>
                                 <div id="end_date_errorMess" style="color:red"></div>
                                <div class='input-group date' id='datetimepicker5'>
                                    <input type='text' class="form-control" name="end_at_edit" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                 </div>
                             </div>
                               <div class="form-group">
                                <label for="usr">Betting End Time:<span style="color:red;display:inline">(*)</span></label>
                                 <div id="betting_deadline_errorMess" style="color:red"></div>
                                <div class='input-group date' id='datetimepicker6'>
                                    <input type='text' class="form-control" name="betting_deadline_edit"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                 </div>
                             </div>
                            <div class="form-group">
                                <label for="usr">Win:<span style="color:red;display:inline">(*)</span></label>
                                 <div id="win_errorMess" style="color:red"></div>
                                <input type="text" class="form-control" name="win_edit" style="max-width:100%!important">
                            </div>
                            <div class="form-group">
                                <label for="usr">Lose:<span style="color:red;display:inline">(*)</span></label>
                                 <div id="lose_errorMess" style="color:red"></div>
                                <input type="text" class="form-control" name="lose_edit" style="max-width:100%!important">
                            </div>
                            <div class="form-group">
                                <label for="usr">Draw:<span style="color:red;display:inline">(*)</span></label>
                                 <div id="draw_errorMess" style="color:red"></div>
                                <input type="text" class="form-control" name="draw_edit" style="max-width:100%!important">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success" onclick="$('#editBattleForm').attr('action', '/home/saveEditBattle/'+battle_id);">Save changes</button>
                        </div>
                    </form>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->




          