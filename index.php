<?php
include 'functions.php';

$posts = getPosts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <!-- Including Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-300">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Posts</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <?php foreach($posts as $post): ?>
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-4"><a href="view_post.php?id=<?php echo $post['id']; ?>" class="text-blue-500 hover:text-blue-700"><?php echo $post['title']; ?></a></h2>
                    <p class="text-gray-600"><?php echo substr($post['content'], 0, 100); ?>...</p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
