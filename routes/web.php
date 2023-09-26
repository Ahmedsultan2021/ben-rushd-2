<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FieldResponseController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FormResponseController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReservationController;
use App\Models\Branch;
use App\Models\Campaign;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Form;
use App\Models\Offer;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $offers = Offer::all();
    $branches = Branch::all();
    $departments = Department::all();
    $doctors = Doctor::where('highligthed',1)->get();

    $contact = config('about');
    return view('Home', ["offers" => $offers,"about"=>$contact,"departments"=>$departments,"branches"=>$branches,"doctors"=>$doctors]);
})->name('home');
Route::get('/about-us', [AboutController::class,'index'])->name('about-us');
Route::get('/AskForReport', function () {
    $branches = Branch::all();
    return view('AskForReport', ["branches" => $branches]);
})->name('AskForReport');
Route::get('/reportpage/{branch_id}', function ($branch_id) {
    $branch = Branch::find($branch_id);
    $doctors = $branch->doctors; 
    $contact = config('about');

    return view('reportpage', ["branch_id" => $branch,"branch"=>$branch, "doctors" => $doctors,"about"=>$contact]);
})->name('reportpage');
Route::get('/makeReservation', function () {
    $branches = Branch::pluck("name", "id");
    return view('reserve', ["branches" => $branches]);
})->name('makeReservation');
Route::get('/communityService', function () {
    return view('communityService');
})->name('communityService');
Route::get('/blogs/{page?}', function ($page = 1) {
    $posts = Post::paginate(6, ['*'], 'page', $page);
    return view('blog', ["posts" => $posts]);
})->name('blogs');

Route::get('/showPost', function () {
    return view('showPost');
})->name('showPost');
Route::get('/doctors', function () {
    $doctors = Doctor::all();
    $distinctDepartmentNames = Department::distinct('name')->pluck('name')->toArray();
    return view('doctors',["doctors"=>$doctors,"distinctDepartmentNames"=>$distinctDepartmentNames]);
})->name('doctors');
Route::get('/singleDoctors/{id}', function ($id) {
    $doctor = Doctor::findOrFail($id);
    return view('doctor',["doctor"=>$doctor]);
})->name('doctor');

Route::get('/departments', function () {
    return view('departments');
})->name('departments');
Route::get('/ourBranches', function () {
    return view('ourBranches');
})->name('ourBranches');
Route::get('/partners', function () {
    return view('partners');
})->name('partners');
Route::get('/news', function () {
    return view('news');
})->name('news');
Route::get('/blog-post-page/{id?}', function ($id = null) {
    $post = Post::find($id);
    return view('blog-post-page',["post"=>$post]);
})->name('blog-post-page');

// Define a route for 404 errors
Route::view('/not-found', 'errors.404')->name('error.404');

// Define a route for 500 errors
Route::view('/custom-error-page', 'errors.custom-error-page')->name('custom.error.page');

Route::get('/campaignResponses/{form_id}/{campaign_id?}', function ($form_id, $campaign_id = null) {
    $form = Form::find($form_id);
    $campaign = Campaign::find($campaign_id);
    $formFields = $form->fields;
    foreach ($formFields as &$field) {
        if ($field->options) {
            $field->options = json_decode($field->options, true);
        }
    }
    return view('campaignResponse', ["form" => $form, "formFields" => $formFields, "campaign" => $campaign]);
})->name('campaignResponse');
// Route::get('/formcreate', function () {
//     return view('dashboard.forms.create');
// })->name('formcreate');
Route::get('/offersPage/{id?}', function ($id = null) {
    $branches = Branch::pluck("id", "name");
    $offer = Offer::find($id);
    // dd($branches);
    $endTime = $offer->created_at->addDays($offer->offerPeriod);
    return view('offersPage', ["branches" => $branches, "offer" => $offer, "endTime" => $endTime]);
})->name('offersPage');


Route::get('/about', [AboutController::class, 'index'])->name('about.display');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/about/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::post('/about/save', [AboutController::class, 'update'])->name('about.save');
    Route::resource('report', ReportController::class);
    Route::resource('branches', BranchController::class);
    Route::resource('post', PostController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('doctor', DoctorController::class);
    Route::resource('offer', OfferController::class);
    Route::resource('reservation', ReservationController::class);
    Route::resource('campaign', CampaignController::class);

    Route::resource('form', FormController::class)->only([
        'create', 'edit', 'index', 'show'
    ]);
    Route::get('/listforms', [FormController::class, 'index'])->name('listforms');
    Route::get('/form/{form}/export', [CampaignController::class, 'export'])->name('form.export');
    Route::get('/download/reservations', [ReservationController::class,'downloadReservations'])->name('download.reservations');
    Route::get('/download/offer-reservations',[ReservationController::class,'downloadOfferReservations'])->name('download.offerReservations');
});


require __DIR__ . '/auth.php';
