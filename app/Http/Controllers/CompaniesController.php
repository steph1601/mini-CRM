<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\CompanyCollection;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;


class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('companies');
    }

    public function getData(Request $request)
    {
        $companies = Companies::select('id', 'company_name', 'email', 'website', 'logo');
        $totalRecords = $companies->count();

        if ($request->has('search') && $request->search['value'] != '') {
            $companies->where('company_name', 'LIKE', '%' . $request->search['value'] . '%');
        }
    
        $filteredRecords = $companies->count();
    

        $companies = $companies->paginate(10);
    
        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $companies->items()
        ]);
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
       
        try {
            $company = Companies::create($request->validated());
    
            return response()->json([
                'status' => 'success',
                'message' => 'Company Added successfully.',
                'data' => $company
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create company. ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
        public function show(Companies $companies)
        {
            $employees = Employees::where('company_id', $companies->id)->paginate(10);

            return view('companies-show', compact('companies', 'employees'));
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(Companies $companies)
    {
        return response()->json([
            'id' => $companies->id,
            'company_name' => $companies->company_name,
            'email' => $companies->email,
            'website' => $companies->website,
            'logo' => $companies->logo,
        ]);       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Companies $companies)
    {
         $data = $request->validated();
         $company = $companies::findOrFail($data['id']);
         // Update the company data
        $company->company_name = $data['edit_name'];
        $company->email = $data['company_email'];
        $company->website = $data['company_website'];

        if( $company->save()){
            return response()->json([
                'status' => 'success',
                'message' => 'Company edited successfully.',
            ], 201);
        }else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to edit company. '
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Companies $companies)
    {
        $company = $companies::withTrashed()->find($id);

        if ($company) {
            // Permanently delete the company
            $company->forceDelete();
            return response()->json(['status' => 'success', 'message' => 'Company permanently deleted successfully.']);
        }

        return response()->json(['status' => 'error', 'message' => 'Company not found.'], 404);
    }
    

    public function softDelete($id, Companies $companies)
    {
        $company = $companies::find($id);

        if ($company) {
            $company->delete(); // Soft delete
            return response()->json(['status' => 'success', 'message' => 'The data has been moved to archive successfully.']);
        }

        return response()->json(['status' => 'error', 'message' => 'Company not found.'], 404);
    }

    public function checkUrl(Request $request)
    {
        $url = $request->input('url');

        return $this->checkUrlExists($url);
    }

    
    function checkUrlExists($url)
    {
        try {
            $response = Http::timeout(10)->get($url);
            $statusCode = $response->status();

            return response()->json([
                'success' => $response->successful(),
                'status' => 'success',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'status' => 'failed',
            ]);
        }
    }

}
