<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Post;
use App\Profile;
use App\Notification;
use Illuminate\Support\Facades\Input;



Route::get('/', function () {
    if(auth()->check())
    {
        return redirect()->to('/home');
    }
    else
    {
        return redirect()->to('/home');
    }
   
});

// Admin

Route::get('/admin/home', 'admincontroller@index');

// user
Route::get('/home', 'HomeController@index');
Route::get('/post', 'PostController@index');
Route::get('/employee/dashboard', 'PostController@index');
Route::get('post/create', 'PostController@create');
Route::post('/post', 'PostController@store');
Route::resource('/post/show', 'PostController');
Route::resource('/posts/edit', 'PostController');
Route::post('/post/pdf', 'profilecontroller@pdf');

Route::post('/post/update', 'PostController@updateme');
 

// Register
Route::get('/register', 'RegisterController@create');
Route::post('register','RegisterController@store');

// Login
Route::get('/login', 'SessionController@create');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');

// Profile Employee
Route::get('/employee/profile', 'ProfileController@index');
Route::get('/company/profiles', 'ProfileController@index2');
Route::get('/seeker/profiles', 'ProfileController@index2');
Route::post('/employee/profile','profileController@store');
Route::post('/employee/profile/update','profileController@update');
Route::get('/employee/profile','profileController@showme');
Route::resource('/profile','profileController');


//Profile Company
Route::resource('/company/profile', 'CompanyController');

//Comment
Route::post('/post/comment', 'CommentsController@store');

// Educational Attainment and Skills and experience
Route::post('/profile/education', 'EducationController@store');
Route::post('/profile/education/update','EducationController@updateme');

Route::post('/profile/skill', 'SkillsController@store');
Route::post('/profile/skill/update', 'SkillsController@update');

Route::post('/profile/experience', 'ExperienceController@store');
Route::post('/profile/experience/update', 'ExperienceController@store');

//appointment
Route::Post('/setAppointment', 'AppointmentController@store');
Route::Post('/setAppointment/accept', 'AppointmentController@store');

Route::Post('/Appointment/hire', 'HireController@store');

Route::Post('/Appointments/hire', 'AppointmentController@store');


//show pdf
Route::post('/post/pdf', 'profilecontroller@pdf');
Route::post('/Download/pdf/application', 'notificationcontroller@pdf');

// Notification
Route::get('/Notification', 'NotificationController@index');
Route::resource('/Notification/show', 'NotificationController');

//Sample getting nearest companies
Route::get('/seeker/maps', 'SampleController@index');
Route::get('/company/maps', 'SampleController@index');


Route::get('/seeker/profile', 'NotificationController@index2');

//Search
Route::any('/search', function()
{
    $s = Input::get('search');
    $search = Post::where('Title', 'LIKE', '%'.$s.'%')->orWhere('job_field', 'LIKE', '%'.$s.'%')->get();
    if(count($search) > 0)
    {
        $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
                $post = Post::all();
        $post_field_1 = Post::where(['job_field' => 'Computers and Technology'])->get();
        $post_field_2 = Post::where(['job_field' => 'Health Care and Allied Health'])->get();
        $post_field_3 = Post::where(['job_field' => 'Education and Social Services'])->get();
        $post_field_4 = Post::where(['job_field' => 'Arts and Communications'])->get();
        $post_field_5 = Post::where(['job_field' => 'Trades and Transportation'])->get();
        $post_field_6 = Post::where(['job_field' => 'Management, Business, and Finance'])->get();
        $post_field_7 = Post::where(['job_field' => 'Architecture and Civil Engineering'])->get();
        $post_field_8 = Post::where(['job_field' => 'Science'])->get();
        $post_field_9 = Post::where(['job_field' => ' Hospitality, Tourism, and the Service Industry'])->get();
        $post_field_10 = Post::where(['job_field' => 'Law and Law Enforcement'])->get();
    return view('home')->withDetails($search)->withQuery($s)->with(['post_field_1' => $post_field_1, 
    'post_field_2' => $post_field_2,
    'post_field_3' => $post_field_3,
    'post_field_4' => $post_field_4,
    'post_field_5' => $post_field_5,
    'post_field_6' => $post_field_6,
    'post_field_7' => $post_field_7,
    'post_field_8' => $post_field_8,
    'post_field_9' => $post_field_9,
    'post_field_10' => $post_field_10,'notifcount' => $notifcount,'post' => $post]);
    
    }
    else
    {
        $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
                $post = Post::all();
        $post_field_1 = Post::where(['job_field' => 'Computers and Technology'])->get();
        $post_field_2 = Post::where(['job_field' => 'Health Care and Allied Health'])->get();
        $post_field_3 = Post::where(['job_field' => 'Education and Social Services'])->get();
        $post_field_4 = Post::where(['job_field' => 'Arts and Communications'])->get();
        $post_field_5 = Post::where(['job_field' => 'Trades and Transportation'])->get();
        $post_field_6 = Post::where(['job_field' => 'Management, Business, and Finance'])->get();
        $post_field_7 = Post::where(['job_field' => 'Architecture and Civil Engineering'])->get();
        $post_field_8 = Post::where(['job_field' => 'Science'])->get();
        $post_field_9 = Post::where(['job_field' => ' Hospitality, Tourism, and the Service Industry'])->get();
        $post_field_10 = Post::where(['job_field' => 'Law and Law Enforcement'])->get();
        return view ('home')->withMessage('No Details found. Try to search again !')->with(['notifcount' => $notifcount,'post_field_1' => $post_field_1, 
        'post_field_2' => $post_field_2,
        'post_field_3' => $post_field_3,
        'post_field_4' => $post_field_4,
        'post_field_5' => $post_field_5,
        'post_field_6' => $post_field_6,
        'post_field_7' => $post_field_7,
        'post_field_8' => $post_field_8,
        'post_field_9' => $post_field_9,
        'post_field_10' => $post_field_10,
        'post' => $post]);
    }
});

// Search users
Route::any('/company/search', function()
{
    $notifcount = Notification::where(['company_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0']);
    $profile = Profile::where(['type' => 'employee'])->orderBy('id', 'desc')->get();
    $s = Input::get('search');
    $search = Profile::where('last_name', 'LIKE', '%'.$s.'%')->orWhere('first_name', 'LIKE', '%'.$s.'%')->orWhere('title', 'LIKE', '%'.$s.'%')->get();
    return view('employee.profiles')->withDetails($search)->withQuery($s)->with(['profile' => $profile,'notifcount' => $notifcount]);
});


// Filter fields
Route::get('/employee/category/ComputerandTechnology', 'FilterController@cat');
Route::get('/employee/category/HealthCareandAlliedHealth', 'FilterController@health');
Route::get('/employee/category/EducationandSocialServices', 'FilterController@education');
Route::get('/employee/category/ArtsandCommunications', 'FilterController@arts');
Route::get('/employee/category/TradesandTransportation', 'FilterController@trade');
Route::get('/employee/category/ManagementBusinessandFinance', 'FilterController@management');
Route::get('/employee/category/ArchitectureandCivilEngineering', 'FilterController@arch');
Route::get('/employee/category/Science', 'FilterController@Science');
Route::get('/employee/category/HospitalityTourismandtheServiceIndustry', 'FilterController@tour');
Route::get('/employee/category/LawandLawEnforcement', 'FilterController@law');

// Activate/Deactivate
Route::post('/post/deactivate', 'PostController@Deactivate');
Route::post('/post/activate', 'PostController@Activate');









