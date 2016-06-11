package com.ars.controller;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;


import com.ars.dao.PaymentDao;
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
		
	if(viewType!=null && "paybill".equalsIgnoreCase(viewType)) {
		try {
			Payment payment = new Payment();
			User user = (User)session.getAttribute("user");
			payment.setUserName(user.getUserName());
			payment.setType("");
			payment.setAmount(Float.valueOf(request.getParameter("payment")));
			payment.setMonth(request.getParameter("mon"));
			payment.setYear(request.getParameter("yyyy"));
			payment.setCardNumber(request.getParameter("cardno"));
			payment.setCardType(request.getParameter("cardtype"));
			payment.setExpDate(request.getParameter("expmm")+"-" + request.getParameter("yyyy"));
			payment.setCvv(request.getParameter("cvv"));
			
			if(!paymentDao.insertPaymentDetails(payment)) {
				request.setAttribute("errorMsg", "Failed to make payment. Please try again!");
			}else {
				request.setAttribute("errorMsg", "Rent Paid Successfully!");
			}
			session.setAttribute("payment", payment);
		}catch(Exception e) {
			request.setAttribute("errorMsg", "Failed to make payment. Please try again!");
		}
		
			finalView="paybill.jsp";
		}	
		 rd=request.getRequestDispatcher(finalView);  
			rd.forward(request,response);
	}  
}  