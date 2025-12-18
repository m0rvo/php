package lab6;

import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
import java.io.*;
import java.net.*;

public class lab6_1 implements ActionListener {

    JFrame frame;
    JButton connecttoButton;
    JLabel adres, port;
    JTextField adresField, portField;
    JPanel connectPanel;

    JButton createButton, signinButton, statusButton, withdrawButton, putButton, sendButton;
    JLabel billnumber1, password1, billnumber2, password2, amount, billnumsum, summa;
    JTextField billnumber1Field,  billnumber2Field, billnumsumField, gettinField;
    JPanel bill_creating_Panel, acc_creating_Panel, third_Panel;
    JPasswordField password1Field, password2Field;

    lab6_1() {
        frame = new JFrame("Bank Client");
        frame.setVisible(true);
        frame.setSize(400, 500);
        frame.setResizable(false);
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setLocationRelativeTo(null);
        frame.setLayout(new GridLayout(3, 1));

        adres = new JLabel("Адрес:");
        adresField = new JTextField("www.center.ogu", 15);
        port = new JLabel("Порт:");
        portField = new JTextField("2000", 15);
        connecttoButton = new JButton("Создать счет");
        connecttoButton.addActionListener(this);
        
        //Панель Подключение к серверу
        connectPanel = new JPanel();
        connectPanel.setBounds(25, 25, 320, 120);
        connectPanel.setBorder(BorderFactory.createCompoundBorder(
            BorderFactory.createTitledBorder("Подключение к серверу"), 
            BorderFactory.createEmptyBorder(10, 10, 10, 10)
        ));

        GridBagLayout gbl = new GridBagLayout();
        connectPanel.setLayout(gbl);
        GridBagConstraints c = new GridBagConstraints();
        c.weightx = 0;
        c.fill = GridBagConstraints.WEST;
        c.gridx = 0;
        c.gridy = 0;
        connectPanel.add(adres, c);

        c.weightx = 1;
        c.gridx = 1;
        connectPanel.add(adresField, c);

        c.weightx = 0;
        c.gridx = 2;
        c.gridheight=2;
        connectPanel.add(connecttoButton, c);

        c.weightx=0;
        c.gridx = 0;
        c.gridy = 1;
        connectPanel.add(port, c);

        c.weightx = 1;
        c.gridx = 1;
        connectPanel.add(portField, c);

        frame.add(connectPanel);

        billnumber1 = new JLabel("Номер сч.:");
        billnumber1Field = new JTextField("123", 15);
        password1 = new JLabel("Пассворд: ");
        password1Field = new JPasswordField("456",15);
        createButton = new JButton("Create");
        createButton.addActionListener(this);
       
        billnumber2 = new JLabel("Номер сч.");
        billnumber2Field = new JTextField("123", 15);
        password2 = new JLabel("Пассроль");
        password2Field = new JPasswordField("456", 15);
        signinButton = new JButton("Regg");
        signinButton.addActionListener(this);

        billnumsum = new JLabel("Номер счета");
        summa= new JLabel("Сумма");
        billnumsumField=new JTextField(15);
        statusButton=new JButton("Статус");
        statusButton.addActionListener(this);
        withdrawButton= new JButton("Перевод");
        withdrawButton.addActionListener(this);
        putButton = new JButton("Положить");
        putButton.addActionListener(this);
        sendButton = new JButton("Отправить");
        sendButton.addActionListener(this);
        gettinField = new JTextField(15);
        gettinField.setEditable(false);

        //Панель Создание счета
        bill_creating_Panel = new JPanel();
        bill_creating_Panel.setBounds(25, 25, 320, 120);
        bill_creating_Panel.setBorder(BorderFactory.createCompoundBorder(
            BorderFactory.createTitledBorder("Создание счета"), 
            BorderFactory.createEmptyBorder(10, 10, 10, 10)
        ));

        //Панель Регистрация Пользователя
        acc_creating_Panel = new JPanel();
        acc_creating_Panel.setBounds(25, 25, 320, 120);
        acc_creating_Panel.setBorder(BorderFactory.createCompoundBorder(
            BorderFactory.createTitledBorder("Регистрация пользователя"), 
            BorderFactory.createEmptyBorder(10, 10, 10, 10)
        ));

        //GridBagLayout gbl = new GridBagLayout();
        bill_creating_Panel.setLayout(gbl);
        acc_creating_Panel.setLayout(gbl);
        GridBagConstraints c2 = new GridBagConstraints();
        c2.weightx = 0;
        c2.fill = GridBagConstraints.WEST;
        c2.gridx = 0;
        c2.gridy = 0;
        bill_creating_Panel.add(billnumber1, c2);
        acc_creating_Panel.add(billnumber2, c2);

        c2.weightx = 1;
        c2.gridx = 1;
        bill_creating_Panel.add(billnumber1Field, c2);
        acc_creating_Panel.add(billnumber2Field, c2);

        c2.weightx = 0;
        c2.gridx = 2;
        c2.gridheight=2;
        bill_creating_Panel.add(createButton, c2);
        acc_creating_Panel.add(signinButton, c2);

        c2.weightx=0;
        c2.gridx = 0;
        c2.gridy = 1;
        bill_creating_Panel.add(password1, c2);
        acc_creating_Panel.add(password2, c2);

        c2.weightx = 1;
        c2.gridx = 1;
        bill_creating_Panel.add(password1Field, c2);
        acc_creating_Panel.add(password2Field, c2);

        //frame.add(bill_creating_Panel); frame.add(acc_creating_Panel);

        //Создание нижней панели
        third_Panel = new JPanel();
        GridBagLayout gbl3 = new GridBagLayout();
        third_Panel.setLayout(gbl3);
        GridBagConstraints c1= new GridBagConstraints();
        c.fill = GridBagConstraints.HORIZONTAL;
        
        c1.gridx=0;
        c1.gridy=0;
        c1.gridwidth=1;
        third_Panel.add(billnumsum, c1);

        c1.gridx =1;
        third_Panel.add(summa, c1);

        c1.gridx=2;
        c1.weightx = 1;
        c1.gridwidth=2;
        c1.ipadx=200;
        third_Panel.add(billnumsumField, c1);

        c1.ipadx=0;
        c1.gridwidth=1;
        c1.gridx = 0;
        c1.gridy=1;
        third_Panel.add(statusButton, c1);
        c1.gridwidth=1;
        c1.gridx=1;
        third_Panel.add(withdrawButton, c1);
        c1.gridwidth=1;
        c1.gridx=2;
        third_Panel.add(putButton, c1);
        c1.gridwidth=1;
        c1.gridx=3;
        third_Panel.add(sendButton, c1);
        c1.gridwidth=4;
        c1.ipadx=350;
        c1.ipady=50;
        c1.gridx=0;
        c1.gridy=2;
        third_Panel.add(gettinField, c1);
        //frame.add(third_Panel);
    }

