<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Department</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Department</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('departments.create') }}"> Create Department</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>S.No</th>
<th>Name</th>
<th>Email</th>
<th>Number</th>
<th>Employee Number</th>
<th width="280px">Action</th>
</tr>
@foreach ($departments as $Department)
<tr>
<td>{{ $Department->id }}</td>
<td>{{ $Department->department_name }}</td>
<td>{{ $Department->email }}</td>
<td>{{ $Department->number }}</td>
<td>{{ $Department->employeenumber }}</td>
<td>
<form action="{{ route('departments.destroy',$Department->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('departments.edit',$Department->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $departments->links() !!}
</body>
</html>