package com.ars.dao;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import com.ars.model.Enquiry;
import com.ars.model.User;

public class VolunteerLoginDao {
	public static User validate(String name, String pass) {		
		boolean status = false;
		Connection conn = null;
		PreparedStatement pst = null;
		ResultSet rs = null;
		User user2=null;
		String url = "jdbc:mysql://localhost:3306/";
		String dbName = "ars";
		String driver = "com.mysql.jdbc.Driver";
		String userName = "root";
		String password = "admin";
		
		
		try {
			Class.forName(driver).newInstance();
			conn = DriverManager
					.getConnection(url + dbName, userName, password);

			pst = conn
					.prepareStatement("select * from volunteer_login a where a.user_name=? and a.password=?");
			pst.setString(1, name);
			pst.setString(2, pass);

			rs = pst.executeQuery();
			//status = rs.next();
			
			while (rs.next()) {
			user2 = new User();
	            user2.setUserName(rs.getString("user_name"));
	            user2.setUserType(rs.getString("user_type"));
	            user2.setSecurityQuestion(rs.getString("security_question"));  
				user2.setSecurityAnswer(rs.getString("security_answer")); 
				user2.setFirstName(rs.getString("first_name"));
				user2.setMiddleName(rs.getString("middle_name"));
				user2.setLastName(rs.getString("last_name"));
				user2.setContactNumber(rs.getString("contact_no"));
				user2.setEmailId(rs.getString("email_id"));
				user2.setUserType(rs.getString("user_type"));
				user2.setAddress1(rs.getString("Address1"));
				
	        }

		} catch (Exception e) {
			System.out.println(e);
		} finally {
			if (conn != null) {
				try {
					conn.close();
				} catch (SQLException e) {
					e.printStackTrace();
				}
			}
			if (pst != null) {
				try {
					pst.close();
				} catch (SQLException e) {
					e.printStackTrace();
				}
			}
			if (rs != null) {
				try {
					rs.close();
				} catch (SQLException e) {
					e.printStackTrace();
				}
			}
		}
		return user2;
	}
	}

