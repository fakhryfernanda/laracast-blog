<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post // extends Model
{
    // use HasFactory;

    public static function all()
    {
        $files = File::files(resource_path("posts/"));
        
        return array_map(fn($file) => $file->getContents(), $files);
    }

    public static function find($slug)
    {
        // $path = file_get_contents(__DIR__ . "/../resources/posts/{$slug}.html");
        // $path = __DIR__ . "/../resources/posts/{$slug}.html";
        $path = resource_path("posts/{$slug}.html");

        if(!file_exists($path)) {
            // abort(404);
            // return redirect('/');
            throw new ModelNotFoundException();
        }

        // return $post;
        return cache()->remember("posts.{$slug}", 10, fn() => file_get_contents($path));
    }
}
