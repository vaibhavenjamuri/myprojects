package com.ars.controller;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;
import java.sql.Timestamp;
import java.sql.Date;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import com.ars.dao.VolunteerLoginDao;
import com.ars.dao.ServicesDao;
import com.ars.model.Apartment;
import com.ars.model.User;

import com.ars.model.Enquiry;

  
 public class UniqueIdServlet extends HttpServlet {
	 private static final long serialVersionUID = 1L;
	
     public void doPost(HttpServletRequest req, HttpServletResponse res) throws IOException, ServletException {
    	
    	 Connection conn = null;
    		
    		ResultSet rs = null;
    	
    		Statement stmt=null;
    		String url = "jdbc:mysql://localhost:3306/";
    		String dbName = "ars";
    		String driver = "com.mysql.jdbc.Driver";
    		String userName = "root";
    		String password = "admin";
    	 PrintWriter out = res.getWriter();
         res.setContentType("text/html");
         out.println("<html><body>");
       
         try {
        
        	 Class.forName(driver).newInstance();
 			conn = DriverManager
 					.getConnection(url + dbName, userName, password);

 PreparedStatement upd = conn.prepareStatement("select * from schedule_event");

 			
 			 rs = upd.executeQuery();
           
             while (rs.next()) {
                 String n = rs.getString("Address");
 
               
              String nm=req.getParameter("Suniqueid");
             
             
              if(nm.equals(n)){
                 out.println("<h3>The tree has planted</h3>"); 
             
              }
           
           
            
                           
              
                   
             
             }
             
            
             
             
           	 
            
             out.println("</body></html>");
             conn.close();
            }
             catch (Exception e) {
             out.println("error");
         }
     }
 }

