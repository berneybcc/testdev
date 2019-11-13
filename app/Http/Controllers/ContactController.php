<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index(){
        $info=$this->selectInfoContact();
        return view('/principal',array(
            "infocontact"=>$info
        ));
    }
    
    public function save(Request $request){
        
        $validar=$this->selectInfoContact(array(
            "id_number_contact"=>$request->input("id"),
            "email_contact"=>$request->input("email")
        ));
        if(!$validar){
            $validar=$this->selectInfoContact(array(
                "id_number_contact"=>$request->input("id")
            ));
        }
        if(!$validar){
            $validar=$this->selectInfoContact(array(
                "email_contact"=>$request->input("email")
            ));
        }
        $returnValidar=["error"=>"the user is already registered"];
        if(!$validar){
            $contact = DB::table('contact')->insert(array(
                "id_number_contact"=>$request->input("id"),
                "name_contact"=>$request->input("name"),
                "email_contact"=>$request->input("email"),
                "phone_contact"=>$request->input("phone"),
                "message_contact"=>$request->input("message"),
                "date_create"=>date('Y-m-j h:m:s')
            ));
            $returnValidar=["message"=>"User save"];
        }
        return $returnValidar;
    }

    public function selectInfoContact($info=null){
        if($info!=null){
            $contact = DB::table('contact')->where($info)->get();
        }
        else{
            $contact = DB::table('contact')->get();
        }
        if(count($contact)==0){
            $contact=false;
          }
        return $contact;
    }

    public function listContact(){
        $info = $this->selectInfoContact();
        return json_encode($info);
    }
    
    public function deleteContact($id){
        $info=DB::table('contact')->where('id',$id)->delete();
        return json_encode('user deleted');
    }

    public function selectUserContact($id){
        $info = $this->selectInfoContact(['id'=>$id]);
        return json_encode($info);
    }

    public function updateContact($id,Request $request){
        $info=DB::table('contact')->where('id',$id)
            ->update([
                "name_contact"=>$request->input("name"),
                "email_contact"=>$request->input("email"),
                "phone_contact"=>$request->input("phone")]
            );
        return json_encode(['message'=>'Successful Change']);
    }
}
