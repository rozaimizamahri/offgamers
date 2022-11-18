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
                <h3 class="text-themecolor">Exchanges Rate</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li> 
                    <li class="breadcrumb-item active">Exchanges Rate</li>
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

                                            <form id='form-create' class="form-create" name="form-create" action="{{url('/exchanges/create')}}" method="post"> 
                                            @csrf   

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3">Primary Rate (US Dollar)</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="primary_rate_create" class="form-control primary_rate_create" name="primary_rate_create" value="1.00" placeholder="" readonly="readonly">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  

                                                
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Exchange Name</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="exchange_name_create" class="form-control exchange_name_create" name="exchange_name_create" value="" placeholder="">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Exchange Description</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="exchange_desc_create" class="form-control exchange_desc_create" name="exchange_desc_create" value="" placeholder="">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Exchange Rate</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="exchange_rate_create" class="form-control exchange_rate_create" name="exchange_rate_create" value="" placeholder="">  
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

                                            <form id='form-update' class="form-update" name="form-update" action="{{url('/exchanges/update')}}" method="post"> 
                                            @csrf  

                                                <input type="hidden" id="exchange_id_update" class="form-control exchange_id_update" name="exchange_id_update" value="" placeholder="" readonly="readonly">  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3">Primary Rate (US Dollar)</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="primary_rate_update" class="form-control primary_rate_update" name="primary_rate_update" value="1.00" placeholder="" readonly="readonly">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  

                                                
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Exchange Name</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="exchange_name_update" class="form-control exchange_name_update" name="exchange_name_update" value="" placeholder="">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>  

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Exchange Description</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="exchange_desc_update" class="form-control exchange_desc_update" name="exchange_desc_update" value="" placeholder="">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Exchange Rate</label>
                                                        <div class="col-md-9">  
                                                            <input type="text" id="exchange_rate_update" class="form-control exchange_rate_update" name="exchange_rate_update" value="" placeholder="">  
                                                            <small class="form-control-feedback"></small> 
                                                        </div>
                                                    </div>
                                                </div>   

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3"><font color="red">*</font> Status</label>
                                                        <div class="col-md-9">  
                                                            <select id="exchange_status_update" class="form-control select2 custom-select exchange_status_update" name="exchange_status_update" style="width: 100%;"> 
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

                                            <form id='form-delete' class="form-delete" name="form-delete" action="{{url('/exchanges/delete')}}" method="post"> 
                                            @csrf  

                                                <input type="hidden" id="exchange_id_delete" class="form-control exchange_id_delete" name="exchange_id_delete" value="" placeholder="" readonly="readonly">  

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
                                <h4 class="card-title m-b-0">Exchange Rate List  | If dropdown selection not appear, kindly <a href="{{url('/exchanges')}}">Refresh Page</a></h4> 
                            </div>
                            <div class="card-body collapse show"> 
                                <div class="card">
                                    <div class="card-body"> 
                                        
                                        <button type="button" class="btn btn-xs btn-success" onClick="createExchange('1');" ><i class="mdi mdi-library-plus"> New Exchange Rate</i></button>  
                                        <br/>
                                        <br/>

                                        <form id='form-exchange' class="form-exchange" action="" method="post">
                                        @csrf 
                                            <div class="table-responsive"> 
                                                <table id="table-exchange" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead style="background-color:#D2691E; color:#ffffff;">
                                                        <tr>
                                                            <th style="vertical-align:top;" rowspan="2">No</th> 
                                                            <th style="vertical-align:top; text-align:center;" colspan="2">Action</th>    
                                                            <th style="vertical-align:top;" rowspan="2">Primary Rate (US Dollar)</th>  
                                                            <th style="vertical-align:top;" rowspan="2">Exchange Rate</th>  
                                                            <th style="vertical-align:top;" rowspan="2">Exchange Name</th>  
                                                            <th style="vertical-align:top;" rowspan="2">Exchange Description</th>  
                                                           
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
                                                            if(count($exchanges) != 0)
                                                            {
                                                                $count = 1;
                                                                foreach($exchanges as $exchange)
                                                                { 
                                                                    $parameter = $exchange->id;   
                                                                ?>

                                                                    <tr> 
                                                                        <td><?php echo $count++; ?></td> 
                                                                            
                                                                        <td> 
                                                                            <a href="javascript:void(0)" onClick="updateExchange('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-warning">
                                                                                <i class="mdi mdi-table-edit"></i>
                                                                            </a>	 
                                                                        </td>
                                                                        <td> 
                                                                            <a href="javascript:void(0)" onClick="deleteExchange('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-danger">
                                                                                <i class="mdi mdi-delete"></i>
                                                                            </a>	 
                                                                        </td>   
                                                                        <td><?php echo $exchange->primary_rate; ?></td> 
                                                                        <td><?php echo $exchange->exchange_rate; ?></td>  
                                                                        <td><?php echo $exchange->exchange_name; ?></td> 
                                                                        <td><?php echo $exchange->exchange_desc; ?></td> 
                                                                       
                                                                        <td><?php echo $exchange->exchange_status === 'Y' ? 'Active' : 'Inactive'; ?></td>       

                                                                        <td><?php echo $exchange->exchange_by; ?></td>       
                                                                        <td><?php echo $exchange->exchange_dt; ?></td>     
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
            $("#table-exchange").dataTable({ 
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

    // Add
        // Modal
            function createExchange(getid_old)
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
                        primary_rate_create: {   required: true  },  
                        exchange_name_create: {   required: true  },  
                        exchange_desc_create: {   required: true  },  
                        exchange_rate_create: {   required: true  },     
                    },
                    messages: {
                        primary_rate_create: {required: "<font color='red'>* Cannot be empty</font>"},    
                        exchange_name_create: {required: "<font color='red'>* Cannot be empty</font>"},   
                        exchange_desc_create: {required: "<font color='red'>* Cannot be empty</font>"},   
                        exchange_rate_create: {required: "<font color='red'>* Cannot be empty</font>"},   
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
            function updateExchange(getid_old)
            {   
                var exchange_id_val = htmlEntities(getid_old);
                $.ajax({
                    url: '<?php echo url("/exchanges/fetchEditDelete"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"exchange_id": exchange_id_val},
                    success: function(data)
                    {  
                        var ar            = data;  
                        var exchange_id   = "";      
                        var primary_rate          = "";    
                        var exchange_name        = "";           
                        var exchange_desc        = "";           
                        var exchange_rate        = "";           
                        var exchange_status        = "";           

                        for (var i = 0; i < ar.length; i++) 
                        {
                            exchange_id      = ar[i]['id'];               
                            primary_rate          = ar[i]['primary_rate'];          
                            exchange_name        = ar[i]['exchange_name'];                        
                            exchange_desc        = ar[i]['exchange_desc'];                         
                            exchange_rate        = ar[i]['exchange_rate'];                         
                            exchange_status        = ar[i]['exchange_status'];                         
                        }	 

                        $('#exchange_id_update').val(exchange_id);    
                        $('#primary_rate_update').val(primary_rate);
                        $('#exchange_name_update').val(exchange_name);   
                        $('#exchange_desc_update').val(exchange_desc);   
                        $('#exchange_rate_update').val(exchange_rate);   
                        $('#exchange_status_update').val(exchange_status).change();                           
                        
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
                        primary_rate_update: {   required: true  }, 
                        exchange_name_update: {   required: true  }, 
                        exchange_desc_update: {  required: true  },
                        exchange_rate_update: {  required: true },   
                        exchange_status_update: {  required: true },   
                    },
                    messages: {
                        primary_rate_update: {required: "<font color='red'>* Cannot be empty</font>"},   
                        exchange_name_update: {required: "<font color='red'>* Cannot be empty</font>"},   
                        exchange_desc_update: {required: "<font color='red'>* Cannot be empty</font>"},   
                        exchange_rate_update: {required: "<font color='red'>* Cannot be empty</font>"},   
                        exchange_status_update: {required: "<font color='red'>* Cannot be empty</font>"},   
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
            function deleteExchange(getid_old)
            {   
                var exchange_id_val = htmlEntities(getid_old);
                $.ajax({
                    url: '<?php echo url("/exchanges/fetchEditDelete"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"exchange_id": exchange_id_val},
                    success: function(data)
                    {     
                        var ar            = data;  
                        var exchange_id   = "";               

                        for (var i = 0; i < ar.length; i++) 
                        {
                            exchange_id      = ar[i]['id'];                           
                        }	 
                        $('#exchange_id_delete').val(exchange_id);    
                        
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