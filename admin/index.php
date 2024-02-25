<?php
session_start();

include '../functions.php';



if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

$posts = getPosts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-300">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Admin Panel - Posts</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <?php foreach($posts as $post): ?>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-4"><a href="view_post.php?id=<?php echo $post['id']; ?>" class="text-blue-500 hover:text-blue-700"><?php echo $post['title']; ?></a></h2>
                    <p class="text-gray-600"><?php echo substr($post['content'], 0, 100); ?>...</p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="mt-8">
            <a href="add_post.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Post</a>
            <a href="logout.php" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-4">Logout</a>
        </div>
    </div>
</body>
</html>
