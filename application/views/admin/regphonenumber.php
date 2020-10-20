    <script src="<?php echo base_url() ?>public/js/admin/warehouse.js" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
  
<div class="portlet light portlet-fit bordered">
	<div class="portlet-body">
		<div class="table-toolbar pull-right">
			<div class="row">
				<div class="col-md-6">
					<div class="btn-group">
						<a id="newwarehouse" href="javascript:delete_all()" class="btn dark"> <i class="glyphicon glyphicon-remove"></i> Delete All
						</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="btn-group">
						<a id="newwarehouse" href="javascript:add_warehouse()" class="btn btn-primary"> <i class="fa fa-plus"></i> Add
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="action" style="overflow: auto;height: 700px;width: 100%;">
			<table class="table table-striped table-hover table-bordered" id="userdata">
				<thead>
				<tr>
					<th> # </th>
					<th> <?php echo $this->lang->line("name") ?> </th>
					<th> DateTime </th>
					<th> State</th>
					<th width="5%"> <?php echo $this->lang->line("edit") ?> </th>
					<th width="5%"> <?php echo $this->lang->line("delete") ?> </th>
				</tr>
				</thead>
				<tbody>
				<?php $i = 0; foreach($warehouse as $warehouse) {$i++; ?>
					<tr >
						<td><?php echo $i; ?></td>
						<td><?php echo $warehouse['phonenumber']; ?></td>
						<td><?php echo $warehouse['datetime']; ?></td>
						<td><?php echo $warehouse['active']; ?></td>
						<td class="text-center"><a class="fa fa-edit" href="javascript:edit_warehouse_modal(<?php echo $warehouse['id']; ?>)"></a></td>
						<td class="text-center"><a class="fa fa-trash-o" href="javascript:delete_warehouse(<?php echo $warehouse['id']; ?>)"></a></td>
					</tr>
				<?php }?>
				</tbody>
			</table>
			<textarea style="height:200px; width: 100%;" id="insertnumber"></textarea>
			<button type="button" class="btn blue pull-right" data-dismiss="modal" id="multiaddbtn"><i class="fa fa-plus"></i> Multi Add</button>
		</div>
	</div>
	<div class="modal fade bs-modal-sm in" id="del_modal" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><?php echo $this->lang->line("question") ?></h4>
				</div>
				<div class="modal-body">
					<p><?php echo $this->lang->line("delete_question") ?></p>
				</div>
				<div class="modal-footer">
					<a href="" class="btn blue" id="warehouse_del"><?php echo $this->lang->line("yes") ?></a>
					<button type="button" class="btn btn-green" data-dismiss="modal"><?php echo $this->lang->line("cancel") ?></button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade bs-modal-sm in" id="insert_modal" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Notice</h4>
				</div>
				<div class="modal-body">
					<p>Are you sure multi insert?</p>
				</div>
				<div class="modal-footer">
					<a href="" class="btn blue" id="multiinsert"><?php echo $this->lang->line("yes") ?></a>
					<button type="button" class="btn btn-green" data-dismiss="modal"><?php echo $this->lang->line("cancel") ?></button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade in" id="add_modal" tabindex="-1" aria-hidden="true" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title"><?php echo $this->lang->line("add_dlg_title") ?></h4>
				</div>
				<div class="modal-body">
					<div class="content">
						<div class="container-fluid">
							<div class="row">
								<div class="reg-body">
									<form action="">
										<div class="col-md-6">
											<label for="name"><?php echo $this->lang->line("name") ?>:</label>
											<input type="text" class="form-control" id="name" placeholder="<?php echo $this->lang->line("name_placeholder") ?>" name="name">
										</div>
									 </form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn dark btn-outline"><?php echo $this->lang->line("cancel") ?></button>
					<button type="button" id="warehouse_save" class="btn green"><?php echo $this->lang->line("create_warehouse") ?></button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade in" id="edit_modal" tabindex="-1" aria-hidden="true" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title"><?php echo $this->lang->line("edit_dlg_title") ?></h4>
				</div>
				<div class="modal-body">
					<div class="content">
						<div class="container-fluid">
							<div class="row">
								<div class="reg-body">
									<form action="">
										<div class="col-md-6">
											<label for="name"><?php echo $this->lang->line("name") ?>:</label>
											<input type="text" class="form-control" id="editname" placeholder="<?php echo $this->lang->line("name_placeholder") ?>" name="editname">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn dark btn-outline"><?php echo $this->lang->line("cancel") ?></button>
					<a type="button" id="warehouse_edit" class="btn green"><?php echo $this->lang->line("save") ?></a>
				</div>
			</div>
		</div>
	</div>
</div>