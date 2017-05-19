
  <div class="modal fade" tabindex="-1" role="dialog" id="bettingModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:rgb(68,157,68);border-radius:3px;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalTitle" style="color:white">Betting</h4>
                        </div>
                     <form method="post" action="/home/saveBetting/" id="bettingForm">
                      {{ csrf_field() }}
                        <div class="modal-body" style="width:100%">
                            <div class="text-center">
                            <label id="hometeam_name" style="display:inline;font-size:20px" >Unknown</label>
                            <label style="display:inline;" > VS </label>
                            <label id="guest_name" style="display:inline;font-size:20px" >Unknown</label>
                            </div>
                            <label id="labelspan">Current APC coind: <span style="color:red;display:inline" id="APC">Unknown</span></label>
                            <div class="form-group">
                                <label for="usr">Win: <span style="color:red;display:inline" id="win_ratio">(Unknown)</span></label>
                                <div id="hometeam_score_errorMess" style="color:red"></div>
                                <input type="text" class="form-control" name="win_ratio" id="win_money" style="max-width:100%!important" value="0">
                            </div>
                            <div class="form-group">
                                <label for="usr">Lose: <span style="color:red;display:inline" id="lose_ratio">Unknown</span></label>
                                 <div id="guest_score_errorMess" style="color:red"></div>
                                <input type="text" class="form-control" name="lose_ratio" id="lose_money" style="max-width:100%!important" value="0">
                            </div>
                            <div class="form-group">
                                <label for="usr">Draw: <span style="color:red;display:inline" id="draw_ratio">Unknown</span></label>
                                 <div id="guest_score_errorMess" style="color:red"></div>
                                <input type="text" class="form-control" name="draw_ratio" id="draw_money" style="max-width:100%!important" value="0">
                            </div>
                        <div class="modal-footer">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success" onclick="$('#bettingForm').attr('action', '/home/saveBetting/'+battle_id +'/'+<?php echo Auth::user()->id; ?>);">Save changes</button>
                        </div>
                    </form>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->




