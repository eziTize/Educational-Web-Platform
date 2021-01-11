<?php

namespace App\Http\Controllers\Frontweb;

use App\VideoSession;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Transformers\{
    TeacherTransformer,
    ZoneTransformer,
    ProfileVisibilityTransformer,
    ProfileGenderTransformer,
    ProfileLanguageTransformer,
    ProfileHobbiesTransformer,
    ProfileCategoryTransformer,
    ProfileCertificationTransformer,
    ProfileAccomplishmentTransformer,
    TeacherSkillTransformer as ProfileSkillTransformer,
    ProfileTransformationTransformer,
    PayoutTransformer,
};
use App\User;
use App\Payout as GetPaid;
use App\Models\{
    Zone,
    Country,
    TeacherSkill as ProfileSkill,
    ProfileVisibility,
    ProfileLanguage,
    ProfileCategory,
    ProfileHobbies,
    ProfileAccomplishment,
    ProfileDescription,
    ProfileExtra,
    ProfileCertification,
    ProfileGender,
    ProfileTransformation,
};
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TeacherRequests\{
    StoreTeacherContactSettings,
    StoreTeacherProfileSettings,
    StoreGetpaidSettings,
};

class TeacherProfileController extends Controller
{
    public function ContactSettings(){
        try {
            $zone = Zone::all();
            $user = User::findOrFail(Auth::id());
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            abort(403);
        }
        $timezones = $this->transformerCollection($zone,new ZoneTransformer());
        $teacher = $this->transformerItem($user,new TeacherTransformer());
        return view('coach-profile-settings.contact-info',[
            'timezones'=>$timezones['data'],
            'country'=>Country::get(),
            'teacher'=>$teacher,
            'zone'=>$zone,
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
            return redirect()->route('teacher.settings.index')->with('success_message','Information Updated Successfully');
        }else{
            return redirect()->route('teacher.settings.index')->with('error_message','Something went wrong! please try again later');
        }
    }


    public function getpaidSettings(){
        try {
            $user = User::findOrFail(Auth::id());
            $getPaid = GetPaid::where('user_id', $user->id)->firstOrCreate(
            ['user_id' => Auth::id()],
            ['ac_holder'=>$user->name]
        );
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            abort(403);
        }
        $teacher = $this->transformerItem($user,new TeacherTransformer());
        return view('coach-profile-settings.get-paid',[
            'payout'=>$getPaid,
            'teacher'=>$teacher
        ]);
    }


    public function getpaidUpdate(StoreGetpaidSettings $request){
        try {
            $user = User::findOrFail(Auth::id());
            $getPaid = GetPaid::where('user_id', $user->id)->firstOrCreate(
            ['user_id' => Auth::id()],
            ['ac_holder'=>$user->name]
        );
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            abort(403);
        }
        $validated = $request->validated();

        $getPaid->user_id=$user->id;
        $getPaid->ac_holder=$validated['ac_holder'];
        $getPaid->ac_no=$validated['ac_no'];
        $getPaid->tax_no=$request->tax_no;
        $getPaid->rnib=$validated['rnib'];
        $getPaid->ac_type=$validated['ac_type'];
        $getPaid->country=$validated['country'];
        $getPaid->city=$validated['city'];
        $getPaid->postcode=$validated['postcode'];
        $getPaid->st_addr=$validated['st_addr'];

        $result = $getPaid->update();
        if($result){
            return redirect()->route('teacher.profile.getpaid')->with('success_message','Information Updated Successfully');
        }else{
            return redirect()->route('teacher.profile.getpaid')->with('error_message','Something went wrong! please try again later');
        }
    }

    public function ProfileSettings(){
        try {
            $user = User::findOrFail(Auth::id());
            $profileLanguage = ProfileLanguage::all();
            $profileCategory = ProfileCategory::all();
            $profileSkill = ProfileSkill::where('user_id', $user->id)->get();
            $profileHobbies = ProfileHobbies::where('user_id', $user->id)->get();
            $profileCertification = ProfileCertification::where('user_id', $user->id)->get();
            $profileAccomplishment = ProfileAccomplishment::where('user_id', $user->id)->get();
            $profileTransformation = ProfileTransformation::where('user_id', $user->id)->get();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            abort(403);
        }
        $teacher = $this->transformerItem($user,new TeacherTransformer(),['visibility','languages', 'skills', 'categories','accomplishments','extras', 'certification', 'hobbies', 'gender', 'transformations']);
        $languages = $this->transformerCollection($profileLanguage,new ProfileLanguageTransformer());
        $skills = $this->transformerCollection($profileSkill,new ProfileSkillTransformer());
        $categories = $this->transformerCollection($profileCategory,new ProfileCategoryTransformer());
        $certification = $this->transformerCollection($profileCertification,new ProfileCertificationTransformer());
        $hobbies = $this->transformerCollection($profileHobbies,new ProfileHobbiesTransformer());
        $accomplishments = $this->transformerCollection($profileAccomplishment,new ProfileAccomplishmentTransformer());
        $transformations = $this->transformerCollection($profileTransformation,new ProfileTransformationTransformer());
        return view('coach-profile-settings.profile-settings',[
            'teacher'=>$teacher,
            'languages'=>$languages,
            'skills'=>$skills,
            'categories'=>$categories,
            'accomplishments'=>$accomplishments,
            'certification'=>$certification,
            'hobbies' =>$hobbies,
            'transformations' =>$transformations,
        ]);
    }

    public function ProfileSettingsUpdate(StoreTeacherProfileSettings $request){
        try {
            $user = User::findOrFail(Auth::id());
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            abort(403);
        }
        $validated = $request->validated();

        //Updating the profile visibility
        $visibility = ProfileVisibility::updateOrCreate(
            ['user_id' => Auth::id()],
            ['visibility_type'=>$request->teacher_profile_visibility]
        );
        $user->visibility = $request->teacher_profile_visibility;

        //Updating the user gender
        $gender = ProfileGender::updateOrCreate(
            ['user_id' => Auth::id()],
            ['gender'=>$request->teacher_profile_gender]
        );

        //Updating the profile extras
        $extra = ProfileExtra::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'travel_willingness'=>$request->teacher_travel_willingness,
                'average_price'=>$request->teacher_average_price,
                'dob'=>$request->teacher_dob,
                'linkedin'=>$request->teacher_linkedin,
                'facebook'=>$request->teacher_facebook,
                'insta'=>$request->teacher_insta,
                'twitter'=>$request->teacher_twitter,
                'pinterest'=>$request->teacher_pinterest,
            ]
        );

