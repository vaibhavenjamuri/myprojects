package com.ars.controller;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;


import com.ars.dao.ScheduleEvent;
import com.ars.model.Payment;
import com.ars.model.User;

public class ScheduleEventServlet1 extends HttpServlet{

	private static final long serialVersionUID = 1L;

	public void doPost(HttpServletRequest request, HttpServletResponse response)  
			throws ServletException, IOException {  

		response.setContentType("text/html");  
		String viewType1=request.getParameter("viewType1");
		HttpSession session = request.getSession(false);
		String finalView="";
		RequestDispatcher rd=null;
		ScheduleEvent scheduleEvent = new ScheduleEvent();
		
	if(viewType1!=null && "".equalsIgnoreCase(viewType1)) {
		try {
			Payment payment = new Payment();
		
			
			
			payment.setUniqueId9(request.getParameter("uniqueid9"));
			payment.setLVolunteer(request.getParameter("lvolunteer"));
		payment.setAddress1(request.getParameter("address1"));
			payment.setExpDate(request.getParameter("day")+"-"+request.getParameter("mm")+"-" + request.getParameter("yyyy"));
			payment.setStatus("Event Incomplete");
			payment.setUserType("Lead Volunteer");
			payment.setBVolunteer("-");
			
			if(!scheduleEvent.insertPaymentDetails1(payment)) {
				request.setAttribute("errorMsg", "failed to Schedule an Event. Please try again!");
			}else {
				request.setAttribute("errorMsg", "Event Scheduled Successfully!");
			}
			session.setAttribute("payment", payment);
		}catch(Exception e) {
			request.setAttribute("errorMsg", "Failed to schedule event. Please try again!");
		}
		
			finalView="scheduleevent.jsp";
		}	
		 rd=request.getRequestDispatcher(finalView);  
			rd.forward(request,response);
	}  
}  