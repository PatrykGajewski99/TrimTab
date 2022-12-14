<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class UserController extends Controller
{
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

       try{

           User::whereId($userID)->update($personData);
           return redirect()->back()->with(['message' => 'Person detailes updated successfully']);

       }catch(\Illuminate\Database\QueryException $ex){

           return redirect()->back()->with(['message_error' => 'Cannot execute query. Phone number is not unique.',]);
       }




   }

}
