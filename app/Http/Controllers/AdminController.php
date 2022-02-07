<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Categories;
use App\Standerd;
Use App\Subject;
Use App\chapter;
Use App\College;
Use App\Semister;
Use App\Test_Type;
Use App\Medium;
Use App\Video;



use DB;
use Auth;

class AdminController extends Controller
{
    public function admin_list(Request $request)
    {
        $data['users'] =  User::where('user_type','1')->get();
        $data['flag'] = 1; 
        $data['page_title'] = 'View Admin'; 
        return view('Admin/webviews/manage_admin_user',$data);
    } 

    public function user_list(Request $request)
    {
        $data['users'] =  User::where('user_type','2')->get();
        // dd($data);
        $data['flag'] = 2; 
        $data['page_title'] = 'View User'; 
        return view('Admin/webviews/manage_admin_user',$data);
    }

    public function categories_list()
    {

       $data['Categories'] =  Categories::get();
        // dd($data);
        return view('Admin.categories_list',$data);
    }

    public function view_medium()
    {
        $data['flag'] = 3; 
        $data['page_title'] = 'All Medium';  
        $data['medium'] = Medium::get();     
        return view('Admin/webviews/manage_admin_user',$data);
    }


    public function add_medium()
    {
        $data['flag'] = 4; 
        $data['page_title'] = 'Add Medium';
        return view('Admin/webviews/manage_admin_user',$data);
    }


    public function submit_medium(Request $req)
    {
    //    dd($req);

        $this->validate($req,[
            'medium_name'=>'required'            
         ]);


         if($req->id) { 

            Medium::where('id',$req->id)->update([
                'medium_name' => $req->medium_name,
                'status' => $req->status,
            ]);
            toastr()->success('Medium Updated Successfully!');
            return redirect('view-medium');
         }else{ 
                $data = new Medium;
                $data->medium_name=$req->medium_name;         
                $data->status=$req->status;             
                $result = $data->save();
            if($result)
            {
                toastr()->success('Medium Successfully Added!');
            }
            else
            {
                toastr()->error('Medium Not Added!!');
            }         
    
        // toastr()->success('Subject Successfully Added!');
        return redirect('view-medium');

        }
    }

    public function delete_medium($id){ 
        $data['result']= Medium::where('id',$id)->delete();
        toastr()->error('Medium Deleted !');
        return redirect('view-medium');
    }

    public function edit_medium($id){
        $data['flag'] = 5; 
        $data['page_title'] = 'Edit Medium'; 
        $data['medium'] = Medium::where('id',$id)->first();        
        return view('Admin/webviews/manage_admin_user',$data);
    }
     

    public function view_subject()
    {
       
        $data['flag'] = 9; 
        $data['page_title'] = 'All Subject';  
        $data['subjects'] = Subject::Join('standerds', 'standerds.id', '=', 'subjects.standard_id')->select('subjects.*', 'standerds.standerd_name')->get();     
        // dd($data);
        return view('Admin/webviews/manage_admin_user',$data);
    }


    public function add_subject()
    {
        $data['flag'] = 10; 
        $data['page_title'] = 'Add Subject';
        $data['standerds'] = DB::table('standerds')->where('status',"1")->get();
        $data['medium'] = Medium::where('status', '1')->get(); 
        // dd($data['standerds']);  
        return view('Admin/webviews/manage_admin_user',$data);
    }

    public function myformAjax($id)
    {
        // return 'hello';
        $standerds = DB::table("standerds")
                    ->where("medium_id",$id)
                    ->orderBy('standerd_name', 'desc')
                    ->pluck("standerd_name","id");
                    // dd($chapter);
        return json_encode($standerds);
    }

    public function getsubject($id)
    {
        // return 'hello';
        $subject = DB::table("subjects")
                    ->where("standard_id",$id)
                    ->orderBy('subject_name', 'desc')
                    ->pluck("subject_name","id");
                    // dd($chapter);
        return json_encode($subject);
    }

    public function getchapter($id)
    {
        // return 'hello';
        $chapter = DB::table("chapters")
                    ->where("subject_id",$id)
                    ->orderBy('chapter_name', 'desc')
                    ->pluck("chapter_name","id");
                    // dd($chapter);
        return json_encode($chapter);
    }


    public function submit_subject(Request $req)
    {
    //    dd($req);

        $this->validate($req,[
            'subject_name'=>'required',       
            'status'=>'nullable|numeric'             
         ]);


         if($req->id) { 
            Subject::where('id',$req->id)->update([
                'subject_name' => $req->subject_name,
                'status' => $req->status,
            ]);
            toastr()->success('Subject Updated Successfully!');
            return redirect('view-subject');

         }else{
 
                $data = new Subject;
                $data->subject_name=$req->subject_name; 
                $data->medium_id=$req->medium_id;   
                $data->standard_id=$req->standard_id;           
                $data->status=$req->status;             
                $result = $data->save();
            if($result)
            {
                toastr()->success('Subject Successfully Added!');
            }
            else
            {
                toastr()->error('Subject Not Added!!');
            }         
    
        // toastr()->success('Subject Successfully Added!');
        return redirect('view-subject');

        }
    }

