@extends('layouts.app')
@include('update_score')
@include('create_new_battle')
@include('edit_battle')
@include('betting')
@include('battle_detail')
@include('error_modal')

@section('content')
<script>
var battle_id = null;
var user_battle = null;
</script>
<?php 
$now = new DateTime(); 
?>
<div class="container">
    <div class="row" style="margin-left: -100px;margin-right: -100px;">
            <div class="col-lg-12">
            <h1 style="display:inline;">Battle List</h1>
                    @if (Auth::user()->level==1)
                            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createNewBattleModal" data-backdrop="static" data-keyboard="false" onclick="resetErrorMess();resetCreateNewForm()" style="display:inline;">Add New Battle</button>

                    @endif
            </div>
            <script type="text/javascript">
                    $.ajaxSetup({
                        headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                      });

                    $(function () {
                        $('#datetimepicker1').datetimepicker({
                            format: 'YYYY-MM-DD HH:mm:ss',          
                        });
                        $('#datetimepicker2').datetimepicker({
                            format: 'YYYY-MM-DD HH:mm:ss'
                        });
                        $('#datetimepicker3').datetimepicker({
                            format: 'YYYY-MM-DD HH:mm:ss'
                        });
                        $('#datetimepicker4').datetimepicker({
                            format: 'YYYY-MM-DD HH:mm:ss',          
                        });
                        $('#datetimepicker5').datetimepicker({
                            format: 'YYYY-MM-DD HH:mm:ss'
                        });
                        $('#datetimepicker6').datetimepicker({
                            format: 'YYYY-MM-DD HH:mm:ss'
                        });
                    });


                    $('#createNewBattleForm').submit(function() {
                        var isError = false;
                        resetErrorMess();
                        if($("input[name='home_team']").val().trim().length == 0){
                            isError = true;
                            $('#hometeam_errorMess').text("Name of home team is required!");
                        }
                        if($("input[name='guest']").val().trim().length == 0){
                            isError = true;
                            $('#guest_errorMess').text("Name of guest team is required!");
                        }
                        if($("input[name='guest']").val().trim() == $("input[name='home_team']").val().trim()){
                            isError = true;
                            $('#guest_errorMess').text("Name of guest team must be different from home team!");
                        }
                        if($("input[name='start_at']").val().trim().length == 0){
                            isError = true;
                            $('#start_date_errorMess').text("Start date is required!");
                        }
                        if($("input[name='end_at']").val().trim().length == 0){
                            isError = true;
                            $('#end_date_errorMess').text("End date is required!");
                        }
                        if($("input[name='betting_deadline']").val().trim().length == 0){
                            isError = true;
                            $('#betting_deadline_errorMess').text("Betting deadline is required!");
                        }
                        if($("input[name='win']").val().trim().length == 0){
                            isError = true;
                            $('#win_errorMess').text("Win ratio is required!");
                        } else if(Math.floor($("input[name='win']").val().trim()) != $("input[name='win']").val().trim() || !$.isNumeric($("input[name='win']").val().trim())){
                            isError = true;
                            $('#win_errorMess').text("Win ratio must be an integer!");
                        }
                        if($("input[name='lose']").val().trim().length == 0){
                            isError = true;
                            $('#lose_errorMess').text("Lose ratio is required!");
                        } else if(Math.floor($("input[name='lose']").val().trim()) != $("input[name='lose']").val().trim() || !$.isNumeric($("input[name='lose']").val().trim())){
                            isError = true;
                            $('#lose_errorMess').text("Lose ratio must be an integer!");
                        }
                        if($("input[name='draw']").val().trim().length == 0){
                            isError = true;
                            $('#draw_errorMess').text("Draw ratio is required!");
                        } else if(Math.floor($("input[name='draw']").val().trim()) != $("input[name='draw']").val().trim() || !$.isNumeric($("input[name='draw']").val().trim())){
                            isError = true;
                            $('#draw_errorMess').text("Draw ratio must be an integer!");
                        }

                         var currentDateTime = moment(Date($.now())).format('YYYY-MM-DD HH:mm:ss');

                        if (currentDateTime > $("input[name='betting_deadline']").val().trim()) {
                            isError = true;
                          $('#betting_deadline_errorMess').text("Betting end date must be after current date time!");
                        }

                        if ($("input[name='start_at']").val().trim() <= $("input[name='betting_deadline']").val().trim()) {
                            isError = true;
                          $('#betting_deadline_errorMess').text("Betting end date must be before start date of the battle!");
                        }
                       
                       if(isError){
                         return false; 
                       }else{
                          return true;
                       }
                       
                    });

                    function resetErrorMess(){
                        $('#hometeam_errorMess').text("");
                        $('#guest_errorMess').text("");
                        $('#start_date_errorMess').text("");
                        $('#end_date_errorMess').text("");
                        $('#betting_deadline_errorMess').text("");
                        $('#win_errorMess').text("");
                        $('#lose_errorMess').text("");
                        $('#draw_errorMess').text("");
                    }

                    function resetCreateNewForm(){
                        $("input[name='home_team']").val("");
                        $("input[name='guest']").val("");
                        $("input[name='start_at']").val("");
                        $("input[name='end_at']").val("");
                        $("input[name='betting_deadline']").val("");
                        $("input[name='win']").val("");
                        $("input[name='lose']").val("");
                        $("input[name='draw']").val("");
                    }

                    function setValueForEditFrom(battle_object){
                        battle_id = battle_object.id;
                        $("input[name='home_team_edit']").val(battle_object.hometeam);
                        $("input[name='guest_edit']").val(battle_object.guest);
                        $("input[name='start_at_edit']").val(battle_object.end_at);
                        $("input[name='end_at_edit']").val(battle_object.end_at);
                        $("input[name='betting_deadline_edit']").val(battle_object.bet_deadline);
                        $("input[name='win_edit']").val(battle_object.win);
                        $("input[name='lose_edit']").val(battle_object.lose);
                        $("input[name='draw_edit']").val(battle_object.draw);
                    }

                    function setValueForBettingForm(battle_object){
                      battle_id = battle_object.id;
                      $("#hometeam_name").text(battle_object.hometeam);
                      $("#guest_name").text(battle_object.guest);
                      $("#APC").text(<?php echo Auth::user()->coin; ?>);
                      $("#win_ratio").text("(Odds ratio: "+battle_object.win+")");
                      $("#lose_ratio").text("(Odds ratio: "+battle_object.lose+")");
                      $("#draw_ratio").text("(Odds ratio: "+battle_object.draw+")");
                      
                    }

                    $('#win_money').on('input', function() {
                      var moneyLeft = parseInt(<?php echo Auth::user()->coin; ?>) - parseInt($("#win_money").val()) - parseInt($("#lose_money").val()) - parseInt($("#draw_money").val());
                      $("#APC").text(moneyLeft);
                    });
                    $('#lose_money').on('input', function() {
                      var moneyLeft = parseInt(<?php echo Auth::user()->coin; ?>) - parseInt($("#win_money").val()) - parseInt($("#lose_money").val()) - parseInt($("#draw_money").val());
                      $("#APC").text(moneyLeft);
                    });
                    $('#draw_money').on('input', function() {
                      var moneyLeft = parseInt(<?php echo Auth::user()->coin; ?>) - parseInt($("#win_money").val()) - parseInt($("#lose_money").val()) - parseInt($("#draw_money").val());
                      $("#APC").text(moneyLeft);
                    });


                    $('#bettingForm').submit(function() {
                      if(parseInt($('#labelspan span').text())<0){
                        return false;
                      }
                      return true;
                       
                    });

                    function resetBettingForm(){
                       $("#win_money").val("0");
                       $("#lose_money").val("0");
                       $("#draw_money").val("0");
                    }

                    function loadBattleInfo(battle_id){
                       $('#table_body').empty();
                        jQuery.ajax({
                        url:'/home/getBattleInfo',
                        type: 'GET',
                        dataType:'json',
                        data: {
                            id: battle_id
                        },
                        success: function( data ){
                            $("#detailModal").modal();
                            user_battle = data;
                            console.log(data.battle_ajax);
                            var trHTML = '';
                             
                               
                         $.each(data.battle_ajax, function(i, v){
                          if(v.hometeam_score<0){
                          trHTML += "<tr><td>" +v.name +"</td><td>"+v.win_money+"</td><td>"+v.lose_money+"</td><td>"+v.draw_money+"</td><td>"+"Not Available"+"</td></tr>";
                          }else{
                            var result_money = 0;
                            if(v.hometeam_score>v.guest_score){
                                result_money = v.win_money*v.win - v.lose_money -v.draw_money ;
                            }
                           if(v.hometeam_score<v.guest_score){
                              result_money = v.lose_money*v.lose - v.win_money - v.draw_money;
                            }
                           if(v.hometeam_score==v.guest_score){
                              result_money = v.draw_money*v.draw - v.win_money - v.lose_money;
                            }
                            
                             trHTML += "<tr><td>" +v.name +"</td><td>"+v.win_money+"</td><td>"+v.lose_money+"</td><td>"+v.draw_money+"</td><td>"+result_money+"</td></tr>";
                          }
                            });

                          $('#table_body').append(trHTML);
                            console.log(data);
                        },
                        error: function (xhr, b, c) {
                            console.log("xhr=" + xhr + " b=" + b + " c=" + c);
                        }
                    });
                    }

                     function showHistory(){
                   $('#history_table_body').empty();
                    jQuery.ajax({
                    url:'/home/getUserHistory',
                    type: 'GET',
                    data: {user_id: <?php echo Auth::user()->id; ?>},
                    dataType:'json',
                    success: function( data ){
                        $("#historyModal").modal();
                        console.log("test");
                        console.log(data);
                        var trHTML = '';
                         
                           
                     $.each(data.betting_ajax, function(i, v){
                     if(v.hometeam_score<0){
                      trHTML += "<tr><td>" +v.battle_id+"</td><td>"+v.hometeam+"</td><td>"+v.guest+"</td><td>"+v.win_money+"</td><td>"+v.lose_money+"</td><td>"+v.draw_money+"</td><td>"+v.win+"</td><td>"+v.lose+"</td><td>"+v.draw+"</td><td>"+"Not Available"+"</td><td>"+"Not Available"+"</td></tr>";
                      }else{
                        var result_money = 0;
                        if(v.hometeam_score>v.guest_score){
                            result_money = v.win_money*v.win - v.lose_money -v.draw_money ;
                        }
                       if(v.hometeam_score<v.guest_score){
                          result_money = v.lose_money*v.lose - v.win_money - v.draw_money;
                        }
                       if(v.hometeam_score==v.guest_score){
                          result_money = v.draw_money*v.draw - v.win_money - v.lose_money;
                        }
                        
                         trHTML += "<tr><td>" +v.battle_id+"</td><td>"+v.hometeam+"</td><td>"+v.guest+"</td><td>"+v.win_money+"</td><td>"+v.lose_money+"</td><td>"+v.draw_money+"</td><td>"+v.win+"</td><td>"+v.lose+"</td><td>"+v.draw+"</td><td>"+v.hometeam_score+'-'+v.guest_score+"</td><td>"+result_money+"</td></tr>";
                      }
                        });

                      $('#history_table_body').append(trHTML);
                    // $( "#test" ).load( "/home" );
                    },
                    error: function (xhr, b, c) {
                        console.log("xhr=" + xhr + " b=" + b + " c=" + c);
                    }
                });

    }
                  
                 
            </script>
    </div>
    <div class="row" style="margin-left: -100px;margin-right: -100px;margin-top: 10px; background-color:rgb(241,241,241);border-radius:3px;">
        <div id="test"></div>
         <table class="jh-table table table-striped" style="width: 100%;">
         <thead>
            <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Home Team</th>
            <th class="text-center">Guest</th>
            <th class="text-center">Start</th>
            <th class="text-center">End</th>
            <th class="text-center">Betting Deadline</th>
            <th class="text-center">Win</th>
            <th class="text-center">Lose</th>
            <th class="text-center">Draw</th>
            <th class="text-center">Result</th>
            <th class="text-center">Action</th>

            </tr>
         </thead>
         <tbody class="text-center">
             @foreach($battles as $battle)
             @if(!(Auth::user()->level==0 && !$battle->isPublished))
            <tr>
            <td>{{$battle->id}}</td>
            <td>{{$battle->hometeam}}</td>
            <td>{{$battle->guest}}</td>
            <td>{{$battle->start_at}}</td>
            <td>{{$battle->end_at}}</td>
            <td>{{$battle->bet_deadline}}</td>
            <td>{{$battle->win}}</td>
            <td>{{$battle->lose}}</td>
            <td>{{$battle->draw}}</td>
             @if ($battle->guest_score < 0)
                       <td>Not available</td>
                    @else 
                       <td>{{$battle->hometeam_score}} - {{$battle->guest_score}}</td>
                @endif
            <td class="text-center">
              @if (Auth::user()->level==1)
              <div class="btn-group">

              @if($now->format('Y-m-d H:i:s') > $battle->end_at)
              <button type="submit" class="btn btn-info" title="Update score!" data-toggle="modal" data-target="#updateScoreModal" data-backdrop="static" data-keyboard="false" onclick="resetErrorMess();battle_id=<?php echo $battle->id; ?>"><span class="glyphicon glyphicon-star-empty"></span></button>
              @else
              <button type="submit" class="btn btn-info" title="Update score!" disabled="disabled"><span class="glyphicon glyphicon-star-empty"></span></button>
              @endif
               @if ($battle->isPublished)
                       <form method="post" action="/home/publishBattle/{{$battle->id}}" style="display:inline;float:left" >
                           {{ csrf_field() }}
                          <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Pushlish the battle!" disabled="disabled"><span class="glyphicon glyphicon-globe"></span></button>
                          </form>
                    @else 
                          <form method="post" action="/home/publishBattle/{{$battle->id}}" style="display:inline;float:left" >
                           {{ csrf_field() }}
                          <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Pushlish the battle!"><span class="glyphicon glyphicon-globe"></span></button>
                          </form>
                @endif
           
              <button type="button" class="btn btn-success" title="Detail!" data-toggle="modal" data-backdrop="static" data-keyboard="false" onclick="loadBattleInfo({{$battle->id}})"><span class="glyphicon glyphicon-th-list"></span></button>
               @if ($battle->isPublished)
              <button type="button" class="btn btn-warning" data-toggle="tooltip" title="Edit!" disabled="disabled"><span class="glyphicon glyphicon-pencil"></span></button>
              @else 
              <button type="button" class="btn btn-warning" title="Edit!" data-toggle="modal" data-target="#editBattleModal" data-backdrop="static" data-keyboard="false" onclick="resetErrorMess();setValueForEditFrom({{$battle}})"><span class="glyphicon glyphicon-pencil"></span></button>
              @endif
              
       <!--       <form method="post" action="" onsubmit="" style="display:inline;float:left" id="deleteForm">
             {{ csrf_field() }} -->
                 <button type="submit" onclick="checkIfBeAbleToDelete(<?php echo $battle->id?>);" class="btn btn-danger" data-toggle="tooltip" title="Delete!" style="float:left"><span class="glyphicon glyphicon-remove"></span></button>
            <!-- </form> -->
            <script>
                  function checkIfBeAbleToDelete(battle_id){
                      jQuery.ajax({
                        url:'/home/checkIfBeAbleToDelete',
                        type: 'GET',
                        dataType:'json',
                        data: {
                            id: battle_id
                        },
                        success: function( data ){
                      console.log(data.bet_number);

                      if(data.bet_number==0){
                      $.ajax({
                          type: "POST",
                          url: '/home/delete/' + battle_id, // This is what I have updated
                             success: function(response) {
                             window.location.href = "/home";
                          }
                      })
                      }else{
                        $("#errorModal").modal();
                      }

                        },
                        error: function (xhr, b, c) {
                            console.log("xhr=" + xhr + " b=" + b + " c=" + c);
                        }
                  });
                }

                 
            </script>
              </div>
            @endif

             @if (Auth::user()->level==0)
             <button type="button" class="btn btn-success" title="Detail!" data-toggle="modal" data-backdrop="static" data-keyboard="false" onclick="loadBattleInfo({{$battle->id}})"><span class="glyphicon glyphicon-th-list"></span> Detail</button>
              @if(strcmp($battle->bet_deadline,$now->format('Y-m-d H:i:s') )>=0)
                   <button type="button" class="btn btn-info" title="Betting!" data-toggle="modal" data-target="#bettingModal" data-backdrop="static" data-keyboard="false" onclick="resetErrorMess();resetBettingForm();setValueForBettingForm({{$battle}})"><span class="glyphicon glyphicon-usd"></span> Betting</button>
              @else
          
                   <button type="button" class="btn btn-info" title="Betting!" disabled="disabled" "><span class="glyphicon glyphicon-usd"></span> Betting</button>
              @endif
            @endif
            </td>

            </tr>
             @endif
            @endforeach
         </tbody>
         </table>
    </div>
</div>


@endsection
    