@extends('layouts.app')

@section('content')
 
    <div class="container">
    <div class="row">
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
<div class="info-box-content">
<span class="info-box-text">CPU Traffic</span>
<span class="info-box-number">
10
<small>%</small>
</span>
</div>

</div>

</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
<div class="info-box-content">
<span class="info-box-text">Likes</span>
<span class="info-box-number">41,410</span>
</div>

</div>

</div>


<div class="clearfix hidden-md-up"></div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
<div class="info-box-content">
<span class="info-box-text">Sales</span>
<span class="info-box-number">760</span>
</div>

</div>

</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
<div class="info-box-content">
<span class="info-box-text">New Members</span>
<span class="info-box-number">2,000</span>
</div>

</div>

</div>

</div>

        @if (session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif

        <h3 align="center" class="mt-5">Employee Management</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form action="{{ url('employee/create') }}" method="HEAD">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <label>Employee First Name</label>
                            <input type="text" name="firstname" class="form-control" value="{{ old('fisrtname') }}" 
                            id="firstname" placeholder="Enter first name">
                            @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>

                        <div class="col-md-6">
                            <label>Employee Last Name</label>
                            <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}" 
                            id="lastname" placeholder="Enter last name">
                            @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>

                        <div class="col-md-6">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" 
                            id="phone" placeholder="">
                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>

                        <div class="col-md-6">
                            <label>Employee DOB</label>
                            <input type="date" class="form-control" name="dob">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-danger bg-green" value="Register">
                        </div>

                    </div>
                </form>
            </div>
                <div class="card-body">

                    
                    <table class="table table-bordered table-striped">
                        <thread>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>DOB</th>
                                <th>Action</th>
                            </tr>
                        </thread>

                        <tbody>
                            @foreach ($employ as $item)

                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->firstname}}</td>
                                    <td>{{$item->lastname}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->dob}}</td>
                                    <td>
                                        <a href="{{ url('employee/'.$item->id.'/edit') }}" class="btn btn-info  mx-2 bg-green">Edit</a>
                                        
                                        <a href="{{ url('employee/'.$item->id.'/edit') }}" class="btn btn-info mx-1 bg-green">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
              background: color #ff678f;
        }

        .bi-trash-fill{
            color:blue;
            font-size: 18px;
        }

        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush
ۦۦ

@extends('layouts.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Employee Management</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('employee.index') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="firstname">
                        </div><div class="col-md-6">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" name="lastname">
                        </div>
                        <div class="col-md-6">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="middlename">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" href="{{route('employee.index') }}" class="btn btn-info" value="Register">
                        </div>

                    </div>
                </form>
            </div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
              background-color:#FFFF89;
        }

        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }

        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush