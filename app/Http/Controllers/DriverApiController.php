<?php

namespace App\Http\Controllers;
use App\Models\TByurbanuser;
use App\Models\TBCounties;
use App\Models\TBRide;
use App\Models\TBconstituencies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;

class DriverApiController extends Controller
{ 
    

    public function updatedriverejectride(Request $request){
        $recordID = $request->input('recordid');
     
        $status='Rejected';
        TBRide::where(['id' => $recordID])->update([
        "status" => $status,
    ]);

}
    public function updatedriveracceptride(Request $request){
        $recordID = $request->input('recordid');
        $driverID = $request->input('driverid');
        $driverFirstname = $request->input('driverfirstname');
        $driverLastname = $request->input('driverlastname');
        $driverphone = $request->input('driverphone');
        $status='accepted';
        TBRide::where(['id' => $recordID])->update([
        "DriverId" => $driverID,
        "DriverFirstname" => $driverFirstname,
        "DriverLastname" => $driverLastname,
        "DriverPhone" => $driverphone,
        "status" => $status,
        
       
    ]);

}

    public function getcustomersrequest($driverid)
    {   
        // $customers = TBRide:: where('Customerid', $id)->get();
        $status = 'Pending';
        $customers = TBRide::getWhere(["status" =>  $status]);
        $druverstatus = TByurbanuser::getWhere(["id" =>  $driverid],true)->{"driverstatus"};

         $customerlist = [];
    if ( $druverstatus=='online'){
        foreach($customers as $customer) {
            $customerlist[] = [
                "id" => $customer->id,
                "customerid" => $customer->{'Customerid'},
                "customerphone" => $customer->{'CustomerPhone'},
                "customerfname" => $customer->{'CustomerFirstname'},
                "customerlname" => $customer->{'CustomerLastname'},
                "from" => $customer->{'PickLocation'},
                "to" => $customer->{'DropLocation'},
                "numberofpassagers" => $customer->{'Passagers'},
                "action" => $customer->{'status'},
                
      
            ];
              // return response()->json([
            //     'data' => $customer
            // ], 200);
            return response()->json($customerlist, 200);

        }
        }else{
            return response(['error'=>true,'message'=>'You are offline']);
        }
    
    }

    
    public function getdriversrides($id)
    {   
        // $customers = TBRide:: where('Customerid', $id)->get();
    
        $drivers = TBRide::where(["DriverId" => $id])->orderBy("date", "desc")->get();
    
         $driverlist = [];
    
        foreach($drivers as $driver) {
            $driverlist[] = [
                "id" => $driver->id,
                "customerid" => $driver->{'Customerid'},
                "customerphone" => $driver->{'CustomerPhone'},
                "customerfname" => $driver->{'CustomerFirstname'},
                "customerlname" => $driver->{'CustomerLastname'},
                "from" => $driver->{'PickLocation'},
                "to" => $driver->{'DropLocation'},
                "numberofpassagers" => $driver->{'Passagers'},
                "action" => $driver->{'status'},
                
      
            ];
              // return response()->json([
            //     'data' => $customer
            // ], 200);
        
        }
        return response()->json($driverlist, 200);
    
    }
    public function updateOFFLINEstatus(Request $request){
        $pid = $request->input('PID');
        $offlinestatus='offline';
        TByurbanuser::where(['id' => $pid])->update([
        "driverstatus" => $offlinestatus,
       
    ]);
    return redirect(url('adddriver'))->with ('message', 'Update successfully');
}

public function updateONLINEstatus(Request $request){
    $pid = $request->input('PID');
    $onlinestatus='online';
    TByurbanuser::where(['id' => $pid])->update([
    "driverstatus" => $onlinestatus,
   
]);
return redirect(url('adddriver'))->with ('message', 'Update successfully');
}

    public function fetch_counties()
{
    try {

        $counties = TBcounties::all();
        $products = [];

        foreach($counties as $product) {
            $products[] = [
                "id" => $product->{'id'},
                "counties" => $product->{'county_name'},
            ];
        }


       // return response()->json([
         //   'data' => $products
     //   ], 200);
         return response()->json($products, 200);

    } catch (\Exception $e) {
        return response()->json([
            'error' => true,
            'message' => $e->getMessage()
        ], 400);
    }
}
  
  
   public function fetch_constituencies($countyid)
{
    try {

        $constituencies = TBconstituencies::getWhere(["county_id"=>$countyid]);;
        $products = [];

        foreach($constituencies as $product) {
            $products[] = [
                "id" => $product->{'id'},
                "constituency" => $product->{'constituency'},
            ];
        }

         return response()->json($products, 200);

    } catch (\Exception $e) {
        return response()->json([
            'error' => true,
            'message' => $e->getMessage()
        ], 400);
    }
}

