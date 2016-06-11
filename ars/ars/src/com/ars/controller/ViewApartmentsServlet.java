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

import com.ars.dao.ApartmentsDao;
import com.ars.model.Apartment;
import com.ars.model.Flight;

public class ViewApartmentsServlet extends HttpServlet{

	private static final long serialVersionUID = 1L;

	public void doPost(HttpServletRequest request, HttpServletResponse response)  
			throws ServletException, IOException {  

		response.setContentType("text/html");  
		PrintWriter out = response.getWriter();  
		String viewType=request.getParameter("viewType");
		HttpSession session = request.getSession(false);
		String finalView="";
		RequestDispatcher rd=null;
		ApartmentsDao apartmentsDao = new ApartmentsDao();
	
		if(viewType!=null && ("editapartment".equalsIgnoreCase(viewType) || "deleteapartment".equalsIgnoreCase(viewType))) {
			
			String searchString =request.getParameter("apartmentname");
			Apartment apartment = new Apartment();
			if(searchString!=null && !searchString.isEmpty()) {
				apartment.setAptNo(searchString.trim());
				apartment.setFlatNo(searchString);
			}
			List<Apartment> apartmentsList = apartmentsDao.getApartmentDetails(apartment);
			
			if(apartmentsList.size()==0) {
				request.setAttribute("errorMsg", "No Apartments to display!");
			}
			request.setAttribute("apartmentsList",apartmentsList);
			session.setAttribute("apartmentsList",apartmentsList);
			if("editapartment".equalsIgnoreCase(viewType)) {
			finalView="modifyapartments.jsp";
			}else {
				finalView="deleteapartments.jsp";
			}
			
		}else if(viewType!=null && ("editapartmentdetails".equalsIgnoreCase(viewType))) {
			List<Apartment> list = (List<Apartment>) session.getAttribute("apartmentsList");
			int apartmentCode =Integer.valueOf(request.getParameter("selectedapartment"));
			for(Apartment item : list) {
				if(item.getAptId()==apartmentCode) {
					request.setAttribute("apartment", item);
					if("editapartmentdetails".equalsIgnoreCase(viewType)) {
					request.setAttribute("mode", "edit");
					}else {
						request.setAttribute("mode", "delete");
					}
					break;
				}
			}			
			finalView="addapartments.jsp";
		}else if(viewType!=null && "updateapartment".equalsIgnoreCase(viewType)) {
Apartment apartment = new Apartment();
			apartment.setAptId(Integer.valueOf(request.getParameter("apartmentcode")));
			apartment.setAptNo(request.getParameter("aptname"));
			apartment.setFlatNo(request.getParameter("flatname"));
			apartment.setFlatType(request.getParameter("flattype"));
			apartment.setBedrooms(Integer.valueOf(request.getParameter("bedrooms")));
			apartment.setBathrooms(Integer.valueOf(request.getParameter("bathrooms")));
			apartment.setMaxPersons(Integer.valueOf(request.getParameter("maxpersons")));
			apartment.setRent(Float.valueOf(request.getParameter("rent")));
			apartment.setOtherCharges(Float.valueOf(request.getParameter("othercharges")));
			apartment.setAdvance(request.getParameter("deposit"));
			apartment.setBond(request.getParameter("agreement"));
			apartment.setAmenities(new StringBuffer(request.getParameter("selectedamenities")));
			apartment.setStatus(request.getParameter("status"));
			apartment.setLocation(request.getParameter("location"));
			apartment.setCity(request.getParameter("city"));
			apartment.setState(request.getParameter("state"));
			apartment.setDescription(request.getParameter("description"));
			
			try {
				if(!apartmentsDao.updateApartmentDetails(apartment)) {
					request.setAttribute("errorMsg", "Failed to update apartment details. Please try again!");
				}else {
					request.setAttribute("errorMsg", "Apartment Details Updated Successfully!");
				}
			}catch(Exception e) {
				request.setAttribute("errorMsg", "Failed to update apartment details. Please try again!");
			}
			finalView="addapartments.jsp";
		}else if(viewType!=null && "deleteapartmentdetails".equalsIgnoreCase(viewType)) {
			Apartment apartment = new Apartment();
			apartment.setAptId(Integer.valueOf(request.getParameter("selectedapartment")));
					
			try {
				if(!apartmentsDao.deleteApartmentDetails(apartment)) {
					request.setAttribute("errorMsg", "Failed to delete apartment details. Please try again!");
				}else {
					request.setAttribute("errorMsg", "Apartment Details Deleted Successfully!");
				}
			}catch(Exception e) {
				request.setAttribute("errorMsg", "Failed to  delete apartment  details. Please try again!");
			}
			
			finalView="addapartments.jsp";
		}else if(viewType!=null && "addapartment".equalsIgnoreCase(viewType)) {
			
			Apartment apartment = new Apartment();
			
			apartment.setAptNo(request.getParameter("aptname"));
			apartment.setFlatNo(request.getParameter("flatname"));
			apartment.setFlatType(request.getParameter("flattype"));
			apartment.setBedrooms(Integer.valueOf(request.getParameter("bedrooms")));
			apartment.setBathrooms(Integer.valueOf(request.getParameter("bathrooms")));
			apartment.setMaxPersons(Integer.valueOf(request.getParameter("maxpersons")));
			apartment.setRent(Float.valueOf(request.getParameter("rent")));
			apartment.setOtherCharges(Float.valueOf(request.getParameter("othercharges")));
			apartment.setAdvance(request.getParameter("deposit"));
			apartment.setBond(request.getParameter("agreement"));
			apartment.setAmenities(new StringBuffer(request.getParameter("selectedamenities")));
			apartment.setStatus(request.getParameter("status"));
			apartment.setLocation(request.getParameter("location"));
			apartment.setCity(request.getParameter("city"));
			apartment.setState(request.getParameter("state"));
			apartment.setDescription(request.getParameter("description"));
			try {
				if(!apartmentsDao.insertApartmentDetails(apartment)) {
					request.setAttribute("errorMsg", "Failed to insert apartment details. Please try again!");
				}else {
					request.setAttribute("errorMsg", "New Apartment Details Added Successfully!");
				}
			}catch(Exception e) {
				request.setAttribute("errorMsg", "Failed to insert apartment details. Please try again!");
			}
			
			finalView="addapartments.jsp";
		}
		
		
		 rd=request.getRequestDispatcher(finalView);  
			rd.forward(request,response);
	}  
}  