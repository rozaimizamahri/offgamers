<!DOCTYPE html>
@extends('layouts.app')
@section('css')
@endsection

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Orders</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li> 
                    <li class="breadcrumb-item active">Orders</li>
                </ol>
            </div> 
        </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 col-md-12"> 

                    <!-- Modal -->
                        <!-- Add -->
                            <div id="modal_create" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; overflow-y:auto;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Fill in details (Fields <font color="red">*</font> asterisk required)</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">

                                            <form id='form-create' class="form-create" name="form-create" action="{{url('/orders/create')}}" method="post"> 
                                            @csrf   

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Order Name</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="name_create" class="form-control name_create" name="name_create" value="" placeholder="">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Customer</label>
                                                        <div class="col-md-9">  
                                                            <select id="customer_create" class="form-control select2 custom-select customer_create" name="customer_create" style="width: 100%;"> 
                                                                <option value="" selected="selected">Select Customer</option>    
                                                            </select>
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Currency</label>
                                                        <div class="col-md-9">  
                                                            <select id="currency_create" class="form-control select2 custom-select currency_create" name="currency_create" style="width: 100%;"> 
                                                                <option value="" selected="selected">Select Currency</option>  
                                                            </select>
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  

                                       
                                                <input type="hidden" id="exchange_rate_create" class="form-control exchange_rate_create" name="exchange_rate_create" value="4.36" placeholder="" readonly="readonly">  
                                                  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Order Amount</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="amount_create" class="form-control amount_create" name="amount_create" value="" placeholder="i.e 10.00">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>   
                                            
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-success waves-effect text-left" id="info_create" >Create</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>  
                                </div> 
                            </div> 
                        <!-- Add -->   
                        
                        <!-- Update -->
                            <div id="modal_update" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; overflow-y:auto;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Fill in details (Fields <font color="red">*</font> asterisk required)</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">

                                            <form id='form-update' class="form-update" name="form-update" action="{{url('/orders/update')}}" method="post"> 
                                            @csrf  

                                                <input type="hidden" id="order_id_update" class="form-control order_id_update" name="order_id_update" value="" placeholder="" readonly="readonly">  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Order Name</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="name_update" class="form-control name_update" name="name_update" value="" placeholder="">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Customer</label>
                                                        <div class="col-md-9">  
                                                            <select id="customer_update" class="form-control select2 custom-select customer_update" name="customer_update" style="width: 100%;"> 
                                                                <option value="" selected="selected">Select Customer</option>    
                                                            </select>
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Currency</label>
                                                        <div class="col-md-9">  
                                                            <select id="currency_update" class="form-control select2 custom-select currency_update" name="currency_update" style="width: 100%;"> 
                                                                <option value="" selected="selected">Select Currency</option>     
                                                            </select>
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  

                                       
                                                <input type="hidden" id="exchange_rate_update" class="form-control exchange_rate_update" name="exchange_rate_update" value="4.36" placeholder="" readonly="readonly">  
                                                  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Order Amount</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="amount_update" class="form-control amount_update" name="amount_update" value="" placeholder="i.e 10.00">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>   
                                            
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-warning waves-effect text-left" id="info_update" >Update</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>  
                                </div> 
                            </div> 
                        <!-- Update -->  

                        <!-- Delete -->
                            <div id="modal_delete" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; overflow-y:auto;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Confirm Delete ?</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">

                                            <form id='form-delete' class="form-delete" name="form-delete" action="{{url('/orders/delete')}}" method="post"> 
                                            @csrf  

                                                <input type="hidden" id="order_id_delete" class="form-control order_id_delete" name="order_id_delete" value="" placeholder="" readonly="readonly">  

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-danger waves-effect text-left" id="info_delete" >Delete</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>  
                                </div> 
                            </div> 
                        <!-- Delete -->
                        
                        <!-- Checkout / Payment -->
                            <div id="modal_checkout" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; overflow-y:auto;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Fill in details (Fields <font color="red">*</font> asterisk required)</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">

                                            <form id='form-checkout' class="form-checkout" name="form-checkout" action="{{url('/orders/checkout')}}" method="post"> 
                                            @csrf  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-left col-md-3"> Title</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="name_checkout" class="form-control name_checkout" name="name_checkout" value="" placeholder="" readonly="readonly">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-left col-md-3"> Customer</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="customer_checkout" class="form-control customer_checkout" name="customer_checkout" value="" placeholder="" readonly="readonly">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-left col-md-3"> Amount</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="amount_checkout" class="form-control amount_checkout" name="amount_checkout" value="" placeholder="" readonly="readonly">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>   
                                                
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-left col-md-3"> Rewards / Points Available</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="point_checkout" class="form-control point_checkout" name="point_checkout" value="" placeholder="" readonly="readonly">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-left col-md-3"> Total discount (USD)</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="discount_checkout" class="form-control discount_checkout" name="discount_checkout" value="" placeholder="" readonly="readonly">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-left col-md-3"> Total Amount to pay (USD)</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="total_checkout" class="form-control total_checkout" name="total_checkout" value="" placeholder="" readonly="readonly">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>   

                                                <input type="hidden" id="order_id_checkout" class="form-control order_id_checkout" name="order_id_checkout" value="" placeholder="" readonly="readonly">  

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-success waves-effect text-left" id="info_checkout" >Pay Now</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>  
                                </div> 
                            </div> 
                        <!-- Checkout / Payment -->
                    <!-- Modal --> 

                    <!-- List -->
                        <div class="card card-default">
                            <div class="card-header">
                                <div class="card-actions">
                                    <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                </div>
                                <h4 class="card-title m-b-0">Order List  | If dropdown selection not appear, kindly <a href="{{url('/home')}}">Refresh Page</a></h4> 
                            </div>
                            <div class="card-body collapse show"> 
                                <div class="card">
                                    <div class="card-body"> 
                                        
                                        <button type="button" class="btn btn-xs btn-success" onClick="createOrder('1');" ><i class="mdi mdi-library-plus"> New Order</i></button>  
                                        <br/>
                                        <br/>

                                        <form id='form-order' class="form-order" action="" method="post">
                                        @csrf 
                                            <div class="table-responsive"> 
                                                <table id="table-order" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead style="background-color:#D2691E; color:#ffffff;">
                                                        <tr>
                                                            <th style="vertical-align:top;" rowspan="2">No</th> 
                                                            <th style="vertical-align:top; text-align:center;" colspan="3">Action</th>    
                                                            <th style="vertical-align:top;" rowspan="2">Ref No</th>  
                                                            <th style="vertical-align:top;" rowspan="2">Title</th>  
                                                            <th style="vertical-align:top;" rowspan="2">Customer</th>  
                                                            <th style="vertical-align:top;" rowspan="2">Amount (USD)</th>  
                                                            <th style="vertical-align:top;" rowspan="2">Status</th>   
                                                            <th style="vertical-align:top;" rowspan="2">Submit By</th> 
                                                            <th style="vertical-align:top;" rowspan="2">Submit Date/Time</th>  
                                                        </tr>
                                                        <tr style="background-color:#DEB887; color:#ffffff;">     
                                                            <th>Edit</th>      
                                                            <th>Delete</th>      
                                                            <th>Checkout /<br/>Payment</th>      
                                                        </tr>
                                                    </thead> 
                                                    <tbody> 
                                                        <?php
                                                            if(count($orders) != 0)
                                                            {
                                                                $count = 1;
                                                                foreach($orders as $order)
                                                                { 
                                                                    $parameter = $order->id_order;   
                                                                ?>

                                                                    <tr> 
                                                                        <td><?php echo $count++; ?></td> 
                                                                            
                                                                        

                                                                        <?php
                                                                            if($order->status === 'PENDING'){?>
                                                                                <td> 
                                                                                    <a href="javascript:void(0)" onClick="updateOrder('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-warning">
                                                                                        <i class="mdi mdi-table-edit"></i>
                                                                                    </a>	 
                                                                                </td>
                                                                                <td> 
                                                                                    <a href="javascript:void(0)" onClick="deleteOrder('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-danger">
                                                                                        <i class="mdi mdi-delete"></i>
                                                                                    </a>	 
                                                                                </td> 
                                                                                <td> 
                                                                                    <a href="javascript:void(0)" onClick="checkoutOrder('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-success">
                                                                                        <i class="mdi mdi-cart"></i>
                                                                                    </a>	 
                                                                                </td>
                                                                            <?php
                                                                            } else {?> 
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                            <?php
                                                                            }
                                                                        ?>
                                                                        

                                                                        <td><?php echo $order->refno; ?></td>  
                                                                        <td><?php echo $order->name; ?></td>  
                                                                        <td><?php echo $order->user_name; ?></td>  
                                                                        <td><?php echo $order->amount; ?></td>  
                                                                        <td><?php echo $order->status; ?></td>       

                                                                        <td><?php echo $order->submit_by; ?></td>       
                                                                        <td><?php echo $order->submit_dt; ?></td>     
                                                                    </tr> 

                                                                <?php
                                                                }
                                                            }
                                                            else
                                                            {

                                                            }
                                                        ?> 
                                                    </tbody>   
                                                </table> 
                                            </div>

                                        </form>  

                                    </div>
                                </div>

                            </div>
                        </div>
                    <!-- List -->

                </div>
            </div>
        </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
