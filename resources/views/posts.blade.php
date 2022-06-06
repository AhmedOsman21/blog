<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Blog</title>
</head>

<body>

    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>
            <div>
                <em>Publish Date: {{ $post->date }} </em>
                <p> {{ $post->excerpt }} </p>
            </div>
        </article>
    @endforeach

</body>

</html>
