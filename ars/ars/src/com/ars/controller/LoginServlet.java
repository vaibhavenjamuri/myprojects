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
import com.ars.dao.ServicesDao;
import com.ars.model.Apartment;
import com.ars.model.User;

public class LoginServlet extends HttpServlet{

	private static final long serialVersionUID = 1L;

	public void doPost(HttpServletRequest request, HttpServletResponse response)  
			throws ServletException, IOException {  

		response.setContentType("text/html");  
		PrintWriter out = response.getWriter();  
		String viewType=request.getParameter("viewType");
		HttpSession session = request.getSession(false);
		if(viewType!=null && "login".equalsIgnoreCase(viewType)) {
		String n=request.getParameter("username");  
		String p=request.getParameter("userpass"); 
		
		
		if(session!=null)
		request.setAttribute("name", n);
		
		User user = LoginDao.validate(n, p);
		if(user!=null){  
			String userType = user.getUserType();
			session.setAttribute("username", n);
			session.setAttribute("user", user);
			if(!userType.isEmpty() && !("admin".equals(userType))) {
				ServicesDao servicesDao = new ServicesDao();
				if(user.getAptId()==0) {
					request.setAttribute("errorMsg", "No Reservations to display!");
				}else {
				Apartment apartment1 = servicesDao.getReservedApartmentDetails(user.getAptId());
				

				request.setAttribute("apartment1",apartment1);
				session.setAttribute("apartment1",apartment1);
				}	
			RequestDispatcher rd=request.getRequestDispatcher("home.jsp");  
			rd.forward(request,response);  
			}else if(!userType.isEmpty() && "admin".equals(userType)) {
				RequestDispatcher rd=request.getRequestDispatcher("addapartments.jsp");  
				rd.forward(request,response);  
				}
		}  
		else{  
			request.setAttribute("errorMsg", "Invalid username or password!");  
			RequestDispatcher rd=request.getRequestDispatcher("login.jsp");  
			rd.forward(request,response);  
		}  

		out.close();  
		}else if(viewType!=null && "logout".equalsIgnoreCase(viewType)) {
			if (session != null){
				session.invalidate();
				RequestDispatcher rd=request.getRequestDispatcher("index.jsp");  
				rd.forward(request,response);
			}
		}
	}  
}  