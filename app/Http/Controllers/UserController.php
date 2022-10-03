<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {

        return view('dashboard');
    }
   public function readXML(Request $request)
   {
       $file=$request->file('file');
       $fileName=$file->getClientOriginalName();
       $destinationPath=public_path().'/xml';
       $file->move($destinationPath,$fileName);
       $path='xml/'.$fileName;

       $xmlDataString = file_get_contents(public_path($path));
       $xmlObject = simplexml_load_string($xmlDataString);

       foreach ($xmlObject->children() as $person)
       {
           $personData=array("name" => $person->name , "address" => $person->address , "phone" => $person->phone);
       }
        $userID=auth()->user()->id;
        User::whereId($userID)->update($personData);
        return back()->with('success','Person detailes updated successfully');
   }

}
