package lab6;

import java.net.*;
import java.io.*;

class GetConnected {
   Socket s;
   DataOutputStream ds;
   InputStream is;
   OutputStream os;
   byte b[];
   public void startnow()throws Exception {
      s = new Socket("www.center.ogu",2000);
      is = s.getInputStream();
      os = s.getOutputStream();
      ds = new DataOutputStream(os);
      ds.writeBytes("GET / HTTP/1.0\n\n");
      b = new byte[2048];
      is.read(b,0,2048);
      System.out.println(new String(b));
   }
}

public class Connect{
   public static void main(String s[])throws Exception{
      GetConnected gc = new GetConnected();
      gc.startnow();
   }
}