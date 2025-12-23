<?php
namespace src\Classes;

/**
 * Класс User описывает базового пользователя системы.
 * Демонстрирует использование деструктора и продвижения свойств.
 */
class User
{
    /**
     * Конструктор класса с использованием Property Promotion (PHP 8.0+)
     * * @param string $name Имя пользователя
     * @param string $login Логин пользователя
     * @param string $password Пароль (приватное свойство)
     */
    public function __construct(
        public string $name, 
        public string $login, 
        private string $password
    ) {
        // Свойства создаются и присваиваются автоматически
    }

    /**
     * Возвращает HTML-разметку с информацией о пользователе
     */
    public function showInfo(): string 
    {
        return "<div class=\"user-info\">
                    <h3>User Info</h3>
                    <p><strong>Name:</strong> {$this->name}</p>
                    <p><strong>Login:</strong> {$this->login}</p>
                </div>";
    }   

    /**
     * Деструктор срабатывает при удалении объекта из памяти
     */
    public function __destruct()
    {
        echo "<p>Пользователь {$this->login} удален.</p>";
    }
}
