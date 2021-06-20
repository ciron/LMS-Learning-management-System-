<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Category;
use App\Models\Course;
use Datatables;
use View;
use DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.course.index');
    }

    public function getallCourse(){

        $course = Course::orderBy('id', 'desc');
        return datatables($course)
          //  ->setRowAttr(['align' => 'center'])
          // ->addColumn('status', function ($contact) {
          //    return $contact->status ? 'Active' : 'Inactive';
          // })
        //   ->addColumn('category_id', function ($course) {
        //     return $course->category->name;
        //  })
        //  ->addColumn('course_code', function ($course) {
        //     return $course->category->name;
        //  })
          ->addColumn('created_at', function ($course) {
             return $course->created_at->diffForHumans();
          })
          ->addColumn('updated_at', function ($course) {
             return $course->updated_at->diffForHumans();
          })
          ->addColumn('action', 'admin.course.action')
          ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = View::make('admin.course.create')->render();
       return response()->json(['html' => $view]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'course_name'     => 'required|unique:courses,course_name'
        ]);
        $Course = new Course;
        $Course->course_name = $request->course_name;
        // $Course->course_code = uniqid();
        $Course->course_code = $request->course_code;
        $Course->description = $request->description;
        $Course->regular_price = $request->regular_price;
        $Course->discount_price = $request->discount_price;
        $Course->who_is_it_for = $request->who_is_it_for;
        $Course->what_you_will_learn = $request->what_you_will_learn;
        $Course->what_it_prepare_you_for = $request->what_it_prepare_you_for;
        $Course->category_id = $request->category_id;
        $Course->online_self_palced = $request->online_self_palced;
        $Course->course_time_need = $request->course_time_need;
        $Course->hands_on_lab_assignment = $request->hands_on_lab_assignment;
        $Course->video_content = $request->video_content;
        $Course->course_timelimit_after_enroll = $request->course_timelimit_after_enroll;
        $Course->digital_badge = $request->digital_badge;
        $Course->discussion_forum = $request->discussion_forum;
        $Course->save(); //
        return response()->json(['html' => 'Successfully Inserted']);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $view = View::make('admin.course.view', compact('course'))->render();

        return response()->json(['html' => $view]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {

       $view = View::make('admin.course.edit', compact('course'))->render();

       return response()->json(['html' => $view]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        // $this->validate($request, [
        //     'course_name'     => 'required|unique:courses,course_name'
        // ]);
        $course->course_name = $request->course_name;
        $course->description = $request->description;
        $course->regular_price = $request->regular_price;
        $course->discount_price = $request->discount_price;
        $course->who_is_it_for = $request->who_is_it_for;
        $course->what_you_will_learn = $request->what_you_will_learn;
        $course->what_it_prepare_you_for = $request->what_it_prepare_you_for;
        $course->category_id = $request->category_id;
        $course->online_self_palced = $request->online_self_palced;
        $course->course_time_need = $request->course_time_need;
        $course->hands_on_lab_assignment = $request->hands_on_lab_assignment;
        $course->video_content = $request->video_content;
        $course->course_timelimit_after_enroll = $request->course_timelimit_after_enroll;
        $course->digital_badge = $request->digital_badge;
        $course->discussion_forum = $request->discussion_forum;
        $course->save();
       return response()->json(['html' => 'Successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
       //
       $course->delete();
       return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
    }
}
