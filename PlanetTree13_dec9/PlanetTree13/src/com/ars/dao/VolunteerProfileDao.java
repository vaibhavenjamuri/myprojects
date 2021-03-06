package com.ars.dao;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import com.ars.model.User;

public class VolunteerProfileDao {
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
					.prepareStatement("select * from volunteer_login where user_name = ?");
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
 				
				user.setAddress1(rs.getString("Address1"));
				user.setAddress2(rs.getString("Address2"));
				user.setAddress3(rs.getString("Address3"));
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
			String customerQuery = "insert into volunteer_login values ('" +user.getUserName()+
					"','" +user.getNewPass()+
					"','" +user.getUserType()+
					"','" +user.getFirstName()+
				"','" +user.getMiddleName()+
				"','" +user.getLastName()+
				"','" +user.getEmailId()+
				"','" +user.getContactNumber()+
				"','" +user.getSecurityQuestion()+
				"','" +user.getSecurityAnswer()+
				"','" +user.getAddress1()+
				"','" +user.getAddress2()+
				"','" +user.getAddress3()+
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
			String customerQuery = "update volunteer_login set first_name = '" +user.getFirstName()+
					"', password= '" +user.getNewPass()+
					"', user_name= '" +user.getUserName()+
					"',middle_name='" +user.getMiddleName()+
					"',last_name= '" +user.getLastName()+
					"',contact_no= '" +user.getContactNumber()+
					"',email_id='" +user.getEmailId()+
					"',Address1='" +user.getAddress1()+
					"',Address2='" +user.getAddress2()+
					"',Address3='" +user.getAddress3()+
					
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
	
	public boolean VforgotPassword(User user) {
		
		try {
			
			conn = createConnection();
			pst = conn
					.prepareStatement("select * from volunteer_login where user_name=? and security_question=? and security_answer=? and user_type='volunteer'");
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
public boolean LVforgotPassword(User user) {
		
		try {
			
			conn = createConnection();
			pst = conn
					.prepareStatement("select * from volunteer_login where user_name=? and security_question=? and security_answer=? and user_type='lead volunteer'");
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

			int count = stmt.executeUpdate("update volunteer_login set password='"+user.getNewPass()+"' where user_name='"+user.getUserName()+"'");
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