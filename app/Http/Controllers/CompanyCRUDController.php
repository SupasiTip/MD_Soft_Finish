<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyCRUDController extends Controller
{
    //create index
    public function index (Request $request){

        $data['companies'] = Company::orderBy('id', 'asc')->paginate(10);
        return view('companies.index',$data);


    }

    //create resorce
    public function create(){
        return view('companies.create');
    }
    //store resource
    public function store(Request $request){
        $request->validate([
            'occupation' => 'required',
            'name' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'companyperformance' => 'required',
            'media' => 'required|array',
            'Other' => 'required',

        ]);
        $company = new Company;
        $company -> occupation = $request->occupation;
        $company -> name = $request->name;
        $company -> lastName = $request->lastName;
        $company -> email = $request->email;
        $company -> companyperformance = $request->companyperformance;
        $mediaConsumeString = implode(', ', $request->input('media'));
        $company->media= $mediaConsumeString;
        $company -> Other = $request->Other;
        $company->save();
        return redirect()->route('companies.index')->with('success','Company has been created successfully');
    }

    public function edit(Company $company){
        return view('companies.edit',compact('company'));

    }

    public function update(Request $request,$id){
        $request->validate([
            'occupation' => 'required',
            'name' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'companyperformance' => 'required',
            'media' => 'required|array',
            'Other' => 'required',

        ]);
        $company = new Company;
        $company -> occupation = $request->occupation;
        $company -> name = $request->name;
        $company -> lastName = $request->lastName;
        $company -> email = $request->email;
        $company -> companyperformance = $request->companyperformance;
        $mediaConsumeString = implode(', ', $request->input('media'));
        $company->media= $mediaConsumeString;
        $company -> Other = $request->Other;
        $company->save();
        return redirect()->route('companies.index')->with('success'.'Company has been created successfully');
    }

    public function destroy(Company $company){
        $company->delete();
        return redirect()->route('companies.index')->with('success'.'Company has been deleted successfully');
    }

    public function filter(Request $request){
        
        $dateFilter = $request->dateFilter ?? null;
        $monthFilter = $request->monthFilter ?? null;

        if ($dateFilter != null) {

            $data['companies'] = Company::where('dateRecording', 'like', '%' . $dateFilter . '%')->orderBy('id', 'asc')->paginate(5);
            return view('companies.index', $data);

        }else if ($monthFilter != null) {

            $data['companies'] = Company::where('dateRecording', 'like', '%' . $monthFilter . '%')->orderBy('id', 'asc')->paginate(5);
            return view('companies.index', $data);

        } else{
            $data['companies'] = Company::orderBy('id', 'asc')->paginate(10);
            return view('companies.index', $data);
        }
    }
    
}
