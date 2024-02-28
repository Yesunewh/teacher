<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\OpenAIGenerator;
use App\Models\OpenaiGeneratorFilter;
use App\Models\Section;
use App\Models\Student;
use App\Models\StudentResult;
use App\Models\Subject;
use App\Models\SubjectforGrade;
use App\Models\Teacher;
use App\Models\UserOpenai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TeacherController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }
    public function others()
    {
        return view('panel.teacher.others');
    }
    public function Curriculum()
    {
        $list = OpenAIGenerator::all();
        $filters = OpenaiGeneratorFilter::get();

        return view('panel.teacher.Curriculum', compact('list', 'filters'));
    }
    public function syllabus()
    {
        return view('panel.teacher.curriculum.syllabus');
    }
    public function unitplanner()
    {
        return view('panel.teacher.curriculum.unitplanner');
    }
    public function unitplannergenerate(Request $request)
    {
        // dd($request);
        $user = Auth::user();

        $number_of_results = $request->number_of_results;
        $maximum_length = $request->maximum_length;
        $creativity = $request->creativity;
        $tone_of_voice = $request->tone_of_voice;
        $post_type = $request->post_type;

        $language = $request->language;
        try {
            $language = explode('-', $language);
            if (count($language) > 1 && LaravelLocalization::getSupportedLocales()[$language[0]]['name']) {
                $ek = $language[1];
                $language = LaravelLocalization::getSupportedLocales()[$language[0]]['name'];
                $language .= " $ek";
            } else {
                $language = $request->language;
            }
        } catch (\Throwable $th) {
            $language = $request->language;
            Log::error($language);
        }

        $article_title = $request->article_title;
        $focus_keywords = $request->article_title;
        $prompt = "Generate article about $article_title. Focus on $focus_keywords. Maximum $maximum_length words. Creativity is $creativity between 0 and 1. Language is $language. Generate $number_of_results different articles. Tone of voice must be $tone_of_voice";

        $post = OpenAIGenerator::where('slug', $post_type)->first();

        return $this->textOutput($prompt, $post, $creativity, $maximum_length, $number_of_results, $user);
    }

    public function textOutput($prompt, $post, $creativity, $maximum_length, $number_of_results, $user)
    {
        $user = Auth::user();
        if ($user->remaining_words <= 0 and $user->remaining_words != -1) {
            $data = array(
                'errors' => ['You have no credits left. Please consider upgrading your plan.'],
            );
            return response()->json($data, 419);
        }
        $entry = new UserOpenai();
        $entry->title = __('New Workbook');
        $entry->slug = str()->random(7) . str($user->fullName())->slug() . '-workbook';
        $entry->user_id = Auth::id();
        $entry->openai_id = $post->id;
        $entry->input = $prompt;
        $entry->response = null;
        $entry->output = null;
        $entry->hash = str()->random(256);
        $entry->credits = 0;
        $entry->words = 0;
        $entry->save();

        $message_id = $entry->id;
        $workbook = $entry;
        $inputPrompt = $prompt;
        $html = view('panel.user.openai.documents_workbook_textarea', compact('workbook'))->render();
        return response()->json(compact('message_id', 'html', 'creativity', 'maximum_length', 'number_of_results', 'inputPrompt'));
    }

    public function activity()
    {
        return view('panel.teacher.curriculum.activity');
    }
    public function lab()
    {
        return view('panel.teacher.curriculum.lab');
    }
    public function assessment()
    {
        return view('panel.teacher.assessment');
    }
    public function managestudent()
    {
        // $studentNumber = $this->generateRandomNumber();
        $grade = Grade::all();
        $section = Section::all();
        do {
            $studentNumber = $this->generateRandomNumber();
        } while (Student::where('accessid', $studentNumber)->exists());

        return view('panel.teacher.manage.student', compact('studentNumber', 'grade', 'section'));
    }

    public function studentinfosave(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'required|string',
            'grade_id' => 'required|integer',
            'relation' => 'required|string',
            'accessid' => 'required|string|unique:students',
            'section_id' => 'required|integer',
        ]);
        $validatedData = $validator->validated();

        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        Student::create($validatedData);
        return redirect()->back()->withInput();

        return view('panel.teacher.manage.student', compact('studentNumber', 'grade', 'section'));
    }

    public function students()
    {
        $students = Student::with('grade', 'section')->get();

        return view('panel.teacher.manage.studentlist', compact('students'));
    }

    public function studentsgrade($grade, $section)
    {

        $students = Student::with('grade', 'section')->where(['grade_id' => $grade, 'section_id' => $section])->get();

        return view('panel.teacher.manage.gradestudentlist', compact('students'));
    }

    public function studentsaddgrade($id)
    {

        $student = Student::with('grade', 'section')->where('accessid', $id)->first();

        return view('panel.teacher.manage.studentgrade', compact('student'));
    }

    public function studentsclass()
    {
        $students = Student::with('grade', 'section')->get();

        $categorizedStudents = $students->groupBy(function ($student) {
            return $student->grade->name . '_' . $student->section->name;
        });

// return $categorizedStudents;
        return view('panel.teacher.manage.selectclass', compact('categorizedStudents'));
    }

    public function classsubject()
    {
        $grade = Grade::all();
        $section = Section::all();
        $subjects = Subject::all();

        return view('panel.teacher.manage.subject', compact('subjects', 'grade', 'section'));
    }
    public function subjects()
    {
        $subject = SubjectforGrade::with('subject', 'grade')->get();

        return view('panel.teacher.manage.subjectlist', compact('subject'));
    }

    public function classsubjectsave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject_id' => 'required|array',
            'subject_id.*' => 'required|exists:subjects,id',
            'grade_id' => 'required|exists:grades,id',
            'field_of_study' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $grade = Grade::findOrFail($request->input('grade_id'));
        $fieldOfStudy = $request->input('field_of_study');

        $subjectIds = $request->input('subject_id');
        $data = [];
        foreach ($subjectIds as $subjectId) {
            $data[$subjectId] = ['field_of_study' => $fieldOfStudy];
        }

        $grade->subjects()->sync($data);

        Session::flash('success', 'Class subjects saved successfully.');

        return redirect()->back();
    }

