package com.ars.controller;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import com.ars.controller.*;
import com.ars.dao.*;
import com.ars.model.Payment;
import com.ars.model.User;

public class ScheduleEventServlet2 extends HttpServlet{

	private static final long serialVersionUID = 1L;

	public void doPost(HttpServletRequest request, HttpServletResponse response)  
			throws ServletException, IOException {  

		response.setContentType("text/html");  
		String viewType1=request.getParameter("viewType1");
		HttpSession session = request.getSession(false);
		String finalView="";
		RequestDispatcher rd=null;
		ScheduleEvent scheduleEvent = new ScheduleEvent();
		
		
		
	if(viewType1!=null && "scheduleevent2".equalsIgnoreCase(viewType1)) {
		try {
			Payment payment = new Payment();
		  payment.setId(request.getParameter("id"));
			
			payment.setStatus(request.getParameter("status"));
		
			
			
			
			
			
			if(!scheduleEvent.updateScheduleEvent(payment)) {
				request.setAttribute("errorMsg", "failed to Update Status of an Event. Please try again!");
			}else {
				request.setAttribute("errorMsg", "Updated Event Status Successfully!");
			}
			session.setAttribute("payment", payment);
		
			
		}catch(Exception e) {
			request.setAttribute("errorMsg", "Failed to update event status. Please try again!");
		}
		
			finalView="LVolunteerHome.jsp";
		}	
	if(viewType1!=null && "scheduleevent3".equalsIgnoreCase(viewType1)) {
		try {
			VolunteerProfileDao volunteerProfileDao = new VolunteerProfileDao();
			Payment payment = new Payment();
			
			
		  payment.setId(request.getParameter("id"));
			
			payment.setBVolunteer(request.getParameter("bvolunteer"));
		
			
			
			
			
			
			if(!scheduleEvent.updateScheduleEventv(payment)) {
				request.setAttribute("errorMsg", "failed to Add Volunteer. Please try again!");
			}else {
				request.setAttribute("errorMsg", "Added Volunteer Successfully!");
			}
			session.setAttribute("payment", payment);
		
			
		}catch(Exception e) {
			request.setAttribute("errorMsg", "Failed to Add Volunteer. Please try again!");
		}
		
			finalView="VolunteerHome.jsp";
		}	
	
		 rd=request.getRequestDispatcher(finalView);  
			rd.forward(request,response);
	}  
}  