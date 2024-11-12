<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bài post</title>
</head>
<body>
    <a href="index.php?act=create">Create</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Author</th>
                <th>Thumbnail</th>
                <th>Action</th>
                <th>category</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $p) { ?>
                <tr>
                    <td><?= $p['pid'] ?></td>
                    <td><?= $p['tile'] ?></td>
                    <td><?= $p['content'] ?></td>
                    <td><?= $p['ather'] ?></td>
                  
                    <td><img style="height: 200px" src="./upload/<?=$p['thumbnail']?>" alt=""></td>
                    <!-- <td><img src="<?=$p['thumbnail']?>" alt=""></td> -->
                    
                    <td>
                        <a href="index.php?act=detail&id_posts=<?=$p["pid"] ?>" >Detail</a>
                        <a href="index.php?act=edit&id_posts=<?=$p["pid"] ?>">exit</a>
                        <a href="index.php?act=delete&id_posts=<?=$p['pid'] ?>" onclick="return confirm('bạn có chắc chắn xoá không?')">Xoá</a>
                    </td>
                    <td><?= $p['description'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>