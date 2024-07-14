<?php

namespace App\Http\Controllers;

use App\Models\CoSuperVisorInformation;
use App\Models\ProjectRational;
use App\Models\ScopeFinalization;
use App\Models\Student;
use App\Models\StudentInformation;
use App\Models\SuperVisorInformation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScopeFinalizationController extends Controller
{
    //
    public function index()
    {
        $student = Student::where('user_id', Auth::user()->id)->with('project')->first();


        return  view('scope.student', compact('student'));
    }
    public function store(Request $request)
    {
        $supervisorinformation = new SuperVisorInformation();
        $supervisorinformation->designation = $request->sdesignation;
        $supervisorinformation->name = $request->sname;
        $supervisorinformation->signature = $request->ssignature;
        $supervisorinformation->save();
        if ($supervisorinformation) {
            $csupervisorinformation = new CoSuperVisorInformation();
            $csupervisorinformation->designation = $request->cdesignation;
            $csupervisorinformation->name = $request->cname;
            $csupervisorinformation->signature = $request->csignature;
            $csupervisorinformation->save();
            if ($csupervisorinformation) {
                $projectrelation = new ProjectRational();
                $projectrelation->prupose = $request->prupose;
                $projectrelation->motivation = $request->motivation;
                $projectrelation->relevance = $request->relevance;
                $projectrelation->relevance = $request->relevance;
                $projectrelation->personalmotivation = $request->personalmotivation;
                $projectrelation->aims = $request->aims;
                $projectrelation->objectives = $request->objectives;
                $projectrelation->save();
                if ($projectrelation) {
                    $studeninfo = new StudentInformation();
                    $studeninfo->name = $request->name;
                    $studeninfo->cgpa = $request->cgpa;
                    $studeninfo->email = $request->email;
                    $studeninfo->number = $request->number;
                    $studeninfo->registration_no = $request->registration_no;
                    $studeninfo->save();
                    if ($studeninfo) {
                        $scope = new ScopeFinalization();
                        $scope->type = $request->type;
                        $scope->nature = $request->nature;
                        $scope->areaofspecialization = $request->areaofspecialization;
                        $scope->project_id = $projectrelation->id;
                        $scope->stinfoid  = $studeninfo->id;
                        $scope->supervisorinfoid   = $supervisorinformation->id;
                        $scope->cosupervisorinfoid    = $csupervisorinformation->id;
                        $scope->user_id = Auth::user()->id;
                        $scope->save();
                        if ($scope) {
                            return redirect()->route('scope.index')->with('success', 'Scope Finalization Successfully');
                        } else {
                            return redirect()->route('scope.index')->with('error', 'Scope Finalization Failed');
                        }
                    }
                }
            }
        }
    }
    public function studentview()
    {
        $scopefinalization = ScopeFinalization::where('user_id', Auth::user()->id)->first();

        if ($scopefinalization) {
            $supervisor = SuperVisorInformation::find($scopefinalization->supervisorinfoid );
            $cosupervisor = CoSuperVisorInformation::find($scopefinalization->cosupervisorinfoid );

            $scopefinalization->supervisor = $supervisor;
            $scopefinalization->cosupervisor = $cosupervisor;

            $scopefinalization = $scopefinalization->load('student', 'project');
        }
        return view('scope.index', compact('scopefinalization','supervisor','cosupervisor'));
    }
    public function approvalform(){
        $students=Student::with('user')->get();
        return view('scope.select',compact('students'));
    }
    public function submitform(Request $request){
        $id=$request->id;
        $scopefinalization = ScopeFinalization::where('user_id', $id)->first();

        if ($scopefinalization) {
            $supervisor = SuperVisorInformation::find($scopefinalization->supervisorinfoid );
            $cosupervisor = CoSuperVisorInformation::find($scopefinalization->cosupervisorinfoid );

            $scopefinalization->supervisor = $supervisor;
            $scopefinalization->cosupervisor = $cosupervisor;

            $scopefinalization = $scopefinalization->load('student', 'project');
            // dd($scopefinalization);
            // $project=
            $student=Student::where('user_id',$id)->with('project')->first();
            return view('scope.admin',compact('scopefinalization','supervisor','cosupervisor','student'));
        }
        return redirect()->back()->with('error','Student has not submitted his form');
    }
    public function hodapproval(Request $request){

        $id=$request->id;
        $scopefinalization = ScopeFinalization::find($id);
        $scopefinalization->hodapproval = 'Approved';
        $scopefinalization->hodapprovaldate = Carbon::now();;
        $scopefinalization->save();
        return redirect()->route('scope.form')->with('success', 'Scope Finalization Successfully');
    }
    public function hopapproval(Request $request){

        $id=$request->id;
        $scopefinalization = ScopeFinalization::find($id);
        $scopefinalization->hopapproval = 'Approved';
        $scopefinalization->hopapprovaldate = Carbon::now();
        $scopefinalization->save();
        return redirect()->route('scope.form')->with('success', 'Scope Finalization Successfully');
    }
    public function hodunapproval(Request $request){

        $id=$request->id;
        $scopefinalization = ScopeFinalization::find($id);
        $scopefinalization->hodapproval = 'Rejected';
        $scopefinalization->hodapprovaldate = Carbon::now();;
        $scopefinalization->save();
        return redirect()->route('scope.form')->with('success', 'Scope Finalization Successfully');
    }
    public function hopunapproval(Request $request){

        $id=$request->id;
        $scopefinalization = ScopeFinalization::find($id);
        $scopefinalization->hopapproval = 'Rejected';
        $scopefinalization->hopapprovaldate = Carbon::now();;
        $scopefinalization->save();
        return redirect()->route('scope.form')->with('success', 'Scope Finalization Successfully');
    }
}
