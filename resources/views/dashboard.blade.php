@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Information
                    <form action="/search" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q"
                                placeholder="Search users"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search">Search</span>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>E-Mail</th>
                                <th>Username</th>
                                <th>E-Mail Verfication</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>E-Mail</th>
                                <th>Username</th>
                                <th>E-Mail Verfication</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($data as $val)
                                <tr>
                                    <td>{{$val->id}}</td>
                                    <td>{{$val->fname}}</td>
                                    <td>{{$val->lname}}</td>
                                    <td>{{$val->address}}</td>
                                    <td>{{$val->email}}</td>
                                    <td>{{$val->username}}</td>
                                    <td>@if($val->email_verified_at != NULL)
                                            {{$val->email_verified_at}}
                                        @else
                                            <p>Not Verified</p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- <script type="text/javascript">
    $(document).ready(function(){
        $('users_table').Datatables({
            "processing": true,
            "serverSide": true,
            "ajax": {{ route('dashboard.getdata')}},
            "columns": [
                {"data": "id"},
                {"data": "fname"},
                {"data": "lname"},
                {"data": "address"},
                {"data": "email"},
                {"data": "username"},
                {"data": "email_verfied_at"}
            ]
        });
    });
</script> --}}