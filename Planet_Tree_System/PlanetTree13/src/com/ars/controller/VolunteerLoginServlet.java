package com.ars.controller;

import java.io.IOException;
import java.io.PrintWriter;

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

public class VolunteerLoginServlet extends HttpServlet{

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
		
		User user2 = VolunteerLoginDao.validate(n, p);
		if(user2!=null){  
			String userType = user2.getUserType();
			session.setAttribute("username", n);
			session.setAttribute("user", user2);
			if(!userType.isEmpty() && "Volunteer".equals(userType)) {
				ServicesDao servicesDao = new ServicesDao();
				if(user2.getAptId()==0) {
					request.setAttribute("errorMsg", " ");
				}else {
				Apartment apartment1 = servicesDao.getReservedApartmentDetails(user2.getAptId());
				

				request.setAttribute("apartment1",apartment1);
				session.setAttribute("apartment1",apartment1);
				}	
			RequestDispatcher rd=request.getRequestDispatcher("VolunteerHome.jsp");  
			rd.forward(request,response);  
			}else if(!userType.isEmpty() && !("admin".equals(userType))) {
				request.setAttribute("errorMsg", "Invalid username or password!");  
				RequestDispatcher rd=request.getRequestDispatcher("VolunteerLogin.jsp");  
				rd.forward(request,response);  
				}
		}  
		else{  
			request.setAttribute("errorMsg", "Invalid username or password!");  
			RequestDispatcher rd=request.getRequestDispatcher("VolunteerLogin.jsp");  
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