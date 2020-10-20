<form name="sendmsgform" id="sendmsgform" method="post" action="<?=base_url()?>vendor/send">
<div class="alert alert-success alert-dismissible" id="success_msg" style="display: none;">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Success!</strong> <span id="success_text"></span>
</div>
<div class="alert alert-warning alert-dismissible" id="warning_msg" style="display: none;">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Warning</strong> <span id="warning_text"></span>
</div>
<!-- BEGIN SAMPLE TABLE PORTLET-->
<div class="portlet box">
	<div class="portlet-body">
			<div class="action">
				<div class="pull-right">
				<h4>Active Count:<b><?=$total?></b></h4>
				</div>
				<div style="clear: both;"></div>
			</div>
			<div class="table-scrollable" style="margin-top: 10px;">
			<table class="table table-striped table-hover table-bordered">
				<thead>
				<tr>
					<!--
					<th width="2%">
						<input type="checkbox" name="chk_all" id="chk_all"/>
					</th>
					-->
					<th width="5%">
						No
					</th>
					<th>
						SendPhoneNumber
					</th>
					<th>
						State
					</th>
				</tr>
				</thead>
				<tbody  id="vendor_table">
				<?php $i = ($page - 1) * $per_page; foreach($fromphonenumberlst as $v) {$i++;?>
					<tr id="">
						<!--
						<td><input class="ele_chk" type="checkbox" name="chk_<?=$i?>" id="chk_<?=$i?>"/></td>-->
						<td><?php echo $i; ?></td>
						<td width="100"><?php echo '+'.$v['phonenumber']; ?></td>
						<td width="20%" align="center">active</td>
					</tr>
				<?php }?>
				</tbody>
			</table>
			<div class="full">
		    <textarea class="form-control" placeholder="Type message" style="height: 80px;" name="msgcontent" id="msgcontent"></textarea><br>	
		   	 <button type="button" id="sendbtn" class="btn btn-primary pull-right">Send</button>
			</div>
			<div class="action">
				<label class="control-label" for="email">TestNumber:</label>
				<input class='form-control input-medium input-inline' placeholder="Enter Test PhouneNumber" name="test_phonenumber" id="test_phonenumber" 
				 value="<?php echo set_value('test_phoneumber','+17193777791');?>" />
				<button type="button" id="sendtestbtn" class="btn dark">Send test</button>
				<div style="clear: both;"></div>
			</div>
			<div style="padding-left:35%;">
				<?php
					$this->load->library('pagination');
					$config['uri_segment'] = 3;
					$config['num_links'] = 2;
					$config['use_page_numbers'] = TRUE;
					$config['page_query_string'] = TRUE;
					$config['full_tag_open'] = '<ul class="pagination">';
					$config['full_tag_close'] = '</ul>';
					$config['first_link'] = 'First';
					$config['first_tag_open'] = '<li class="prev page">';
					$config['first_tag_close'] = '</li>';
					$config['last_link'] ='last';
					$config['last_tag_open'] = '<li class="next page">';
					$config['last_tag_close'] ='</li>';
					$config['next_link'] = '&gt';
					$config['next_tag_open'] = '<li class="next page">';
					$config['next_tag_close'] = '</li>';
					$config['prev_link'] = '&lt';
					$config['prev_tag_open'] = '<li class="prev page">';
					$config['prev_tag_close'] = '</li>';
					$config['cur_tag_open'] = '<li class="active"><a href="">';
					$config['cur_tag_close'] = '</a></li>';
					$config['num_tag_open'] = '<li class="page">';
					$config['num_tag_close'] = '</li>';
					$config['base_url'] = base_url().'/vendor';
					$config['total_rows'] = $total;
					$config['per_page'] = 10;
					$this->pagination->initialize($config);
					echo $this->pagination->create_links();
				?>
			</div>
		</div>
	</div>
</div>

<!--<div>
    <label for="inputdefault">Messages</label>
    <input class="form-control" id="inputdefault" type="text">
	<a href="javascript:add_vendor_modal()" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Send</a>
<div>-->
</form>
<!-- END SAMPLE TABLE PORTLET-->
    <script>
	$(document).ready(function() {
		$('#sendbtn').click(function(){
			if($("#msgcontent").val() == "")
			{
				toastr.warning("Enter message content!" ,"Notice");
				$("#msgcontent").focus();
				return;	
			}
			$.ajax({
	        url: '<?=base_url()?>' + 'vendor/send',
	        data: {'msgcontent':$('#msgcontent').val()},
	        type: 'GET',
	        dataType: 'text',
	        error: function (jqXHR, textStatus, errorThrown) 
	        {
	        	toastr.error("Operation failed!","Notice");
	        },
	        success: function (msg) {
	            if (msg.indexOf("okokok") != -1) {
	            	toastr.success("Operation Suceess.", "Notice");
	            } else {
	            	toastr.error("Operation failed!","Notice");
	        	}
	    	}
	      });
	   	});
		$('#sendtestbtn').click(function(){
			if($('#test_phonenumber').val() == "")
			{
				toastr.warning("Enter test phonenumber!" ,"Notice");
				$("#test_phonenumber").focus();
				return;
			}
			if($("#msgcontent").val() == "")
			{
				toastr.warning("Enter message content!" ,"Notice");
				$("#msgcontent").focus();
				return;	
			}
			$.ajax({
	        url: '<?=base_url()?>' + 'vendor/sendtestnumber',
	        data: {'testnumber': $('#test_phonenumber').val(), 'msgcontent':$('#msgcontent').val()},
	        type: 'GET',
	        dataType: 'text',
	        success: function (msg) {
	            if (msg.indexOf("okokok") != -1) {
	            	toastr.success("Operation Suceess.", "Notice");
	            } else {
	            	toastr.error("Operation failed!","Notice");
	        	}
	    	}
	      });
	   });
	});
</script>