// ...

    public function studentresult(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'advisor_name' => 'required',
            'advisor_phone' => 'required',
            'conduct' => 'required',
            'class_activity' => 'required',
            'attendance' => 'required|integer',
            'subject_id' => 'required|array',
            'subject_id.*' => 'required|exists:subjects,id',
            'subject_result' => 'required|array',
            'subject_result.*' => 'required|string',
            'percent' => 'required|array',
            'percent.*' => 'required|string',
            'student_id' => 'required|exists:students,id',
            'total_result' => 'required',
            'total_percent' => 'required',
        ]);
        $validatedData = $validator->validated();

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Convert the arrays to JSON strings
        $subjectResultJson = json_encode($validatedData['subject_result']);
        $percentJson = json_encode($validatedData['percent']);
        $subject_idJson = json_encode($validatedData['subject_id']);

        // Create a new StudentResult instance
        $studentResult = new StudentResult();

        // Assign the validated data to the model's properties
        $studentResult->advisor_name = $validatedData['advisor_name'];
        $studentResult->advisor_phone = $validatedData['advisor_phone'];
        $studentResult->conduct = $validatedData['conduct'];
        $studentResult->class_activity = $validatedData['class_activity'];
        $studentResult->attendance = $validatedData['attendance'];
        $studentResult->subject_result = $subjectResultJson;
        $studentResult->percent = $percentJson;
        $studentResult->subject_id = $subject_idJson;
        $studentResult->student_id = $validatedData['student_id'];
        $studentResult->total_result = $validatedData['total_result'];
        $studentResult->total_percent = $validatedData['total_percent'];

        // Save the student result in the database
        $studentResult->save();

        // Optionally, you can return a response or redirect to a specific page
        return redirect()->back()->with('success', 'Student result saved successfully!');
    }
    public function viewstudentresult($id)
    {
        $result = StudentResult::where('student_id', $id)->get();
        $mergedResult = [];

        foreach ($result as $key => $student) {
            $subjectIds = json_decode($student->subject_id);
            $subjectNames = [];

            foreach ($subjectIds as $subjectId) {
                $subject = Subject::find($subjectId);
                if ($subject) {
                    $subjectNames[] = $subject->name;
                }
            }

            $student->subject_name = json_encode($subjectNames);
            $mergedResult[] = $student;
        }
        dd($mergedResult);
        return str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
    }

    public function generateRandomNumber()
    {
        return str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
    }

    public function TextSummarization()
    {
        return view('panel.teacher.TextSummarization');
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Teacher $teacher)
    {
        //
    }

    public function edit(Teacher $teacher)
    {
        //
    }

    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    public function destroy(Teacher $teacher)
    {
        //
    }
}
