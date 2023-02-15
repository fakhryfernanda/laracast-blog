<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\YamlFrontMatter\YamlFrontMatter;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post // extends Model
{
    // use HasFactory;

    public $title;
    public $slug;
    public $body;
    public $excerpt;
    public $date;

    public function __construct($title, $slug, $body, $excerpt, $date)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->body = $body;
        $this->excerpt = $excerpt;
        $this->date = $date;
    }
    
    public static function all()
    {
        $files = File::files(resource_path("posts/"));
        // $posts = [];

        $posts = array_map(function($file) {
            $document = YamlFrontMatter::parseFile($file);

            return new Post(
                $document->title,
                $document->slug,
                $document->body(),
                $document->excerpt,
                $document->date
            );
        }, $files);
        
        // return array_map(fn($file) => $file->getContents(), $files);
        
        return $posts;
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
