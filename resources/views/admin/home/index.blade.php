@extends('admin.layouts.header')
@section('subtitle')
    <li class="breadcrumb-item active ">Welcome back to your <span class="f-w-600 color-light-job">Dashboard</span>!</li>
@stop
@section('content')
<div class="row"> 
<div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="header-title mt-0">Voteing Details</h4>
                <div class="container">
                    <div class="row">
                    <div class="col-md-4">
                        <h1 style="text-align: center;" id="agree"></h1>
                        <p style="text-align: center;">Agree</p>
                    </div>
                    <div class="col-md-4">
                        <h1 style="text-align: center;" id="disagree"></h1>
                        <p style="text-align: center;">Disagree</p>
                    </div>
                    <div class="col-md-4">
                        <h1 style="text-align: center;" id="total_vote"></h1>
                        <p style="text-align: center;">Total Vote</p>
                    </div>
                    </div>
                </div>
                <br>
                <div class="table-responsive dash-social">
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table id="usersdatatable" class="table">
                        <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Wallet Address</th>
                            <th>Agree</th>
                            <th>Disagree</th> 
                            <th>Action</th>                                             
                        </tr><!--end tr-->
                        </thead>

                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->username }}</td>
                                @if ($user->status == 0)
                                    <td>-</td>
                                    <td>-</td>
                                    <td>
                                        <form method="post" action="/admin/table_action">
                                            @csrf
                                            <input type="text" value="{{ $user->username }}" name="username" style="display:none">
                                            <button type="submit" name="button_action" value="disagree" class="btn btn-gradient-primary px-4 float-right mt-0 mb-3" style="background: #008cf9;">Disagree</button>
                                            <button type="submit" name="button_action" value="agree" class="btn btn-gradient-primary px-4 float-right mt-0 mb-3 mr-3" style="background: #00ff00;">Agree</button>
                                        </form>
                                    </td>
                                @elseif ($user->status == 1)
                                    <td>Yes</td>
                                    <td>-</td>
                                    <td></td>
                                @elseif ($user->status == 2)
                                    <td>-</td>
                                    <td>Yes</td>
                                    <td></td>
                                @endif
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
        
        setInterval(function() {
            // Make API call here
            fetch('/admin/getData')
                .then(response => response.json())
                .then(data => {
            
                    document.getElementById("agree").innerHTML=data.agree.agree;
                    document.getElementById("disagree").innerHTML=data.disagree.disagree;
                    document.getElementById("total_vote").innerHTML=data.total_vote.total_vote;

                })
                .catch(error => {
                    console.error(error);
                });
        }, 1000);
    </script>
@stop

