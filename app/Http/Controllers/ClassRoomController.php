<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassRoom;
use App\Models\User;

class ClassRoomController extends Controller
{
    public function getYear(){
        $date = \Morilog\Jalali\Jalalian::now();
        $year = substr($date,0,4); 
        $month = substr($date,5,2); 
        $day = substr($date,8,2); 
        if($month<4){
          return $year-1; 
        }
        return $year; 
    }
    public function classrooms(){
        $classroom = ClassRoom::all();
        return $classroom;     
    }
    public function class_teachers($id){
        $classroom = ClassRoom::find($id);
        return $classroom->users->where('role',2);   
    }
    public function class_students($id){
        $classroom = ClassRoom::find($id);
        return $classroom->users->where('role',1);     
    }
    public function currentClassRooms(){
        $year=$this->getYear();
        $classroom = ClassRoom::year($year)->get();
        return $classroom;        
    }
    public function classroom($id){
        $classroom = ClassRoom::find($id);
        return $classroom;
    }
    public function remove($id){
        $result = ClassRoom::find($id)->delete();     
    }
    public function update(Request $request , $id){
        $classroom = ClassRoom::find($id);
        $classroom->update(['year' => $request->year,
                          'name' => $request->name, 
                          'grade_id' => $request->grade_id]);
        return $classroom;  
    }
    public function store(Request $request){
        $classroom = ClassRoom::create(['year' => $request->year,
                          'name' => $request->name, 
                          'grade_id' => $request->grade_id]);
        return $classroom;  
    }
}
