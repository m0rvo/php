package lab6;

import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
import java.io.*;
import java.net.*;

public class lab6 implements ActionListener {

    JFrame frame;
    JButton createButton, signinButton, statusButton, withdrawButton, putButton, sendButton;
    JLabel billnumber, password, accssignin, passrol, amount, billnumsum, summa;
    JTextField billnumberField, passwordField, accssigninField, passrolField, billnumsumField, gettinField;
    JPanel bill_creating_Panel, acc_creating_Panel, third_Panel;

    lab6() {

        frame = new JFrame("Bank Client");
        frame.setVisible(true);
        frame.setSize(400, 500);
        frame.setResizable(false);
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setLocationRelativeTo(null);
        frame.setLayout(new GridLayout(3, 1));


        billnumber = new JLabel("Адрес:");
        billnumberField = new JTextField(15);
        password = new JLabel("Порт:");
        passwordField = new JTextField(15);
        createButton = new JButton("Создать счет");
        createButton.addActionListener(this);
       
        accssignin = new JLabel("Номер сч.");
        accssigninField = new JTextField(15);
        passrol = new JLabel("Пассроль");
        passrolField = new JTextField(15);
        signinButton = new JButton("Reg");

        billnumsum = new JLabel("Номер счета");
        summa= new JLabel("Сумма");
        billnumsumField=new JTextField(15);
        statusButton=new JButton("Статус");
        withdrawButton= new JButton("Перевод");
        putButton = new JButton("Положить");
        sendButton = new JButton("Отправить");
        gettinField = new JTextField(15);
        gettinField.setEditable(false);

        //Панель Создание счета
        bill_creating_Panel = new JPanel();
        bill_creating_Panel.setBounds(25, 25, 320, 120);
        bill_creating_Panel.setBorder(BorderFactory.createCompoundBorder(
            BorderFactory.createTitledBorder("Подключение к порту"), 
            BorderFactory.createEmptyBorder(10, 10, 10, 10)
        ));

        //Панель Регистрация Пользователя
        acc_creating_Panel = new JPanel();
        acc_creating_Panel.setBounds(25, 25, 320, 120);
        acc_creating_Panel.setBorder(BorderFactory.createCompoundBorder(
            BorderFactory.createTitledBorder("Регистрация пользователя"), 
            BorderFactory.createEmptyBorder(10, 10, 10, 10)
        ));

        GridBagLayout gbl = new GridBagLayout();
        bill_creating_Panel.setLayout(gbl);
        acc_creating_Panel.setLayout(gbl);
        GridBagConstraints c = new GridBagConstraints();
        c.weightx = 0;
        c.fill = GridBagConstraints.WEST;
        c.gridx = 0;
        c.gridy = 0;
        bill_creating_Panel.add(billnumber, c);
        acc_creating_Panel.add(accssignin, c);

        c.weightx = 1;
        c.gridx = 1;
        bill_creating_Panel.add(billnumberField, c);
        acc_creating_Panel.add(accssigninField, c);

        c.weightx = 0;
        c.gridx = 2;
        c.gridheight=2;
        bill_creating_Panel.add(createButton, c);
        acc_creating_Panel.add(signinButton, c);

        c.weightx=0;
        c.gridx = 0;
        c.gridy = 1;
        bill_creating_Panel.add(password, c);
        acc_creating_Panel.add(passrol, c);

        c.weightx = 1;
        c.gridx = 1;
        bill_creating_Panel.add(passwordField, c);
        acc_creating_Panel.add(passrolField, c);

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

        frame.add(bill_creating_Panel);
        

    }

    @Override
    public void actionPerformed(ActionEvent e) {
        if (e.getSource() == createButton) {
            Sozdat_Schet();
        } /*else (e.getSourse() == signinButton){
            signintoAcc();
        }*/
    }

    Socket s;
    DataOutputStream ds;
    InputStream is;
    OutputStream os;
    BufferedReader in;
    byte [] b;

    private void Sozdat_Schet() {
        String accountNumber = billnumberField.getText();
        String password = passwordField.getText();
    
        if (accountNumber.isEmpty() || password.isEmpty()) {
            System.out.println("Введите номер счета и пароль.");
            return;
        }
    
        try{
            s = new Socket("www.center.ogu ", 2000);
            is = s.getInputStream();
            ds = new DataOutputStream(s.getOutputStream());
            ds.writeBytes("create " + accountNumber + " " + password + "\n");
            b = new byte[2048];
            is.read(b,0,2048);
            System.out.println(new String(b));
            frame.add(acc_creating_Panel);
            frame.add(third_Panel);

        } catch (IOException e) {
            System.out.println("Ошибка подключения к серверу: " + e.getMessage());
            gettinField.setText("Ошибка подключения к серверу: " + e.getMessage());
        }
    }

    /*private void signintoAcc(){
    
    }*/
    
    public static void main(String[] args) {
        SwingUtilities.invokeLater(new Runnable() {
            public void run(){
                new lab6();
            }
        });
    }
}
