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
<div class="pull-left">
<h2>Edit Entrance Form</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('checkboxes.index') }}" enctype="multipart/form-data"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('checkboxes.update',$checkbox->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>First Name:</strong>
<input type="text" name="firstname" value="{{ $checkbox->firstname }}" class="form-control" placeholder="First Name">
@error('firstname')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Last Name:</strong>
<input type="text" name="lastname" value="{{ $checkbox->lastname }}" class="form-control" placeholder="Last Name">
@error('lastname')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Email:</strong>
<input type="email" name="email" class="form-control" placeholder="Email" value="{{ $checkbox->email }}">
@error('email')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Address:</strong>
<input type="text" name="address" value="{{ $checkbox->address }}" class="form-control" placeholder="Address">
@error('address')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Contact Number:</strong>
<input type="text" name="contactnumber" value="{{ $checkbox->contactnumber }}" class="form-control" placeholder="Contact Number">
@error('contactnumber')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Subjects:</strong>
@php
$subjects = explode(',',$checkbox->subjects);
@endphp 

<label class="container">Maths
  <input type="checkbox" name="subjects[]" value="maths"{{ in_array('maths',$subjects) ? 'checked' :'' }}>
  <span class="checkmark"></span>
</label>

<label class="container">Science
  <input type="checkbox" name="subjects[]" value="science" {{ in_array('science',$subjects) ? 'checked' :'' }}>
  <span class="checkmark"></span>
</label>

<label class="container">Account
  <input type="checkbox" name="subjects[]" value="account" {{ in_array('account',$subjects) ? 'checked' :'' }}>
  <span class="checkmark"></span>
</label>

<label class="container">Business
  <input type="checkbox" name="subjects[]" value="business" {{ in_array('business',$subjects) ? 'checked' :'' }}>
  <span class="checkmark"></span>
</label>

<label class="container">Law Study
  <input type="checkbox" name="subjects[]" value="law" {{ in_array('law',$subjects) ? 'checked' :'' }}>
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
  <input type="radio" id="science" name="faculty" value="science" {{ ($checkbox->faculty=='science') ? 'checked' :'' }}>
  <label for="science">SCIENCE</label><br>
  <input type="radio" id="management" name="faculty" value="management" {{ ($checkbox->faculty=='management') ? 'checked' :'' }}>
  <label for="management">MANAGEMENT</label><br>
  <input type="radio" id="law" name="faculty" value="law" {{ ($checkbox->faculty=='law') ? 'checked' :'' }}> 
  <label for="law">LAW</label>
@error('faculty')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<button type="ok" class="btn btn-primary ml-3">OK</button>
</div>
</form>
</div>
</body>
</html>