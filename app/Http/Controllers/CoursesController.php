<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->paginate(10);

        return view('system.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Course::create(array_merge($request->only(
            'title',
            'description',
            'category',
            'price',
            'photo',
            'level',
            'modules',
            'duration',
            'students'), [
            'facilitator' => auth()->id()
        ]));

        return redirect()->route('system.courses.index')
            ->withSuccess(__('Course created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('system.courses.show', [
            'course' => $course
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('system.courses.edit', [
            'courses' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $course->update($request->only(
            'title',
            'description',
            'category',
            'price',
            'photo',
            'level',
            'modules',
            'duration',
            'students'));

        return redirect()->route('system.courses.index')
            ->withSuccess(__('Course updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('system.courses.index')
            ->withSuccess(__('Course deleted successfully.'));
    }
}