    public function delete_subject($id){ 
        $data['result']=Subject::where('id',$id)->delete();
        toastr()->error('Subject Deleted !');
        return redirect('view-subject');
    }

    public function edit_subject($id){
        $data['flag'] = 11; 
        $data['page_title'] = 'Edit Subject'; 
        $data['subject'] = Subject::where('id',$id)->first(); 
        $data['standerds'] = DB::table('standerds')->where('status',"1")->get();
        $data['medium'] = Medium::where('status',"1")->get(); 
        // dd($data);
        return view('Admin/webviews/manage_admin_user',$data);
    }



    public function view_standard()
    {
       
        $data['flag'] = 6; 
        $data['page_title'] = 'All Standard';  
        $data['standerds'] = Standerd::get();     
        return view('Admin/webviews/manage_admin_user',$data);
    }

    public function add_standard()
    {
        $data['flag'] = 7; 
        $data['page_title'] = 'Add Standard';   
        $data['medium'] = Medium::where('status',"1")->get();     
        return view('Admin/webviews/manage_admin_user',$data);
    }

    public function submit_standard(Request $req)
    {
    //    dd($req);
        $this->validate($req,[
            'standerd_name'=>'required',        
            'status'=>'nullable|numeric'             
         ]);


         if($req->id) { 
            Standerd::where('id',$req->id)->update([
                'standerd_name' => $req->standerd_name,
                'status' => $req->status,
            ]);
            toastr()->success('Standard Updated Successfully!');
            return redirect('view-standard');

         }else{

                $result = DB::table('standerds')->where('standerd_name', $req->class_name)->first(); 
                if(!$result)
                {   
                // ======================================
                $data = new Standerd;
                    $data->standerd_name=$req->standerd_name;
                    $data->medium_id=$req->medium_id;             
                    $data->status=$req->status;             
                $result = $data->save();
                if($result)
                {
                    toastr()->success('Standard Successfully Added!');
                }
                else
                {
                    toastr()->error('Standard Not Added!!!');
                } 
            }
            else
            {
                toastr()->error('Standard Already Exists!!! ');
            }         
            toastr()->success('Standard Successfully Added!');
            return redirect('view-standard');

            }
    }



    public function delete_standard($id){ 
        $data['result']=Standerd::where('id',$id)->delete();
        toastr()->error('Standard Deleted !');
        return redirect('view-standard');
    }

    public function edit_standard($id){
        $data['flag'] = 8; 
        $data['page_title'] = 'Edit Standard'; 
        $data['standard'] = Standerd::where('id',$id)->first();  
        $data['medium'] = Medium::where('status',"1")->get(); 
        // dd($data);
        return view('Admin/webviews/manage_admin_user',$data);
    }

    


    public function view_chapter()
    {
       $data['flag'] = 12; 
       $data['page_title'] = 'All Chapter';  
       $data['chapters'] = chapter::get();  
       $data['subjects'] = DB::table('subjects')->where('status',"1")->get(); 
       $data['standerds'] = DB::table('standerds')->where('status',"1")->get(); 
       $data['medium'] = Medium::where('status', '1')->get();   
       return view('Admin/webviews/manage_admin_user',$data);
    }

    public function add_chapter()
    {
        $data['flag'] = 13; 
        $data['page_title'] = 'Add Chapter'; 
        $data['subjects'] = DB::table('subjects')->where('status',"1")->get(); 
        $data['standerds'] = DB::table('standerds')->where('status',"1")->get(); 
        $data['medium'] = Medium::where('status', '1')->get(); 
        return view('Admin/webviews/manage_admin_user',$data);
    }

    public function submit_chapter(Request $req)
    {
       // dd($req);
       $this->validate($req,[
        'chapter_name'=>'required',    
        'status'=>'nullable|numeric'             
     ]);

     if($req->id) { 
        chapter::where('id',$req->id)->update([
            'chapter_name' => $req->chapter_name,
            'status' => $req->status,
        ]);
        toastr()->success('Chapter Updated Successfully!');
        return redirect('view-chapter');

     }else{

            $data = new chapter;
            $data->chapter_name=$req->chapter_name; 
            $data->medium_id=$req->medium_id;
            $data->standard_id=$req->standard_id; 
            $data->subject_id=$req->subject_id;          
            $data->status=$req->status;             
            $result = $data->save();
        if($result)
        {
            toastr()->success('Chapter Successfully Added!');
        }
        else
        {
            toastr()->error('Chapter Not Added!!');
        }         

    // toastr()->success('Subject Successfully Added!');
            return redirect('view-chapter');
    }   
    }

