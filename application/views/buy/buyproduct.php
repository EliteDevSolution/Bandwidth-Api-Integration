<script>
    function add_product()
    {
        $.ajax({
            url: $("#baseurl").val() + '/buy/productlist',
            data: {},
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                if (data) {
                    for (i = 0;i<data.length;i++) {
                        var x = document.getElementById("codeproduct");
                        var option = document.createElement("option");
                        option.text = data[i].code+"--"+data[i].name;
                        option.value = data[i].id;
                        x.add(option);
                    }
                    $("#add_modal").modal();
                } else {
                }
            }
        });

    }
</script>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green">
            <i class="icon-pin font-green"></i>
            <span class="caption-subject bold uppercase"> Compras </span>
        </div>
        <div class="form-actions noborder pull-right">
            <button type="button" class="btn blue">Save</button>
        </div>
    </div>
    <div class="portlet-body form">
        <form role="form">
            <div class="form-body">
                <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                    <input type="text" class="form-control form-control edited" readonly="" value="<?php foreach($chitnum as $chitnum) { echo $chitnum['chitnum'];}?>" id="form_control_1">
                    <label for="form_control_1">#</label>
                </div>
                <div class="form-group form-md-line-input form-md-floating-label has-info col-md-4">

                    <select class="form-control edited" id="form_control_1">
                        <?php $i = 0; foreach($warehouse as $warehouse) {$i++; ?>
                        <option value="<?php echo $warehouse['id'];?>" selected=""><?php echo $warehouse['name'];?></option>
                        <?php }?>
                    </select>
                    <label for="form_control_1">Sucursal</label>
                </div>
                <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                    <input class="form-control form-control edited input-medium date-picker" size="16" type="text" value="">
                    <span class="help-block"> Select date </span>
                </div>
                <div class="form-group form-md-line-input form-md-floating-label has-error col-md-4">
                    <?php foreach($userdata as $userdata) {?>
                    <input type="text" class="form-control" disabled="" id="form_control_1">
                    <label for="form_control_1"> Personal:
                        <?php echo $userdata['name']; ?> </label>
                </div>
                <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                    <div class="form-control form-control-static">  <?php echo $userdata['email']; }?>  </div>
                    <label for="form_control_1">Personal correo electrónico</label>
                </div>
                <div class="form-group form-md-line-input form-md-floating-label col-md-4" >
                    <input type="text" class="form-control" id="form_control_1" value="">
                    <label for="form_control_1"> Transpotista </label>
                </div>
                <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                    <input type="text" class="form-control" id="form_control_1">
                    <label for="form_control_1">Huia</label>
                </div>
                <div class="form-group form-md-line-input form-md-floating-label has-success col-md-4">
                    <input type="text" class="form-control" id="form_control_1">
                    <label for="form_control_1">Froma paga</label>
                </div>
                <div class="form-group form-md-line-input form-md-floating-label has-info col-md-4">
                    <select class="form-control edited" id="form_control_1">
                        <?php $i = 0; foreach($vendor as $vendor) {$i++; ?>
                            <option value="<?php echo $vendor['vid'];?>" selected=""><?php echo $vendor['name'];?></option>
                        <?php }?>
                    </select>
                    <label for="form_control_1">Vendor</label>
                </div>
            </div>
        </form>
        <div class="portlet-body">
            <div class="table-toolbar pull-right">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a id="addproduct" href="javascript:add_product()" class="btn green">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered" id="userdata">
                <thead>
                <tr>
                    <th> Clave </th>
                    <th> Producto </th>
                    <th> Precio </th>
                    <th> Ancho </th>
                    <th> Alto </th>
                    <th> M 2 </th>
                    <th> -- $ -- </th>
                    <th> Editar </th>
                    <th> Borrar </th>
                </tr>
                </thead>
                <tbody>
                    <tr >
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td><a class="fa fa-edit" href="javascript:edit_warehouse_modal(<?php echo $warehouse['id']; ?>)">Edit</a></td>
                        <td><a class="fa fa-trash-o" href="javascript:delete_warehouse(<?php echo $warehouse['id']; ?>)">Delete</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade in" id="add_modal" tabindex="-1" aria-hidden="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Añadir Producto</h4>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="reg-body">
                                    <form action="">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input form-md-floating-label has-info  ">
                                                <select class="form-control edited" id="codeproduct">
                                                        <option value="" selected=""><?php echo '';?></option>
                                                </select>
                                                <label for="form_control_1">Clave & Producto</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="price">Precio:</label>
                                                <input type="text" class="form-control" id="price" placeholder="" name="price">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="width">Ancho:</label>
                                                <input type="text" class="form-control" id="width" placeholder="" name="width">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="height">Alto:</label>
                                                <input type="text" class="form-control" id="height" placeholder="" name="height">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancelar</button>
                    <button type="button" id="product_save" class="btn green">Añadir</button>
                </div>
            </div>
        </div>
    </div>
</div>