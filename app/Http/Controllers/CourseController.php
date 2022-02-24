<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  Request  $request
     * @return Response
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
        $course_cat=CourseCategory::all();
        return view('system.courses.create', compact('data','course_cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $rules = array(
            'title'     => 'required',
            'slug'      => 'required',
            'price'     => 'required|numeric',
            'video'     =>'active_url',
            'photo'     =>'required|mimes:jpg,jpeg,png,gif|max:5048'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->route('courses.create')
                ->withErrors($validator);
                
        } else {




            $uploadedFile = $request->file('photo');
      $filename = time().$uploadedFile->getClientOriginalName();

                Storage::disk('local')->putFileAs(
                    'files/'.$filename,
                    $uploadedFile,
                    $filename
                );
           
                $requestData['photo']= '/storage/app/files/'.$filename."/".$filename;
            
           $c_create= Course::create($requestData);

            // redirect
             
            return  redirect()->route('courses.create')->with('message', 'Course Has been added successfully');
        }

       // return redirect()->route('system.cources.create')->with('notice', ['message' => 'Created course', 'state' => 'success']);
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