@endsection

@section('js')
<!-- This is data table -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }} "></script>

<!-- start - This is for export functionality only -->
<script src="{{ asset('assets/plugins/datatables/cdn/dataTables.buttons.min.js') }} "></script>
<script src="{{ asset('assets/plugins/datatables/cdn/buttons.flash.min.js') }} "></script>
<script src="{{ asset('assets/plugins/datatables/cdn/jszip.min.js') }} "></script>
<script src="{{ asset('assets/plugins/datatables/cdn/pdfmake.min.js') }} "></script>
<script src="{{ asset('assets/plugins/datatables/cdn/vfs_fonts.js') }} "></script>
<script src="{{ asset('assets/plugins/datatables/cdn/buttons.html5.min.js') }} "></script>
<script src="{{ asset('assets/plugins/datatables/cdn/buttons.print.min.js') }} "></script>
<!-- end - This is for export functionality only -->

<!-- Manipulate Datetime in Javascript -->
<script src="{{ asset('assets/plugins/moment/cdn/moment-with-locales.min.js') }} "></script>
<script src="{{ asset('assets/plugins/moment/cdn/moment.min.js') }} "></script>

<!-- Validate -->
<script src="{{ asset('assets/plugins/validate/1.14.0/jquery.validate.min.js') }} "></script>