    public function DriverloginApi(Request $request)

    {     Log::info("Request data: ".json_encode($request->all()));
        try{
    
            $username = $request->input('Username');
            $password = $request->input('Password');
            
              if ($username == null){
                    return response(['error'=>true,'message'=>'Username missing']);
                } 
                
                  if ($password == null){
                    return response(['error'=>true,'message'=>'Password missing']);
                } 
            if ( isset($username) && isset($password)){
                $records = TByurbanuser::getWhere(["phonenumber" => $username,"role" => 2],true);
                Log::info("rec: ".json_encode($records));
    
                if (isset($records->{'pass1'})){
                    if ($records->{'pass1'} == $password) {
                        $pid = $records->{"id"};
                        $fname = @TByurbanuser::getWhere(['id'=>$pid],true)->{"firstname"}?:"";
                        $lname = @TByurbanuser::getWhere(['id'=>$pid],true)->{"lastname"}?:"";
                        $useremail = @TByurbanuser::getWhere(['id'=>$pid],true)->{"email"}?:"";
                        $userphone = @TByurbanuser::getWhere(['id'=>$pid],true)->{"phonenumber"}?:"";
                        $userole= @TByurbanuser::getWhere(['id'=>$pid],true)->{"role"}?:"";
    
                        return response([
                            "error" => false,
                            "message" => "Success!",
                            "pid" => $pid,
                            "fname" => $fname,
                            "lname" => $lname,
                            "email" => $useremail,
                            "userphone" => $userphone,
                            "role" => $userole,
                       
    
                        ],200);
                    }
                    return response([
                        "error" => true,
                        "message" => "Invalid credentials try again!"
                    ],401);
                }
                return response([
                    "error" => true,
                    "message" => "Credentials not found in our systems!"
                ],404);
            }
            return response([
                "error" => true,
                "message" => "Enter required details!"
            ]);
        }catch (Exception $e){
            return response([
                "error" => true,
                "message" => "Error! ".$e->getMessage(),"Line".$e->getLine()
            ],500);
        }
    }


    public function Registersdriver(Request $request,){
    
      
        $FirstName = $request->get('firstname');
        $LastName = $request->get('lastname');
        $mobileno = $request->get('phonenumber');
        $Gender = $request->get('gender');
        $usercounty = $request->get('County');
        $usersubcounty = $request->get('SubCounty');
        $UserEmail = $request->get('email');
        $password1 = $request->get('pass1');
        $password2 = $request->get('pass1');
        $role = 2; // Assign a role
        $dateTime = Carbon::now();
        $driverstatus = 'online'; 
////////validations

if ($FirstName == null){
 return response(['error'=>true,'message'=>'First Name missing']);
}
if ($LastName == null){
 return response(['error'=>true,'message'=>'Last Name missing']);
}
if ($Gender == null){
 return response(['error'=>true,'message'=>'Gender missing']);
}

if ($mobileno == null){
 return response(['error'=>true,'message'=>'Mobile missing']);
}

if ($usercounty == null){
 return response(['error'=>true,'message'=>'County missing']);
}

if ($usersubcounty == null){
 return response(['error'=>true,'message'=>'Sub County missing']);
}
if ($UserEmail == null){
 return response(['error'=>true,'message'=>'Email missing']);
}

if ($password1 == null){
 return response(['error'=>true,'message'=>'Password missing']);
}
 if ($password1 !== $password2) {
            return response()->json(['error' => 'Passwords do not match'], 400);
        }
        // Hash the password
        $hashedPassword = Hash::make($password1);

        $driver = [
            'date' => $dateTime,
            'firstname' => $FirstName,
            'lastname' => $LastName,
            'phonenumber' => $mobileno,
            'County' => $usercounty,
            'SubCounty' => $usersubcounty,
            'email' => $UserEmail,
            'gender' => $Gender,
            "pass1" => $password1, 
            "pass2" => $password2,
            'role' => $role,
            'driverstatus' => $driverstatus,
        ];

        TByurbanuser::create($driver);
   

}



    
}