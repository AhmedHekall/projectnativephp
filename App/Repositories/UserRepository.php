<?php
namespace App\Repositories;

use Core\Database;

class UserRepository
{
    private Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function findByEmail(string $email): ?array
    {
        $user = $this->db->query(
            'select * from users where email = :email',
            [':email' => $email]
        )->find();

        return $user ?: null;
    }
        public function create(array $data): array
    {
        $this->db->query(
            'INSERT INTO users (name,email, password) VALUES (:name,:email, :password)',
            [
                ':name' => $data['name'],
                ':email' => $data['email'],
                ':password' => $data['password']
            ]
        );

        return [
            'id' => $this->db->lastInsertId(),
            'email' => $data['email']
        ];
    }

}
