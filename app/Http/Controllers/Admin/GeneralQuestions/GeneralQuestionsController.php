<?php

namespace App\Http\Controllers\Admin\GeneralQuestions;

use App\Http\Controllers\Controller;
use App\Models\GeneralQuestions\GeneralQuestions;
use Illuminate\Http\Request;

class GeneralQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $g_questions = GeneralQuestions::all();
            return response()->json($g_questions)->setStatusCode(200);
        }
        return view('dashboard.GeneralQuestions.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.GeneralQuestions.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question_ar'=>'required',
            'question_en'=>'required',
            'answer_ar'=>'required',
            'answer_en'=>'required',
        ]);
        $g_q = new GeneralQuestions();
        $g_q->create($request->all());
        return redirect()->route('admin.general_questions.index')->with('success','Add General Question Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $g_q =  GeneralQuestions::where('id',$id)->first();
        if (!$g_q){
            return view('web.error.404');

        }
        return view('dashboard.GeneralQuestions.show',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $g_q =  GeneralQuestions::where('id',$id)->first();
        if (!$g_q){
            return view('web.error.404');

        }
        return view('dashboard.GeneralQuestions.edit',get_defined_vars());


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'question_ar'=>'required',
            'question_en'=>'required',
            'answer_ar'=>'required',
            'answer_en'=>'required',
        ]);
        $g_q =  GeneralQuestions::where('id',$request->id)->first();
        $g_q->update($request->all());
        return redirect()->route('admin.general_questions.index')->with('success','Update General Question Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $g_q = GeneralQuestions::findOrFail($request->id)->delete();
        return response()->json(['status'=>true]);
    }
}
