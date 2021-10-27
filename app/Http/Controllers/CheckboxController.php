<?php
namespace App\Http\Controllers;
use App\Models\Checkbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckboxController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
    // dd($request->first_name);
    $data = Checkbox::select('id','firstname','lastname','email','address','contactnumber','subjects','faculty');
    // for search
    if($request->search){
        $data->where('firstname','like','%'.$request->search.'%')
            ->orWhere('lastname','like','%'.$request->search.'%');
    }
       
    // for filter
    if($request->first_name){
        $data->where('firstname','like','%'.$request->first_name.'%');
    }
    if($request->last_name){
        $data->where('firstname','like','%'.$request->last_name.'%');
    }
    $checkboxes = $data->get();
    $search = $request->search;            
    $firstname = $request->first_name;            
    $lastname = $request->last_name;            
    return view('checkboxes.index',compact('checkboxes','search','firstname','lastname'));
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
   
    return view('checkboxes.create');
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
// 'firstname' => 'required',
// 'lastname' => 'required',
// 'address' => 'required',
// 'email' => 'required',
// 'contactnumber' => 'required',
// 'faculty' => 'required',
// ]);
$checkbox = new Checkbox;
$checkbox->firstname = $request->firstname;
$checkbox->lastname = $request->lastname;
$checkbox->email = $request->email;
$checkbox->address = $request->address;
$checkbox->contactnumber = $request->contactnumber;
$checkbox->subjects = implode(',',$request->subjects);
$checkbox->faculty = $request->faculty;
$checkbox->save();
return redirect()->route('checkboxes.index')
->with('success','Checkbox has been created successfully.');
}
/**
* Display the specified resource.
*
* @param  \App\company  $company
* @return \Illuminate\Http\Response
*/
public function show(Checkbox $checkboxes)
{
return view('checkboxes.show',compact('checkbox'));
} 
/**
* Show the form for editing the specified resource.
*
* @param  \App\Company  $company
* @return \Illuminate\Http\Response
*/
public function edit($checkbox)
{
       
        
        // return view('checkboxes.edit',compact('checkbox'));
        return view('checkboxes.edit')->with('checkbox',Checkbox::find($checkbox));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\company  $company
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$request->validate([
    'firstname' => 'required',
    'lastname' => 'required',
    'address' => 'required',
    'email' => 'required',
    'contactnumber' => 'required',
    'faculty' => 'required',
]);
$checkbox = Checkbox::find($id);
$checkbox->firstname = $request->firstname;
$checkbox->lastname = $request->lastname;
$checkbox->email = $request->email;
$checkbox->address = $request->address;
$checkbox->contactnumber = $request->contactnumber;
$checkbox->subjects = implode(',',$request->subjects);
$checkbox->faculty = $request->faculty;
$checkbox->save();
return redirect()->route('checkboxes.index')
->with('success','Checkbox Has Been updated successfully');
}
/**
* Remove the specified resource from storage.
*
* @param  \App\Company  $company
* @return \Illuminate\Http\Response
*/
public function destroy(Checkbox $checkbox)
{
    $checkbox->delete();
    return redirect()->route('checkboxes.index')
    ->with('success','checkbox has been deleted successfully');
}
}