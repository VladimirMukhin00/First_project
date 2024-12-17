<?php
include SITE_ROOT . "/app/database/db.php";
// include "C:\Program Files\Ampps\www\dinamic-site\app\database\db.php";

$errMsg = [];

$id = '';
$title = '';
$content = '';
$img = '';
$category = '';

$categories = selectAll('categories');
$posts = selectAll('posts');
$postsAdm = selectAllFromPostsWithUsers('posts', 'users');


// Форма создания статьи
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])){
    
    if (!empty($_FILES['img']['name'])){  // подгрузка картинок на сервер при создании статьи
        $imgName = time() . "_" . $_FILES['img']['name'];  // time() чтобы название не повторялось
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\assets\images\posts\\" . $imgName;

        if (strpos($fileType, 'image') === false){
            array_push($errMsg, "Можно загружать только изображения...");

        }else{
            $result = move_uploaded_file($fileTmpName, $destination);

            if($result){
                $_POST['img'] = $imgName;
            }else{
                array_push($errMsg, "Не получилось загрузить картинку на сервер");
            }
        }

        

    }else{
        array_push($errMsg, "Не получилось подгрузить картинку");
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $category = trim($_POST['category']);
    $id_user = trim($_POST['id_user']);
    $publish = isset($_POST['publish']) ? 1 : 0;

    if($title === '' || $content === '' || $category === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif (mb_strlen($title, 'UTF8') < 5){
        array_push($errMsg, "Заголовок статьи должен быть более 5-ти символов");
    }else{
            $post = [
                'id_user' => $id_user,         //   $_SESSION['id'],   или   50
                'title' => $title,
                'content' => $content,   // отправка в БД
                'img' => $_POST['img'],
                'status' => $publish,
                'id_category' => $category
            ];
        
            $post = insert('posts', $post);
            $post = selectOne("posts", ['id' => $id]);
            echo "Была создана статья <- " . $title . " ->";
            
            header('location: ' . BASE_URL . 'admin/posts/index.php');
        }

} else{
    // echo 'GET';
    $id = '';
    $title = '';
    $content = '';
    $publish = '';
    $category = '';
}

// Редактирование статьи
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){

    $post = selectOne('posts', ['id' => $_GET['id']]);
    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $id_category = $post['id_category'];
    $publish = $post['status'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])){

    if (!empty($_FILES['img']['name'])){  // подгрузка картинок на сервер при создании статьи
        $imgName = time() . "_" . $_FILES['img']['name'];  // time() чтобы название не повторялось
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\assets\images\posts\\" . $imgName;

        if (strpos($fileType, 'image') === false){
            array_push($errMsg, "Можно загружать только изображения...");

        }else{
            $result = move_uploaded_file($fileTmpName, $destination);

            if($result){
                $_POST['img'] = $imgName;
            }else{
                array_push($errMsg, "Не получилось загрузить картинку на сервер");
            }
        }

    }else{
        array_push($errMsg, "Не получилось подгрузить картинку");
    }

    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $category = trim($_POST['category']);
    $id_user = trim($_POST['id_user']);
    $publish = isset($_POST['publish']) ? 1 : 0;


    if($title === '' || $content === '' || $category === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif (mb_strlen($title, 'UTF8') < 5){
        array_push($errMsg, "Заголовок статьи должен быть более 5-ти символов");
    }else{
            $post = [
                'id_user' => $id_user,         //   $_SESSION['id'],  или      50
                'title' => $title,
                'content' => $content,   // отправка в БД
                'img' => $_POST['img'],
                'status' => $publish,
                'id_category' => $category
            ];
        
            $post = update('posts', $id,$post);
            echo "Была обновлена статья <- " . $title . " ->";
            
            header('location: ' . BASE_URL . 'admin/posts/index.php');
        }

} else{
    // echo 'GET';
    // $title = isset($_POST['title']);
    // $content = isset($_POST['content']);
    // $publish = isset($_POST['publish']) ? 1 : 0;
    // $category = isset($_POST['id_category']);
}

// // Удаление категории
// if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){

//     $id = $_GET['del_id'];
//     delete('categories',$id);
//     header('location: ' . BASE_URL . 'admin/categories/index.php');
// }