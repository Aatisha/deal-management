<div class="modal fade" id="manuNotificationModal">
<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title">NOTIFICATIONS </h3>
        </div>

        <div class="modal-body">
          <div class="table-responsive">
          <table class="table table-striped table-re" id="tblGrid">
            <thead id="tblHead">
              <tr>
                <th>Tender Number</th>
                <th>Component Name</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php 
      include_once('php/config.php');
      $query='Select t.tender_id,t.tender_number,t.components_name,ta.bid_status,ta.closedAt from tender_applied ta INNER JOIN tenders_details t ON t.tender_id = ta.tender_id where ta.manufacturer_id =(SELECT m.manufacturer_id FROM logintable l INNER JOIN manufacturer_table m ON l.login_id = m.login_id where l.username="'.$username.'") AND ta.bid_status<>0';
        $result = mysqli_query($conn, $query);
                  if (mysqli_num_rows($result) > 0) {
                  while($row=mysqli_fetch_array($result))
                  {
                    $bid_status=$row['bid_status'];
                    $bid_status_val = "";
                    $bid_status_color ="";
                    if($bid_status == -1){
                      $bid_status_val = "Rejected";
                      $bid_status_color = "#FA1818";
                    }
                    else{
                      $bid_status_val = "Accepted";
                      $bid_status_color = "#84c639";
                    }
                    $closedAt = $row['closedAt'];
                   
                    echo '<tr>
                        <td>'.$row['tender_number'].'</td>
                        <td>'.$row['components_name'].'</td>
                        <td>Your bid got  <span style="background-color: '.$bid_status_color.'; color:white; padding: 1px 4px; font-weight:700;"> '.$bid_status_val.'</span> on '.date_format(date_create($closedAt),'M j, Y | h:i:s A').'</td>
                      </tr>';
                    }
                   }
                else
                {
                  echo '<tr> <td  colspan=3><center><b>No Notifications Available.</b></center></td></tr>';
                }
      ?>
            </tbody>
          </table>
		</div>
  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
        </div>
				
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->