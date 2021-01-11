<?php

namespace App\Http\Controllers\Frontweb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Transformers\{
    TeacherTransformer
};
use App\User;

class TeachersController extends Controller
{
    /**
     * Show the application landing page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userRoleTeacher = User::role('teacher')->where('visibility', '1')->get();
        $teachers = $this->transformerCollection($userRoleTeacher,new TeacherTransformer(),['categories','accomplishments','extras', 'hobbies', 'languages']);
        return view('all-coaches.coaches-wrapper',[
            'teachers'=>$teachers
        ]);
    }
}