    @Override
    public void actionPerformed(ActionEvent e) {
        try{
            if (e.getSource() == connecttoButton) {
                Connect_To();
            } else if (e.getSource()==createButton){
                Sign_In();
            } else if (e.getSource()==signinButton){
                Log_In();
            } else if (e.getSource()==statusButton){
                Status_Money();
            } else if (e.getSource()==withdrawButton){
                Get_Money();
            } else if (e.getSource()==putButton){
                Put_Money();
            } else if (e.getSource()==sendButton){
                Send_Money();
            }
        } catch (IOException ex) {
            System.out.println("Ошибка: " + ex.getMessage());
        }
    }

    Socket s;
    InputStream is;
    OutputStream os;
    DataOutputStream ds;
    DataInputStream in;
    byte [] b;

    private void Connect_To() throws IOException {
        try{
        String adress = adresField.getText();
        Integer portt =  Integer.parseInt(portField.getText());
    
        s = new Socket(adress, portt);

        is = s.getInputStream();
        os = s.getOutputStream();
        ds = new DataOutputStream(os);

        System.out.println("Подключено успешно!");
        frame.remove(connectPanel);
        frame.add(bill_creating_Panel);
        frame.add(acc_creating_Panel);

        frame.revalidate();
        frame.repaint();

        } catch (IOException e) {
            JOptionPane.showMessageDialog(frame, "Ошибка подключения к серверу: " + e.getMessage());
        }
    }
    
    private void Sign_In() throws IOException {
        
        int acclogin = Integer.parseInt(billnumber1Field.getText().trim());
        String accpsswd = password1Field.getPassword().toString().trim();

        if (billnumber1Field.getText().trim().isEmpty() || accpsswd.isEmpty()){
            JOptionPane.showMessageDialog(frame, "Заполните поля Номер счета и Пароль");
            return;
        }

        try {
            String message = "create " + acclogin + " " + accpsswd + "\n";
            sendMessage(message);
            System.out.println("Sending message to server: " + message);
    
            String response = showServersResponse();
            System.out.println("showServersResponse(): " + response);
    
            if (response.equals("ok")) {
                JOptionPane.showMessageDialog(frame, "Аккаунт создан!!");
            } else  {
                JOptionPane.showMessageDialog(frame, "Аккаунт не создан :(");
            }
    
        } catch (IOException ex) {
            JOptionPane.showMessageDialog(frame, "Error during sign-in process: " + ex.getMessage());
        }

    }

