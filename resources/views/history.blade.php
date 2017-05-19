<!-- Modal -->
  <div class="modal fade" id="historyModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color:rgb(68,157,68);border-radius:3px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white">Betting History</h4>
        </div>
        <div class="modal-body">
           <table class="jh-table table table-striped" style="width: 100%;" id="detail_table">
            <thead>
            <tr>
            <th class="text-center">Battle ID</th>
            <th class="text-center">Home team</th>
            <th class="text-center">Guest</th>
            <th class="text-center">Win Money</th>
            <th class="text-center">Lose Money</th>
            <th class="text-center">Draw Money</th>
             <th class="text-center">Win</th>
            <th class="text-center">Lose</th>
            <th class="text-center">Draw</th>
            <th class="text-center">Score</th>
            <th class="text-center">Result</th>
            </tr>
         </thead>
         <tbody class="text-center" id="history_table_body">
             
         </tbody>
           </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>