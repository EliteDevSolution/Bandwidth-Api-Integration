
<?php $i = 0; foreach($products as $product) {$i++; ?>
	<tr id="tr_<?php echo $product['id']; ?>">
		<td><?php echo $i; ?></td>
		<td><?php echo $product['name']; ?></td>
		<td><?php echo $product['code']; ?></td>
		<td><?php echo $product['family']; ?></td>
		<td><?php echo $product['description']; ?></td>
		<td><?php echo $product['buyPrice']; ?></td>
		<td><?php echo $product['sellPrice']; ?></td>
		<td><a href="javascript:edit_product_modal(<?php echo $product['id']; ?>)">Edit</a></td>
		<td><a href="javascript:confirm_delete(<?php echo $product['id']; ?>)">Delete</a></td>
	</tr>
<?php }?>