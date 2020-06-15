<?php
Namespace App\Models;

class Articles
{

  /**
   * @type integer
   */
  private $id;

  /**
   * @type string
   */
  private $content;

  /**
   * @type string
   */
  private $title;

  /**
   * @type string
   */
  private $author_article;

  /**
   * @type string
   */
  private $category;

  /**
   * @type string
   */
  private $tag;

  /**
   * @type integer
   */
  private $creation_date;

  /**
   * @type integer
   */
  private $last_modification_date;


  public function getId(): ?int
  {
    return $this->$id;
  }

  public function setId(int $id): self
  {
    $this->id = $id;

    return $this;
  }

  public function getContent(): ?string
  {
    return $this->content;
  }

  public function setContent(string $content): self
  {
    $this->content = $content;

    return $this;
  }

  public function getTitle(): ?string
  {
    return $this->title;
  }

  public function setTitle(string $title): self
  {
    $this->title = $title;

    return $this;
  }

  public function getAuthorARticle(): ?string
  {
    return $this->author_article;
  }

  public function setAuthorArticle(string $author_article): self
  {
    $this->author_article = $author_article;

    return $this;
  }


  public function getCategory(): ?string
  {
    return $this->category;
  }

  public function setCategory(string $category): self
  {
    $this->category = $category;

    return $this;
  }

  public function getTag(): ?string
  {
    return $this->tag;
  }

  public function setTag(string $tag): self
  {
    $this->tag = $tag;

    return $this;
  }

  public function getCreatedAt(): ?int
  {
    return $this->creation_date;
  }

  public function setCreationDate(int $creation_date): self
  {
    $this->creation_date = $creation_date;

    return $this;
  }

  public function getEditionDate(): ?int
  {
    return $this->last_modification_date;
  }

  public function setModificationDate(int $last_modification_date): self
  {
    $this->last_modification_date = $last_modification_date;

    return $this;
  }

  /**
   * Validate the Article model data.
   *
   * @return string - Error message if the model data is invalid, else empty string.
   */

   /**
    * Validate the Article model data.
    *
    * @return int - Error message if the model data is invalid, else NULL int.
    */

  public function validate(): string
  {
    $err = '';

    // if (empty($this->id)
    //{
    //   $err = $err . "Invalid 'category id' field. Must have a id number.<br>";
    // }

    if (empty($this->title))
    {
      $err = $err . "Invalid 'title' field. Can't be blank.<br>";
    }

    if (empty($this->content))
    {
      $err = $err . "Invalid 'content' field. Can't be blank.<br>";
    }

    if (empty($this->author_article))
    {
      $err = $err . "Invalid 'author' field. Can't be blank.<br>";
    }

    if (empty($this->category))
    {
      $err = $err . "Invalid 'category' field. Can't be blank.<br>";
    }

    if (empty($this->tag))
    {
      $err = $err . "Invalid 'author_id' field. Can't be blank.<br>";
    }
    // if (empty($this->creation_date)) {
    //   $err = $err . "Invalid 'date' field. Can't be blank.<br>";
    // }

    // if (empty($this->last_modification_date)) {
    //   $err = $err . "Invalid 'date' field. Can't be blank.<br>";
    // }

    if (!empty($err)) {
      throw new \Exception($err);
    }

    return $err;
  }
}
