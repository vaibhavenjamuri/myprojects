package com.ars.controller;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;


import com.ars.dao.DeleteAccountsDao;
import com.ars.model.Payment;
import com.ars.model.User;

public class DeleteRAccountServlet extends HttpServlet{

	private static final long serialVersionUID = 1L;

	public void doPost(HttpServletRequest request, HttpServletResponse response)  
			throws ServletException, IOException {  

		response.setContentType("text/html");  
		String viewType1=request.getParameter("viewType1");
		HttpSession session = request.getSession(false);
		String finalView="";
		RequestDispatcher rd=null;
		DeleteAccountsDao deleteAccountsDao = new DeleteAccountsDao();
		
	if(viewType1!=null && "RDelete".equalsIgnoreCase(viewType1)) {
		try {
			Payment payment = new Payment();
		
			
			 payment.setId(request.getParameter("id"));
		
			
			if(!deleteAccountsDao.deleteRAccount(payment)) {
				request.setAttribute("errorMsg", "failed to Delete Requestor Account. Please try again!");
			}else {
				request.setAttribute("errorMsg", "Deleted Successfully!");
			}
			session.setAttribute("payment", payment);
		}catch(Exception e) {
			request.setAttribute("errorMsg", "Failed to schedule event. Please try again!");
		}
		
			finalView="Account1.jsp";
		}	
		 rd=request.getRequestDispatcher(finalView);  
			rd.forward(request,response);
	}  
}  