    public function delete_chapter($id){ 
        $data['result']=chapter::where('id',$id)->delete();
        toastr()->error('Chapter Deleted !');
        return redirect('view-chapter');
    }

    public function edit_chapter($id){
        $data['flag'] = 14; 
        $data['page_title'] = 'Edit Chapter'; 
        $data['chapter'] = chapter::where('id',$id)->first(); 
        // dd($data);
        return view('Admin/webviews/manage_admin_user',$data);
    }

    public function view_video()
    {
       $data['flag'] = 15; 
       $data['page_title'] = 'All Video';  
       $data['video'] = Video::get();     
       return view('Admin/webviews/manage_admin_user',$data);
    }

    public function add_video()
    {
        $data['flag'] = 16; 
        $data['page_title'] = 'Add Video';  
        $data['medium'] = Medium::where('status',"1")->get(); 
        $data['chapter'] = chapter::where('status', '1')->first(); 
        $data['subjects'] = DB::table('subjects')->where('status',"1")->get(); 
        $data['standerds'] = DB::table('standerds')->where('status',"1")->get();      
        return view('Admin/webviews/manage_admin_user',$data);
    }


    public function submit_video(Request $req)
    {
       // dd($req);
       $this->validate($req,[
        'video_title'=>'required',
        'video_link'=>'required',            
     ]);

     if($req->video_id) { 
        Video::where('id',$req->video_id)->update([
            'video_title' => $req->video_title,
            'video_link' => $req->video_link,
            'status' => $req->status,
        ]);
        toastr()->success('Video Updated Successfully!');
        return redirect('view-video');
     }else{
            $data = new Video;
            $data->video_title=$req->video_title; 
            $data->video_link=$req->video_link;
            $data->medium_id=$req->medium_id; 
            $data->standard_id=$req->standard_id;
            $data->subject_id=$req->subject_id; 
            $data->chapter_id=$req->chapter_id;          
            $data->status=$req->status;             
            $result = $data->save();
        if($result)
        {
            toastr()->success('Video Successfully Added!');
        }
        else
        {
            toastr()->error('Video Not Added!!');
        }         

    // toastr()->success('Subject Successfully Added!');
            return redirect('view-video');
    }   
    }

    public function delete_video($id){ 
        $data['result']=Video::where('id',$id)->delete();
        toastr()->error('Video Deleted !');
        return redirect('view-video');
    }

    public function edit_video($id){
        $data['flag'] = 17; 
        $data['page_title'] = 'Edit Video'; 
        $data['video'] = Video::where('id',$id)->first();  
        // dd($data);
        return view('Admin/webviews/manage_admin_user',$data);
    }


    public function user_details($id)
    {  
        $data['flag'] = 18; 
        $data['page_title'] = 'User Details';  
        $data['user'] = User::Join('user_details', 'user_details.user_id', '=', 'users.id')->where('users.id', $id)->first();     
        // dd($data);
        return view('Admin/webviews/manage_admin_user',$data);
    }


    public function view_test_type()
    {
       $data['flag'] = 17; 
       $data['page_title'] = 'All Test Type';  
       $data['test_type'] = Test_Type::get();
    //    dd($data);     
       return view('Admin/webviews/manage_admin_user',$data);
    }

    public function add_test_type()
    {
        $data['flag'] = 18; 
        $data['page_title'] = 'Add Test Type';        
        return view('Admin/webviews/manage_admin_user',$data);
    }


    public function submit_test_type(Request $req)
    {
    //    dd($req);
        $this->validate($req,[
            'test_type_name'=>'required',        
            'status'=>'nullable|numeric'              
         ]);


         if($req->id) { 

            Test_Type::where('id',$req->id)->update([
                'test_type_name' => $req->test_type_name,
                'status' => $req->status,
            ]);
            toastr()->success('Test Type Updated Successfully!');
            return redirect('view-test-type');

         }else{

            $result = Test_Type::where('test_type_name', $req->test_type_name)->first();  
                if(!$result)
                {   
                // ======================================
                $data = new Test_Type;
                $data->test_type_name=$req->test_type_name;            
                $data->status=$req->status;             
                $result = $data->save();
                if($result)
                {
                    toastr()->success('Test Type Successfully Added!');
                }
                else
                {
                    toastr()->error('Test Type Not Added!!!');
                } 
            }
            else
            {
                toastr()->error('Test Type Already Exists!!! ');
            }         
            toastr()->success('Test Type Successfully Added!');
            return redirect('view-test-type');

            }
    }

    public function delete_test_type($id){ 
        $data['result']=Test_Type::where('id',$id)->delete();
        toastr()->error('Test Type Deleted !');
        return redirect('view-test-type');
    }

    public function edit_test_type($id){
        $data['flag'] = 19; 
        $data['page_title'] = 'Edit Test Type'; 
        $data['test_type'] = Test_Type::where('id',$id)->first();  
        // dd($data);
        return view('Admin/webviews/manage_admin_user',$data);
    }
    
}
