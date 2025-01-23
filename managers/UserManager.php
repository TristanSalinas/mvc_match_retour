<?php


class UserManager extends AbstractManager
{
  public function createUser(User $user): void
  {
    $query = $this->db->prepare(
      'INSERT INTO users (email, first_name, last_name) 
      VALUES (:email, :first_name, :last_name)'
    );

    $parameters = [
      'email' => $user->getEmail(),
      'first_name' => $user->getFirst_Name(),
      'last_name' => $user->getLast_Name()
    ];

    $query->execute($parameters);
  }

  public function findAllUsers(): array
  {
    $query = $this->db->prepare(
      'SELECT * FROM users'
    );

    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);

    return $users;
  }



  public function findUserById(int $id): ?User
  {
    $query = $this->db->prepare(
      'SELECT * FROM users 
      WHERE id = :id'
    );

    $query->execute(['id' => $id]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if ($result) {
      $user = new User($result['email'], $result['first_name'], $result['last_name']);
      $user->setId($result['id']);
    }

    return $user;
  }
  public function updateUser(User $user): void
  {
    $query = $this->db->prepare(
      'UPDATE users 
      SET email = :email, first_name = :first_name, last_name = :last_name
      WHERE id = :id'
    );

    $parameters = [
      'email' => $user->getEmail(),
      'first_name' => $user->getFirst_Name(),
      'last_name' => $user->getLast_Name(),
      'id' => $user->getId()
    ];

    $query->execute($parameters);
  }

  public function deleteUser(int $id): void
  {
    $query = $this->db->prepare(
      'DELETE FROM users 
      WHERE id = :id'
    );

    $query->execute(['id' => $id]);
  }
}
