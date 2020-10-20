<script type="text/javascript">
    $(document).ready(function(){
      $('#updatebtn').click(function(){
        $.ajax({
          url: '<?=base_url()?>' + 'inactivelist/update',
          data: {'update': 'update'},
          type: 'POST',
          dataType: 'json',
          success: function (data) {
              if (data.msg == 'success') {
                  parent.location.href = '<?=base_url()?>' + 'inactivelist';
              } else {
                 toastr.error("Operation failed!");
              }
            }
        });
      });
    });  
    function deletelist(id) 
    {
       $.ajax({
          url: '<?=base_url()?>' + 'inactivelist/del',
          data: {'del_id': id},
          type: 'POST',
          dataType: 'json',
          success: function (data) {
              if (data.msg == 'success') {
                  parent.location.href = '<?=base_url()?>' + 'inactivelist';
              } else {
                 toastr.error("Operation failed!");
              }
            }
        });
    }

</script>
<div class="portlet light portlet-fit bordered">
  <div class="portlet-body">
    <div class="table-toolbar">
        <div class="action">
          <div class="pull-left">
             <button type="button" id="updatebtn" class="btn btn-success">Update</button> 
          </div>
          <div class="pull-right">
          <h4>Inactive Count:<b><?=sizeof($phonenumberlst)?></b></h4>
          </div>
        <div style="clear: both;"></div>
      </div>
    </div>
    <div class="action" style="overflow: auto;height: 700px;width: 100%;">
    <table class="table table-striped table-hover table-bordered" id="userdata">
    <thead>
      <tr>
        <th width="5%"> # </th>
        <th width="30%">PhoneNumber</th>
        <th width="30%">DateTime</th>
        <th width="8%">State</th>
        <th width="2%">Delete</th>
      </tr>
      </thead>
      <tbody>
      <?php $index=0; foreach ($phonenumberlst as $value) { $index++; ?>
        <tr>
          <td><?=$index?></td>
          <td><?=$value['phonenumber']?></td>
          <td><?=$value['datetime']?></td>
          <td><?=$value['active']?></td>
          <td class="text-center"><a class="fa fa-trash-o" href="javascript:deletelist(<?php echo $value['id']; ?>);"></a></td></tr>  
      <?php } ?>
      </tbody>
    </table>
   </div>
  </div>
  