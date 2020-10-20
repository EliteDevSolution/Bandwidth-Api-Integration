<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">				
			<!-- BEGIN SAMPLE TABLE PORTLET-->
			<div class="portlet box yellow">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-comments"></i><?php echo $this->lang->line("permission") ?>
					</div>
				</div>
				<div class="portlet-body">
					<div class="table-scrollable">
						<table class="table table-bordered table-hover">
							<thead>
							<tr>
								<th> <?php echo $this->lang->line("type") ?> </th>
								<th> <?php echo $this->lang->line("add") ?> </th>
								<th> <?php echo $this->lang->line("delete") ?> </th>
								<th> <?php echo $this->lang->line("modify") ?> </th>
								<th> <?php echo $this->lang->line("view") ?> </th>
							</tr>
							</thead>
							<tbody>
								<?php $i = 0; foreach($userAuthority as $ua) {$i++; $str = decbin($ua['sellerAuthority']);?>		
								<tr>
									<td><?php echo $this->lang->line("seller") ?></td>
									
									<td><input id="s11" type="checkbox" <?php echo ((((int)$ua['sellerAuthority'] & 8) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s12" type="checkbox" <?php echo ((((int)$ua['sellerAuthority'] & 4) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s13" type="checkbox" <?php echo ((((int)$ua['sellerAuthority'] & 2) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s14" type="checkbox" <?php echo ((((int)$ua['sellerAuthority'] & 1) > 0) ? "checked" : "");?> ></input></td>		
								</tr>    
								<tr>     
									<td><?php echo $this->lang->line("provider") ?></td>
									<?php $str = $ua['providerAuthority'];?>
									<td><input id="s21" type="checkbox" <?php echo ((((int)$str & 8) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s22" type="checkbox" <?php echo ((((int)$str & 4) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s23" type="checkbox" <?php echo ((((int)$str & 2) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s24" type="checkbox" <?php echo ((((int)$str & 1) > 0) ? "checked" : "");?> ></input></td>	
								</tr>   
								<tr>    
									<td><?php echo $this->lang->line("customer") ?></td>										
									<?php $str = $ua['customerAuthority'];?>
									<td><input id="s31" type="checkbox" <?php echo ((((int)$str & 8) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s32" type="checkbox" <?php echo ((((int)$str & 4) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s33" type="checkbox" <?php echo ((((int)$str & 2) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s34" type="checkbox" <?php echo ((((int)$str & 1) > 0) ? "checked" : "");?> ></input></td>	
								</tr>  
								<tr>    
									<td><?php echo $this->lang->line("product") ?></td>										
									<?php $str = $ua['productAuthority'];?>
									<td><input id="s41" type="checkbox" <?php echo ((((int)$str & 8) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s42" type="checkbox" <?php echo ((((int)$str & 4) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s43" type="checkbox" <?php echo ((((int)$str & 2) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s44" type="checkbox" <?php echo ((((int)$str & 1) > 0) ? "checked" : "");?> ></input></td>	
								</tr>   
								<tr>   
									<td><?php echo $this->lang->line("sells") ?></td>
									<?php $str = $ua['sellsAuthority'];?>
									<td><input id="s51" type="checkbox" <?php echo ((((int)$str & 8) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s52" type="checkbox" <?php echo ((((int)$str & 4) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s53" type="checkbox" <?php echo ((((int)$str & 2) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s54" type="checkbox" <?php echo ((((int)$str & 1) > 0) ? "checked" : "");?> ></input></td>	
								</tr>   
								<tr>    
									<td><?php echo $this->lang->line("buy") ?></td>
									<?php $str = $ua['buyAuthority'];?>
									<td><input id="s61" type="checkbox" <?php echo ((((int)$str & 8) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s62" type="checkbox" <?php echo ((((int)$str & 4) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s63" type="checkbox" <?php echo ((((int)$str & 2) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s64" type="checkbox" <?php echo ((((int)$str & 1) > 0) ? "checked" : "");?> ></input></td>	
								</tr>    
								<tr>    
									<td><?php echo $this->lang->line("transfer") ?></td>
									<?php $str = $ua['transferAuthority'];?>
									<td><input id="s71" type="checkbox" <?php echo ((((int)$str & 8) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s72" type="checkbox" <?php echo ((((int)$str & 4) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s73" type="checkbox" <?php echo ((((int)$str & 2) > 0) ? "checked" : "");?> ></input></td>
									<td><input id="s74" type="checkbox" <?php echo ((((int)$str & 1) > 0) ? "checked" : "");?> ></input></td>	
								</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- END SAMPLE TABLE PORTLET-->
		</div>
		<div class="col-md-6">
			<div class="portlet light ">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-edit font-dark"></i>
						<span class="caption-subject font-dark bold uppercase"><?php echo $this->lang->line("userdetail") ?></span>
					</div>
					<a id="newuser" href="<?php echo base_url(); ?>user" class="btn green pull-right"> <?php echo $this->lang->line("back") ?>
						<i class="fa fa-return"></i>
					</a>
				</div>
				<div class="portlet-body">
					<div class="note note-success">
					<?php $i = 0; foreach($userdata as $user) {$i++; ?>							
							<h4 class= "block"><b><?php echo $this->lang->line("name") ?> : <?php echo $user['name'];?></b></h4>
							<!--<input type="text" class="form-control" id="country" placeholder="Enter Country" name="country">-->
							<h5><b><?php echo $this->lang->line("email") ?> : <?php echo $user['email'];?></b></h5>
							<!--<input type="text" class="form-control" id="country" placeholder="Enter Country" name="country">-->
							<label id="usernum" data-id="<?php echo $user['id'];?>" style="display:none"><?php echo $user['id'];?></label>
					<?php }?>
					</div>
				</div>
			</div>
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-comments"></i><?php echo $this->lang->line("warehouse_check") ?></div>
				</div>
				<div class="portlet-body">
					<div class="table-scrollable">
						<table class="table table-bordered table-hover">
							<thead>
						   <tr>
								<th> # </th>
								<th> <?php echo $this->lang->line("name") ?> </th>
								<th> <?php echo $this->lang->line("select") ?> </th>
							</tr>
							</thead>
							<tbody>
							<?php $i = 0; foreach($warehouse as $warehouse) {$i++; ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $warehouse['name']; ?></td>
										<td><input id = "w<?php echo $warehouse['id']?>"type="checkbox" 
										<?php 
											$i = 0; 
											foreach($warehousecheck as $check) {
												$i++; 
												if($check['warehouseId']==$warehouse['id']){
													echo "checked";
												}
											}
										?>></input></td>
								</tr>
							<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<script>
	$(document).ready(function() {
		$('[id^="w"]').change(function(data){
			var ware_num = data.currentTarget['id'];			
			var state=document.getElementById(ware_num).checked;
			var usernum = $('#usernum').data("id");
			ware_num=ware_num.slice(1);
			$.ajax({
                url: '<?php echo base_url() ?>user/warehouse_check',
                data: {'usernum':usernum,'id':ware_num,'state':state},
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                }
            });
		});
		$('[id^="s"]').change(function(data){
			var auth_num = data.currentTarget['id'];			
			var state = document.getElementById(auth_num).checked;
			var usernum = $('#usernum').data("id");
			var id = auth_num.slice(1,2);
			auth_num = auth_num.slice(2);
			var value;
			if(state == true)
			{
				value = 2**(4-eval(auth_num));
			}
			else if(state == false)
			{
				value = 15-2**(4-eval(auth_num));
			}

			$.ajax({
                url: '<?php echo base_url() ?>user/authority_check',
                data: {'usernum':usernum,'id':id,'state':state,'value':value},
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                }
            });
		});
	});
</script>
</html>