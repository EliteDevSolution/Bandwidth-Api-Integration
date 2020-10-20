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
			<a href="javascript:add_provider_modal()" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add provider</a>
			<div class="search pull-right">
			</div>
			<div style="clear: both;"></div>
		</div>
		<div class="table-scrollable" style="margin-top: 10px;">
			<table class="table table-striped table-hover table-bordered">
				<thead>
				<tr>
					<th>
						No
					</th>
					<th>
						Name
					</th>
					<th>
						Street
					</th>
					<th>
						ExtStreet number
					</th>
					<th>
						InStreet number
					</th>
					<th>
						Complementary info
					</th>
					<th>
						city
					</th>
					<th>
						Zipe code
					</th>
					<th>
						country
					</th>
					<th>
						Phone number
					</th>
					<th>
						E-Mail
					</th>
					<th>
						state
					</th>
					<th>
						Edit
					</th>
					<th>
						Delete
					</th>
				</tr>
				</thead>
				<tbody  id="provider_table">
				<?php $i = ($page-1) * $per_page; foreach($provider as $v) {$i++;
						$d = '';
						if($v['state'] ==1)
							$s = 'accept';
						else
							$s = 'close';
					?>
					<tr id="tr_<?php echo $v['pid']; ?>">
						<td><?php echo $i; ?></td>
						<td><?php echo $v['name']; ?></td>
						<td><?php echo $v['street']; ?></td>
						<td width="100"><?php echo $v['extStreetNumber']; ?></td>
						<td width="100"><?php echo $v['inStreetNumber']; ?></td>
						<td width="100"><?php echo $v['complementaryInfo']; ?></td>
						<td width="150"><?php echo $v['city']; ?></td>
						<td><?php echo $v['zipcode']; ?></td>
						<td><?php echo $v['country']; ?></td>
						<td><?php echo $v['phoneNumber']; ?></td>
						<td><?php echo $v['mail']; ?></td>
						<td><?php echo $s; ?></td>
						<td><a href="javascript:edit_provider_modal(<?php echo $v['pid']; ?>)"><i class="fa fa-edit"></i> Edit</a></td>
						<td><a href="javascript:confirm_delete(<?php echo $v['pid']; ?>)"><i class="fa fa-trash-o"></i> Delete</a></td>
					</tr>
				<?php }?>
				</tbody>
			</table>
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
					$config['base_url'] = site_url().'/provider_controller/index';
					$config['total_rows'] = $total;
					$config['per_page'] = 10;
					$this->pagination->initialize($config);
					echo $this->pagination->create_links();
				?>
			</div>
		</div>
	</div>
</div>
<form class="vendeor-form">
	<div id="provider_modal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" id="modal_name"></h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="name">*Name:</label>
						<input type="text" class="form-control" id="name">
					</div>
					<div class="form-group">
						<label for="street">street</label>
						<input type="text" class="form-control" id="street">
					</div>
					<div class="form-group">
						<label for="extStreetNumber">ExternalStreetNumber</label>
						<input type="text" class="form-control" id="extStreetNumber">
					</div>
					<div class="form-group">
						<label for="inStreetNumber">InnerStreetNumber</label>
						<input type="text" class="form-control" id="inStreetNumber">
					</div>
					<div class="form-group">
						<label for="complementary_info">complementary info</label>
						<input type="text" class="form-control" id="complementary_info">
					</div>
					<div class="form-group">
						<label for="city">city</label>
						<input type="text" class="form-control" id="city">
					</div>
					<div class="form-group">
						<label for="zipcode">zip code</label>
						<input type="text" class="form-control" id="zipcode">
					</div>
					<div class="form-group">
						<label for="country">country</label>
						<input type="text" class="form-control" id="country">
					</div>
					<div class="form-group">
						<label for="phonenumber">phone number</label>
						<input type="text" class="form-control" id="phonenumber">
					</div>
					<div class="form-group">
						<label for="mail"> e-mail</label>
						<input type="text" class="form-control" id="mail">
					</div>
					<div class="form-group">
						<label for="state"> state</label>
						<input type="checkbox" class="form-control" id="state">
						<span>accept</span>
					</div>
				</div>
				<div class="modal-footer">
					<a href="" class="btn btn-primary" id="provider_ctrl">Sure</a>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</form>
<div class="modal fade" id="del_modal" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Notice</h4>
			</div>
			<div class="modal-body">
				<p>provider will delete.Are you sure?</p>
			</div>
			<div class="modal-footer">
				<a href="" class="btn btn-default" id="provider_del">Sure</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
    <!-- END CONTENT -->
    <script>
        function confirm_delete(id) {
            $('#provider_del').attr('href','javascript:delete_provider('+id+')');
            $("#del_modal").modal();
        }
        var provider_add = "<?php echo base_url() . ('provider/add');?>";
        var provider_edit = "<?php echo base_url() . ('provider/edit');?>";
        var provider_delete = "<?php echo base_url() . ('provider/del');?>";
        var provider_search = "<?php echo base_url() . ('provider/search');?>";
    </script>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/js/provider/provider.js"></script>
