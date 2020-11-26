<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Subject;
use App\Models\Teacher;
use App\Models\ClassRom;

use \PDF;
use \ZipArchive;

class APIController extends Controller
{
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function getResultRegistClass(Request $request)
    {
        $classId = $request->query("class",-1);
        if ( $classId == -1){
            return response()->json($this->badRequest(), 403);
        }

        $students = DB::table('student_class')
        ->join('student', 'student_class.student_id', '=', 'student.student_id')
        ->where(['class_id' => $classId])
        ->select('student.student_id', 'student.student_name', 'student.DateOfBirth as date_of_birth' , 'student.Sex as gender'  , 'student.email', 'student.faculty_id')
        ->get();
        return $this->ok($students);
    }

    public function getResultBySubject(Request $request)
    {
        $subjectId = $request->query("subject",-1);
        if ( $subjectId == -1){
            return response()->json($this->badRequest(), 403);
        }

        $students = DB::table('student_subject')
        ->join('student', 'student_subject.student_id', '=', 'student.student_id')
        ->where(['subject_id' => $subjectId])
        ->select('student.student_id', 'student.student_name', 'student.DateOfBirth as date_of_birth' , 'student.Sex as gender'  , 'student.email', 'student.faculty_id')
        ->get();
        return $this->ok($students);
    }

     public function getResultByTeacher(Request $request)
    {
        $teacherId = $request->query("teacher",-1);
        if ( $teacherId == -1){
            return response()->json($this->badRequest(), 403);
        }

        $students = DB::table('student_class')
        ->join('student_subject', 'student_subject.student_id', '=', 'student_class.student_id')
        ->join('class',  function($join) {
            $join->on("class.subject_id","=", "student_subject.subject_id");
            $join->on("class.class_id","=", "student_class.class_id"); 
        }) 
        ->join('student', 'student_subject.student_id', '=', 'student.student_id')
        ->where(['class.teacher_id' => $teacherId])
        ->select('student.student_id', 'student.student_name', 'student.DateOfBirth as date_of_birth' , 'student.Sex as gender'  , 'student.email', 'student.faculty_id', 'class.class_id','class.subject_id')
        ->get();
        return $this->ok($students);
    }


    public function getListSubject(Request $request)
    {
        $limit = -1;
        if (!is_null($request->query("limit",-1))){
            $limit = $request->query("limit",-1);
        }
        if ($limit > 0 ){
             $data = $this->getPage( Subject::paginate($limit) );
        } else {
            $data = Subject::get();
        } 

        return $this->ok($data);
    }

    public function getListTeacher(Request $request)
    {
        $limit = -1;
        if (!is_null($request->query("limit",-1))){
            $limit = $request->query("limit",-1);
        }
        if ($limit > 0 ){
             $data = $this->getPage( Teacher::paginate($limit) );
        } else {
            $data = Teacher::get();
        }
 
        return $this->ok($data);
    }

    public function getListRom(Request $request)
    {
        $data = [];
        $rooms = DB::table('class')->select("room")->distinct()->get();

        foreach ( $rooms as $room) {
            $data[] = $room->room;
        }

        return $this->ok($data);
    }

