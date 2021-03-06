<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post {

    public function __construct(
        public $title,
        public $excerpt,
        public $date,
        public $body,
        public $slug
    ) {
        $this->date = date("Y-m-d", $date);
    }


    public static function all() {
        
        return cache()->rememberForever('posts.all', function() {
            return collect(File::files(resource_path('posts')))
            ->map(fn ($file) => YamlFrontMatter::parseFile($file))
            ->map(fn ($doc) => new Post(
                    $doc->title,
                    $doc->excerpt,
                    $doc->date,
                    $doc->body(),
                    $doc->slug
                )
            )->sortByDesc('date');
        });


        
    }

    public static function find($slug) {

        return static::all()->firstWhere('slug', $slug);
    }


    public static function findOrFind($slug) {
        $post = static::find($slug);

        if (!$post) {
            throw new ModelNotFoundException();
        }

        return $post;
    }
}
