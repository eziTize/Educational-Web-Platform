<?php

namespace App\Http\Controllers\Frontweb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Models\{
    //TeacherSkill
    TeacherService
};
use App\Transformers\{
    TeacherTransformer,
    //TeacherSkillTransformer
    TeacherServiceTransformer
};

use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    public function index($id=null){
        try {
            $user = User::findOrFail(Auth::id());
            $singleService = ($id!=null) ? TeacherService::findOrFail($id) : null ;
            //$singlePackage = ($id!=null) ? TeacherService::where('id', $id)->firstOrFail() : null ;

            $allRate = TeacherService::where('user_id', $user->id)->where('type', 'rates')->get();
            $allPackage = TeacherService::where('user_id',  $user->id)->where('type',  '!=' ,'rates')->get();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            abort(403);
        }
        $teacher = $this->transformerItem($user,new TeacherTransformer(),['services']);

        //If service ID is provided and is valid return it with the details of that service
        /*$allRate = ($allRate!=null) ? $this->transformerItem($allRate,new TeacherServiceTransformer()): $allRate;
        $allPackage = ($allPackage!=null) ? $this->transformerItem($allPackage,new TeacherServiceTransformer()): $allPackage;*/

        $singleService = ($singleService!=null) ? $this->transformerItem($singleService,new TeacherServiceTransformer()) : $singleService ;
        //$singlePackage = ($singlePackage!=null) ? $this->transformerItem($singlePackage,new TeacherServiceTransformer()) : $singlePackage ;

        return view('coach-rates-packages.details-wrapper',[
            'teacher'=>$teacher,
            'singleService'=>$singleService,
            //'singlePackage'=>$singlePackage,
            'allRate'=>$allRate,
            'allPackage'=>$allPackage
        ]);
    }

    public function ratesStore(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => '',
            'price'=> 'required|min:1|max:10000',
        ]);
        if ($validator->fails()) {
            return redirect()->route('teacher.services.index',['openModel'=>'createRateModal'])
                    ->withErrors($validator)
                    ->withInput();
        }
        $rate = TeacherService::create([
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'description'=>$request->description,
            'rate'=>'rates',
            'price'=>$request->price
        ]);
        if($rate){
            return redirect()->route('teacher.services.index')->with('action_success','Information Updated Successfully');
        }else{
            return redirect()->route('teacher.services.index')->with('action_fail','Something went wrong! please try again later');
        }
    }


    public function packageStore(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => '',
            'price'=> 'required|min:1|max:10000',
        ]);
        if ($validator->fails()) {
            return redirect()->route('teacher.services.index',['openModel'=>'createPackageModal'])
                    ->withErrors($validator)
                    ->withInput();
        }
        $package = TeacherService::create([
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'description'=>$request->description,
            'type'=>$request->type,
            'price'=>$request->price,
            'freq_sess'=>$request->freq_sess
        ]);
        if($package){
            return redirect()->route('teacher.services.index')->with('action_success','Information Updated Successfully');
        }else{
            return redirect()->route('teacher.services.index')->with('action_fail','Something went wrong! please try again later');
        }
    }

    public function serviceUpdate(Request $request,$id){
        try {
            $teacherService = TeacherService::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            abort(403);
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => '',
            'price'=> 'required|min:1|max:10000',
        ]);
        if ($validator->fails()) {
            return redirect()->route('teacher.rates.update',['id'=>$id])
                    ->withErrors($validator)
                    ->withInput();
        }
        $service = $teacherService->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'type'=>$request->type,
            'price'=>$request->price,
            'freq_sess'=>$request->freq_sess
        ]);
        if($service){
            return redirect()->route('teacher.services.index')->with('action_success','Information Updated Successfully');
        }else{
            return redirect()->route('teacher.services.index')->with('action_fail','Something went wrong! please try again later');
        }
    }

    /* public function packageUpdate(Request $request,$id){
        try {
            $teacherService = TeacherService::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            abort(403);
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => '',
            'price'=> 'required|min:1|max:10000',
        ]);
        if ($validator->fails()) {
            return redirect()->route('teacher.packages.update',['id'=>$id])
                    ->withErrors($validator)
                    ->withInput();
        }
        $package = $teacherService->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'type'=>$request->type,
            'price'=>$request->price
        ]);
        if($package){
            return redirect()->route('teacher.services.index')->with('action_success','Information Updated Successfully');
        }else{
            return redirect()->route('teacher.services.index')->with('action_fail','Something went wrong! please try again later');
        }
    }*/
}
