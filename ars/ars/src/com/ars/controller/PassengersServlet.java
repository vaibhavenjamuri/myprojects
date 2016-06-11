package com.ars.controller;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import com.ars.dao.LoginDao;
import com.ars.model.User;

public class PassengersServlet extends HttpServlet{

	private static final long serialVersionUID = 1L;

	public void doPost(HttpServletRequest request, HttpServletResponse response)  
			throws ServletException, IOException {  

		response.setContentType("text/html");  
		PrintWriter out = response.getWriter();  
		String viewType=request.getParameter("viewType");
		HttpSession session = request.getSession(false);
		String finalView="";
		RequestDispatcher rd=null;
		
		if(viewType!=null && "viewhome".equalsIgnoreCase(viewType)) {
		
		String n=request.getParameter("username");  
		String p=request.getParameter("userpass"); 
		
		User user = LoginDao.validate(n, p);
		if(user!=null){  
			finalView="contactus.jsp";
			
		}  
		else{  
			out.print("<p style=\"color:red\">Sorry username or password error</p>");  
			finalView="contactus.jsp"; 
		}  

		out.close();  
		}else if(viewType!=null && "viewpassengers".equalsIgnoreCase(viewType)) {
			finalView="contactus.jsp";
		}else if(viewType!=null && "editpassengers".equalsIgnoreCase(viewType)) {
			finalView="viewenquiries.jsp";
		}else if(viewType!=null && "deletepassengers".equalsIgnoreCase(viewType)) {
			finalView="viewenquiries.jsp";
		}
		
		
		 rd=request.getRequestDispatcher(finalView);  
			rd.forward(request,response);
	}  
}  