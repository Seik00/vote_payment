@extends('admin.layouts.header')
@section('subtitle')
    <li class="breadcrumb-item active ">欢迎回到<span class="f-w-600 color-light-job">仪表盘</span>！</li>
@stop
@section('content')
<div class="row"> 
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0">Payment Details</h4>
                <br>
                <div class="table-responsive dash-social">
                    <table id="usersdatatable" class="table " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>USDT Address</th>
                                <th>Username</th>
                                <th>Phone</th> 
                                <th>Payee ID</th> 

                                <th style="display:none;">Email</th>     
                                <th style="display:none;">Currecy Type</th>     
                                <th style="display:none;">Order No</th>     
                                <th style="display:none;">Bank Account</th> 
                                <th style="display:none;">Amount</th>      
                                <th style="display:none;">USDT Amount</th>              
                                <th style="display:none;">Status</th> 
                                <th style="display:none;">Date</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td class="details-control"></td>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->usdt_address }}</td>
                                <td>{{ $order->username }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->payee_id }}</td>
                                
                                <td style="display:none;">{{ $order->email }}</td>
                                <td style="display:none;">{{ $order->currency }}</td>
                                <td style="display:none;">{{ $order->order_no }}</td>
                                <td style="display:none;">{{ $order->bank_account_number }}</td>
                                <td style="display:none;">{{ $order->amount }}</td>
                                <td style="display:none;">{{ $order->usdt_amount }}</td>
                                <td style="display:none;">{{ $order->payment_status }}</td>
                                <td style="display:none;">{{ $order->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('script')
    <script>
        $(document).ready(function() {
            var table = $('#usersdatatable').DataTable({
                order: [[1, 'desc']]
            });

            // Add event listener for opening and closing details
            $('#usersdatatable tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    var rowData = table.row(tr).data();
                    var email = rowData[6];
                    var currency = rowData[7];
                    var orderNo = rowData[8];
                    var bankAccount = rowData[9];
                    var amount = rowData[10];
                    var usdtAmount = rowData[11];
                    var status = rowData[12];
                    var date = rowData[13];

                    var html = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                        '<tr>'+
                            '<th>Email:</th>'+
                            '<td>'+email+'</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<th>Currecy Type:</th>'+
                            '<td>'+currency+'</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<th>Order No:</th>'+
                            '<td>'+orderNo+'</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<th>Bank Account:</th>'+
                            '<td>'+bankAccount+'</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<th>Amount:</th>'+
                            '<td>'+amount+'</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<th>USDT Amount:</th>'+
                            '<td>'+usdtAmount+'</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<th>Status:</th>'+
                            '<td>'+status+'</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<th>Date:</th>'+
                            '<td>'+date+'</td>'+
                        '</tr>'+
                    '</table>';

                    row.child(html).show();
                    tr.addClass('shown');
                }
            });
        });
    </script>
@stop
