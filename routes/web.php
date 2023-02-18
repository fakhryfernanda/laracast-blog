<?php

use Illuminate\Http\Request;
use MailchimpMarketing\ApiClient;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;
use App\Services\Newsletter;

Route::get('/ping', function () {
    $mailchimp = new ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us9'
    ]);

    // ping
    // $response = $mailchimp->ping->get();

    // get list
    // $response = $mailchimp->lists->getAllLists();


    $list_id = "c9f8293a97";

    // get members info
    $response = $mailchimp->lists->getListMembersInfo($list_id)->members;

    // add member
    // $response = $mailchimp->lists->addListMember($list_id, [
    //     "email_address" => "Lindsey.White93@hotmail.com",
    //     "status" => "subscribed",
    // ]);


    dd($response);
});

Route::post('/newsletter', NewsletterController::class);

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

