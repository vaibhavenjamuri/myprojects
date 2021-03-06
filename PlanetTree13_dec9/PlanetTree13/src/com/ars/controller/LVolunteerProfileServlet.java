package com.ars.controller;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import com.ars.dao.LoginDao;
import com.ars.dao.VolunteerProfileDao;
import com.ars.model.User;

public class LVolunteerProfileServlet extends HttpServlet{

	private static final long serialVersionUID = 1L;

	public void doPost(HttpServletRequest request, HttpServletResponse response)  
			throws ServletException, IOException {  

		response.setContentType("text/html");  
		PrintWriter out = response.getWriter();  
		String viewType=request.getParameter("viewType");
		HttpSession session = request.getSession(false);
		String finalView="";
		RequestDispatcher rd=null;
		VolunteerProfileDao volunteerProfileDao = new VolunteerProfileDao();
		
	 if(viewType!=null && "register".equalsIgnoreCase(viewType)) {
			User user = new User();
			user.setUserName(request.getParameter("username")); 
			user.setNewPass(request.getParameter("userpass"));
			user.setSecurityQuestion(request.getParameter("securityquestion"));  
			user.setSecurityAnswer(request.getParameter("securityanswer")); 
			user.setFirstName(request.getParameter("firstname"));
			user.setMiddleName(request.getParameter("middlename"));
			user.setLastName(request.getParameter("lastname"));
			user.setContactNumber(request.getParameter("mobileno"));
			user.setEmailId(request.getParameter("emailid"));
			user.setAddress1(request.getParameter("Address1"));
			user.setAddress2(request.getParameter("Address2"));
			user.setAddress3(request.getParameter("Address3"));
			user.setUserType("Lead Volunteer");
			user.setStatus("1");
			
			try {
				if(!volunteerProfileDao.insertProfileDetails(user)) {
					request.setAttribute("errorMsg", "Failed to register user. Please try again!");
				}else {
				request.setAttribute("errorMsg", "User Registered Successfully. Please log in!"); 
				}
			}catch(Exception e) {
				request.setAttribute("errorMsg", "Failed to register user. Please try again!");
			}
			finalView="LVolunteerLogin.jsp";
		}else if(viewType!=null && "viewprofile".equalsIgnoreCase(viewType)) {
			
			try {
				String userName = (String) session.getAttribute("username");
				User user = volunteerProfileDao.getProfileDetails(userName);
				if(user == null ) {
					request.setAttribute("errorMsg", "Failed to get user details. Please try again!");
				}else {
					request.setAttribute("user",user);
				}
			}catch(Exception e) {
				request.setAttribute("errorMsg", "Failed to get user details. Please try again!");
			}
			finalView="manageprofile.jsp";
		}else if(viewType!=null && "updateprofile".equalsIgnoreCase(viewType)) {
			User user = new User();
			user.setCustomerId(Integer.valueOf(request.getParameter("customerid")));
			user.setUserName(request.getParameter("username")); 
			user.setOldUserName(request.getParameter("oldusername"));
			user.setNewPass(request.getParameter("userpass"));
			user.setSecurityQuestion(request.getParameter("securityquestion"));  
			user.setSecurityAnswer(request.getParameter("securityanswer")); 
			user.setFirstName(request.getParameter("firstname"));
			user.setMiddleName(request.getParameter("middlename"));
			user.setLastName(request.getParameter("lastname"));
			user.setContactNumber(request.getParameter("mobileno"));
			user.setEmailId(request.getParameter("emailid"));
			user.setAddress1(request.getParameter("Address1"));
			user.setAddress2(request.getParameter("Address2"));
			user.setAddress3(request.getParameter("Address3"));
			user.setUserType("Lead Volunteer");
			user.setStatus("1");
			try {
				User user1 = null;
				if(!volunteerProfileDao.updateProfileDetails(user)) {
					request.setAttribute("errorMsg", "Failed to update profile. Please try again!");
					user1 = volunteerProfileDao.getProfileDetails(user.getOldUserName());
				}else {
				request.setAttribute("errorMsg", "User profile updated Successfully. ");
				user1 = volunteerProfileDao.getProfileDetails(user.getUserName());
				}
				
				
					request.setAttribute("user",user1);

				
			}catch(Exception e) {
				request.setAttribute("errorMsg", "Failed to update profile. Please try again!");
			}
			
			finalView="manageprofile.jsp";
		}else if(viewType!=null && "forgotpassword".equalsIgnoreCase(viewType)) {
			User user = new User();
			user.setUserName(request.getParameter("username")); 
			user.setSecurityQuestion(request.getParameter("securityquestion"));  
			user.setSecurityAnswer(request.getParameter("securityanswer")); 
			
			try {
				if(!volunteerProfileDao.LVforgotPassword(user)) {
					request.setAttribute("errorMsg", "Incorrect input!");
					finalView="LVForgotpassword.jsp";
				}
				else{
finalView="newpasswordLV.jsp";
				}
				request.setAttribute("username", user.getUserName());
			}catch(Exception e) {
				request.setAttribute("errorMsg", "Incorrect input!");
			}
			
		}else if(viewType!=null && "newpassword".equalsIgnoreCase(viewType)) {
			User user = new User();
			user.setUserName(request.getParameter("username")); 
			user.setNewPass(request.getParameter("newpass"));  
			user.setConfirmPass(request.getParameter("confirmpass")); 
			
			try {
				if(!user.getNewPass().isEmpty() && !user.getConfirmPass().isEmpty() && !user.getNewPass().equals(user.getConfirmPass())) {
					request.setAttribute("errorMsg", "New Password and Confirm Password do not match!");
				}
			else if(!volunteerProfileDao.updatePassword(user)) {
					request.setAttribute("errorMsg", "Failed to update password!");
				}else {
					request.setAttribute("errorMsg", "Password updated successfully. Try logging in again!");
				}
				request.setAttribute("username", user.getUserName());
			}catch(Exception e) {
				request.setAttribute("errorMsg", "Failed to update password!");
			}
			
			finalView="newpasswordV.jsp";
		}
		
		
		 rd=request.getRequestDispatcher(finalView);  
			rd.forward(request,response);
	}  
}  