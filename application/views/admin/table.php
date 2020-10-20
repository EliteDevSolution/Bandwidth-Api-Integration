
<?php $i = 0; foreach($user as $user) {$i++; ?>
	<tr id="tr_<?php echo $user['id']; ?>">
		<td><?php echo $i; ?></td>
		<td><?php echo $user['name']; ?></td>
		<td><?php echo $user['email']; ?></td>
		<td><?php echo $user['password']; ?></td>
		<td><?php echo $user['phone']; ?></td>
		<td><?php echo $user['country']; ?></td>
		<td><?php echo $user['createdAt']; ?></td>
		<td><a class="fa fa-edit" href="javascript:edit_user_modal(<?php echo $user['id']; ?>)">Editar</a></td>
		<td><a class="fa fa-trash-o" href="javascript:delete_user(<?php echo $user['id']; ?>)">Borrar</a></td>
	</tr>
<?php }?>
