<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới post</title>
</head>
<body>
    <form action="index.php?act=create" method="POST" enctype="multipart/form-data">
        <div>
            <label for="">Title</label>
            <input type="text" name="title">
        </div>
        <div>
            <label for="">Content</label>
            <input type="text" name="content">
        </div>
        <div>
            <label for="">Author</label>
            <!--lấy danh sách user từ bảng user đẻ hiện thị ra option-->
            <select name="user_id">
                <?php foreach($userss as $u) {?>
                    <option value="<?= $u["id"] ?>"> <?= $u["name"] ?></option>
                    <?php }?>
            </select>
        </div>
        <div>
            <label for="">Category</label>
            <select name="category_id" id="">
            <?php foreach($catess as $s) {?>
                    <option value="<?= $s["Id"] ?>"> <?= $s["name"] ?></option>
                    <?php }?>
            </select>
        </div>
        <div>
            <label for="">Thumbnail</label>
            <input type="file" name="image">
        </div>
        <input type="submit" value="Thêm" name="them">
    </form>
</body>
</html>