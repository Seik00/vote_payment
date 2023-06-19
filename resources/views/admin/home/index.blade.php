@extends('admin.layouts.header')
@section('subtitle')
    <li class="breadcrumb-item active ">Welcome back to your <span class="f-w-600 color-light-job">Dashboard</span>!</li>
@stop
@section('content')
<div class="row"> 
<div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="header-title mt-0">Payment Details</h4>
                <br>
                <div class="table-responsive dash-social">
                    <table id="usersdatatable" class="table">
                        <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>USDT Address</th>
                            <th>Username</th>
                            <th>Phone</th> 
                            <th>Payee ID</th>     
                            <th>Email</th>     
                            <th>Currecy Type</th>     
                            <th>Order No</th>     
                            <th>Bank Account</th> 
                            <th>Amount</th>      
                            <th>USDT Amount</th>              
                            <th>Status</th> 
                            <th>Date</th>                                             
                        </tr><!--end tr-->
                        </thead>

                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->usdt_address }}</td>
                                <td>{{ $order->username }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->payee_id }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->currency }}</td>
                                <td>{{ $order->order_no }}</td>
                                <td>{{ $order->bank_account_number }}</td>
                                <td>{{ $order->amount }}</td>
                                <td>{{ $order->usdt_amount }}</td>
                                @if ($order->payment_status == 0)
                                    <td>待办</td>
                                @elseif ($order->payment_status == 1)
                                    <td>取消支付</td>
                                @elseif ($order->payment_status == 66)
                                    <td>成功支付</td>
                                @elseif ($order->payment_status == 999)
                                    <td>验签失败</td>
                                @endif
                                <td>{{ $order->created_at }}</td>
                            </tr>
                        @endforeach                            
                        </tbody>
                    </table>                    
                </div>                                         
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div> <!--end col-->      
</div>
@stop

@section('script')
    <script>
        $(document).ready(function() {
        $('#usersdatatable').DataTable({
            order: [[0, 'desc']]
        });
        });
    </script>
@stop

