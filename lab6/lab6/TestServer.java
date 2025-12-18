package lab6;
/*
import java.io.*;
import java.net.*;

public class TestServer {
    public static void main(String[] args) throws IOException {
        ServerSocket serverSocket = new ServerSocket(12345);
        System.out.println("Test server is running...");
        while (true) {
            Socket clientSocket = serverSocket.accept();
            BufferedReader in = new BufferedReader(new InputStreamReader(clientSocket.getInputStream()));
            PrintWriter out = new PrintWriter(clientSocket.getOutputStream(), true);

            String inputLine;
            while ((inputLine = in.readLine()) != null) {
                System.out.println("Received: " + inputLine);
                if (inputLine.startsWith("create")) {
                    out.println("ok");
                } else {
                    out.println("error");
                }
            }
        }
    }
}
*/

/*
import java.io.*;
import java.net.*;

public class TestServer {
    public static void main(String[] args) {
        final int port = 12345; // Порт сервера
        try (ServerSocket serverSocket = new ServerSocket(port)) {
            System.out.println("Тестовый сервер запущен на порту " + port);

            while (true) {
                Socket clientSocket = serverSocket.accept();
                System.out.println("Новое подключение от: " + clientSocket.getInetAddress());

                try (BufferedReader in = new BufferedReader(new InputStreamReader(clientSocket.getInputStream()));
                     PrintWriter out = new PrintWriter(clientSocket.getOutputStream(), true)) {

                    String inputLine;
                    while ((inputLine = in.readLine()) != null) {
                        System.out.println("Получено сообщение: " + inputLine);

                        if (inputLine.startsWith("create")) {
                            System.out.println("Обработка команды 'create'");
                            out.println("ok");
                        } else if (inputLine.startsWith("open")) {
                            System.out.println("Обработка команды 'open'");
                            String[] parts = inputLine.split(" ");
                            if (parts.length == 3) {
                                String login = parts[1];
                                String password = parts[2];
                                System.out.println("Логин: " + login + ", Пароль: " + password);
                                // Простая проверка (для теста)
                                if (login.equals("12345") && password.equals("mypassword")) {
                                    out.println("ok");
                                } else {
                                    out.println("error");
                                }
                            } else {
                                System.out.println("Неверный формат команды 'open'");
                                out.println("error");
                            }
                        } else {
                            System.out.println("Неизвестная команда");
                            out.println("error");
                        }
                    }
                } catch (IOException e) {
                    System.out.println("Ошибка обработки клиента: " + e.getMessage());
                }
            }
        } catch (IOException e) {
            System.err.println("Не удалось запустить сервер: " + e.getMessage());
        }
    }
}*/

import java.io.*;
import java.net.*;
import java.util.HashMap;
import java.util.Map;

public class TestServer {
    // Хранилище логинов и паролей
    private static final Map<String, String> accounts = new HashMap<>();

    public static void main(String[] args) {
        final int port = 12345; // Порт сервера
        try (ServerSocket serverSocket = new ServerSocket(port)) {
            System.out.println("Сервер запущен на порту " + port);

            while (true) {
                Socket clientSocket = serverSocket.accept();
                System.out.println("Новое подключение от: " + clientSocket.getInetAddress());

                try (BufferedReader in = new BufferedReader(new InputStreamReader(clientSocket.getInputStream()));
                     PrintWriter out = new PrintWriter(clientSocket.getOutputStream(), true)) {

                    String inputLine;
                    while ((inputLine = in.readLine()) != null) {
                        System.out.println("Получено сообщение: " + inputLine);

                        if (inputLine.startsWith("create")) {
                            handleCreateCommand(inputLine, out);
                        } else if (inputLine.startsWith("open")) {
                            handleOpenCommand(inputLine, out);
                        } else {
                            System.out.println("Неизвестная команда");
                            out.println("error");
                        }
                    }
                } catch (IOException e) {
                    System.out.println("Ошибка обработки клиента: " + e.getMessage());
                }
            }
        } catch (IOException e) {
            System.err.println("Не удалось запустить сервер: " + e.getMessage());
        }
    }

    // Обработка команды create
    private static void handleCreateCommand(String inputLine, PrintWriter out) {
        String[] parts = inputLine.split(" ");
        if (parts.length == 3) {
            String login = parts[1];
            String password = parts[2];

            if (accounts.containsKey(login)) {
                System.out.println("Аккаунт с логином " + login + " уже существует.");
                out.println("error: account exists");
            } else {
                accounts.put(login, password);
                System.out.println("Аккаунт создан: Логин = " + login + ", Пароль = " + password);
                out.println("ok");
            }
        } else {
            System.out.println("Неверный формат команды 'create'. Ожидалось: create <логин> <пароль>");
            out.println("error");
        }
    }

    // Обработка команды open
    private static void handleOpenCommand(String inputLine, PrintWriter out) {
        String[] parts = inputLine.split(" ");
        if (parts.length == 3) {
            String login = parts[1];
            String password = parts[2];

            if (accounts.containsKey(login)) {
                if (accounts.get(login).equals(password)) {
                    System.out.println("Вход выполнен: Логин = " + login);
                    out.println("ok");
                } else {
                    System.out.println("Неверный пароль для логина: " + login);
                    out.println("error: invalid password");
                }
            } else {
                System.out.println("Аккаунт с логином " + login + " не найден.");
                out.println("error: account not found");
            }
        } else {
            System.out.println("Неверный формат команды 'open'. Ожидалось: open <логин> <пароль>");
            out.println("error");
        }
    }
}

