package com.ars.dao;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

import com.ars.model.Enquiry;
import com.ars.model.Payment;

public class DeleteAccountsDao {
	Connection conn = null;
	PreparedStatement pst = null;
	ResultSet rs = null;
	String url = "jdbc:mysql://localhost:3306/";
	String dbName = "ars";
	String driver = "com.mysql.jdbc.Driver";
	String userName = "root";
	String password = "admin";
	Statement stmt = null;
	
	public List<Enquiry> getEnquiryDetails(Enquiry enquiry) {		
		List<Enquiry> enquiryList = new ArrayList<Enquiry>();
		try {
			conn = createConnection();
			if(enquiry.getServiceType()!=null && enquiry.getServiceType().trim().length()>0) {
				pst = conn
						.prepareStatement("select * from enquiry_details where service_type='" + enquiry.getServiceType().trim()+"'");
			}else {
			pst = conn
					.prepareStatement("select * from enquiry_details");
			}
			rs = pst.executeQuery();
			
			while (rs.next()) {
				Enquiry enquiry1 = new Enquiry();
				enquiry1.setId(rs.getInt("enquiry_id"));
				enquiry1.setName(rs.getString("name"));
				enquiry1.setEmailId(rs.getString("email_id"));
				enquiry1.setMessage(rs.getString("message"));
				enquiry1.setEnquiryDate(rs.getString("enquiry_date"));
				enquiry1.setStatus(rs.getString("status"));
				enquiry1.setServiceType(rs.getString("service_type"));
				enquiryList.add(enquiry1);
				
	        }

		} catch (Exception e) {
			System.out.println(e);
		} finally {
			closeConnection(conn,pst,rs);
		}
		return enquiryList;
	}
	
	public boolean deleteVAccount(Payment payment) {
		try {
			
			conn = createConnection();
			stmt = conn.createStatement();
			String deletePaymentQuery1 = "Delete from volunteer_login where contact_no='"+payment.getId()+"'";
				
			int count = stmt.executeUpdate(deletePaymentQuery1);
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
	
	public boolean deleteRAccount(Payment payment) {
		try {
		
			conn = createConnection();
			stmt = conn.createStatement();
			String deletePaymentQuery2 = "Delete from requestor_login where contact_no='"+payment.getId()+"'";
		
			int count = stmt.executeUpdate(deletePaymentQuery2);
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
	public boolean updateEnquiryDetails(Enquiry enquiry) {
		try {
			
			conn = createConnection();
			stmt = conn.createStatement();
			String updateEnquiryQuery = "update enquiry_details set name = '"+enquiry.getName()+
					"', email_id='" +enquiry.getEmailId()+
					"', message='" + enquiry.getMessage()+
					"', status='" +enquiry.getStatus()+
					"', response='" +enquiry.getResponse()+
					"', service_type='" +enquiry.getServiceType()+
					"' where enquiry_id='"+ enquiry.getId()+"'";
		
			int count = stmt.executeUpdate(updateEnquiryQuery);
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