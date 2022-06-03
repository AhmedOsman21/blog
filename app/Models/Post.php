<?php

namespace App\Models;

class Post {
    static public function find($slug) : string {
        
        $path = resource_path("posts/{$slug}.html");

        if (!file_exists($path)) {
            redirect("/");
        }

        $post = cache()->remember("posts.{$slug}", now()->addminute(), fn() => file_get_contents($path));

        return $post;

    }
}