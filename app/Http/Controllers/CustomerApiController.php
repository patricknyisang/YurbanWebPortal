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

class CustomerApiController extends Controller
{  

    public function getcustomersrides($id)
    {   
        // $customers = TBRide:: where('Customerid', $id)->get();
    
        $customers = TBRide::where(["Customerid" => $id])->orderBy("date", "desc")->get();
    
         $customerlist = [];
    
        foreach($customers as $customer) {
            $customerlist[] = [
                "id" => $customer->id,
                "customerid" => $customer->{'Customerid'},
                "customerphone" => $customer->{'DriverPhone'},
                "customerfname" => $customer->{'DriverFirstname'},
                "customerlname" => $customer->{'DriverLastname'},
                "from" => $customer->{'PickLocation'},
                "to" => $customer->{'DropLocation'},
                "numberofpassagers" => $customer->{'Passagers'},
                "action" => $customer->{'status'},
                
      
            ];
              // return response()->json([
            //     'data' => $customer
            // ], 200);
        
        }
        return response()->json($customerlist, 200);
    
    }

    public function StoreCustomerRideRequest(Request $request,){
        $dateTime = Carbon::now();
        $Customerid = $request->get('Customerid');
        $CustomerFname = $request->get('userfname');
        $CustomerLname = $request->get('userlname');
        $Customerphone = $request->get('userphone');
        $Pickuplocation = $request->get('pickuplocation');
        $Droplocation = $request->get('dropofflocation');
        $Passagers = $request->get('numberofpassagers');
        // $Driverid = $request->get('lastname');
        // $DriverFname = $request->get('firstname');
        // $DriverLname = $request->get('lastname');
    
        $status = 'Pending'; // Assign a role
        
////////validations
if ($Customerid == null){
    return response(['error'=>true,'message'=>'Customer Id missing']);
   }

if ($CustomerFname == null){
 return response(['error'=>true,'message'=>'Customer First Name missing']);
}
if ($CustomerLname == null){
 return response(['error'=>true,'message'=>'Customer Last Name missing']);
}
if ($Customerphone == null){
 return response(['error'=>true,'message'=>'Customer missing']);
}

if ($Pickuplocation == null){
 return response(['error'=>true,'message'=>'Pick Up Location missing']);
}

if ($Droplocation == null){
 return response(['error'=>true,'message'=>'Drop  Location missing']);
}

if ($Passagers == null){
 return response(['error'=>true,'message'=>'Passagers missing']);
}
// if ($Driverid == null){
//  return response(['error'=>true,'message'=>'Driver Id missing']);
// }

// if ($DriverFname == null){
//  return response(['error'=>true,'message'=>'Driver First Name missing']);
// }
// if ($DriverLname == null){
//     return response(['error'=>true,'message'=>'Driver Last Name missing']);
//    }


        $customerriderequest = [
           'date' => $dateTime,
            'Customerid' => $Customerid,
            'CustomerFirstname' => $CustomerFname,
            'CustomerLastname' => $CustomerLname,
            'CustomerPhone' => $Customerphone,
            "PickLocation" => $Pickuplocation, 
            "DropLocation" => $Droplocation,
            "Passagers" => $Passagers,
            // 'DriverFirstname' => $DriverFname,
            // 'DriverLastname' => $DriverLname,
            // 'DriverId' => $Driverid,
            'status' => $status,
        ];

        TBRide::create($customerriderequest);
   

}



    public function RegisterCustomer(Request $request,){
        $dateTime = Carbon::now();

           $FirstName = $request->get('firstname');
           $LastName = $request->get('lastname');
           $mobileno = $request->get('phonenumber');
           $Gender = $request->get('gender');
           $usercounty = $request->get('County');
           $usersubcounty = $request->get('SubCounty');
           $UserEmail = $request->get('email');
           $password1 = $request->get('pass1');
           $password2 = $request->get('pass1');
           $role = 1; // Assign a role
           
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
   
           $insertcustomer = [
              'date' => $dateTime,
               'firstname' => $FirstName,
               'lastname' => $LastName,
               'phonenumber' => $mobileno,
               'county' => $usercounty,
               'subcounty' => $usersubcounty,
               'email' => $UserEmail,
               'gender' => $Gender,
               "pass1" => $password1, 
               "pass2" => $password2,
               'role' => 3,
           ];
   
           TByurbanuser::create($insertcustomer);
      
  
   }




   public function CustomerloginApi(Request $request)
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
               $records = TByurbanuser::getWhere(["phonenumber" => $username,"role" => 3],true);
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
}