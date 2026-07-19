<?php

namespace Modules\CustomerManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\CustomerManagement\Http\Requests\CustomerRequest;
use Modules\CustomerManagement\Services\CustomerService;

class CustomerManagementController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
              $customers = $this->customerService->getAll();
            return view('customermanagement::customers.index',compact('customers'));
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try{

            return view('customermanagement::customers.create');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request) {
        $data = $request->validated();

        try{
            if($this->customerService->store($data)){
                return redirect()->back()->with('success','Customer Added Successfully');
            }
            return redirect()->back()->with('error','Something went wrong');
        }catch(\Exception $e){
             return redirect()->back()->with('error', $e->getMessage());
        }

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         try{
            $customer = $this->customerService->show($id);
            return view('customermanagement::customers.edit',compact('customer'));
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, $id) {
        $data = $request->validated();
        try{
            if($this->customerService->update($id,$data)){
                return redirect()->back()->with('success','Customer Added Successfully');
            }
            return redirect()->back()->with('error','Something went wrong');
        }catch(\Exception $e){
             return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
         try{
            if($this->customerService->delete($id)){
                return redirect()->back()->with('success','Customer Deleted Successfully');
            }
            return redirect()->back()->with('error','Something went wrong');
        }catch(\Exception $e){
             return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
