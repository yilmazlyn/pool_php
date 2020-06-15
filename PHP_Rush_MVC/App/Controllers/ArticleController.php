<?php

namespace App\Controllers;

use WebFramework\AppController;
use WebFramework\Router;
use WebFramework\Request;

use App\Models\Articles;
//include_once "../Models/Articles.php";

class ArticleController //extends AppController

{
  public function article_view(Request $request)
  {
    return $this->render('auth/article.html.twig', ['article' => $request->article,
      'error' => $this->flashError]);
  }


//__________________CRUD ARTICLES______________________
  //Create articles in DB

  public function create_article(Request $request)
  {
/*
      $article = new Article();
      $content->setContent($request->$_POST['content']);
      $title->setTitle($request->$_POST['title']);
      $author_article->setAuthorArticle($request->$_POST['author_article']);
      $category->setCategory($request->$_POST['category']);
      $tag->setTag($request->$_POST['tag']);

      $pdo = new PDO();
      $conn = $pdo->connect();
      $sql = ("INSERT INTO articles (title, content, author_article) VALUES('$title', '$content', '$author_article')");
      $conn->query($sql);//PDO::query(string $statement) to create PDO request to sql server
      $pdo->closeConnection();

      try {
          $article->persist($article);
          $article->flush();
      } catch (\Exception $e) {
          $this->flashError->set($e->getMessage());
          $this->redirect('/' . $request->base . 'auth/article', '302');
          return;
      }
    */
  }
    public function updateArticle(Request $request)
    {
        /*
      //$article = new Article();
      $content->setContent($request->$_POST['content']);
      $title->setTitle($request->$_POST['title']);
      $author_article->setAuthorArticle($request->$_POST['author_article']);
      $category->setCategory($request->$_POST['category']);
      $tag->setTag($request->$_POST['tag']);

      $pdo = new PDO();
      $conn = $pdo->connect();
      $sql = ("UPDATE articles (title, content, author_id, category_id, creation_date) VALUES (:title, :content, :author_article, creation_date), NOW(:last_modification_date)");
      $conn->query($sql);
      $pdo->closeConnection();
      try {
        $article->persist($article);
        $article->flush();
      } catch (\Exception $e) {
        $this->flashError->set($e->getMessage());
        $this->redirect('/' . $request->base . 'auth/article', '302');
        return;
      }
      */
    }

    public function deleteArticle($id)
    {
      $pdo = new PDO();
      $conn = $pdo->connect();
      $sql = ("DELETE FROM articles WHERE id = $id ");
      $conn->query($sql);
      $pdo->closeConnection();

    }


    // public static function create_article(Request $request)
    //   {
    //
    //     	$title = "";
    //     	$content    = "";
    //       $author_article;
    //       $creation_date;
    //     	$errors = array();
    //     	$_SESSION['success'] = "";
    //
    //
    //       	$db = mysqli_connect("localhost", "admin", "mysql", "mvc");
    //       	$db = $connexion;
    //
    //     	// INSCRIPTION of the product
    //     	if (isset($_POST['article_view'])) {
    //     		// receive input values
    //     		$name = mysqli_real_escape_string($db, $_POST['title']);
    //     		$price =$_POST['content'];
    //     		$category = $_POST['author_article'];
    //
    //
    //     		// form validation
    //     		if (empty($title))
    //         {
    //           array_push($errors, "There is any title");
    //         }
    //     		if (empty($content))
    //         {
    //           array_push($errors, "Content can't be empty");
    //         }
    //
    //     		if (empty($author_article))
    //         {
    //           array_push($errors, "Author of this article is required");
    //         }
    //
    //
    //     		// Create article
    //     		if (count($errors) == 0)
    //         {
    //
    //     			$query = "INSERT INTO articles (title, content, author_article) VALUES('$title', '$content', '$author_article')";
    //     			var_dump($query);
    //     			mysqli_query($db, $query);
    //
    //
    //     			header('location: ../article.html.twig');
    //     		}
    //







        // var_dump($request);
        // $link = new mysqli('localhost', 'admin', 'mysql', 'mvc');
        // $query = $link->prepare("INSERT INTO articles (title, content, author_article, creation_date,) VALUES (:title, :content, :author_article,)");
        // return $query->execute(
        //
        //       array(
        //           ":title" => $title,
        //           ":content" => $content,
        //           ":author_article" => $author_article,
        //           ":creation_date" => $creation_date,
        //
        //       )
        //   );

          // if (!empty($query))
          // {
          //   header("location:admin.php"); //to correct according the page name that Michel on it
          // }
      //}




      //public static function read_articles()

  //Update articles in DB
    // public static function update_article($title, $content, $author_article, $creation_date)
    //
    // {
    //     $link = new mysqli('localhost', 'admin', 'mysql', 'mvc');
    //
    //     $query = $link->prepare("UPDATE articles (title, content, author_id, category_id, creation_date) VALUES (:title, :content, :author_article, creation_date), NOW(:last_modification_date)");
    //     return $query->execute(
    //         array(
    //             ":title" => $title,
    //             ":content" => $content,
    //             ":author_id" => $author_article,
    //             ":creation_date" => $creation_date,
    //             ":created_at" => $created_at,
    //         )
    //     );
    // }
    //
    // //Delete articles in DB
    //
    //   public static function delete_article($id)
    //   {
    //       $link = new mysqli('localhost', 'admin', 'mysql', 'mvc');
    //       $query = $link->prepare("DELETE FROM articles WHERE id = :id ");
    //       $query->bindParam(":id", $id);//node id parameter to id variable
    //       return $query->execute();
    //   }
    //

  }