    private void sendMessage(String message) throws IOException {
        try {
            byte[] messagebytes = message.getBytes("UTF-8");
            ds.write(messagebytes);//............................
            ds.flush();
            System.out.println("Message sent");
            System.out.println(messagebytes);
        } catch (IOException ex){
            JOptionPane.showMessageDialog(frame, "Error creating sending message to a server");
            System.out.println("Message not sent");
        }
    }
    
    private String showServersResponse() throws IOException {
        try {
            byte[] b = new byte[2048];
            int bytesRead = is.read(b);
            System.out.println("int bytesRead = " + bytesRead);
            System.out.println("b array = " + b);
    
            if (bytesRead == -1) {
                System.out.println("bytesRead==-1");
                return null;
            }
            String toReturn = new String(b, 0, bytesRead).trim();
            System.out.println("new String (b, 0, 2048) == " + toReturn);
            
            return toReturn;

        } catch (IOException ex) {
            System.out.println("Error while reading server response"+ ex.getMessage());
            return null;
        }
    }   

    /*private void Log_In() throws IOException {
        int acclogin = Integer.parseInt(billnumber1Field.getText().trim());
        String accpsswd = password1Field.getPassword().toString().trim();

        int acclogin1=Integer.parseInt(billnumber2Field.getText().trim());
        String accpsswd1 = password2Field.getPassword().toString().trim();
        

        if (billnumber2Field.getText().isEmpty() || accpsswd1.isEmpty()){
            System.out.println("Поля пустые!!!!");
            return;
        }
        if (acclogin1 == acclogin && accpsswd1.equals(accpsswd)){
            String message = "open " + acclogin1 + " " + accpsswd1 + "\n";
            sendMessage(message);

            System.out.println("create " + acclogin + " " + accpsswd + "\n");
            System.out.println("open " + acclogin1 + " " + accpsswd1 + "\n");

            showServersResponse();
            System.out.println("Все совпадает");

            frame.add(third_Panel);
            frame.revalidate();
            frame.repaint();

        } else {
            System.out.println("Чета не совпадает :(");
        }
    }*/

    private void Log_In() throws IOException {
        try {
            int acclogin = Integer.parseInt(billnumber1Field.getText().trim());
            String accpsswd = new String(password1Field.getPassword()).trim();
    
            int acclogin1 = Integer.parseInt(billnumber2Field.getText().trim());
            String accpsswd1 = new String(password2Field.getPassword()).trim();
    
            if (billnumber2Field.getText().isEmpty() || accpsswd1.isEmpty()) {
                System.out.println("Поля пустые!");
                JOptionPane.showMessageDialog(frame, "Пожалуйста, заполните все поля.");
                return;
            }

            if (acclogin1 == acclogin && accpsswd1.equals(accpsswd)) {
                String message = "open " + acclogin1 + " " + accpsswd1 + "\n";
                sendMessage(message);
    
                System.out.println("Отправлено сообщение на сервер: " + message);
    
                String response = showServersResponse();
                System.out.println("Ответ сервера: " + response);
    
                if (response != null && response.equals("ok")) {
                    JOptionPane.showMessageDialog(frame, "Вход выполнен успешно!");
                    frame.add(third_Panel);
                    frame.revalidate();
                    frame.repaint();
                } else {
                    JOptionPane.showMessageDialog(frame, "Ошибка входа: " + response);
                }
            } else {
                System.out.println("Чета не совпадает :(");
                JOptionPane.showMessageDialog(frame, "Логин или пароль не совпадают.");
            }
        } catch (NumberFormatException ex) {
            JOptionPane.showMessageDialog(frame, "Некорректный формат номера счета.");
            System.out.println("Ошибка формата ввода: " + ex.getMessage());
        } catch (IOException ex) {
            JOptionPane.showMessageDialog(frame, "Ошибка соединения с сервером: " + ex.getMessage());
            System.out.println("Ошибка ввода-вывода: " + ex.getMessage());
        }
    }
    

    private void Status_Money() throws IOException {
        sendMessage("view");
        showServersResponse();
    }

    private void Get_Money() throws IOException {
        String amount = JOptionPane.showInputDialog("Введите сумму для снятия:");
        sendMessage("get " + amount);
        showServersResponse();
    }

    private void Put_Money() throws IOException {
        String amount = JOptionPane.showInputDialog("Введите сумму для внесения:");
        sendMessage("put " + amount);
        showServersResponse();
    }

    private void Send_Money() throws IOException {
        String account = JOptionPane.showInputDialog("Введите номер счета получателя:");
        String amount = JOptionPane.showInputDialog("Введите сумму перевода:");
        sendMessage("send " + account + " " + amount);
        showServersResponse();
    } 

    public static void main(String[] args) {
        SwingUtilities.invokeLater(new Runnable() {
            public void run(){
                new lab6_1();
            }
        });
    }
}