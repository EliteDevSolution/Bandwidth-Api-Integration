<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption ">
                    <i class="icon-settings"></i>
                    <span class="caption-subject bold uppercase" > Vendor Register</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only blue" href="javascript:;">
                        <i class="icon-cloud-upload"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only green" href="javascript:;">
                        <i class="icon-wrench"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only red" href="javascript:;">
                        <i class="icon-trash"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <form role="form" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <label class="col-md-4 control-label" for="name">*Name</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="name" placeholder="Enter your name">
                                <div class="form-control-focus"> </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="form-group form-md-line-input ">
                            <label class="col-md-4 control-label" for="street">Input Street</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="street" placeholder="Enter your street">
                                <div class="form-control-focus"> </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-4 control-label" for="extStreetNumber">External Street Number</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="extStreetNumber" placeholder="Enter your external street number">
                                <div class="form-control-focus"> </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-4 control-label" for="inStreetNumber">Internal Street Number</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="inStreetNumber" placeholder="Enter your internal street number">
                                <div class="form-control-focus"> </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-4 control-label" for="comp_info">Complementary Info</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="comp_info" placeholder="Enter your complementary info">
                                <div class="form-control-focus"> </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-4 control-label" for="city">City</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control"  id="city" placeholder="Enter your city">
                                <div class="form-control-focus"> </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-4 control-label" for="state">State</label>
                            <div class="col-md-4">
                                <div class="md-checkbox-inline">
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="state" value="1" class="md-check">
                                        <label for="state">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> accept </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-4 control-label" for="zip_code">Zip code</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-sm" id="zip_code" placeholder="Enter your zip code">
                                <div class="form-control-focus"> </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-4 control-label" for="country">Country</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control " id="country" placeholder="Enter your country">
                                <div class="form-control-focus"> </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-4 control-label" for="phone_number">PhoneNumber</label>
                            <div class="col-md-4">
                                <input type="number" class="form-control " id="phone_number" placeholder="Enter your phonenumber">
                                <div class="form-control-focus"> </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-4 control-label" for="email">E-Mail</label>
                            <div class="col-md-4">
                                <input type="email" class="form-control" id="email"  placeholder="Enter your e-mail address"
                                       required >
                                <div class="form-control-focus"> </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-4 control-label" for="note">Notes</label>
                            <div class="col-md-4">
                                <textarea class="form-control" rows="3" id="note" placeholder="Enter your notes"></textarea>
                                <div class="form-control-focus"> </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-4 col-md-8">
                                <a  class="btn default" id="cancel">Cancel</a>
                                <a  class="btn blue" id="attach">attach</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>

<script>
    var attach_url = "<?php echo base_url() . ('vendor_controller/register'); ?>";
    var cancel_url = "<?php echo base_url() . ('vendor_controller/index'); ?>";
</script>