        if($request->profile_image != null){
            $user->clearMediaCollection('profile-image-collection');
            $media = $user->addMediaFromRequest('profile_image')->toMediaCollection('profile-image-collection');
        }

        if($request->profile_video != null){
            $user->clearMediaCollection('profile-video-collection');
            $media = $user->addMediaFromRequest('profile_video')->toMediaCollection('profile-video-collection');
        }
        

     /*   if($request->banner_image != null){
            $user->clearMediaCollection('profile-banner-collection');
            $media = $user->addMediaFromRequest('banner_image')->toMediaCollection('profile-banner-collection');
        } */ //Disabled as Banner Image will be provided by admin

        // Updating the profile linked description...
        $description = ProfileDescription::updateOrCreate(
            ['user_id' => Auth::id()],
            ['description'=>$request->description]
        );
        $user->profile_description()->save($description);

        //Updating the profile linked categories..
        $categories = array();
        $selected_categories = $request->teacher_profile_categories;
        if($selected_categories!=null){
            foreach ($selected_categories as $selected_category) {
                // Retrieve category by name, or create it if it doesn't exist...
                $details = ProfileCategory::firstOrCreate(
                    ['name' => $selected_category],
                    ['slug'=>Str::slug($selected_category)]
                );
                \array_push($categories,$details->id);
            }
            $user->profile_categories()->sync($categories);
        }

