<?php
include 'functions.php';

if (isset($_GET['id'])) {
    $post = getPostById($_GET['id']);
    if (!$post) {
        echo "Post not found.";
        exit;
    }
} else {
    echo "Post ID not provided.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-300">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold mb-4"><?php echo $post['title']; ?></h1>
            <p class="text-gray-600"><?php echo $post['content']; ?></p>
            <div class="mt-8">
                <a href="index.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to Posts</a>
                <a href="admin/edit_post.php?id=<?php echo $post['id']; ?>" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded ml-4">Edit Post</a>
            </div>
        </div>
    </div>
</body>
</html>
