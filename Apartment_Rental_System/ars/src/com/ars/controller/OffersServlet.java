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

import com.ars.dao.OffersDao;
import com.ars.model.Flight;
import com.ars.model.Offer;

public class OffersServlet extends HttpServlet{

	private static final long serialVersionUID = 1L;

	public void doPost(HttpServletRequest request, HttpServletResponse response)  
			throws ServletException, IOException {  

		response.setContentType("text/html");  
		PrintWriter out = response.getWriter();  
		String viewType=request.getParameter("viewType");
		HttpSession session = request.getSession(false);
		String finalView="";
		RequestDispatcher rd=null;
		OffersDao offersDao = new OffersDao();
		
	if(viewType!=null && "addoffer".equalsIgnoreCase(viewType)) {
		try {
			Offer offer = new Offer();
			offer.setOfferName(request.getParameter("offername"));
			offer.setDiscount(Float.valueOf(request.getParameter("discount")));
			offer.setValidity(request.getParameter("month")+"-"+request.getParameter("date")+"-"+ request.getParameter("year"));
			offer.setSource(request.getParameter("source"));
			offer.setDestination(request.getParameter("destination"));
			
			if(!offersDao.insertOfferDetails(offer)) {
				request.setAttribute("errorMsg", "Failed to insert offer details. Please try again!");
			}else {
				request.setAttribute("errorMsg", "New Offer Details Added Successfully!");
			}
		}catch(Exception e) {
			request.setAttribute("errorMsg", "Failed to insert offer details. Please try again!");
		}
		
			finalView="addoffers.jsp";
		}else if(viewType!=null && ("editoffer".equalsIgnoreCase(viewType) || "deleteoffer".equalsIgnoreCase(viewType))) {
			
			String searchString =request.getParameter("offername");
			Offer offer = new Offer();
			if(!searchString.isEmpty()) {
				offer.setOfferName(searchString.trim());
			}
			List<Offer> offersList = offersDao.getOfferDetails(offer);
			
			if(offersList.size()==0) {
				request.setAttribute("errorMsg", "No Offers to display!");
			}
			request.setAttribute("offersList",offersList);
			session.setAttribute("offersList",offersList);
			if("editoffer".equalsIgnoreCase(viewType)) {
			finalView="modifyoffers.jsp";
			}else {
				finalView="deleteoffers.jsp";
			}
			
		}else if(viewType!=null && ("editofferdetails".equalsIgnoreCase(viewType))) {
			List<Offer> list = (List<Offer>) session.getAttribute("offersList");
			int offerId =Integer.valueOf(request.getParameter("selectedoffer"));
			for(Offer item : list) {
				if(item.getOfferId()==offerId) {
					request.setAttribute("offer", item);
					if("editofferdetails".equalsIgnoreCase(viewType)) {
					request.setAttribute("mode", "edit");
					}else {
						request.setAttribute("mode", "delete");
					}
					break;
				}
			}			
			finalView="addoffers.jsp";
		}else if(viewType!=null && "updateoffer".equalsIgnoreCase(viewType)) {
			Offer offer = new Offer();
			
			offer.setOfferId(Integer.valueOf(request.getParameter("offerid")));
			offer.setOfferName(request.getParameter("offername"));
			offer.setDiscount(Float.valueOf(request.getParameter("discount")));
			offer.setValidity(request.getParameter("month")+"-"+request.getParameter("date")+"-"+ request.getParameter("year"));
			offer.setSource(request.getParameter("source"));
			offer.setDestination(request.getParameter("destination"));
			
			try {
				if(!offersDao.updateOfferDetails(offer)) {
					request.setAttribute("errorMsg", "Failed to update offer details. Please try again!");
				}else {
					request.setAttribute("errorMsg", "Offer Details Updated Successfully!");
				}
			}catch(Exception e) {
				request.setAttribute("errorMsg", "Failed to update offer details. Please try again!");
			}
			finalView="addoffers.jsp";
		}else if(viewType!=null && "editpassengers".equalsIgnoreCase(viewType)) {
			finalView="viewenquiries.jsp";
		}else if(viewType!=null && "deleteofferdetails".equalsIgnoreCase(viewType)) {
			Offer offer = new Offer();
			offer.setOfferId(Integer.valueOf(request.getParameter("selectedoffer")));
					
			try {
				if(!offersDao.deleteOfferDetails(offer)) {
					request.setAttribute("errorMsg", "Failed to delete offer details. Please try again!");
				}else {
					request.setAttribute("errorMsg", "Offer Details Deleted Successfully!");
				}
			}catch(Exception e) {
				request.setAttribute("errorMsg", "Failed to delete offer details. Please try again!");
			}
			
			finalView="addoffers.jsp";
		}else if(viewType!=null && "viewoffers".equalsIgnoreCase(viewType)) {
			List<Offer> offersList = offersDao.getOfferDetails(new Offer());
			
			if(offersList.size()==0) {
				request.setAttribute("errorMsg", "No Offers to display!");
			}
			request.setAttribute("offersList",offersList);
			session.setAttribute("offersList",offersList);
			finalView="offers.jsp";
		}
		
		
		 rd=request.getRequestDispatcher(finalView);  
			rd.forward(request,response);
	}  
}  