        //Updating the profile linked languages..
        $languages = array();
        $selected_languages = $request->teacher_profile_languages;
        if($selected_languages!=null){
            foreach ($selected_languages as $selected_language) {
                // Retrieve category by name, or create it if it doesn't exist...
                $details = ProfileLanguage::firstOrCreate(
                    ['name' => $selected_language],
                    ['slug'=>Str::slug($selected_language)]
                );
                \array_push($languages,$details->id);
            }
            $user->profile_languages()->sync($languages);
        }
       
        //deleting the old accomplishments first and attaching it with new...
        $user->profile_accomplishments()->delete();
        $selected_accomplishments = $request->teacher_profile_accomplishments;
        if($selected_accomplishments!=null){
            foreach ($selected_accomplishments as $selected_accomplishment) {
                // Retrieve accomplishment by title and user_id, or create it if it doesn't exist...
                $details = ProfileAccomplishment::firstOrCreate(
                    ['title' => $selected_accomplishment,'user_id' => Auth::id()],
                    ['slug'=>Str::slug($selected_accomplishment)]
                );
                $user->profile_accomplishments()->save($details);
            }
        }

        //deleting the old transformations first and attaching it with new...
        $user->profile_transformations()->delete();
        $selected_transformations = $request->teacher_profile_transformations;
        if($selected_transformations!=null){
            foreach ($selected_transformations as $selected_transformation) {
                // Retrieve transformation by title and user_id, or create it if it doesn't exist...
                $details = ProfileTransformation::firstOrCreate(
                    ['title' => $selected_transformation,'user_id' => Auth::id()],
                    ['slug'=>Str::slug($selected_transformation)]
                );
                $user->profile_transformations()->save($details);
            }
        }

        //deleting the old hobbies first and adding new...
        $user->profile_hobbies()->delete();
        $selected_hobbies = $request->teacher_profile_hobbies;
        if($selected_hobbies!=null){
            foreach ($selected_hobbies as $selected_hobby) {
                // Retrieve hobbies by title and user_id, or create it if it doesn't exist...
                $details = ProfileHobbies::firstOrCreate(
                    ['title' => $selected_hobby,'user_id' => Auth::id()],
                    ['slug'=>Str::slug($selected_hobby)]
                );
                $user->profile_hobbies()->save($details);
            }
        }

        //deleting the old skills first and attaching it with new...
        $user->skills()->delete();
        $selected_skills = $request->skills;
        if($selected_skills!=null){
            foreach ($selected_skills as $selected_skill) {
                // Retrieve skill by name, or create it if it doesn't exist...
                $details = ProfileSkill::firstOrCreate(
                    ['title' => $selected_skill, 'user_id' => Auth::id()],
                    //['slug'=>Str::slug($selected_skill)]
                );
                $user->skills()->save($details);
            }
        }

        //deleting the old certificates first and attaching it with new...
        $user->certification()->delete();
        $selected_certificates = $request->certificate_img;

        if($selected_certificates!=null){
            
            foreach ($selected_certificates as $selected_certificate) {

                $cert_image_name = time().'.'.$selected_certificate->getClientOriginalName();
                $selected_certificate->move('custom-theme/assets/images/movie/', $cert_image_name);

                // Retrieve certificate or create it if it doesn't exist...
                $details = ProfileCertification::firstOrCreate(
                    ['certificate' => 'custom-theme/assets/images/movie/'.$cert_image_name, 'user_id' => Auth::id()],
                );
                $user->certification()->save($details);
            }
        }

        return redirect()->route('teacher.profile.settings')->with('success_message','Information Updated Successfully');
    }

    public function show($id){
        try {
            $user = User::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            abort(403);
        }
        if(!$user->hasRole('teacher')){
            return redirect('/');
        }
        $teacher = $this->transformerItem($user,new TeacherTransformer(),['languages', 'categories','accomplishments', 'transformations' ,'skills', 'certification', 'hobbies', 'extras']);
        return view('coach-details.details-wrapper',[
            'teacher'=>$teacher
        ]);
    }

    public function vsess(){

        $vsess = VideoSession::where('user_id', auth()->user()->id)->get();

        return View('coach-profile-settings.sessions',[
            'vsess'=>$vsess
        ]);

    }

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
