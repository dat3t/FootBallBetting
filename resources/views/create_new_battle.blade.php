
  <div class="modal fade" tabindex="-1" role="dialog" id="createNewBattleModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:rgb(68,157,68);border-radius:3px;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalTitle" style="color:white">Create New Betting</h4>
                        </div>
                     <form method="post" action="/home/saveBattleInfo" id="createNewBattleForm">
                      {{ csrf_field() }}
                        <div class="modal-body" style="width:100%">
                            <div class="form-group">
                                <label for="usr">Home Team:<span style="color:red;display:inline">(*)</span></label>
                                <div id="hometeam_errorMess" style="color:red"></div>
                                <input type="text" class="form-control" name="home_team" style="max-width:100%!important">
                            </div>
                            <div class="form-group">
                                <label for="usr">Guest Team:<span style="color:red;display:inline">(*)</span></label>
                                 <div id="guest_errorMess" style="color:red"></div>
                                <input type="text" class="form-control" name="guest" style="max-width:100%!important">
                            </div>
                            <div class="form-group">
                                <label for="usr">Start Time:<span style="color:red;display:inline">(*)</span></label>
                                 <div id="start_date_errorMess" style="color:red"></div>
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" name="start_at"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                 </div>
                             </div>
                               <div class="form-group">
                                <label for="usr">End Time:<span style="color:red;display:inline">(*)</span></label>
                                 <div id="end_date_errorMess" style="color:red"></div>
                                <div class='input-group date' id='datetimepicker2'>
                                    <input type='text' class="form-control" name="end_at" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                 </div>
                             </div>
                               <div class="form-group">
                                <label for="usr">Betting End Time:<span style="color:red;display:inline">(*)</span></label>
                                 <div id="betting_deadline_errorMess" style="color:red"></div>
                                <div class='input-group date' id='datetimepicker3'>
                                    <input type='text' class="form-control" name="betting_deadline"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                 </div>
                             </div>
                            <div class="form-group">
                                <label for="usr">Win:<span style="color:red;display:inline">(*)</span></label>
                                 <div id="win_errorMess" style="color:red"></div>
                                <input type="text" class="form-control" name="win" style="max-width:100%!important">
                            </div>
                            <div class="form-group">
                                <label for="usr">Lose:<span style="color:red;display:inline">(*)</span></label>
                                 <div id="lose_errorMess" style="color:red"></div>
                                <input type="text" class="form-control" name="lose" style="max-width:100%!important">
                            </div>
                            <div class="form-group">
                                <label for="usr">Draw:<span style="color:red;display:inline">(*)</span></label>
                                 <div id="draw_errorMess" style="color:red"></div>
                                <input type="text" class="form-control" name="draw" style="max-width:100%!important">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Save changes</button>
                        </div>
                    </form>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->




          