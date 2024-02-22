<?php

namespace App\Http\Controllers;

use App\Models\Teacher;

use \stdClass;
use App\Models\OpenAIGenerator;
use GuzzleHttp\Client;
use App\Models\Setting;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Se;
use App\Models\SettingTwo;
use App\Models\UserOpenai;
use App\Models\UserOpenaiChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use OpenAI;
use OpenAI\Laravel\Facades\OpenAI as FacadesOpenAI;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use App\Models\OpenaiGeneratorFilter;
use Exception;
use Illuminate\Http\Client\RequestException;


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

       return view('panel.teacher.Curriculum',compact('list', 'filters'));
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
                $language  = $request->language;
            }
        } catch (\Throwable $th) {
            $language  = $request->language;
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
        if ($user->remaining_words <= 0  and $user->remaining_words != -1) {
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
        $studentNumber = $this->generateRandomNumber();
        // do {
        //     $studentNumber = $this->generateRandomNumber();
        // } while (Student::where('number', $studentNumber)->exists());


       return view('panel.teacher.manage.student',compact('studentNumber'));
    }
    public function classsubject()
    {
      

       return view('panel.teacher.manage.subject');
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
