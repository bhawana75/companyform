<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Company</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit Company</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('companies.index') }}" enctype="multipart/form-data"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('companies.update',$company->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Name:</strong>
<input type="text" name="name" value="{{ $company->name }}" class="form-control" placeholder="Name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Email:</strong>
<input type="email" name="email" class="form-control" placeholder="Email" value="{{ $company->email }}">
@error('email')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Address:</strong>
<input type="text" name="address" value="{{ $company->address }}" class="form-control" placeholder="Address">
@error('address')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Contact Number:</strong>
<input type="text" name="contactnumber" value="{{ $company->contactnumber }}" class="form-control" placeholder="Contact Number">
@error('contactnumber')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Reviews:</strong>
<input type="text" name="reviews" value="{{ $company->reviews }}" class="form-control" placeholder="Reviews">
@error('reviews')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div>
<label for="departments"><strong>Choose a Department:</strong></label>
  <select name="department_id" id="department_id">

      @foreach($departments as $d)
      <option value="{{$d->id  }}" {{ ($d->id == $company->department_id) ? 'selected' : '' }}> {{$d->department_name}} </option>
      @endforeach
  </select>
</div>
<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</div>
</body>
</html>