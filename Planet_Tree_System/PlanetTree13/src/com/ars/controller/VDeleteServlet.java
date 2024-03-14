package com.ars.controller;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;

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

  
 public class VDeleteServlet extends HttpServlet {
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
 stmt = conn.createStatement();
           rs = stmt.executeQuery("delete from volunteer_login v where v.user_name=");

           out.println("<form method='post' action='VDelete.jsp'>");
             out.println("<table border=1>");
             out.println("<tr><th>Name</th><th>EmailId</th><th>Action</th><tr>");
             while (rs.next()) {
                 String n = rs.getString("user_name");
                 String nm = rs.getString("email_id");
                 
              
                 out.println("<tr><td>" + n + "</td><td>" + nm + "</td><td><input type='Submit' value='Delete'/></td></tr>"); 
             }
             out.println("</table>");
             out.println("</form></body></html>");
             conn.close();
            }
             catch (Exception e) {
             out.println("error");
         }
     }
 }

