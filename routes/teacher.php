<?php



use App\Models\Setting;
use App\Http\Controllers\AdvertisController;
use App\Http\Controllers\AIArticleWizardController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Market\MarketPlaceController; 
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\AIController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Gateways\StripeControllerElements as StripeController;
use App\Http\Controllers\Gateways\PaypalController;
use App\Http\Controllers\Gateways\YokassaController;
use App\Http\Controllers\Gateways\PaystackController;
use App\Http\Controllers\Gateways\TwoCheckoutController;
use App\Http\Controllers\Gateways\IyzicoController;
use App\Http\Controllers\Dashboard\iyzipayActions;
use App\Http\Controllers\Dashboard\SupportController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\SearchController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\AIChatController;
use App\Http\Controllers\GatewayController;
use Illuminate\Support\Facades\App;
use Spatie\Health\ResultStores\ResultStore;
use Spatie\Health\Commands\RunHealthChecksCommand;
use Carbon\Carbon;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EmailTemplatesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Gateways\WalletmaxpayController;
use App\Http\Controllers\GoogleTTSController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

use App\Models\SettingTwo;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    
    Route::prefix('dashboard')->middleware('auth')->name('dashboard.')->group(function () {
        Route::prefix('teacher')->name('teacher.')->group(function () {
            Route::get('/other', [TeacherController::class, 'others'])->name('other')->middleware('hasTokens');
            Route::get('/curriculum', [TeacherController::class, 'Curriculum'])->name('curriculum')->middleware('hasTokens');
            Route::get('/curriculum/syllabus/form', [TeacherController::class, 'syllabus'])->name('syllabus')->middleware('hasTokens');
            Route::get('/curriculum/unitplanner/form', [TeacherController::class, 'unitplanner'])->name('unitplanner')->middleware('hasTokens');
            Route::get('/curriculum/activity/form', [TeacherController::class, 'activity'])->name('activity')->middleware('hasTokens');
            Route::get('/curriculum/lab/form', [TeacherController::class, 'lab'])->name('lab')->middleware('hasTokens');
            Route::get('/curriculum/assessment/form', [TeacherController::class, 'assessment'])->name('assessment')->middleware('hasTokens');
            Route::get('/manage/student', [TeacherController::class, 'managestudent'])->name('managestudent')->middleware('hasTokens');
            Route::post('/manage/student', [TeacherController::class, 'studentinfosave'])->name('managestudent')->middleware('hasTokens');
            Route::get('/manage/subject', [TeacherController::class, 'classsubject'])->name('classsubject')->middleware('hasTokens');
            Route::post('/manage/subject', [TeacherController::class, 'classsubjectsave'])->name('classsubject')->middleware('hasTokens');
            Route::get('/manage/subject/subjects', [TeacherController::class, 'subjects'])->name('subjects')->middleware('hasTokens');
            Route::get('/manage/student/list', [TeacherController::class, 'students'])->name('students')->middleware('hasTokens');
            Route::get('/manage/student/class', [TeacherController::class, 'studentsclass'])->name('studentsclass')->middleware('hasTokens');
            Route::get('/manage/student/class/{grade}/{section}', [TeacherController::class, 'studentsgrade'])->name('studentsgrade')->middleware('hasTokens');
          
            Route::get('/manage/student/addgrade/{id}', [TeacherController::class, 'studentsaddgrade'])->name('studentsaddgrade')->middleware('hasTokens');
            Route::post('/manage/student/addgrade/', [TeacherController::class, 'studentresult'])->name('studentresult')->middleware('hasTokens');
            Route::get('/manage/student/studentresult/{id}', [TeacherController::class, 'viewstudentresult'])->name('viewstudentresult')->middleware('hasTokens');
            
            Route::post('/generate/unitplanner', [TeacherController::class, 'unitplannergenerate'])->middleware('hasTokens');
        });
    });
});