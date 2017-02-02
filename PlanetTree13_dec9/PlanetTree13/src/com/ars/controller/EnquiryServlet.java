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

import com.ars.dao.EnquiryDao;
import com.ars.model.Enquiry;


public class EnquiryServlet extends HttpServlet{

	private static final long serialVersionUID = 1L;

	public void doPost(HttpServletRequest request, HttpServletResponse response)  
			throws ServletException, IOException, NumberFormatException {  

		response.setContentType("text/html");  
		PrintWriter out = response.getWriter();  
		String viewType=request.getParameter("viewType");
		HttpSession session = request.getSession(false);
		String finalView="";
		RequestDispatcher rd=null;
		EnquiryDao enquiryDao = new EnquiryDao();
		if(viewType!=null && "enquirysubmit".equalsIgnoreCase(viewType)) {
			Enquiry enquiry = new Enquiry();
			enquiry.setName(request.getParameter("custname"));
			enquiry.setEmailId(request.getParameter("emailid"));
			enquiry.setMessage(request.getParameter("message"));
			enquiry.setStatus("open");
			
			enquiry.setAddress1(request.getParameter("Address1"));
			enquiry.setSpecies(request.getParameter("Species"));
			enquiry.setNoTrees(Integer.parseInt(request.getParameter("NoTrees")));
			
			try {
				if(!enquiryDao.insertEnquiryDetails(enquiry)) {
					request.setAttribute("errorMsg", "Failed to post Request. Please try again!");
				}else {
					request.setAttribute("errorMsg", "Request posted successfully. Please wait for 1-2 business days to recieve response!");
				}
				
			}catch(Exception e) {
				request.setAttribute("errorMsg", "Failed to post enquiry. Please try again!");
			}
			finalView="services.jsp";
		}else if(viewType!=null && ("enquiryhome".equalsIgnoreCase(viewType))) {
			
			String searchString =request.getParameter("servicetype");
			Enquiry enquiry = new Enquiry();
			if(searchString!=null && !searchString.isEmpty()) {
				enquiry.setServiceType(searchString.trim());
			}
			List<Enquiry> enquiryList = enquiryDao.getEnquiryDetails(enquiry);
			
			if(enquiryList.size()==0) {
				request.setAttribute("errorMsg", "No enquiries to display!");
			}
			request.setAttribute("enquiryList",enquiryList);
			session.setAttribute("enquiryList",enquiryList);
			
				finalView="viewenquiries.jsp";			
		}else if(viewType!=null && ("editenquirydetails".equalsIgnoreCase(viewType))) {
			List<Enquiry> list = (List<Enquiry>) session.getAttribute("enquiryList");
			int id =Integer.valueOf(request.getParameter("selectedenquiry"));
			for(Enquiry item : list) {
				if(item.getId()==id) {
					request.setAttribute("enquiry", item);
					request.setAttribute("mode", "edit");
					break;
				}
			}			
			finalView="updateenquiries.jsp";
		}else if(viewType!=null && "updateenquiry".equalsIgnoreCase(viewType)) {
			Enquiry enquiry = new Enquiry();
			
			enquiry.setName(request.getParameter("custname"));
			enquiry.setEmailId(request.getParameter("emailid"));
			
			enquiry.setMessage(request.getParameter("message"));
			enquiry.setResponse(request.getParameter("response"));
			enquiry.setStatus(request.getParameter("status"));
			enquiry.setAddress1(request.getParameter("Address1"));
			
			try {
				if(!enquiryDao.updateEnquiryDetails(enquiry)) {
					request.setAttribute("errorMsg", "Failed to update enquiry details. Please try again!");
				}else {
					request.setAttribute("errorMsg", "Enquiry details updated successfully!");
				}
				
			}catch(Exception e) {
				request.setAttribute("errorMsg", "Failed to update enquiry details. Please try again!");
			}
			finalView="updateenquiries.jsp";
		}
		
		
		 rd=request.getRequestDispatcher(finalView);  
			rd.forward(request,response);
	}  
}  