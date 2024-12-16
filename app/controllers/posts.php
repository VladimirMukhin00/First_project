<?php
include SITE_ROOT . "/app/database/db.php";
// include "C:\Program Files\Ampps\www\dinamic-site\app\database\db.php";

$errMsg = '';

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
            die("Можно загружать только изображения...");

        }else{
            $result = move_uploaded_file($fileTmpName, $destination);

            if($result){
                $_POST['img'] = $imgName;
            }else{
                $errMsg = "Не получилось загрузить картинку на сервер";
            }
        }

        

    }else{
        $errMsg = "Не получилось подгрузить картинку";
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $category = trim($_POST['category']);

    $publish = isset($_POST['publish']) ? 1 : 0;

    if($title === '' || $content === '' || $category === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($title, 'UTF8') < 5){
        $errMsg = "Заголовок статьи должен быть более 5-х символов";
    }else{
            $post = [
                'id_user' => 50,         //   $_SESSION['id'],  !!!!ЗАГЛУШКА!!! Т.к. тут повторяется ссесия, если подключить вначале
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
    $title = '';
    $content = '';
}

// // Редактирование категории
// if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){

//     $id = $_GET['id'];
//     $category = selectOne('categories', ['id' => $id]);
//     $id = $category['id'];
//     $name = $category['name'];
//     $description = $category['description'];
// }

// if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category-edit'])){

//     $name = trim($_POST['name']);
//     $description = trim($_POST['description']);

//     if($name === '' || $description === ''){
//         $errMsg = "Не все поля заполнены!";
//     }elseif (mb_strlen($name, 'UTF8') < 2){
//         $errMsg = "Название категории должено быть более 2-х символов";
//     }else{
//             $category = [
//                 'name' => $name,
//                 'description' => $description   // отправка в БД
//             ];
        
//             $id = $_POST['id'];
//             $category_id = update('categories', $id, $category);
//             echo "Обновилась категория с id = " . $id;
            
//             header('location: ' . BASE_URL . 'admin/categories/index.php');
//         }
// }

// // Удаление категории
// if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){

//     $id = $_GET['del_id'];
//     delete('categories',$id);
//     header('location: ' . BASE_URL . 'admin/categories/index.php');
// }