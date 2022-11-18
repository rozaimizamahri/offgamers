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
                <h3 class="text-themecolor">Payments</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li> 
                    <li class="breadcrumb-item active">Payments</li>
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

                    <!-- List -->
                        <div class="card card-default">
                            <div class="card-header">
                                <div class="card-actions">
                                    <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                </div>
                                <h4 class="card-title m-b-0">Payment List  | If info not appear, kindly <a href="{{url('/payments')}}">Refresh Page</a></h4> 
                            </div>
                            <div class="card-body collapse show"> 
                                <div class="card">
                                    <div class="card-body">  

                                        <form id='form-payment' class="form-payment" action="" method="post">
                                        @csrf 
                                            <div class="table-responsive"> 
                                                <table id="table-payment" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead style="background-color:#D2691E; color:#ffffff;">
                                                        <tr>
                                                            <th style="vertical-align:top;">No</th>     
                                                            <th style="vertical-align:top;">Refno</th>  
                                                            <th style="vertical-align:top;">Customer</th>  
                                                            <th style="vertical-align:top;">Amount (USD)</th>  
                                                            <th style="vertical-align:top;">Discount (USD)</th>  
                                                            <th style="vertical-align:top;">Paid (USD)</th>  
                                                            <th style="vertical-align:top;">Status</th>  
                                                            <th style="vertical-align:top;">Paid <br/> Date / Time</th>   
                                                        </tr> 
                                                    </thead> 
                                                    <tbody> 
                                                        <?php
                                                            if(count($payments) != 0)
                                                            {
                                                                $count = 1;
                                                                foreach($payments as $payment)
                                                                { 
                                                                    $parameter = $payment->id_payment;   
                                                                ?> 
                                                                    <tr> 
                                                                        <td><?php echo $count++; ?></td>  
                                                                        <td><?php echo $payment->refno; ?></td>  
                                                                        <td><?php echo $payment->user_name; ?></td>  
                                                                        <td><?php echo $payment->payment_amount; ?></td>  
                                                                        <td><?php echo $payment->payment_discount; ?></td>  
                                                                        <td><?php echo $payment->payment_paid; ?></td>  
                                                                        <td><?php echo $payment->payment_status; ?></td>    
                                                                        
                                                                        
                                                                        <td><?php echo $payment->payment_dt; ?></td>     
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
    // Table
        $(document).ready(function(){
            $("#table-payment").dataTable({ 
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
</script> 
@endsection