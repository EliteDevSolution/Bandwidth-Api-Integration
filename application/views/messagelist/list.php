<script type="text/javascript">
    $(document).ready(function(){
      $('#phonenumber_select').change(function(){
         $("#phonenumberform").submit(); 
      });
    });  
    function showDetailDlg(text) 
    {
      $("#detailtextlabel").html(text);
      $("#showdetail").modal();
    }

</script>
<div class="portlet light portlet-fit bordered">
  <div class="portlet-body">
    <div class="table-toolbar pull-right">
      <div class="row">
        <div class="col-md-5">
          <div class="btn-group">
          <form id="phonenumberform">
            <select id="phonenumber_select" name="phonenumber_select" class="form-control input-medium input-inline">
              <option value="all">All</option>
              <?php foreach ($phonenumberlst as $value) {?>
                <? if($curphonenumber == $value['phonenumber']){ ?>
                  <option value="+<?=$value['phonenumber']?>" selected>+<?=$value['phonenumber']?></option>
                <? } else { ?>
                  <option value="+<?=$value['phonenumber']?>">+<?=$value['phonenumber']?></option>
              <?php } } ?>
            </select>
          </form>
          <!--<input type="search" class="form-control input-large input-inline" placeholder="Phone Number..." ></label>-->
          </div>
        </div>
      </div>
    </div>
    <div class="action" style="overflow: auto;height: 700px;width: 100%;">
    <table class="table table-striped table-hover table-bordered" id="userdata">
    <thead">
      <tr>
        <th width="5%"> # </th>
        <th width="15%">Time</th>
        <th width="8%">From</th>
        <th width="8%">To</th>
        <th>Text</th>
        <th width="2%">State</th>
        <th width="8%">Direction</th>
      </tr>
      </thead>
      <tbody>
      <?php $i = 0; 
         foreach ($msglst as $key => $row) {
         $i++; 
         $text = htmlentities($row['text']);
         $realmsg = character_limiter($row['text'],30);
         ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $row['time']; ?></td>
          <td><?php echo $row['fromnumber']; ?></td>
          <td><?php echo $row['to']; ?></td>
          <td><a href='javascript:showDetailDlg("<?=$text?>")'><?php echo $realmsg;?></a>
          </td>
          <td><?php echo $row['state']; ?></td>
          <td><?php echo $row['direction']; ?></td>
          </tr>
      <?php }?>
      </tbody>
    </table>
  </div>
  </div>
  <div class="modal fade in" id="showdetail" tabindex="-1" aria-hidden="true" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Message Content</h4>
        </div>
        <div class="modal-body">
          <div class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="reg-body">
                  <form action="">
                    <div class="col-md-6">
                      <label for="name" id="detailtextlabel"></label>
                    </div>
                   </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>
