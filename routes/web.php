<?php

use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $books = Author::first()->books()->where('id', '>', 150)->get();
    return view('test', ['books' => $books]);
});

Route::get('/test', function () {
    $books  = [6, 7, 8];
    $author = Author::where('id', '=', 1)->first();
    // dd($author->books()->get());
    // boeken toevoegen
    $author->books()->attach($books);
    // dd($author->books()->get());
    $books = [7];
    // boeken verwijderen
    $author->books()->detach($books);
    // dd($author->books()->get());
    $books = [6, 7];
    // boeken vervangen
    // bestaande boeken die niet voorkomen in de sync
    // worden verwijderd
    $author->books()->sync($books);
    dd($author->books()->get());
});
