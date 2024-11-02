<?php

namespace App\Http\Controllers;
use App\Models\TByurbanuser;
use App\Models\TBCounties;
use App\Models\TBconstituencies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;

class Userscontroller extends Controller
{

   


    public function Registeradmin(Request $request,){
        $dateTime = Carbon::now();
        $personalid = $request->get('nationalid');
       
            $FirstName = $request->get('firstname');
            $LastName = $request->get('lastname');
            $mobileno = $request->get('phonenumber');
            $usercounty = $request->get('county');
            $usersubcounty = $request->get('constituency');
            $UserEmail = $request->get('email');
            $password1 = 1234;
            $password2 = 1234;
            $role = 1; // Assign a role
            
            if ($password1 !== $password2) {
                return response()->json(['error' => 'Passwords do not match'], 400);
            }
    
            // Hash the password
            $hashedPassword = Hash::make($password1);
    

        $admin = [
            'date' => $dateTime,
         'nationaid' => $personalid,
                'firstname' => $FirstName,
                'lastname' => $LastName,
                'phonenumber' => $mobileno,
                'county' => $usercounty,
                'subcounty' => $usersubcounty,
                'email' => $UserEmail,
                "pass1" => $password1, 
                "pass2" => $password2,
                'role' => $role,
           ];
           TByurbanuser::create($admin);
       
    return redirect(url('admins'))->with ('message', 'created successfully');
        }
    public function getdrivers()
    {   
        $drivers=TByurbanuser::where('Role', 2)->get();
        $counties = TBCounties::all();
        return view('adddriver',compact('drivers','counties'));

}

public function getcustomers()
{   
    $customers = TByurbanuser::where('Role', 3)->get();
    $counties = TBCounties::all();
  
    return view('customers',compact('customers','counties'));
}
public function getadmins()
{   
    $admins = TByurbanuser::where('Role', 1)->get();
    $counties = TBCounties::all();
  
    return view('addadmin',compact('admins','counties'));
}
public function deleterecord($id){

    TByurbanuser::where(['id' => $id], true)->delete();
    return redirect(url('admins'))->with ('message', 'Update successfully');

}

    public function updatecustomer(Request $request,$id){
       
        $FirstName = $request->get('firstname');
        $LastName = $request->get('lastname');
        $mobileno = $request->get('phonenumber');
        $usercounty = $request->get('county');
        $usersubcounty = $request->get('subcounty');
        $UserEmail = $request->get('email');

        TByurbanuser::where(['id' => $id])->update([
        "First_name" => $fname,
            "Last_name" => $Lname,
            "admno" => $admn, 
            "ClassName" => $clasname,
            "useremail" => $email,
       
    ]);
    return redirect(url('adddriver'))->with ('message', 'Update successfully');
}
public function getadmindash()
{   
   
    return view('adminpage');

}

public function delete($id){

    TByurbanuser::where(['id' => $id], true)->delete();
    
    return redirect()->route('addadmin')->with('success', 'Post updated successfully!');
}
public function loginweb(Request $request)
    {
        try{
            $username = $request->input('username'); 
            $password = $request->input('password');
           
            if ( isset($username) && isset($password)){
                $rec = TByurbanuser::getWhere(["phonenumber" => $username],true);
                Log::info("rec: ".json_encode($rec));
    
                if (isset($rec->{'pass1'})){
                    if ($rec->{'pass1'} == ($password)) {
                        return redirect()->intended('adddriver');
                

                                 if ($rec->{'Role'} == 1 ){
                                    return redirect()->intended('adddriver');
                                }
                               
                    }
                    return response([
                        "error" => true,
                        "message" => "Invalid credentials try again!"
                    ]);
                }
                return response([
                    "error" => true,
                    "message" => "Credentials not found in our systems!"
                ]);
            }
            return response([
                "error" => true,
                "message" => "Enter required details!"
            ]);
        }catch (Exception $e){
            return response([
                "error" => true,
                "message" => "Error! ".$e->getMessage(),"Line".$e->getLine()
            ]);
        }
    }


    public function filtercustomers(Request $request)
    {


       $date = $request->input('dateselected');

        if($date == null){
            $customers = @TByurbanuser::getWhere(['role'=>3,]);
            return view('customers',compact('customers'));

        }else{

        $customers = @TByurbanuser::getWhere(['date'=>$date]);
        return view('customers',compact('customers'));

        }
    }

    public function filterdrivers(Request $request)
    {


       $date = $request->input('dateselected');

        if($date == null){
            $drivers = @TByurbanuser::getWhere(['role'=>2,]);
            return view('adddriver',compact('drivers'));

        }else{

        $drivers = @TByurbanuser::getWhere(['date'=>$date]);
        return view('adddriver',compact('drivers'));

        }
    }


    public function filterdriverspercounty(Request $request)
    {


       $county = $request->input('selectedcountyid');
       $subcounty = $request->input('selectedsubcountyid');

        if($subcounty == null){
            $drivers = @TByurbanuser::getWhere(['role'=>2]);
            return view('adddriver',compact('drivers'));

        }else{

            $drivers = @TByurbanuser::getWhere(['role'=>2,'county'=>   $county,'subcounty'=>$subcounty,]);
        return view('adddriver',compact('drivers'));

        }
    }

    public function filtercustomerspercounty(Request $request)
    {


       $county = $request->input('selectedcountyid');
       $subcounty = $request->input('selectedsubcountyid');

        if($subcounty == null){
            $customers = @TByurbanuser::getWhere(['role'=>2]);
            return view('customers',compact('customers'));

        }else{

            $customers = @TByurbanuser::getWhere(['role'=>3,'county'=>   $county,'subcounty'=>$subcounty,]);
        return view('customers',compact('customers'));

        }
    }


    public function fetchConstintuencies(Request $request)
{
    $data['constituency'] = TBconstituencies::where("county_id", $request->id)->get(["constituency", "id"]);

    return response()->json($data);
}
}