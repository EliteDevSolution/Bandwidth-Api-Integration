<div class="alert alert-success alert-dismissible" id="success_msg" style="display: none;">
  <strong>Success!</strong> <span id="success_text"></span>
</div>
<!-- BEGIN SAMPLE TABLE PORTLET-->
<div class="portlet box">
	<div class="portlet-body">
		<div class="action">
			<a href="javascript:add_product_modal()" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Productos</a>
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
					 Product_name
				</th>
				<th>
					Code
				</th>
				<th>
					  Category
				</th>
				<th>
					 Description
				</th>
				<th>
					 BuyPrice
				</th>
				<th>
					 SellPrice
				</th>
				<th>
					 Edit
				</th>
				<th>
					 Delete
				</th>
			</tr>
			</thead>
			<tbody  id="product_table">
				<?php $i = 0; foreach($products as $product) {$i++; ?>
					<tr id="tr_<?php echo $product['id']; ?>">
						<td><?php echo $i; ?></td>
						<td><?php echo $product['name']; ?></td>
						<td><?php echo $product['code']; ?></td>
						<td><?php echo $product['family']; ?></td>
						<td><?php echo $product['description']; ?></td>
						<td><?php echo $product['buyPrice']; ?></td>
						<td><?php echo $product['sellPrice']; ?></td>
						<td><a href="javascript:edit_product_modal(<?php echo $product['id']; ?>)"><i class="fa fa-edit"></i> Edit</a></td>
						<td><a href="javascript:confirm_delete(<?php echo $product['id']; ?>)"><i class="fa fa-trash-o"></i> Delete</a></td>
					</tr>
				<?php }?>
			</tbody>
			</table>
		</div>
	</div>
</div>
<form class="product-form">
	<div id="product_modal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
			<div class="alert alert-warning alert-dismissible" id="warning_msg" style="display: none;">
			  <strong>Warning</strong> <span id="warning_text"></span>
			</div>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title" id="modal_name"></h4>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
			    <label for="name">*Product Name:</label>
			    <input type="text" class="form-control" id="name" required>
			</div>
			<div class="form-group">
			    <label for="code">*Product Code</label>
			    <input type="text" class="form-control" id="code" required>
			</div>
			<div class="form-group">
			    <label for="category">*Product Category</label>
			    <input type="text" class="form-control" id="category" required>
			</div>
			<div class="form-group">
			    <label for="buyPrice">*Product BuyPrice</label>
			    <input type="number" class="form-control" id="buyPrice" required>
			</div>
			<div class="form-group">
			    <label for="sellPrice">*Product SellPrice</label>
			    <input type="number" class="form-control" id="sellPrice" required>
			</div>
			<div class="form-group">
			    <label for="description">Product Description</label>
			    <textarea type="text" class="form-control" id="description"></textarea>
			</div>
	      </div>
	      <div class="modal-footer">
	      	<a href="" class="btn btn-primary" id="product_ctrl"></a>
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
      <p>Product will delete.Are you sure?</p>
    </div>
    <div class="modal-footer">
    	<a href="" class="btn btn-default" id="product_del">Sure</a>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>/public/js/product/product.js"></script>
<script>
function confirm_delete(id) {
	$('#product_del').attr('href','javascript:delete_product('+id+')');
	$("#del_modal").modal();
}
</script>