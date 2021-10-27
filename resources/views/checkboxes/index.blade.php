<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>checkbox</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<style>
    .heading{
        color:black;
    }
    table tr th,table tr td{
        border:1px solid black !important;
        
    }
    table tr td{
        color:black;
        background-color: white;
    }
    </style>

</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Entrance Form</h2>
</div>
    <div class="row">
        <div class="pull-right mb-2 col-md-8">
            <a class="btn btn-success" href="{{ route('checkboxes.create') }}"> Create Checkbox</a>
        </div>
        <div class="col-md-4">
            <form action="" method="get">
                <input type="text" name="search" value="{{$search}}">
                <a class="btn btn-info" href="{{route('checkboxes.index')}}">Clear</a>
            </form>
        </div> 
    </div>
    <h4>Filters</h4>
    <form action="" method="GET">
            <div class="row">
            <div class="col-md-2">
                <label for="firstname">Firstname</label>
                <input type="text" name="first_name" value="{{$firstname}}">
            </div>
            <div class="col-md-2">
                <label for="lastname">Lastname</label>
                <input type="text" name="last_name" value="{{$lastname}}">
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
        </form>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered table-responsive table-striped" width="100%">
<tr>
<th class="heading">S.No</th>
<th class="heading">First Name</th>
<th class="heading">Last Name</th>
<th class="heading">Email</th>
<th class="heading" >Address</th>
<th class="heading">Contact Number</th>
<th class="heading">Subjects</th>
<th class="heading">Faculty</th>
<th class="heading" width="280px">Action</th>
</tr>
@foreach ($checkboxes as $checkbox)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $checkbox->firstname }}</td>
<td>{{ $checkbox->lastname }}</td>
<td>{{ $checkbox->email }}</td>
<td width="500px">{{ $checkbox->address }}</td>
<td>{{ $checkbox->contactnumber }}</td>
<td>{{ $checkbox->subjects }}</td>
<td>{{ $checkbox->faculty }}</td>
<td>
<form action="{{ route('checkboxes.destroy',$checkbox->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('checkboxes.edit',$checkbox->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
</body>
</html>