    public function postResgist(Request $request)
    {
        $postbody = $request->json()->all();
        if (is_null( $postbody ))
        {
             return response()->json($this->badRequest(), 403);
        }

        $idSubject = $postbody["subject_id"];
        $idClass = $postbody["class_id"];
        $idStudent = $postbody["student_id"];
 
        $class = ClassRom::where(['subject_id'=>$idSubject ,'class_id'=>$idClass])->get();
        if (is_null($class) || count($class) <= 0 || !isset($class[0])){
            return $this->error(501,"Không tồn tại môn học này");
        }
        try{
            DB::table('student_subject')->insert( ['student_id' => $idStudent,'subject_id' => $idSubject]);
            DB::table('student_class')->insert( ['student_id' => $idStudent,'class_id' => $idClass]);
        } catch (\Illuminate\Database\QueryException $ex){
             return $this->error(501,"Đăng ký học thất bại");
        }  
        return $this->ok($class[0], "Đăng ký học thành công");
    }
    public function putRegist(Request $request)
    {
        $postbody = $request->json()->all();
        if (is_null( $postbody ))
        {
             return response()->json($this->badRequest(), 403);
        }

        $idSubject = $postbody["subject_id"];
        $idClass = $postbody["class_id"];

        $idUpdateSubject = $postbody["update_subject_id"];
        $idUpdateClass = $postbody["update_class_id"];
        

        $idStudent = $postbody["student_id"];
 
        $class = ClassRom::where(['subject_id'=>$idUpdateSubject ,'class_id'=>$idUpdateClass])->get();

        if (is_null($class) || count($class) <= 0 || !isset($class[0])){
            return $this->error(501,"Không tồn tại môn học này");
        }

        try{
            DB::table('student_subject')->where(['student_id' => $idStudent,'subject_id' => $idSubject])->update(['subject_id' => $idUpdateSubject]);
            DB::table('student_class')->where(['student_id' => $idStudent,'class_id' => $idClass])->update(['class_id' => $idUpdateClass]);
        } catch (\Illuminate\Database\QueryException $ex){
             return $this->error(501,"Cập nhập đăng ký học thất bại");
        }  
        return $this->ok($class[0], "Cập nhập ký học thành công");
    } 

    public function deleteRegist(Request $request){

        $postbody = $request->json()->all();
        if (is_null( $postbody ))
        {
             return response()->json($this->badRequest(), 403);
        }

        $idSubject = $postbody["subject_id"];
        $idClass = $postbody["class_id"];
        $idStudent = $postbody["student_id"];

        DB::table('student_subject')->where(['student_id' => $idStudent,'subject_id' => $idSubject])->delete();
        DB::table('student_class')->where(['student_id' => $idStudent,'class_id' => $idClass])->delete();

        return $this->ok($postbody, "Xóa đăng ký học thành công");
    }

    public function downloadAllClass(Request $request){
         

        set_time_limit(3000);

         $data = [];
        $class = DB::table('class')->select("class_id")->distinct()->get();

        foreach ( $class as $room) {
            $data[] = $room->class_id;
        }

        foreach ( $data as $key => $classId) {
            $users = DB::table('student_class')
            ->join('student', 'student_class.student_id', '=', 'student.student_id')
            ->where(['class_id' => $classId])
            ->select('student.*')
            ->get()->toArray();
     
            $pdf = PDF::loadView('class_export',  ["users"=>$users,"className"=>$classId]);

             \Storage::put('class_'.$classId.'.pdf', $pdf->output());
        }
        $file = \Storage::path('class '.\Carbon\Carbon::now()->toDateTimeString().'.zip');
        $zip = new \ZipArchive();
        $zip->open($file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

 
         foreach ( $data as $key => $classId) {
            $path = \Storage::path('class_'.$classId.'.pdf');
            $zip->addFile($path,'class_'.$classId.'.pdf');
         }
        $zip->close();
         foreach ( $data as $key => $classId) {
            $path = \Storage::path('class_'.$classId.'.pdf');
            File::delete($path);
         }

        return response()->download($file);
    }


    public function downloadClasss(Request $request){
        
        $classId = $request->query("class",-1);
        if ( $classId == -1){
            return response()->json($this->badRequest(), 403);
        }

       $users = DB::table('student_class')
        ->join('student', 'student_class.student_id', '=', 'student.student_id')
        ->where(['class_id' => $classId])
        ->select('student.*')
        ->get()->toArray();
 
        $pdf = PDF::loadView('class_export',  ["users"=>$users,"className"=>$classId]);

     

        return $pdf->download('export_class.pdf');
    }
 

    public function importCSV(Request $request){
        $path = $request->file('file')->getRealPath();
        $data = array_map('str_getcsv', file($path));
        array_shift($data);
        $subjectData =  [];
        $classData =  [];

        foreach ($data as $item ){  
            $subjectData[] =   ['class_id' =>  $item[0], 'subject_id' => $item[1], 'room' => $item[2], 'day' => $item[3], 'start_class' => $item[4], 'end_class' => $item[5], 'teacher_id' => $item[6], 'max_student' => $item[7]];
        }
        DB::table('class')->insert(  $subjectData ); 
        return $this->ok($data, "Import thành công ");
    }
    
}
