package com.ars.dao;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.List;

import com.ars.model.User;

public class RequestorLoginDao {
	public static User validate(String name, String pass) {		
		boolean status = false;
		Connection conn = null;
		PreparedStatement pst = null;
		ResultSet rs = null;
		User user=null;
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
					.prepareStatement("select * from requestor_login a where a.user_name=? and a.password=?");
			pst.setString(1, name);
			pst.setString(2, pass);

			rs = pst.executeQuery();
			//status = rs.next();
			
			while (rs.next()) {
				user = new User();
	            user.setUserName(rs.getString("user_name"));
	            user.setUserType(rs.getString("user_type"));
	            user.setCustomerId(rs.getInt("status"));
	            user.setSecurityQuestion(rs.getString("security_question"));  
				user.setSecurityAnswer(rs.getString("security_answer")); 
				user.setFirstName(rs.getString("first_name"));
				user.setMiddleName(rs.getString("middle_name"));
				user.setLastName(rs.getString("last_name"));
				user.setContactNumber(rs.getString("contact_no"));
				user.setEmailId(rs.getString("email_id"));
				user.setUserType(rs.getString("user_type"));
				user.setAddress1(rs.getString("Address1"));
				user.setAptId(rs.getInt("apt_id"));
				user.setCheckinDate(rs.getString("checkin_date"));
				user.setPayment(rs.getFloat("payment"));
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
		return user;
	}
}