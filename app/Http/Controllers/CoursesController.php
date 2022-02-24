<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'courses' => Course::paginate(),
        ];

        return view('system.courses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data['stages'] = collect([]);
        $facilitator = Auth::user();
        $courseCategories = CourseCategory::all();

        return view('system.courses.create', compact('data','facilitator', 'courseCategories'));
    }

    /**
     * Store a newly created course in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        dd(request()->all());

        $attributes = request()->validate([
            'title'         => 'string|required',
            'slug'          => ['required', Rule::unique('courses', 'slug')],
            'description'   => 'string|required',
            'price'         => 'required',
            'graphic'       => 'required|image',
            'video'         => 'active_url|required',
            'difficulty'    => 'required',
            'runtime'       => 'string',
            'course_category_id'   => ['required', Rule::exists('course_categories', 'id')],
        ]);

        $attributes['facilitator_id'] = Auth::id();
        $attributes['graphic'] = request()->file('graphic')->store('graphics');



        Course::create($attributes);

        return redirect()->route('/')->with('notice', ['message' => 'Created courses', 'state' => 'success']);
    }

//    private function save($model, $validated)
//    {
//        $model->name = $validated['name'];
//        $course      = $model->save();
//        $touched     = [];
//        // fetch data
//        foreach ($validated['stage'] as $index => $stage) {
//            $courseStage            = CourseStage::where('id', $stage['id'])->firstOrNew();
//            $courseStage->course_id = $model->id;
//            $courseStage->name      = $stage['name'];
//            $courseStage->order     = $stage['order'] ?: $index + 1;
//            $courseStage->save();
//
//            $touched[] = $courseStage->id;
//        }
//
//        $model->stages()->get()->map(function ($stage) use ($touched){
//            if(!in_array($stage->id, $touched )) {
//                $stage->delete();
//            }
//        });
//
//        return $course;
//    }

    /**
     * Display the specified resource.
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Course $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Course $course)
    {
        $data['course'] = $course;

        return view('system.courses.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name'         => 'required',
            'stage.*.name' => 'required',
        ]);

        $validated['stage'] = $request->stage;
        $this->_save($course, $validated);

        return redirect()->route('courses.index')->with('notice', ['message' => 'Updated course', 'state' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return $course;
    }
}
