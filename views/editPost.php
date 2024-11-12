<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới post</title>
</head>
<body>
    <form action="index.php?act=edit&id_posts=<?=$post["id"]?>" method="POST" enctype="multipart/form-data">
        <div>
            <label for="">Title</label>
            <input type="text" name="title" value="<?= $post['tile']?>">
        </div>
        <div>
            <label for="">Content</label>
            <input type="text" name="content" value="<?= $post['content']?>">
        </div>
        <div>
            <label for="">Author</label>
            <!--lấy danh sách user từ bảng user đẻ hiện thị ra option-->
            <select name="user_id">
                <?php foreach($userss as $u) {?>
                    <?php if ($u["id"] == $post['user_id']){?>
                    <option selected value="<?= $u["id"] ?>"> <?= $u["name"] ?></option>
                    <?php }else{?>
                        <option value="<?= $u["id"] ?>"> <?= $u["name"] ?></option>
                   <?php }?>
                    <?php }?>
            </select>
        </div>
        <div>
            <label for="">Category</label>
            <select name="category_id" id="">
                <?php foreach($catess as $s) {?>
                    <?php if ($s["Id"] == $post['category_id']){?>
                        <option selected value="<?= $s["Id"] ?>"> <?= $s["name"] ?></option>
                    <?php }else{?>
                        <option value="<?= $s["Id"] ?>"> <?= $s["name"] ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="">Thumbnail</label>
            <input type="file" name="thumbnail" value="<?= $post['thumbnail']?>" <img src="./upload<?= $post['thumbnail']?>" alt="">>
        </div>
        <input type="submit" value="Thêm" name="sua">
    </form>
</body>
</html>