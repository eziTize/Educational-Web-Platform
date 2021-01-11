<?php

namespace App\Http\Controllers\Frontweb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;

use Session;
use App\User;

use App\Transformers\{
    TeacherTransformer
};

use App\Models\{
    //TeacherSkill
    CoachStudentList,
    StudentProfile,
    TeacherService,
    StudentQA,
    Booking,

};

use Illuminate\Support\Facades\Auth;



class DashboardController extends Controller
{
    
    public function Index(){


        $checkRole = DB::table('model_has_roles')->where('model_id', Auth::id())->first();

        if($checkRole->role_id == 1){

                $data = [
                'countFree' => Booking::where('student_id', Auth::id())->where('type', 'Free')->count(),
                'countPaid' => Booking::where('student_id', Auth::id())->where('payment', 'Successful')->where('type', 'Paid')->count(),
                'countCoaches' => CoachStudentList::where('student_id', Auth::id())->count(),
                'countTxn' => Booking::where('student_id', Auth::id())->where('type', 'Paid')->where('payment', 'Successful')->sum('price'),
                'bookings' => Booking::where('student_id', Auth::id())->where('type', '!=' ,'Package')->get(),
                'coach' =>  User::get(),
                'subject' =>  TeacherService::get(),
                'today' => Carbon::today()->toDateString(),
                'now' => Carbon::now()->format('H:i:s'),
                ];

                return view('student-dashboard.dashboard',$data);

        }

        $data = [
            'countTotal' =>Booking::where('coach_id', Auth::id())->count(),
            'countFree' => Booking::where('coach_id', Auth::id())->where('type', 'Free')->count(),
            'countPaid' => Booking::where('coach_id', Auth::id())->where('payment', 'Successful')->where('type', 'Paid')->count(),
            'countStudents' => CoachStudentList::where('coach_id', Auth::id())->count(),
            'countErn' => Booking::where('coach_id', Auth::id())->where('type', 'Paid')->where('payment', 'Successful')->sum('price'),
            'bookings' => Booking::where('coach_id', Auth::id())->where('type', '!=' ,'Package')->get(),
            'student' =>  User::get(),
            'subject' =>  TeacherService::get(),
            'today' => Carbon::today()->toDateString(),
            'now' => Carbon::now()->format('H:i:s'),
        ];

        return view('coach-dashboard.dashboard',$data);

    }

    public function studentIndex(){

        $data = [
            'countFree' => Booking::where('student_id', Auth::id())->where('type', 'Free')->count(),
            'countPaid' => Booking::where('student_id', Auth::id())->where('payment', 'Successful')->where('type', 'Paid')->count(),
            'countCoaches' => CoachStudentList::where('student_id', Auth::id())->count(),
            'countTxn' => Booking::where('student_id', Auth::id())->where('type', 'Paid')->where('payment', 'Successful')->sum('price'),
        ];

        return view('student-dashboard.dashboard',$data);
    }

    public function coachIndex(){

        $data = [
            'countFree' => Booking::where('coach_id', Auth::id())->where('type', 'Free')->count(),
            'countPaid' => Booking::where('coach_id', Auth::id())->where('payment', 'Successful')->where('type', 'Paid')->count(),
            'countStudents' => CoachStudentList::where('coach_id', Auth::id())->count(),
            'countErn' => Booking::where('coach_id', Auth::id())->where('type', 'Paid')->where('payment', 'Successful')->sum('price'),
        ];

        return view('coach-dashboard.dashboard',$data);
    }

    public function studentBookings(){

        $data = [
            'bookings' => Booking::where('student_id', Auth::id())->where('type', '!=' ,'Package')->get(),
            'coach' =>  User::get(),
            'subject' =>  TeacherService::get(),
            'today' => Carbon::today()->toDateString(),
            'now' => Carbon::now()->format('H:i:s'),

        ];

        return view('student-dashboard.bookings',$data);
    }

    public function coachBookings(){

        $data = [
            'bookings' => Booking::where('coach_id', Auth::id())->where('type', '!=' ,'Package')->get(),
            'student' =>  User::get(),
            'subject' =>  TeacherService::get(),
            'today' => Carbon::today()->toDateString(),
            'now' => Carbon::now()->format('H:i:s'),

        ];

        return view('coach-dashboard.bookings',$data);
    }

    public function studentCoachesList(){

       $data = [
            'list' => CoachStudentList::where('student_id', Auth::id())->get(),
            'coach' => User::role('teacher')->get(),
        ];

        return view('student-dashboard.coaches',$data);
        
    }

    public function coachStudentsList(){

       $data = [
            'list' => CoachStudentList::where('coach_id', Auth::id())->get(),
            'qa'=>StudentQA::get(),
            'student' => User::role('student')->get(),
        ];

        return view('coach-dashboard.students',$data);
        
    }

    public function studentReports(){
        $data = [
                'countFree' => Booking::where('student_id', Auth::id())->where('type', 'Free')->count(),
                'countPaid' => Booking::where('student_id', Auth::id())->where('payment', 'Successful')->where('type', 'Paid')->count(),
                'countCoaches' => CoachStudentList::where('student_id', Auth::id())->count(),
                'countTxn' => Booking::where('student_id', Auth::id())->where('type', 'Paid')->where('payment', 'Successful')->sum('price'),
                ];

        return view('student-dashboard.reports',$data);
    }

    public function coachReports(){
        $data = [
            'countTotal' =>Booking::where('coach_id', Auth::id())->count(),
            'countFree' => Booking::where('coach_id', Auth::id())->where('type', 'Free')->count(),
            'countPaid' => Booking::where('coach_id', Auth::id())->where('payment', 'Successful')->where('type', 'Paid')->count(),
            'countStudents' => CoachStudentList::where('coach_id', Auth::id())->count(),
            'countErn' => Booking::where('coach_id', Auth::id())->where('type', 'Paid')->where('payment', 'Successful')->sum('price'),
        ];

        return view('coach-dashboard.reports',$data);
    }
}
