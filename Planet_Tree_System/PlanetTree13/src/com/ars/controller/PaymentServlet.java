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


import com.ars.dao.PaymentDao;
import com.ars.model.Enquiry;
import com.ars.model.Payment;
import com.ars.model.User;

public class PaymentServlet extends HttpServlet{

	private static final long serialVersionUID = 1L;

	public void doPost(HttpServletRequest request, HttpServletResponse response)  
			throws ServletException, IOException {  

		response.setContentType("text/html");  
		String viewType=request.getParameter("viewType");
		HttpSession session = request.getSession(false);
		String finalView="";
		RequestDispatcher rd=null;
		PaymentDao paymentDao = new PaymentDao();
		
	if(viewType!=null && "Contributor".equalsIgnoreCase(viewType)) {
		try {
			Payment payment = new Payment();
			List<Payment> list = (List<Payment>) session.getAttribute("paymentList");
		payment.setUserName(request.getParameter("user_name"));
			
			payment.setNoOfRedMaple(Integer.parseInt(request.getParameter("noOfRedMaple")));
			payment.setNoOfSugarMaple(Integer.parseInt(request.getParameter("noOfSugarMaple")));
			payment.setNoOfRiverBirch(Integer.parseInt(request.getParameter("noOfRiverBirch")));
			payment.setNoOfCatalpa(Integer.parseInt(request.getParameter("noOfCatalpa")));
			payment.setRMUniqueId1(request.getParameter("rmuniqueid1")+" " +request.getParameter("rmuniqueid2")+" "+request.getParameter("rmuniqueid3")+" " +request.getParameter("rmuniqueid4")
			+" "+request.getParameter("smuniqueid1")+" " +request.getParameter("smuniqueid2")+" "+request.getParameter("smuniqueid3")+" " +request.getParameter("smuniqueid4")
			+" "+request.getParameter("rbuniqueid1")+" " +request.getParameter("rbuniqueid2")+" "+request.getParameter("rbuniqueid3")+" " +request.getParameter("rbuniqueid4")
			+" "+request.getParameter("cauniqueid1")+" " +request.getParameter("cauniqueid2")+" "+request.getParameter("cauniqueid3")+" " +request.getParameter("cauniqueid4"));
			payment.setTotal(Integer.parseInt(request.getParameter("Total")));
			payment.setCardNumber(request.getParameter("cardno"));
			payment.setCardType(request.getParameter("cardtype"));
			payment.setExpDate(request.getParameter("expmm")+"-" + request.getParameter("expyyyy"));
			payment.setCvv(request.getParameter("cvv"));
			payment.setBillAdd(request.getParameter("billAdd"));
			payment.setUserType("Contributor");
			
			if(!paymentDao.insertPaymentDetails(payment)) {
				request.setAttribute("errorMsg", "Failed to make contribution. Please try again!");
			}else {
				request.setAttribute("errorMsg", "Contributed Successfully!");
			}
			session.setAttribute("payment", payment);
		}catch(Exception e) {
			request.setAttribute("errorMsg", "Failed to make payment. Please try again!");
		}
		
			finalView="Contributor.jsp";
		}	
		 rd=request.getRequestDispatcher(finalView);  
			rd.forward(request,response);
	}  
}  