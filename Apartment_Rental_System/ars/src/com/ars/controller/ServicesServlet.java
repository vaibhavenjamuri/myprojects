package com.ars.controller;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.List;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import com.ars.dao.LoginDao;
import com.ars.dao.ProfileDao;
import com.ars.dao.ServicesDao;
import com.ars.model.Apartment;
import com.ars.model.Ticket;
import com.ars.model.User;
import com.ars.model.Visit;

public class ServicesServlet extends HttpServlet{

	private static final long serialVersionUID = 1L;

	public void doPost(HttpServletRequest request, HttpServletResponse response)  
			throws ServletException, IOException {  

		response.setContentType("text/html");  
		PrintWriter out = response.getWriter();  
		String viewType=request.getParameter("viewType");
		HttpSession session = request.getSession(false);
		String finalView="";
		RequestDispatcher rd=null;
		ServicesDao servicesDao = new ServicesDao();
		
		if(viewType!=null && "serviceshome".equalsIgnoreCase(viewType)) {
		
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
		}else if(viewType!=null && ("editvisitdetails".equalsIgnoreCase(viewType))) {
			List<Visit> list = (List<Visit>) session.getAttribute("visitsList");
			int visitId =Integer.valueOf(request.getParameter("selectedvisit"));
			for(Visit item : list) {
				if(item.getAptId()==visitId) {
					request.setAttribute("visit", item);
					if("editvisitdetails".equalsIgnoreCase(viewType)) {
					request.setAttribute("mode", "edit");
					}else {
						request.setAttribute("mode", "delete");
					}
					break;
				}
			}			
			finalView="addvisit.jsp";
		}else if(viewType!=null && "updatevisit".equalsIgnoreCase(viewType)) {
			Visit visit = new Visit();
			visit.setVisitId(Integer.valueOf(request.getParameter("selectedvisit")));
			visit.setVisitDate(request.getParameter("visitdate"));
			visit.setVisitTime(request.getParameter("visittime"));
			
			
			try {
				if(!servicesDao.updateVisitDetails(visit)) {
					request.setAttribute("errorMsg", "Failed to update visit details. Please try again!");
				}else {
					request.setAttribute("errorMsg", "Visit Details Updated Successfully!");
				}
			}catch(Exception e) {
				request.setAttribute("errorMsg", "Failed to update visit details. Please try again!");
			}
			finalView="addvisit.jsp";
		}else if(viewType!=null && "deletevisitdetails".equalsIgnoreCase(viewType)) {
			Visit visit = new Visit();
			visit.setVisitId(Integer.valueOf(request.getParameter("selectedvisit")));
			String userName =  (String) session.getAttribute("username");
			visit.setUserName(userName);
			try {
				if(!servicesDao.deleteVisitDetails(visit)) {
					request.setAttribute("errorMsg", "Failed to visit apartment details. Please try again!");
				}else {
					request.setAttribute("errorMsg", "Visit Details Deleted Successfully!");
				}
			}catch(Exception e) {
				request.setAttribute("errorMsg", "Failed to delete visit  details. Please try again!");
			}
			
			List<Visit> visitsList = servicesDao.getVisitDetails(userName);
			
			request.setAttribute("visitsList",visitsList);
			session.setAttribute("visitsList",visitsList);
			
			finalView="viewvisits.jsp";
		}else if(viewType!=null && "viewvisits".equalsIgnoreCase(viewType)) {
			String userName =  (String) session.getAttribute("username");
			List<Visit> visitsList = servicesDao.getVisitDetails(userName);
			
			if(visitsList.size()==0) {
				request.setAttribute("errorMsg", "No Visit details to display!");
			}
			request.setAttribute("visitsList",visitsList);
			session.setAttribute("visitsList",visitsList);
			
			finalView="viewvisits.jsp";
		}else if(viewType!=null && "viewticketwithoutuser".equalsIgnoreCase(viewType)) {
			String pnr =  request.getParameter("pnr");
			Ticket ticket = servicesDao.getTicketDetail(pnr);
			
			if(ticket==null) {
				request.setAttribute("errorMsg", "No Tickets to display!");
			}else {
			request.setAttribute("ticket",ticket);
			}
			finalView="services.jsp";
		}else if(viewType!=null && "viewapartments".equalsIgnoreCase(viewType)) {
			request.setAttribute("mode","user");
			finalView="viewapartmentsuser.jsp";
		}else if(viewType!=null && "searchapartments".equalsIgnoreCase(viewType)) {
			Apartment apartment = new Apartment();
			apartment.setFlatType(request.getParameter("flattype"));
			apartment.setBedrooms(Integer.valueOf(request.getParameter("bedrooms")));
			apartment.setBathrooms(Integer.valueOf(request.getParameter("bathrooms")));
			
			if(request.getParameter("to")!=null) {
				apartment.setToRent(Float.valueOf(request.getParameter("to")));
			}
			
			if(request.getParameter("from")!=null) {
				apartment.setFromRent(Float.valueOf(request.getParameter("from")));
			}
			
			if(request.getParameter("location")!=null) {
				apartment.setLocation(request.getParameter("location"));
			}
			
			if(request.getParameter("city")!=null) {
				apartment.setCity(request.getParameter("city"));
			}
			
			if(request.getParameter("state")!=null) {
				apartment.setState(request.getParameter("state"));
			}
			User user = (User) session.getAttribute("user");
			List<Apartment> apartmentsList = servicesDao.getApartmentDetails(apartment);
			
			if(apartmentsList.size()==0) {
				request.setAttribute("errorMsg", "No Apartments to display!");
			}
			request.setAttribute("apartmentsList",apartmentsList);
			session.setAttribute("apartmentsList",apartmentsList);
			
			request.setAttribute("apartment1", apartment);
			request.setAttribute("results", apartmentsList.size());
			
			if(user==null) {
			finalView="viewapartments.jsp";
			}else {
				finalView="viewapartmentswithuser.jsp";
			}
		}else if(viewType!=null && ("visit".equalsIgnoreCase(viewType) || "reserve".equalsIgnoreCase(viewType))) {
			
			List<Apartment> list = (List<Apartment>) session.getAttribute("apartmentsList");
			int aptId =Integer.valueOf(request.getParameter("aptid"));
			User user = (User) session.getAttribute("user");
			for(Apartment item : list) {
				if(item.getAptId()==aptId) {
					request.setAttribute("apartment1", item);
					session.setAttribute("apartment1", item);
					break;
				}
			}
			if("visit".equalsIgnoreCase(viewType)) {
			finalView="addvisit.jsp";
			}else {
				finalView="addreservation.jsp";
			}
		}else if(viewType!=null && "confirmreserve".equalsIgnoreCase(viewType)) {
			User user = (User) session.getAttribute("user");
			Apartment apartment = (Apartment) session.getAttribute("apartment1");
			if(user.getAptId()==0) {
			user.setPayment(Float.valueOf(request.getParameter("payment")));
			user.setCardNumber(request.getParameter("cardno"));
			user.setCardType(request.getParameter("cardtype"));
			user.setCvv(request.getParameter("cvv"));
			user.setAptId(apartment.getAptId());
			user.setExpDate(request.getParameter("expmm")+"-"+request.getParameter("expyyyy"));
			user.setCheckinDate(request.getParameter("yyyy").toString().trim()+ "-"+ request.getParameter("mon").toString().trim()+"-"+request.getParameter("dd").toString().trim());
			try {
				User user1 = null;
				if(!servicesDao.updateReservationDetails(user)) {
					request.setAttribute("errorMsg", "Failed to update Reservation Details. Please try again!");
				}else {
				request.setAttribute("errorMsg", "Reservation Details updated Successfully.");
				ProfileDao profileDao = new ProfileDao();
				user1 = profileDao.getProfileDetails(user.getUserName());
				}
					request.setAttribute("user",user1);
					session.setAttribute("user",user1);
			
				
			}catch(Exception e) {
				request.setAttribute("errorMsg", "Failed to update profile. Please try again!");
			}
			}else {
				request.setAttribute("errorMsg", "Cannot make more than one reservation. Please delete existing reservation to make a new one!");
			}
			finalView="home.jsp";
		}else if(viewType!=null && "visitconfirm".equalsIgnoreCase(viewType)) {
			
			Apartment apartment = (Apartment) session.getAttribute("apartment1");
			User user = (User) session.getAttribute("user");
			Visit visit = new Visit();
			
			visit.setVisitDate(request.getParameter("yyyy").toString().trim()+ "-"+ request.getParameter("mon").toString().trim()+"-"+request.getParameter("dd").toString().trim());
			visit.setVisitTime(request.getParameter("hh").toString().trim()+":" + request.getParameter("mm").toString().trim());
			visit.setAptId(apartment.getAptId());
			visit.setUserName(user.getUserName());
			visit.setStatus("1");
			visit.setReserved("");
			visit.setCheckinDate("");
			
				finalView="viewapartmentsuser.jsp";	
			
			
			
			if(!servicesDao.insertVisitDetails(visit)) {
				request.setAttribute("errorMsg", "Failed to insert visit details. Please try again later!");
			}else {
				request.setAttribute("errorMsg", "Visit confirmed Successfully. Please check details in View Visits Tab!");
			}
			
			session.setAttribute("visit", visit);
		}else if(viewType!=null && "services".equalsIgnoreCase(viewType)) {
			finalView="services.jsp";
		}

		
		
		 rd=request.getRequestDispatcher(finalView);  
			rd.forward(request,response);
	}  
}  