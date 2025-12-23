<?php
declare(strict_types=1);
namespace src\Classes;

/**
 * Класс SuperUser расширяет класс User, добавляя административную роль.
 */
class SuperUser extends User
{
    /**
     * Конструктор суперпользователя
     * * @param string $name Передается в родительский класс
     * @param string $login Передается в родительский класс
     * @param string $password Передается в родительский класс
     * @param string $role Новое свойство, определяющее права (продвигаемое свойство)
     */
    public function __construct(
        string $name, 
        string $login, 
        string $password, 
        public string $role
    ) {
        // Вызов конструктора родителя User
        parent::__construct($name, $login, $password);
    }

    /**
     * Переопределенный метод для вывода расширенной информации
     */
    public function showInfo(): string  
    {
        return "<div class=\"super-user-info\">
                    <h3>Super User Info</h3>
                    <p><strong>Name:</strong> {$this->name}</p>
                    <p><strong>Login:</strong> {$this->login}</p>
                    <p><strong>Role:</strong> {$this->role}</p>
                </div>";
    }
}
