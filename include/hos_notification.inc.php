<div class="modal fade" id="hosNotificationModal">
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
                <th>Description</th>
                <th>Complete Bid</th>
              </tr>
            </thead>
            <tbody>
              <?php 
      include_once('php/config.php');
      $query='SELECT t.tender_number,t.components_name,t.tender_end_date,t.tender_id FROM tenders_details t INNER JOIN hospital_table h ON t.hospital_id = h.hospital_id INNER JOIN logintable l ON l.login_id = h.login_id where t.tender_display_status=-1 AND l.username="'.$username.'"';
        $result = mysqli_query($conn, $query);
                  if (mysqli_num_rows($result) > 0) {
                  while($row=mysqli_fetch_array($result))
                  {
                    echo '<tr>
                        <td>'.$row['tender_number'].'</td>
                        <td>'.$row['components_name'].'</td>
                        <td> Tender Completed on '.$row['tender_end_date'].' </td>
                       <td>
                        <form   action="selectappliedbid.php" method="post">
                        <input type="hidden" name="tid" id="tid" value="'.$row['tender_id'].'">
                        <input type="submit" name="edit" value="Complete Bid" class="btn btn-block btn-primary">
                      </form>
                      </td>
                      </tr>';
                    }
                   }
                else
                {
                  echo '<tr> <td  colspan=4><center><b>No Notifications Available.</b></center></td></tr>';
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