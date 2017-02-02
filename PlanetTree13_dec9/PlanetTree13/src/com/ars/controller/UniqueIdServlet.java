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


import com.ars.model.Apartment;
import com.ars.model.User;

import com.ars.model.Enquiry;

  
 public class UniqueIdServlet extends HttpServlet {
	 private static final long serialVersionUID = 1L;
	
     public void doPost(HttpServletRequest req, HttpServletResponse res) throws IOException, ServletException {
    	
    	 Connection conn = null;
    		
    		ResultSet rs = null;
    	String nm = null;
    	String n=null;
    	String m=null;
    	
    	
    		Statement stmt=null;
    		String url = "jdbc:mysql://localhost:3306/";
    		String dbName = "ars";
    		String driver = "com.mysql.jdbc.Driver";
    		String userName = "root";
    		String password = "admin";
    	 PrintWriter out = res.getWriter();
       
       
         try {
        
        	 Class.forName(driver).newInstance();
 			conn = DriverManager
 					.getConnection(url + dbName, userName, password);

 PreparedStatement upd = conn.prepareStatement("select * from schedule_event where status='Event Completed'");

 			
 			 rs = upd.executeQuery();
           
             while (rs.next()) {
                  n = rs.getString("UniqueId");
 
               
               nm=req.getParameter("Suniqueid");
              
               if(nm!=null&&!nm.isEmpty())
               {
              if(n.contains(nm)){
            	  req.setAttribute("errMsg", "The Tree with UniqueId "+nm+" is Planted!");  
            	  RequestDispatcher rd=req.getRequestDispatcher("Contributor.jsp"); 
            	  rd.forward(req,res); 
              }
              
            	  /*out.println("The Tree with UniqueId "+nm+" is Planted");
             
              if(nm.equals(a) || nm.equals(b)||nm.equals(c)||nm.equals(d)){
                   out.println("<h3>The tree has planted</h3>"); */
                   
              
              
              else if(!n.contains(nm))
            	  req.setAttribute("errMsg", "The Tree with UniqueId "+nm+" is yet to be Planted!");  
            	  RequestDispatcher rd=req.getRequestDispatcher("Contributor.jsp"); 
            	  rd.forward(req,res); 
              }
        
             
              else 
            	  req.setAttribute("errMsg", "Enter UniqueId to search!");  
            	  RequestDispatcher rd=req.getRequestDispatcher("Contributor.jsp"); 
            	  rd.forward(req,res); 
             
               
             
             }
             
             
         
            
           
             conn.close();
             
            }
             catch (Exception e) {
             out.println("error");
         }
      
        
     }
 }

