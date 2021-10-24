<?php
namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
    $companies = DB::table('companies')->select('companies.*','departments.department_name as department_name')   
              ->join('departments','departments.id','=', 'companies.department_id')
              ->get();
// dd($companies);

//    $department = DB::table('departments')
//                  ->get();

                            
// $data['companies'] = Company::orderBy('id','desc')->paginate(5);
return view('companies.index', compact('companies'));
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
    $departments=Department::all();
    return view('companies.create',compact('departments'));
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$request->validate([
'department_id' => 'required',
'email' => 'required',
'contactnumber' => 'required',
'name' => 'required',
'address' => 'required',
'reviews' => 'required',
]);
$company = new Company;
$company->name = $request->name;
$company->email = $request->email;
$company->address = $request->address;
$company->contactnumber = $request->contactnumber;
$company->reviews = $request->reviews;
$company->department_id = $request->department_id;
$company->save();
return redirect()->route('companies.index')
->with('success','Company has been created successfully.');
}
/**
* Display the specified resource.
*
* @param  \App\company  $company
* @return \Illuminate\Http\Response
*/
public function show(Company $company)
{
return view('companies.show',compact('company'));
} 
/**
* Show the form for editing the specified resource.
*
* @param  \App\Company  $company
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
        $company=Company::find($id); 
        $departments=Department::all();
        
        return view('companies.edit',compact('departments','company'));
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
'name' => 'required',
'email' => 'required',
'address' => 'required',
'contactnumber' => 'required'
]);
$company = Company::find($id);
$company->name = $request->name;
$company->email = $request->email;
$company->address = $request->address;
$company->contactnumber = $request->contactnumber;
$company->reviews = $request->reviews;
$company->department_id = $request->department_id;
$company->save();
return redirect()->route('companies.index')
->with('success','Company Has Been updated successfully');
}
/**
* Remove the specified resource from storage.
*
* @param  \App\Company  $company
* @return \Illuminate\Http\Response
*/
public function destroy(Company $company)
{
$company->delete();
return redirect()->route('companies.index')
->with('success','Company has been deleted successfully');
}
}