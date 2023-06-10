@extends('admin.layouts.header')
<style>
    .table-bordered td, .table-bordered th {
    border: 1px solid #0a0a0a!important;
}
.table {
    color: #0f1216!important;
}
</style>
@section('content')
                <div class="row">
                         <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4 col-4 align-self-center">
                                            <div class="icon-info">
                                                <i class="mdi mdi-coin text-blue"></i>
                                            </div> 
                                        </div>
                                        <div class="col-sm-8 col-8 align-self-center text-right">
                                            <div class="ml-2">
                                                <p class="mb-1 text-muted">Username</p>
                                                <h4 class="mt-0 mb-1">{{$user->name}}</h4>                                                                                                                                           
                                            </div>
                                        </div>                    
                                    </div>
                                    <div class="progress mt-2" style="height:3px;">
                                            <div class="progress-bar bg-blue" role="progressbar" style="width: 22%;" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->                                    
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4 col-4 align-self-center">
                                            <div class="icon-info">
                                                <i class="mdi mdi-coin text-blue"></i>
                                            </div> 
                                        </div>
                                        <div class="col-sm-8 col-8 align-self-center text-right">
                                            <div class="ml-2">
                                                <p class="mb-1 text-muted">Main Wallet Balance</p>
                                                <h4 class="mt-0 mb-1">{{$user->point}}</h4>                                                                                                                                           
                                            </div>
                                        </div>                    
                                    </div>
                                    <div class="progress mt-2" style="height:3px;">
                                            <div class="progress-bar bg-blue" role="progressbar" style="width: 22%;" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->                                    
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4 col-4 align-self-center">
                                            <div class="icon-info">
                                                <i class="mdi mdi-coin text-blue"></i>
                                            </div> 
                                        </div>
                                        <div class="col-sm-8 col-8 align-self-center text-right">
                                            <div class="ml-2">
                                                <p class="mb-1 text-muted">Refferal Wallet Balance</p>
                                                <h4 class="mt-0 mb-1">{{$user->point2}}</h4>                                                                                                                                           
                                            </div>
                                        </div>                    
                                    </div>
                                    <div class="progress mt-2" style="height:3px;">
                                            <div class="progress-bar bg-blue" role="progressbar" style="width: 22%;" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->                                    
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
    
                                    <h4 class="mt-0 header-title">Transaction Record  <a href="{{route('user_list')}}" class="btn btn-gradient-primary btn-sm px-3">Back</a>
                                               </h4>
                                    <div class="table-responsive">
                                     <table  class="table  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Transaction Id</th>
                                            <th>Wallet/Game</th>
                                            <th>Amount</th>
                                            <th>Before</th>
                                            <th>Current</th>
                                            <th>After</th>
                                            <th>Add Time</th>
                                            <th>Detail</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($record as $records)
                                            <tr>  
                                                <td>{{ $records->id}}</td> 
                                                <td>{{ $records->wallet}}</td>
                                                <td>{{ $records->amount}}</td>
                                                <td>{{ $records->before}}</td>
                                                <td>{{ $records->current}}</td>
                                                <td>{{ $records->after}}</td>
                                                <td>{{ $records->created_at}}</td>

                                                <td>{{ $records->detail}}</td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                    {{ $record->links() }}
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </v> <!-- end row -->
                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0" id="exampleModalLabel">Withdrawal Info</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <input class="form-control" name='bank_id'  id='bank_id' type="hidden" value="" id="example-text-input">
                                                   
                                                    <div class="table-responsive">
                                                        <table class="table mb-0 table-bordered">
                                                            <thead class="thead-light">
                                                            <tr>
                                                                <th>Request ID:</th>
                                                                <th> <span id='withdraw_id'></span></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id='info_body'>
                                                           
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                    <label for="example-text-input" class="col-12 col-form-label text-right"><center>User Info</center></label>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Bank Account Name</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" name='bank_user' id='bank_user' type="text" value="" id="example-text-input">
                                                        </div>
                                                    </div>
                                                    
                                                    <button class="btn btn-danger btn-sm px-3" data-dismiss="modal" aria-label="Close">Close</button>
                                                    
                                                    <button  onclick='submit_request()' class="btn btn-gradient-primary btn-sm px-3" id='modal_button'>Add</button>
                                              
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
@stop

@section('script')
<script>

        function add_unit(id) {
            var info ='';
            if(bank_id){
                $.ajax({
                    type: "POST",
                    url: 'get_withdraw_info',
                    data: {"_token": "{{ csrf_token() }}",'target_id': id}, // serializes the form's elements.
                    success: function(data)
                    {
                        
                       // console.log(data);
                        //document.getElementById("sys_bank_name").innerHtml = data.data.match_info.bank_info.bank_name;
                        if ( data.data.match_info != null){
                            info ='<tr><td colspan="2"><center>Withdraw Info</center></td><td colspan="2"><center>Match Info</center></td></tr><tr><td>Username</td><td>'+data.data.user.name+'</td><td>System Bank id</td><td>'+data.data.match_info.bank_info.id+'</td></tr>';
                            info =info+'<tr><td>Bank Name</td><td>'+data.data.bank_name+'</td><td>System Bank</td><td>'+data.data.match_info.bank_info.bank_name+'</td></tr><tr><td>Bank Holder</td><td>'+data.data.bank_user+'</td><td>System Holder</td><td>'+data.data.match_info.bank_info.bank_user+'</td></tr><tr><td>Bank Account</td><td>'+data.data.bank_account+'</td><td>System Account</td><td>'+data.data.match_info.bank_info.bank_account+'</td></tr>';
                            info =info+'<tr><td>Request Time</td><td>'+data.data.created_at+'</td><td>Transaction Time</td><td>'+data.data.match_info.bank_info.created_at+'</td></tr><tr><td>From Wallet</td><td>'+data.data.wallet_detail+'</td></tr><tr><td>Withdraw Status</td><td>'+data.data.status_remark+'</td></tr>';
                        }else{
                            info ='<tr><td colspan="2"><center>Withdraw Info</center></td><td colspan="2"><center>Match Info</center></td></tr><tr><td>Username</td><td>'+data.data.user.name+'</td><td>System Bank id</td><td></td></tr>';
                            info =info+'<tr><td>Bank Name</td><td>'+data.data.bank_name+'</td><td>System Bank</td><td></td></tr><tr><td>Bank Holder</td><td>'+data.data.bank_user+'</td><td>System Holder</td><td></td></tr><tr><td>Bank Account</td><td>'+data.data.bank_account+'</td><td>System Account</td><td></td></tr>';
                            info =info+'<tr><td>Request Time</td><td>'+data.data.created_at+'</td><td>Transaction Time</td><td></td></tr><tr><td>From Wallet</td><td>'+data.data.wallet_detail+'</td></tr><tr><td>Withdraw Status</td><td>'+data.data.status_remark+'</td></tr>';
                        }
                      
                        document.getElementById("info_body").innerHTML = info;
                    },error:function(error)
                    {
                        if(error.status === 401){
                        if(!alert('Unauthorized action.')){window.location.reload()};
                       }
                    }
                }); 
            }else{
                document.getElementById("batch_id").value = '';
                document.getElementById("bank_name").value = '';
                document.getElementById("bank_user").value = '';
                document.getElementById("bank_account").value = '';
                document.getElementById("bank_id").value = '';
                document.getElementById("modal_button").innerHTML = 'Add';
            }
          
        }
        
       
    </script>
@stop

