package com.ars.dao;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.List;

import com.ars.model.User;

public class PassengersDao {
	public List getPassengerDetails(String name, String pass) {		
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
					.prepareStatement("select * from login_details where user_id=? and password=?");
			pst.setString(1, name);
			pst.setString(2, pass);

			rs = pst.executeQuery();
			//status = rs.next();
			
			while (rs.next()) {
				user = new User();
	            user.setUserName(rs.getString("user_id"));
	            user.setUserType(rs.getString("user_type"));
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
		return null;
	}
	
	public void cancelReservation(User user) {
		
	}
	

	
}