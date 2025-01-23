<?php
class User
{
  private ?int $id;
  public function __construct(
    private string $email,
    private string $last_Name,
    private string $first_Name,
  ) {}

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of email
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of last_Name
   */
  public function getLast_Name()
  {
    return $this->last_Name;
  }

  /**
   * Set the value of last_Name
   *
   * @return  self
   */
  public function setLast_Name($last_Name)
  {
    $this->last_Name = $last_Name;

    return $this;
  }

  /**
   * Get the value of first_Name
   */
  public function getFirst_Name()
  {
    return $this->first_Name;
  }

  /**
   * Set the value of first_Name
   *
   * @return  self
   */
  public function setFirst_Name($first_Name)
  {
    $this->first_Name = $first_Name;

    return $this;
  }
}
