package com.ars.dao;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import com.ars.model.User;

public class ProfileDao {
	Connection conn = null;
	PreparedStatement pst = null;
	Statement stmt = null;
	ResultSet rs = null;
	
	String url = "jdbc:mysql://localhost:3306/";
	String dbName = "ars";
	String driver = "com.mysql.jdbc.Driver";
	String userName = "root";
	String password = "admin";
	public User getProfileDetails(String name) {		
		
		User user=null;
		try {
			
			conn = createConnection();
			pst = conn
					.prepareStatement("select * from login_details where user_name = ?");
			pst.setString(1, name);

			rs = pst.executeQuery();
			
			while (rs.next()) {
				user = new User();
				user.setUserName(rs.getString("user_name")); 
				user.setNewPass(rs.getString("password"));
				user.setSecurityQuestion(rs.getString("security_question"));  
				user.setSecurityAnswer(rs.getString("security_answer")); 
				user.setFirstName(rs.getString("first_name"));
				user.setMiddleName(rs.getString("middle_name"));
				user.setLastName(rs.getString("last_name"));
				user.setContactNumber(rs.getString("contact_no"));
				user.setEmailId(rs.getString("email_id"));
				user.setUserType(rs.getString("user_type"));
				
				user.setAptId(rs.getInt("apt_id"));
				user.setCheckinDate(rs.getString("checkin_date"));
				user.setPayment(rs.getFloat("payment"));
		        }

		} catch (Exception e) {
			System.out.println(e);
		} finally {
			
			closeConnection(conn,pst,rs);
		}
		return user;
	}
	
	public boolean insertProfileDetails(User user) {
	try {
			
			conn = createConnection();
			stmt = conn.createStatement();
			String customerQuery = "insert into login_details values ('" +user.getUserName()+
						"','" +user.getNewPass()+
						"','" +user.getUserType()+
						"','" +user.getStatus()+
						"','" +user.getFirstName()+
					"','" +user.getMiddleName()+
					"','" +user.getLastName()+
					"','" +user.getEmailId()+
					"','" +user.getContactNumber()+
					"',current_date," +
					"'" +user.getAptId()+
					"','" +user.getCheckinDate()+
					"','" +user.getCheckinTime()+
					"','" +user.getCardNumber()+
					"','" +user.getCardType()+
					"','" +user.getExpDate()+
					"','" +user.getCvv()+
					"','" +user.getSecurityQuestion()+
					"','" +user.getSecurityAnswer()+
					"','" +user.getPayment()+
					"')";
		
			int count = stmt.executeUpdate(customerQuery);
				if(count>0) {
				return true;
				} 
	
		} catch (Exception e) {
			System.out.println(e);
		} finally {
			try {
				stmt.close();
			} catch (SQLException e) {
				e.printStackTrace();
			}
			closeConnection(conn,pst,rs);
		}
		return false;
	}
	
	public void deletProfileDetails(User user) {
		
	}
	
	public boolean updateProfileDetails(User user) {
try {
			
			conn = createConnection();
			stmt = conn.createStatement();
			String customerQuery = "update login_details set first_name = '" +user.getFirstName()+
					"', password= '" +user.getNewPass()+
					"', user_name= '" +user.getUserName()+
					"',middle_name='" +user.getMiddleName()+
					"',last_name= '" +user.getLastName()+
					"',contact_no= '" +user.getContactNumber()+
					"',email_id='" +user.getEmailId()+
					"', security_question = '" +user.getSecurityQuestion()+
					"',security_answer = '" +user.getSecurityAnswer()+
					"' where user_name='" + user.getOldUserName()+"'";
		
			int count = stmt.executeUpdate(customerQuery);
			if(count>0) {
				return true;
				} 
	
		} catch (Exception e) {
			System.out.println(e);
		} finally {
			try {
				stmt.close();
			} catch (SQLException e) {
				e.printStackTrace();
			}
			closeConnection(conn,pst,rs);
		}
		return false;

	}
	
	public boolean forgotPassword(User user) {
		
		try {
			
			conn = createConnection();
			pst = conn
					.prepareStatement("select * from login_details where user_name=? and security_question=? and security_answer=?");
			pst.setString(1, user.getUserName());
			pst.setString(2, user.getSecurityQuestion());
			pst.setString(3, user.getSecurityAnswer());

			rs = pst.executeQuery();
			
			return rs.next();
		} catch (Exception e) {
			System.out.println(e);
		} finally {
		
			closeConnection(conn,pst,rs);
		}
		return false;
	}
	
	public boolean updatePassword(User user) {
		try {
			
			conn = createConnection();
			stmt = conn.createStatement();

			int count = stmt.executeUpdate("update login_details set password='"+user.getNewPass()+"' where user_name='"+user.getUserName()+"'");
			if(count>0) {
				return true;
			}
	
			return rs.next();
		} catch (Exception e) {
			System.out.println(e);
		} finally {
			try {
				stmt.close();
			} catch (SQLException e) {
				e.printStackTrace();
			}
			closeConnection(conn,pst,rs);
		}
		return false;
	}
	
	private void closeConnection(Connection con, PreparedStatement pst, ResultSet rs) {

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
	
	private Connection createConnection() {
		try{
		Class.forName(driver).newInstance();
		conn = DriverManager
				.getConnection(url + dbName, userName, password);
		
		}catch(Exception e) {
			System.out.println(e);
		}
		return conn;
	}
	
}