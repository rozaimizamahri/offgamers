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
                <h3 class="text-themecolor">Customers</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li> 
                    <li class="breadcrumb-item active">Customers</li>
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

                                            <form id='form-create' class="form-create" name="form-create" action="{{url('/customers/create')}}" method="post"> 
                                            @csrf   

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Full Name</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="name_create" class="form-control name_create" name="name_create" value="" placeholder="">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  

                                                
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Email Address</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="email_create" class="form-control email_create" name="email_create" value="" placeholder="">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  


                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Password</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="password_create" class="form-control password_create" name="password_create" value="" placeholder="">  
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

                                            <form id='form-update' class="form-update" name="form-update" action="{{url('/customers/update')}}" method="post"> 
                                            @csrf  

                                                <input type="hidden" id="customer_id_update" class="form-control customer_id_update" name="customer_id_update" value="" placeholder="" readonly="readonly">  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Full Name</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="name_update" class="form-control name_update" name="name_update" value="" placeholder="">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  

                                                
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Email Address</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="email_update" class="form-control email_update" name="email_update" value="" placeholder="">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  


                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Password</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="password_update" class="form-control password_update" name="password_update" value="" placeholder="">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Status</label>
                                                        <div class="col-md-9">  
                                                            <select id="active_update" class="form-control select2 custom-select active_update" name="active_update" style="width: 100%;"> 
                                                                <option value="" selected="selected">Select Status</option>   
                                                                <option value="Y">Active</option>  
                                                                <option value="N">Inactive</option>   
                                                            </select>
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

                                            <form id='form-delete' class="form-delete" name="form-delete" action="{{url('/customers/delete')}}" method="post"> 
                                            @csrf  

                                                <input type="hidden" id="customer_id_delete" class="form-control customer_id_delete" name="customer_id_delete" value="" placeholder="" readonly="readonly">  

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
                    <!-- Modal --> 

                    <!-- List -->
                        <div class="card card-default">
                            <div class="card-header">
                                <div class="card-actions">
                                    <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                </div>
                                <h4 class="card-title m-b-0">Customer List  | If dropdown selection not appear, kindly <a href="{{url('/customers')}}">Refresh Page</a></h4> 
                            </div>
                            <div class="card-body collapse show"> 
                                <div class="card">
                                    <div class="card-body"> 
                                        
                                        <button type="button" class="btn btn-xs btn-success" onClick="createCustomer('1');" ><i class="mdi mdi-library-plus"> New Customer</i></button>  
                                        <br/>
                                        <br/>

                                        <form id='form-customer' class="form-customer" action="" method="post">
                                        @csrf 
                                            <div class="table-responsive"> 
                                                <table id="table-customer" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead style="background-color:#D2691E; color:#ffffff;">
                                                        <tr>
                                                            <th style="vertical-align:top;" rowspan="2">No</th> 
                                                            <th style="vertical-align:top; text-align:center;" colspan="2">Action</th>    
                                                            <th style="vertical-align:top;" rowspan="2">Full Name</th>  
                                                            <th style="vertical-align:top;" rowspan="2">Email Address</th>  
                                                            <th style="vertical-align:top;" rowspan="2">Status</th>   
                                                            <th style="vertical-align:top;" rowspan="2">Created By</th> 
                                                            <th style="vertical-align:top;" rowspan="2">Created Date/Time</th>  
                                                        </tr>
                                                        <tr style="background-color:#DEB887; color:#ffffff;">     
                                                            <th>Edit</th>      
                                                            <th>Delete</th>            
                                                        </tr>
                                                    </thead> 
                                                    <tbody> 
                                                        <?php
                                                            if(count($customers) != 0)
                                                            {
                                                                $count = 1;
                                                                foreach($customers as $customer)
                                                                { 
                                                                    $parameter = $customer->id;   
                                                                ?>

                                                                    <tr> 
                                                                        <td><?php echo $count++; ?></td> 
                                                                            
                                                                        <td> 
                                                                            <a href="javascript:void(0)" onClick="updateCustomer('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-warning">
                                                                                <i class="mdi mdi-table-edit"></i>
                                                                            </a>	 
                                                                        </td>
                                                                        <td> 
                                                                            <a href="javascript:void(0)" onClick="deleteCustomer('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-danger">
                                                                                <i class="mdi mdi-delete"></i>
                                                                            </a>	 
                                                                        </td>   
                                                                        <td><?php echo $customer->name; ?></td>  
                                                                        <td><?php echo $customer->email; ?></td> 
                                                                        <td><?php echo $customer->active === 'Y' ? 'Active' : 'Inactive'; ?></td>       

                                                                        <td><?php echo $customer->created_by_name; ?></td>       
                                                                        <td><?php echo $customer->created_by_date; ?></td>     
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
            $("#table-customer").dataTable({ 
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

    // Populate Customer 
        $(document).ready(function(){
                $.ajax({
                    url: '<?php echo url("/customers/fetch"); ?>' ,
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
    // Populate Customer

    // Populate Customer 
        $(document).ready(function(){
            $.ajax({
                url: '<?php echo url("/customers/fetch"); ?>' ,
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
    // Populate Customer

    // Add
        // Modal
            function createCustomer(getid_old)
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
                        email_create: {  required: true  },
                        password_create: {  required: true },   
                    },
                    messages: {
                        name_create: {required: "<font color='red'>* Cannot be empty</font>"},    
                        email_create: {required: "<font color='red'>* Cannot be empty</font>"},   
                        password_create: {required: "<font color='red'>* Cannot be empty</font>"},   
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
            function updateCustomer(getid_old)
            {   
                var customer_id_val = htmlEntities(getid_old);
                $.ajax({
                    url: '<?php echo url("/customers/fetchEditDelete"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"customer_id": customer_id_val},
                    success: function(data)
                    {  
                        var ar            = data;  
                        var customer_id   = "";      
                        var name          = "";    
                        var email        = "";           
                        var password        = "";           
                        var active        = "";           

                        for (var i = 0; i < ar.length; i++) 
                        {
                            customer_id      = ar[i]['id'];               
                            name          = ar[i]['name'];          
                            email        = ar[i]['email'];                        
                            password        = ar[i]['password'];                         
                            active        = ar[i]['active'];                         
                        }	 

                        $('#customer_id_update').val(customer_id);    
                        $('#name_update').val(name);
                        $('#email_update').val(email);   
                        $('#password_update').val(password);   
                        $('#active_update').val(active).change();                           
                        
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
                        email_update: {   required: true  }, 
                        password_update: {  required: true  },
                        status_update: {  required: true },   
                    },
                    messages: {
                        name_update: {required: "<font color='red'>* Cannot be empty</font>"},   
                        email_update: {required: "<font color='red'>* Cannot be empty</font>"},   
                        password_update: {required: "<font color='red'>* Cannot be empty</font>"},   
                        status_update: {required: "<font color='red'>* Cannot be empty</font>"},   
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
            function deleteCustomer(getid_old)
            {   
                var customer_id_val = htmlEntities(getid_old);
                $.ajax({
                    url: '<?php echo url("/customers/fetchEditDelete"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"customer_id": customer_id_val},
                    success: function(data)
                    {     
                        var ar            = data;  
                        var customer_id   = "";               

                        for (var i = 0; i < ar.length; i++) 
                        {
                            customer_id      = ar[i]['id'];                           
                        }	 
                        $('#customer_id_delete').val(customer_id);    
                        
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
</script> 
@endsection