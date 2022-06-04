<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/post.css">
    <title>Blog</title>
</head>

<body>
    <article>
        <h1> <?= $post->title ?> </h1>
        <em> <?= $post->date ?> </em>
        <p> <?= $post->body() ?> </p>
        <a href="/">Go back</a>
    </article>

</body>

</html>
