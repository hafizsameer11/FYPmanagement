<?php

namespace App\Http\Controllers;

use App\Models\CoSuperVisorInformation;
use App\Models\ProjectRational;
use App\Models\ScopeFinalization;
use App\Models\Student;
use App\Models\StudentInformation;
use App\Models\SuperVisorInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScopeFinalizationController extends Controller
{
    //
    public function index(){
        $student=Student::where('user_id',Auth::user()->id)->with('project')->first();


        return  view('scope.student',compact('student'));
    }
    public function store(Request $request){
        $supervisorinformation=new SuperVisorInformation();
        $supervisorinformation->designation=$request->sdesignation;
        $supervisorinformation->name=$request->sname;
        $supervisorinformation->signature=$request->ssignature;
        $supervisorinformation->save();
        if($supervisorinformation){
            $csupervisorinformation=new CoSuperVisorInformation();
            $csupervisorinformation->designation=$request->cdesignation;
            $csupervisorinformation->name=$request->cname;
            $csupervisorinformation->signature=$request->csignature;
            $csupervisorinformation->save();
            if($csupervisorinformation){
                $projectrelation=new ProjectRational();
                $projectrelation->prupose=$request->prupose;
                $projectrelation->motivation=$request->motivation;
                $projectrelation->relevance=$request->relevance;
                $projectrelation->relevance=$request->relevance;
                $projectrelation->personalmotivation=$request->personalmotivation;
                $projectrelation->aims=$request->aims;
                $projectrelation->objectives=$request->objectives;
                $projectrelation->save();
                if($projectrelation){
                    $studeninfo=new StudentInformation();
                    $studeninfo->name=$request->name;
                    $studeninfo->cgpa=$request->cgpa;
                    $studeninfo->email=$request->email;
                    $studeninfo->number=$request->number;
                    $studeninfo->registration_no=$request->registration_no;
                    $studeninfo->save();
                    if($studeninfo){
                        $scope=new ScopeFinalization();
                        $scope->type=$request->type;
                        $scope->nature=$request->nature;
                        $scope->areaofspecialization=$request->areaofspecialization;
                        $scope->project_id =$projectrelation->id;
                        $scope->stinfoid  =$studeninfo->id;
                        $scope->supervisorinfoid   =$supervisorinformation->id;
                        $scope->cosupervisorinfoid    =$csupervisorinformation->id;
                        $scope->user_id=Auth::user()->id;
                        $scope->save();
                        if($scope){
                            return redirect()->route('scope.index')->with('success','Scope Finalization Successfully');
                        }else{
                            return redirect()->route('scope.index')->with('error','Scope Finalization Failed');

                        }


                    }


                }

            }

        }
    }
}
