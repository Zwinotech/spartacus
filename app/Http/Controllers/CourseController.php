<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
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

        return view('courses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data['stages'] = collect([]);

        return view('courses.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required',
            'stage.*.name' => 'required',
        ]);

        $validated['stage'] = $request->stage;

        $course = new Course();
        $this->_save($course, $validated);

        return redirect()->route('courses.index')->with('notice', ['message' => 'Created course', 'state' => 'success']);
    }

    private function _save($model, $validated)
    {
        $model->name = $validated['name'];
        $course      = $model->save();
        $touched     = [];
        // fetch data
        foreach ($validated['stage'] as $index => $stage) {
            $courseStage            = CourseStage::where('id', $stage['id'])->firstOrNew();
            $courseStage->course_id = $model->id;
            $courseStage->name      = $stage['name'];
            $courseStage->order     = $stage['order'] ?: $index + 1;
            $courseStage->save();

            $touched[] = $courseStage->id;
        }

        $model->stages()->get()->map(function ($stage) use ($touched){
            if(!in_array($stage->id, $touched )) {
                $stage->delete();
            }
        });

        return $course;
    }

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

        return view('courses.edit', $data);
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
