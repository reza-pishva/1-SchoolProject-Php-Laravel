<?php
namespace App\Http\Controllers;
use App\Models\ExamUser;
use Illuminate\Http\Request;
use App\Http\Requests\ExamUserRequest;

class ExamUserController extends Controller
{
    public function exams(){
        $exams = ExamUser::all();
        return $exams;
    }
    public function exam($id){
        $exams = ExamUser::find($id);
        return $exams;
    }
    public function exams_view($user_id,$lesson_id,$grade_id){
        $exams = DB::table('exam_user_lesson_view3')->orderByDesc('id')->get();
        return $exams;
    }
    public function remove($id){
        $result = ExamUser::find($id)->delete();     
    }
    public function update(ExamUserRequest $request,$id){
        $exams = ExamUser::find($id);
        $exams->update(['score'=>$request->score,
                        'date_shamsi'=>$request->date_shamsi,
                        'exam_id'=>$request->exam_id,
                        'user_id'=>$request->user_id]);
        return $exams;  
    }
    public function store(ExamUserRequest $request){
        ExamUser::create(['score' => $request->score,
                          'date_shamsi' => $request->date_shamsi,
                          'exam_id' => $request->exam_id,
                          'user_id' => $request->user_id]); 
        return $request;
    }
}