<!-- bootstrap-daterangepicker -->
<script src="{{ asset('assets/plugins/vendors/moment/min/moment.min.js') }} "></script>
<script src="{{ asset('assets/plugins/vendors/bootstrap-daterangepicker/daterangepicker.js') }} "></script>
<!-- bootstrap-datetimepicker -->    
<script src="{{ asset('assets/plugins/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }} "></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('assets/plugins/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }} "></script>

<!-- Validate -->
<script src="{{ asset('assets/plugins/validate/1.14.0/jquery.validate.min.js') }} "></script>


<script> 
    // Function HTML Entities
		function htmlEntities(str) {
            return String(str).replace(/&/g, 'AND')
                              .replace(/</g, '&lt;')
                              .replace(/>/g, '&gt;')
                              .replace(/"/g, '')
                              .replace(/'/g, '') 
                              ; 
		}
	// Function HTML Entities

    // Table
        $(document).ready(function(){
            $("#table-order").dataTable({ 
                scrollX: false, 
                ordering: false, 
                dom: 'Blfrtip',
                buttons: [ 
                    { extend: 'excelHtml5', footer: true },
                    { extend: 'csvHtml5', footer: true } 
                ], 
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]] 
            });
        });  
    // Table

    // Populate Staff 
        $(document).ready(function(){
                $.ajax({
                    url: '<?php echo url("/orders/fetch"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"name": 'name'},
                    success: function(data)
                    {  
                        var ar              = data; 
                        var _options = "";
                        for (var i = 0; i < ar.length; i++) 
                        {	
                            var _options = "<option value='" + ar[i]['id'] + "'>" + ar[i]['name']+ "</option>";
                            $('#customer_create').append(_options);
                        } 	 
                    },
                    error: function(error){
                        console.log("Error:");
                        console.log(error);
                    }
                }); 
            }); 
    // Populate Staff

    // Populate Staff 
        $(document).ready(function(){
            $.ajax({
                url: '<?php echo url("/orders/fetch"); ?>' ,
                type: "GET",
                dataType: "json",
                data: {"name": 'name'},
                success: function(data)
                {  
                    var ar              = data; 
                    var _options = "";
                    for (var i = 0; i < ar.length; i++) 
                    {	
                        var _options = "<option value='" + ar[i]['id'] + "'>" + ar[i]['name']+ "</option>";
                        $('#customer_update').append(_options);
                    } 	 
                },
                error: function(error){
                    console.log("Error:");
                    console.log(error);
                }
            }); 
        }); 
    // Populate Staff

    // Populate Currency 
        $(document).ready(function(){
                $.ajax({
                    url: '<?php echo url("/exchanges/fetch"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"name": 'name'},
                    success: function(data)
                    {  
                        var ar              = data; 
                        var _options = "";
                        for (var i = 0; i < ar.length; i++) 
                        {	
                            var _options = "<option value='" + ar[i]['id'] + "'>" + ar[i]['exchange_name'] + "(" + ar[i]['exchange_desc'] + ")</option>";
                            $('#currency_create').append(_options);
                        } 	 
                    },
                    error: function(error){
                        console.log("Error:");
                        console.log(error);
                    }
                }); 
            }); 
    // Populate Currency

    // Populate Currency 
        $(document).ready(function(){
            $.ajax({
                url: '<?php echo url("/exchanges/fetch"); ?>' ,
                type: "GET",
                dataType: "json",
                data: {"name": 'name'},
                success: function(data)
                {  
                    var ar              = data; 
                    var _options = "";
                    for (var i = 0; i < ar.length; i++) 
                    {	
                        var _options = "<option value='" + ar[i]['id'] + "'>" + ar[i]['exchange_name'] + "(" + ar[i]['exchange_desc']+ ")</option>";
                        $('#currency_update').append(_options);
                    } 	 
                },
                error: function(error){
                    console.log("Error:");
                    console.log(error);
                }
            }); 
        }); 
    // Populate Currency

    // Add
        // Modal
            function createOrder(getid_old)
            {    
                $('#modal_create').modal({
                    show: true
                });                    
            } 
        // Modal

        // Checking 
            $(function() {
                $("#form-create").validate({
                    rules: {
                        name_create: {   required: true  }, 
                        customer_create: {   required: true  }, 
                        currency_create: {  required: true  },
                        amount_create: {  required: true },   
                    },
                    messages: {
                        name_create: {required: "<font color='red'>* Cannot be empty</font>"},   
                        customer_create: {required: "<font color='red'>* Cannot be empty</font>"},   
                        currency_create: {required: "<font color='red'>* Cannot be empty</font>"},   
                        amount_create: {required: "<font color='red'>* Cannot be empty</font>"},   
                    }
                });
            });
        // Checking 

        // Create Data
            $('#info_create').click(function(){ 
                if (!$('#form-create').valid()) 
                {
                    e.preventDefault()
                }
                else 
                {  
                    const swalWithBootstrapButtons = Swal.mixin({
                    customClass: { 
                        cancelButton: 'btn btn-danger',
                        confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false,
                    })
                    swalWithBootstrapButtons.fire({
                    title:'Confirm the details ?',
                    text: "Action cannot be undo.",
                    type: 'warning',
                    showCancelButton: true, 
                    cancelButtonText: 'Cancel',
                    confirmButtonText: 'Confirm',
                    reverseButtons: true
                    }).then((result) => {
                    if (result.value) {
                        
                        $( "#form-create" ).submit();

                    } else if ( 
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Record has not been saved.',
                        'error'
                        )
                    }
                    })  
                }
            });
        // Create Data
    // Add

    // Update
        // Modal
            function updateOrder(getid_old)
            {   
                var order_id_val = htmlEntities(getid_old);
                $.ajax({
                    url: '<?php echo url("/orders/fetchEditDelete"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"order_id": order_id_val},
                    success: function(data)
                    {  
                        var ar            = data;   
                        var order_id      = "";      
                        var name          = "";    
                        var amount        = "";           
                        var user_id        = "";           

                        for (var i = 0; i < ar.length; i++) 
                        {
                            order_id      = ar[i]['id_order'];               
                            name          = ar[i]['name'];          
                            amount        = ar[i]['amount'];                        
                            user_id        = ar[i]['user_id'];                         
                            user_name        = ar[i]['user_name'];                         
                        }	 

                        $('#order_id_update').val(order_id);    
                        $('#name_update').val(name);
                        $('#amount_update').val(amount);   
                        $('#customer_update').val(user_id).change();                           
                        
                        $('#modal_update').modal({
                            show: true
                        });  
                    },
                    error: function(error){
                        console.log("Error:");
                        console.log(error);
                    }
                });    
            } 
        // Modal

        // Checking 
            $(function() {
                $("#form-update").validate({
                    rules: {
                        name_update: {   required: true  }, 
                        customer_update: {   required: true  }, 
                        currency_update: {  required: true  },
                        amount_update: {  required: true },   
                    },
                    messages: {
                        name_update: {required: "<font color='red'>* Cannot be empty</font>"},   
                        customer_update: {required: "<font color='red'>* Cannot be empty</font>"},   
                        currency_update: {required: "<font color='red'>* Cannot be empty</font>"},   
                        amount_update: {required: "<font color='red'>* Cannot be empty</font>"},   
                    }
                });
            });
        // Checking 

        // Update Data
            $('#info_update').click(function(){ 
                if (!$('#form-update').valid()) 
                {
                    e.preventDefault()
                }
                else 
                {  
                    const swalWithBootstrapButtons = Swal.mixin({
                    customClass: { 
                        cancelButton: 'btn btn-danger',
                        confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false,
                    })
                    swalWithBootstrapButtons.fire({
                    title:'Confirm the details ?',
                    text: "Action cannot be undo.",
                    type: 'warning',
                    showCancelButton: true, 
                    cancelButtonText: 'Cancel',
                    confirmButtonText: 'Update',
                    reverseButtons: true
                    }).then((result) => {
                    if (result.value) {
                        $( "#form-update" ).submit();
                    } else if ( 
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Record has not been saved.',
                        'error'
                        )
                    }
                    })  
                }
            });
        // Update Data
    // Update

    // Delete
        // Modal
            function deleteOrder(getid_old)
            {   
                var order_id_val = htmlEntities(getid_old);
                $.ajax({
                    url: '<?php echo url("/orders/fetchEditDelete"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"order_id": order_id_val},
                    success: function(data)
                    {   
                        var ar            = data;   
                        var order_id      = "";             

                        for (var i = 0; i < ar.length; i++) 
                        {
                            order_id      = ar[i]['id_order'];                        
                        }	 

                        $('#order_id_delete').val(order_id);    
                        
                        $('#modal_delete').modal({
                            show: true
                        });  
                    },
                    error: function(error){
                        console.log("Error:");
                        console.log(error);
                    }
                });    
            } 
        // Modal 

        // Delete Data
            $('#info_delete').click(function(){ 
                if (!$('#form-delete').valid()) 
                {
                    e.preventDefault()
                }
                else 
                {  
                    const swalWithBootstrapButtons = Swal.mixin({
                    customClass: { 
                        cancelButton: 'btn btn-danger',
                        confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false,
                    })
                    swalWithBootstrapButtons.fire({
                    title:'Confirm the details ?',
                    text: "Action cannot be undo.",
                    type: 'warning',
                    showCancelButton: true, 
                    cancelButtonText: 'Cancel',
                    confirmButtonText: 'Delete',
                    reverseButtons: true
                    }).then((result) => {
                    if (result.value) {
                        $( "#form-delete" ).submit();
                    } else if ( 
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Record has not been saved.',
                        'error'
                        )
                    }
                    })  
                }
            });
        // Delete Data
    // Delete

    // Checkout
        // Modal
            function checkoutOrder(getid_old)
            {   
                var order_id_val = htmlEntities(getid_old);
                $.ajax({
                    url: '<?php echo url("/orders/fetchEditDelete"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"order_id": order_id_val},
                    success: function(data)
                    {  
                        var ar            = data;   
                        var order_id      = "";      
                        var name          = "";    
                        var amount        = "";           
                        var user_id        = "";           

                        for (var i = 0; i < ar.length; i++) 
                        {
                            order_id      = ar[i]['id_order'];               
                            name          = ar[i]['order_name'];          
                            amount        = ar[i]['amount'];                       
                            user_id        = ar[i]['user_id'];                       
                            user_name        = ar[i]['user_name'];                       
                        }	 

                        $('#order_id_checkout').val(order_id);    
                        $('#name_checkout').val(name);
                        $('#amount_checkout').val(amount);  
                        $('#customer_checkout').val(user_id); 
                        
                        $.ajax({
                            url: '<?php echo url("/orders/fetchReward"); ?>' ,
                            type: "GET",
                            dataType: "json",
                            data: {"user_id": user_id},
                            success: function(data)
                            {  
                                $('#point_checkout').val(data);   // 20 

                                var rebate = data * 0.01;
                                var total_amount = amount - rebate; 
                                
                                $('#discount_checkout').val(rebate.toFixed(2));  
                                $('#total_checkout').val(total_amount.toFixed(2));  
                                
                                $('#modal_checkout').modal({
                                    show: true
                                });  
                            },
                            error: function(error){
                                console.log("Error:");
                                console.log(error);
                            }
                        });   
                    },
                    error: function(error){
                        console.log("Error:");
                        console.log(error);
                    }
                });    
            } 
        // Modal

        // Checkout Data
            $('#info_checkout').click(function(){ 
                if (!$('#form-checkout').valid()) 
                {
                    e.preventDefault()
                }
                else 
                {  
                    const swalWithBootstrapButtons = Swal.mixin({
                    customClass: { 
                        cancelButton: 'btn btn-danger',
                        confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false,
                    })
                    swalWithBootstrapButtons.fire({
                    title:'Confirm the details ?',
                    text: "Action cannot be undo.",
                    type: 'warning',
                    showCancelButton: true, 
                    cancelButtonText: 'Cancel',
                    confirmButtonText: 'Checkout / Payment',
                    reverseButtons: true
                    }).then((result) => {
                    if (result.value) {
                        $( "#form-checkout" ).submit();
                    } else if ( 
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Record has not been saved.',
                        'error'
                        )
                    }
                    })  
                }
            });
        // Checkout Data
    // Checkout
</script> 
@endsection