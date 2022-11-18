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
                <h3 class="text-themecolor">Rewards</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li> 
                    <li class="breadcrumb-item active">Rewards</li>
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

                    <!-- Update -->
                        <div id="modal_update" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; overflow-y:auto;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel"></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">

                                        <form id='form-update' class="form-update" name="form-update" action="{{url('/rewards/update')}}" method="post"> 
                                        @csrf  

                                            <input type="hidden" id="reward_id_update" class="form-control reward_id_update" name="reward_id_update" value="" placeholder="" readonly="readonly">  
 
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"><font color="red">*</font> Reward Status</label>
                                                    <div class="col-md-9">  
                                                        <select id="reward_status_update" class="form-control select2 custom-select reward_status_update" name="reward_status_update" style="width: 100%;"> 
                                                            <option value="" selected="selected">Select Reward Status</option>   
                                                            <option value="EXPIRED">Expired</option>  
                                                            <option value="ACTIVATE">Activate</option>   
                                                        </select>
                                                        <small class="form-control-feedback"></small> 
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"><font color="red">*</font> Reward Active / Inactive</label>
                                                    <div class="col-md-9">  
                                                        <select id="reward_active_inactive_update" class="form-control select2 custom-select reward_active_inactive_update" name="reward_active_inactive_update" style="width: 100%;"> 
                                                            <option value="" selected="selected">Select Reward Active / Inactive</option>   
                                                            <option value="ACTIVE">Active</option>  
                                                            <option value="INACTIVE">Inactive</option>   
                                                        </select>
                                                        <small class="form-control-feedback"></small> 
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"><font color="red">*</font> Reward Used / Unused</label>
                                                    <div class="col-md-9">  
                                                        <select id="reward_used_unused_update" class="form-control select2 custom-select reward_used_unused_update" name="reward_used_unused_update" style="width: 100%;"> 
                                                            <option value="" selected="selected">Select Reward Used / Unused</option>   
                                                            <option value="USED">Used</option>  
                                                            <option value="UNUSED">Unused</option>   
                                                        </select>
                                                        <small class="form-control-feedback"></small> 
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-success waves-effect text-left" id="info_update" >Update</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>  
                            </div> 
                        </div> 
                    <!-- Update -->  

                    <!-- List -->
                        <div class="card card-default">
                            <div class="card-header">
                                <div class="card-actions">
                                    <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                </div>
                                <h4 class="card-title m-b-0">Reward List  | If info not appear, kindly <a href="{{url('/rewards')}}">Refresh Page</a></h4> 
                            </div>
                            <div class="card-body collapse show"> 
                                <div class="card">
                                    <div class="card-body">  

                                        <form id='form-reward' class="form-reward" action="" method="post">
                                        @csrf 
                                            <div class="table-responsive"> 
                                                <table id="table-reward" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead style="background-color:#D2691E; color:#ffffff;">
                                                        <tr>
                                                            <th style="vertical-align:top;">No</th>    
                                                            <th style="vertical-align:top;">Action</th>    
                                                            <th style="vertical-align:top;">Refno</th>  
                                                            <th style="vertical-align:top;">Customer</th>  
                                                            <th style="vertical-align:top;">Reward / <br/> Points</th>  
                                                            <th style="vertical-align:top;">Reward <br/> Status</th>  
                                                            <th style="vertical-align:top;">Reward Active / <br/> Inactive</th>  
                                                            <th style="vertical-align:top;">Reward Used / <br/> Unused</th>  
                                                            <th style="vertical-align:top;">Date / <br/> Time</th>  
                                                        </tr> 
                                                    </thead> 
                                                    <tbody> 
                                                        <?php
                                                            if(count($rewards) != 0)
                                                            {
                                                                $count = 1;
                                                                foreach($rewards as $reward)
                                                                { 
                                                                    $parameter = $reward->id_reward;   
                                                                ?>

                                                                    <tr> 
                                                                        <td><?php echo $count++; ?></td>  
                                                                             
                                                                        <td> 
                                                                            <a href="javascript:void(0)" onClick="updateReward('<?php echo htmlentities($parameter); ?>')" class="btn btn-xs btn-warning">
                                                                                <i class="mdi mdi-table-edit"></i>
                                                                            </a>	 
                                                                        </td>

                                                                        <td><?php echo $reward->reward_refno; ?></td>  
                                                                        <td><?php echo $reward->user_name; ?></td>  
                                                                        <td><?php echo $reward->reward_amount; ?></td>  
                                                                        <td><?php echo $reward->reward_status; ?></td>  
                                                                        <td><?php echo $reward->reward_active; ?></td>       

                                                                        <td><?php echo $reward->reward_used; ?></td>       
                                                                        <td><?php echo $reward->reward_dt; ?></td>     
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
            $("#table-reward").dataTable({ 
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

     // Update
        // Modal
            function updateReward(getid_old)
            {   
                var reward_id_val = htmlEntities(getid_old);
                $.ajax({
                    url: '<?php echo url("/rewards/fetchEditDelete"); ?>' ,
                    type: "GET",
                    dataType: "json",
                    data: {"reward_id": reward_id_val},
                    success: function(data)
                    {  
                        var ar            = data;   
                        var reward_id      = "";              

                        for (var i = 0; i < ar.length; i++) 
                        {
                            reward_id      = ar[i]['id'];                        
                        }	 

                        $('#reward_id_update').val(reward_id);                          
                        
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
                        reward_status_update: {   required: true  },  
                        reward_active_inactive_update: {   required: true  },  
                        reward_used_unused_update: {   required: true  },  
                    },
                    messages: {
                        reward_status_update: {required: "<font color='red'>* Cannot be empty</font>"},    
                        reward_active_inactive_update: {required: "<font color='red'>* Cannot be empty</font>"},    
                        reward_used_unused_update: {required: "<font color='red'>* Cannot be empty</font>"},    
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
 
</script> 
@endsection