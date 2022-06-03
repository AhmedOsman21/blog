<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post {
    static public function find($slug) : string {
        
        $path = resource_path("posts/{$slug}.html");

        if (!file_exists($path)) {
            throw (new ModelNotFoundException());
        }

        return cache()->remember("posts.{$slug}", now()->addMinute(), fn() => file_get_contents($path));

    }
}