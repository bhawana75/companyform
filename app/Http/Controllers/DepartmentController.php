<?php
namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;
class DepartmentController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$data['departments'] = Department::orderBy('id','desc')->paginate(5);
return view('departments.index', $data);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('departments.create');
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
// $request->validate([
// 'department_name' => 'required',
// 'email' => 'required',
// 'number' => 'required',
// 'employeenumber' => 'required'
// ]);
$department = new department;
$department->department_name = $request->name;
$department->email = $request->email;
$department->number = $request->number;
$department->employeenumber = $request->employeenumber;
$department->save();
return redirect()->route('departments.index')
->with('success','Department has been created successfully.');
}
/**
* Display the specified resource.
*
* @param  \App\Department  $Department
* @return \Illuminate\Http\Response
*/
public function show(Department $department)
{
return view('departments.show',compact('department'));
} 
/**
* Show the form for editing the specified resource.
*
* @param  \App\Department  $Department
* @return \Illuminate\Http\Response
*/
public function edit(Department $department)
{
    
return view('departments.edit',compact('department'));

}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\Department  $Department
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
// $request->validate([
//     'department_name' => 'required',
//     'email' => 'required',
//     'number' => 'required',
//     'employeenumber' => 'required'
// ]);
$Department = Department::find($id);
$Department->department_name = $request->name;
$Department->email = $request->email;
$Department->number = $request->number;
$Department->employeenumber = $request->employeenumber;
$Department->save();
return redirect()->route('departments.index')
->with('success','Department Has Been updated successfully');
}
/**
* Remove the specified resource from storage.
*
* @param  \App\Department  $Department
* @return \Illuminate\Http\Response
*/
public function destroy(Department $department)
{
$department->delete();
return redirect()->route('departments.index')
->with('success','Department has been deleted successfully');
}
}