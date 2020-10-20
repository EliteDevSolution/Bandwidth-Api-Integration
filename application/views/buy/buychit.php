
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    $(document).ready(function() {
        //$('#addchit').click(function(){
        //    $.ajax({
        //        url: '<?php //echo base_url() ?>///buy/product',
        //        data: {firstname: firstname, lastname: lastname, email: email, phone: phone, password: password, country: country,
        //            city: city, street: street, exterior: exterior, interior: interior, colonia: colonia},
        //        type: 'POST',
        //        dataType: 'json',
        //        success: function(data) {
        //
        //            if (data.msg=='success') {
        //                parent.location.href = '<?php //echo base_url() ?>//user';
        //                alert("Created Successfully!");
        //            }
        //            else
        //            {
        //                alert("Existing User!");
        //            }
        //        }
        //     });
        //});
    });
</script>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-body">
                    <div class="table-toolbar pull-right">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a id="addchit" href="<?php echo base_url() ?>/buy/product" class="btn green">  Add
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="userdata">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Sucursal </th>
                            <th> Personal </th>
                            <th> Transportista</th>
                            <th> Huia</th>
                            <th> FormaPaygo</th>
                            <th> Proveeder</th>
                            <th> Date</th>
                            <th> edit</th>
                            <th> delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; foreach($buydata as $buydata) {$i++; ?>
                            <tr >
                                <td><?php echo $buydata['chitNum']; ?></td>
                                <td><?php echo $buydata['warehouse']; ?></td>
                                <td><?php echo $buydata['name']; ?></td>
                                <td><?php echo $buydata['shipCmp']; ?></td>
                                <td><?php echo $buydata['tracking']; ?></td>
                                <td><?php echo $buydata['payWay']; ?></td>
                                <td><?php echo $buydata['vendor']; ?></td>
                                <td><?php echo $buydata['buyDate']; ?></td>
                                <td><a class="fa fa-edit" href="javascript:edit_user_modal(<?php echo $buydata['id']; ?>)">Edit</a></td>
                                <td><a class="fa fa-trash-o" href="javascript:delete_user(<?php echo $buydata['id']; ?>)">Delete</a></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
                <div class="modal fade bs-modal-sm in" id="del_modal" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Notice</h4>
                            </div>
                            <div class="modal-body">
                                <p>Could you delete this warehouse?</p>
                            </div>
                            <div class="modal-footer">
                                <a href="" class="btn blue" id="warehouse_del">Yes</a>
                                <button type="button" class="btn btn-green" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade in" id="add_modal" tabindex="-1" aria-hidden="true" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Add new Warehouse!</h4>
                            </div>
                            <div class="modal-body">
                                <div class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="reg-body">
                                                <form action="">
                                                    <div class="col-md-6">
                                                        <label for="name">Warehouse Name:</label>
                                                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                <button type="button" id="warehouse_save" class="btn green">Create Warehouse</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade in" id="edit_modal" tabindex="-1" aria-hidden="true" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Edit Warehouse!</h4>
                            </div>
                            <div class="modal-body">
                                <div class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="reg-body">
                                                <form action="">
                                                    <div class="col-md-6">
                                                        <label for="name">Warehouse Name:</label>
                                                        <input type="text" class="form-control" id="editname" placeholder="Enter Name" name="editname">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                <a type="button" id="warehouse_edit" class="btn green">Save Warehouse</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
