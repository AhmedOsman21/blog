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
        return collect(File::files(resource_path('posts/')))
            ->map(fn ($file) => YamlFrontMatter::parseFile($file))
            ->map(
                fn ($doc) => new Post(
                    $doc->title,
                    $doc->excerpt,
                    $doc->date,
                    $doc->body(),
                    $doc->slug
                )
            );
    }

    public static function find($slug) {

        $path = resource_path("posts/{$slug}.html");

        if (!file_exists($path)) {
            throw (new ModelNotFoundException());
        }

        $doc = YamlFrontMatter::parse(file_get_contents($path));

        $doc->date = date("Y-m-d", $doc->date);

        return cache()->remember("posts.{$slug}", now()->addMinute(), fn () => $doc);
    }
}
