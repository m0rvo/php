package lab6;
import java.net.*;
import java.io.*;

class workman extends Thread{
    Socket s;
  DataOutputStream ds;
  InputStream is;
  OutputStream os;
  byte b[];

  public workman (Socket x){
    super("Another workman");
    s = x;
  }
  public void run(){
      try{
      is = s.getInputStream();
      os = s.getOutputStream();
      ds = new DataOutputStream(os);
      b = new byte[2048];
      is.read(b,0,2048);
      String str = new String(b);
      System.out.println("Client send: "+str);
      ds.writeBytes("Hello friend, i have got your message\n");
       }
       catch(Exception e){
           System.out.println("error "+e.toString());
       }
   }
}

class ListForConection{
 ServerSocket ss;
 Socket s;
 public void startnow()throws Exception{
   ss = new ServerSocket(7000);
    while(true)   {
      s = ss.accept();
      System.out.println("Client connected......");
      new workman(s).start();
    }

  }

}


public class ServerConnect{
  public static void main (String s[])throws Exception{
     ListForConection lfc = new ListForConection();
     lfc.startnow();
  }
}