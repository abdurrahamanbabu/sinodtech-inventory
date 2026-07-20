<?php

namespace Modules\Marketing\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\MarketingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Modules\CustomerManagement\Services\CustomerService;

class EmailMarketingController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }
    public function index()
    {
      try{
         $data['customers'] = $this->customerService->customers();
         $data['inactive_customers'] = $this->customerService->showInactiveCustomers();
         return view('marketing::email.index',$data);
      }catch(\Exception $e){
          return redirect()->back()->with("error", $e->getMessage());
      }
    }

    public function mailSend(Request $request)
    {

        $data = $request->validate([
            "subject" => "required|string",
            "message" => "required|string",
            "customer_id" => "required|array"
        ]);

        try{
            $customers = $this->customerService->getAllByIds($data['customer_id']);
            foreach($customers as $customer){
                $email_data = [
                    "name" => $customer->name,
                    "subject" => $data['subject'],
                    "message" => $data['message']
                ];

                Mail::to($customer->email)->queue(new MarketingMail($email_data));

                return redirect()->back()->with('success','Operaion successfull');
            }
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
