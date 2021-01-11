<?php

namespace App\Http\Controllers\Frontweb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Transformers\{
    TeacherTransformer
};
use App\User;

use App\Models\{
    TeacherService
};

class WelcomeController extends Controller
{
    /**
     * Show the application landing page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userRoleTeacher = User::role('teacher')->where('visibility', '1')->get();
        $teachers = $this->transformerCollection($userRoleTeacher,new TeacherTransformer(),['extras']);
        return view('welcome',[
            'teachers'=>$teachers
        ]);
    }

    public function index2()
    {
        $userRoleTeacher = User::role('teacher')->get();
        $teachers = $this->transformerCollection($userRoleTeacher,new TeacherTransformer(),['extras']);
        //return view('welcome',[
            //'teachers'=>$teachers
        //]);
        return view('testing.m_index');
    }

    public function singlePackage($id){
        
        $data = [
            'service' => TeacherService::findOrFail($id),
            'coach' => User::role('teacher')->get(),
        ];
        
        return view('package-details.details-wrapper',$data);

    }
}
