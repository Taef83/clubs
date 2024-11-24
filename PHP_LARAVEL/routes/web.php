<?php

use App\Http\Controllers\ClubLeader\CertificateController;
use App\Http\Controllers\ClubLeader\ClubController as ClubLeaderClubController;
use App\Http\Controllers\ClubLeader\EventController as ClubLeaderEventController;
use App\Http\Controllers\ClubLeader\FeedbackController as ClubLeaderFeedbackController;
use App\Http\Controllers\ClubLeader\HomeController as ClubLeaderHomeController;
use App\Http\Controllers\ClubLeader\MembershipController as ClubLeaderMembershipController;
use App\Http\Controllers\ClubLeader\RegistrationController;
use App\Http\Controllers\ClubLeader\SuggestionController;
use App\Http\Controllers\Control\AdminController;
use App\Http\Controllers\Control\ClubController;
use App\Http\Controllers\Control\EventController;
use App\Http\Controllers\Control\FeedbackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Control\HomeController;
use App\Http\Controllers\Control\LeaderController;
use App\Http\Controllers\Control\MembershipController;
use App\Http\Controllers\Control\RPController;
use App\Http\Controllers\Control\StudentController;
use App\Http\Controllers\LoginRegister\ControlLoginController;
use App\Http\Controllers\LoginRegister\LeaderLoginRegisterController;
use App\Http\Controllers\LoginRegister\StudentLoginRegisterController;
use App\Http\Controllers\Student\AccountController;
use App\Http\Controllers\Student\ClubController as StudentClubController;
use App\Http\Controllers\Student\HomeController as StudentHomeController;
use App\Http\Controllers\Student\RequestController;

    Route::get('/control/login', [ControlLoginController::class, 'getForm'])->name('control.login');
    Route::post('/control/login', [ControlLoginController::class, 'postForm'])->name('control.login.post');
    Route::get('/control/forget-password', [ControlLoginController::class, 'getForgetForm'])->name('control.forget');

    Route::get('/leader/login', [LeaderLoginRegisterController::class, 'getLoginForm'])->name('leader.login');
    Route::post('/leader/login', [LeaderLoginRegisterController::class, 'postLoginForm'])->name('leader.login.post');
    Route::get('/leader/forget-password', [LeaderLoginRegisterController::class, 'getForgetForm'])->name('leader.forget');

    Route::get('/leader/register', [LeaderLoginRegisterController::class, 'getRegisterForm'])->name('leader.register');
    Route::post('/leader/register', [LeaderLoginRegisterController::class, 'postRegisterForm'])->name('leader.register.post');

    Route::get('/student/login', [StudentLoginRegisterController::class, 'getLoginForm'])->name('student.login');
    Route::post('/student/login', [StudentLoginRegisterController::class, 'postLoginForm'])->name('student.login.post');

    Route::get('/student/register', [StudentLoginRegisterController::class, 'getRegisterForm'])->name('student.register');
    Route::post('/student/register', [StudentLoginRegisterController::class, 'postRegisterForm'])->name('student.register.post');

    Route::get('/student/forget-password', [StudentLoginRegisterController::class, 'getForgetForm'])->name('student.forget');
    Route::post('/student/forget-password', [StudentLoginRegisterController::class, 'postForgetForm'])->name('student.forget.post');

    Route::get('/student/reset-password', [StudentLoginRegisterController::class, 'getResetForm'])->name('student.reset');
    Route::post('/student/reset-password', [StudentLoginRegisterController::class, 'postResetForm'])->name('student.reset.post');


    Route::group(['prefix' => 'control', 'as' => 'control.', 'middleware' => ['auth:web']], function () {
        Route::post('/logout', [ControlLoginController::class, 'logout'])->name('logout');

        Route::resource('admins', AdminController::class);
        Route::get('leaders/requests', [LeaderController::class, 'requests'])->name('leaders.requests');
        Route::post('leaders/accept/{leader}', [LeaderController::class, 'accept'])->name('leaders.accept');
        Route::post('leaders/reject/{leader}', [LeaderController::class, 'reject'])->name('leaders.reject');

        Route::resource('leaders', LeaderController::class);
        Route::resource('students', StudentController::class);
        Route::resource('clubs', ClubController::class);
        Route::resource('feedbacks', FeedbackController::class)->only('index', 'show', 'destroy');
        Route::resource('events', EventController::class)->only('index', 'show', 'destroy');
        Route::resource('memberships', MembershipController::class)->only('index');

        Route::get('/rp/top-membership', [RPController::class, 'memberships'])->name('rp.membership');
        Route::get('/rp/top-student', [RPController::class, 'students'])->name('rp.students');

        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/', [HomeController::class, 'index'])->name('main');




    });

    Route::group(['prefix' => 'leader', 'as' => 'leader.', 'middleware' => ['auth:leaders']], function () {

        Route::post('/logout', [LeaderLoginRegisterController::class, 'logout'])->name('logout');

        Route::resource('clubs', ClubLeaderClubController::class)->except('create', 'store');
        Route::resource('events', ClubLeaderEventController::class);
        Route::get('events/{event}/attend', [ClubLeaderEventController::class, 'attend'])->name('events.attend');
        Route::post('events/{event}/attend', [ClubLeaderEventController::class, 'attendAction'])->name('events.attend.action');
        Route::resource('feedbacks', ClubLeaderFeedbackController::class)->only('index', 'show');
        Route::resource('suggestions', SuggestionController::class)->only('index');
        Route::resource('registrations', RegistrationController::class)->only('index');
        Route::resource('memberships', ClubLeaderMembershipController::class)->only('index');
        Route::get('memberships/{membership}/change-status', [ClubLeaderMembershipController::class, 'editStatus'])->name('memberships.status');
        Route::resource('certificates', CertificateController::class);



        Route::get('/profile', [ClubLeaderHomeController::class, 'getProfile'])->name('profile');
        Route::post('/profile', [ClubLeaderHomeController::class, 'postProfile'])->name('profile.post');

        Route::get('/home', [ClubLeaderHomeController::class, 'index'])->name('home');
        Route::get('/', [ClubLeaderHomeController::class, 'index'])->name('main');

    });


    Route::group(['as' => 'student.', 'middleware' => []], function () {
        Route::group(['prefix' => 'students', 'middleware' => ['auth:students']], function () {
            Route::post('/logout', [StudentLoginRegisterController::class, 'logout'])->name('logout');

            Route::get('/account', [AccountController::class, 'index'])->name('account');
            Route::post('/account', [AccountController::class, 'postProfile'])->name('account.action');

            Route::get('/{club}/club/{event}/event', [RequestController::class, 'event'])->name('event');
            Route::post('/{club}/club/{event}/event', [RequestController::class, 'eventJoin'])->name('event.action');

            Route::get('/{club}/club/suggestion', [RequestController::class, 'suggestion'])->name('suggestion');
            Route::post('/{club}/club/suggestion', [RequestController::class, 'makeSuggestion'])->name('suggestion.action');

            Route::get('/{club}/club/feedback', [RequestController::class, 'feedback'])->name('feedback');
            Route::post('/{club}/club/feedback', [RequestController::class, 'sendFeedback'])->name('feedback.action');

            Route::get('/certificates', [AccountController::class, 'certificates'])->name('certificates');
            Route::get('/certificates/{certificate}', [AccountController::class, 'certificate'])->name('certificate');


        });

        Route::get('/', [StudentHomeController::class, 'index'])->name('home');
        Route::get('/about-us', [StudentHomeController::class, 'about'])->name('about');
        Route::get('/contact-us', [StudentHomeController::class, 'contact'])->name('contact');
        Route::get('/login/options', [StudentHomeController::class, 'login'])->name('login.options');
        Route::get('/register/options', [StudentHomeController::class, 'register'])->name('register.options');
        Route::get('/clubs', [StudentClubController::class, 'list'])->name('clubs');
        Route::get('/{club}/club', [StudentClubController::class, 'index'])->name('club');
        Route::get('/{leader}/leader', [StudentClubController::class, 'leader'])->name('leader');
        Route::post('/{club}/club-member', [RequestController::class, 'membership'])->name('membership');

    });
