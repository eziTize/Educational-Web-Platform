<?php

namespace App\Http\Controllers\Frontweb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\VideoSession;
use App\Transformers\{
    ZoneTransformer,
};
use App\User;
use App\Models\{
    Zone,
    StudentProfile,
    StudentQA,
    Country
};

use App\Http\Requests\TeacherRequests\{
    StoreTeacherContactSettings,
};

use Illuminate\Support\Facades\Auth;


class StudentProfileController extends Controller
{
    public function ContactSettings(){
        try {
            $zone = Zone::all();
            $user = User::findOrFail(Auth::id());
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            abort(403);
        }
        $timezones = $this->transformerCollection($zone,new ZoneTransformer());
        return view('student-profile-settings.contact-info',[
            'timezones'=>$timezones['data'],
            'student'=>$user,
            'zone'=>$zone,
            'country'=>Country::get(),
        ]);
    }

    public function ContactSettingsUpdate(StoreTeacherContactSettings $request){
        try {
            $user = User::findOrFail(Auth::id());
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            abort(403);
        }
        $validated = $request->validated(); 

        $data['name']=$validated['name'];
        $data['last_name']=$validated['last_name'];
        $data['email']=$validated['email'];
        $data['contact_number']=$validated['contact_number'];
        $data['zone_id']=$validated['zone_id'];
        $data['country']=$validated['country'];
        $data['city']=$validated['city'];
        $data['address']=$validated['address'];

        $result = $user->update($data);
        if($result){
            return redirect()->route('student.settings.index')->with('success_message','Information Updated Successfully');
        }else{
            return redirect()->route('student.settings.index')->with('error_message','Something went wrong! please try again later');
        }
    }

    public function ProfileSettings(){
        try {
            $user = User::findOrFail(Auth::id());
            $profile = StudentProfile::where('user_id', $user->id)->firstOrCreate(
            ['user_id' => Auth::id()]
            );
            $qa = StudentQA::where('user_id', $user->id)->firstOrCreate(
            ['user_id' => Auth::id()]
            );
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            abort(403);
        }
        return view('student-profile-settings.profile',[
            'profile'=>$profile,
            'student'=>$user,
            'qa'=>$qa,
        ]);
    }


    public function ProfileUpdate(Request $request){
        try {
            $user = User::findOrFail(Auth::id());
            $sprofile = StudentProfile::where('user_id', $user->id)->firstOrCreate(
            ['user_id' => Auth::id()]
            );
            $qa = StudentQA::where('user_id', $user->id)->firstOrCreate(
            ['user_id' => Auth::id()]
            );
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            abort(403);
        }

        $sprofile->user_id=$user->id;
        $sprofile->dob=$request->dob;
        $sprofile->job=$request->job;
        $sprofile->gender=$request->gender;
        $sprofile->describe=$request->describe;
        $sprofile->motivates=$request->motivates;
        $sprofile->hobbies=$request->hobbies;

        $qa->user_id=$user->id;
        $qa->ans_1=$request->ans_1;
        $qa->ans_2=$request->ans_2;
        $qa->ans_3=$request->ans_3;
        $qa->ans_4=$request->ans_4;
        $qa->ans_5=$request->ans_5;
        $qa->ans_6=$request->ans_6;
        $qa->ans_7=$request->ans_7;
        $qa->ans_8=$request->ans_8;
        $qa->ans_9=$request->ans_9;


        if($request->profile_img){
            $profile_img = time().'.'.request()->profile_img->getClientOriginalExtension();
            $sprofile->profile_img = $profile_img;
            request()->profile_img->move("student_uploads/profile_images/", $profile_img);
        }

        $result = $qa->update();
        $result = $sprofile->update();
        if($result){
            return redirect()->route('student.profile.settings')->with('success_message','Information Updated Successfully');
        }else{
            return redirect()->route('student.profile.settings')->with('error_message','Something went wrong! please try again later');
        }
    }

    /*public function QASettings(){
        try {
                $user = User::findOrFail(Auth::id());
                $qa = StudentQA::where('user_id', $user->id)->firstOrCreate(
                ['user_id' => Auth::id()],
        );
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            abort(403);
        }
        return view('student-profile-settings.qa-settings',[
            'qa'=>$qa,
            'student'=>$user
        ]);
    }


    public function QAUpdate(Request $request){
        try {
            $user = User::findOrFail(Auth::id());
            $qa = StudentQA::where('user_id', $user->id)->firstOrCreate(
            ['user_id' => Auth::id()],
        );
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            abort(403);
        }

        $qa->user_id=$user->id;
        $qa->ans_1=$request->ans_1;
        $qa->ans_2=$request->ans_2;
        $qa->ans_3=$request->ans_3;
        $qa->ans_4=$request->ans_4;
        $qa->ans_5=$request->ans_5;
        $qa->ans_6=$request->ans_6;
        $qa->ans_7=$request->ans_7;
        $qa->ans_8=$request->ans_8;
        $qa->ans_9=$request->ans_9;

        $result = $qa->update();

        if($result){
            return redirect()->route('student.profile.qa-settings')->with('success_message','Information Updated Successfully');
        }else{
            return redirect()->route('student.profile.qa-settings')->with('error_message','Something went wrong! please try again later');
        }
    }*/

    public function updatePass(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);
        $user = User::findOrFail(Auth::id());
        $user->password = bcrypt($request->password);
        $user->save();
        return back()->with('success_message', 'Password updated successfully!');
    }
}
