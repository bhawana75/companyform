<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Checkbox</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add Student</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('checkboxes.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('checkboxes.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>First Name:</strong>
<input type="text" name="firstname" class="form-control" placeholder="First Name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Last Name:</strong>
<input type="text" name="lastname" class="form-control" placeholder="Last Name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Email:</strong>
<input type="email" name="email" class="form-control" placeholder="Email">
@error('email')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Address:</strong>
<input type="text" name="address" class="form-control" placeholder="Address">
@error('address')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Contact Number:</strong>
<input type="text" name="contactnumber" class="form-control" placeholder="Contact Number">
@error('contactnumber')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Subjects:</strong>
<!-- <input type="checkbox" name="subjects" class="form-control" placeholder="Subjects"> -->

<label class="container">Maths
  <input type="checkbox" name="subjects[]" value="maths">
  <span class="checkmark"></span>
</label>

<label class="container">Science
  <input type="checkbox" name="subjects[]" value="science ">
  <span class="checkmark"></span>
</label>

<label class="container">Account
  <input type="checkbox" name="subjects[]" value="account">
  <span class="checkmark"></span>
</label>

<label class="container">Business
  <input type="checkbox" name="subjects[]" value="business">
  <span class="checkmark"></span>
</label>

<label class="container">Law Study
  <input type="checkbox" name="subjects[]" value="law">
  <span class="checkmark"></span>
</label>

@error('subjects')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Faculty:</strong><br>
<!-- <input type="radio" name="faculty" class="form-control" placeholder="Faculty"> -->

  <input type="radio" id="science" name="faculty" value="science">
  <label for="science">SCIENCE</label><br>
  <input type="radio" id="management" name="faculty" value="management">
  <label for="management">MANAGEMENT</label><br>
  <input type="radio" id="law" name="faculty" value="law">
  <label for="law">LAW</label>
@error('faculty')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<button type="ok" class="btn btn-primary ml-3">OK</button>
</div>
</form>
</body>
</html>