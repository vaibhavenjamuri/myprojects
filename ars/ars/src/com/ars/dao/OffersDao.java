package com.ars.dao;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

import com.ars.model.Flight;
import com.ars.model.Offer;
import com.ars.model.User;

public class OffersDao {
	
	boolean status = false;
	Connection conn = null;
	PreparedStatement pst = null;
	Statement stmt = null;
	ResultSet rs = null;
	User user=null;
	String url = "jdbc:mysql://localhost:3306/";
	String dbName = "ars";
	String driver = "com.mysql.jdbc.Driver";
	String userName = "root";
	String password = "admin";

	
	
	public boolean insertOfferDetails(Offer offer) {
	try {
			
			conn = createConnection();
			stmt = conn.createStatement();
			String flightQuery = "insert into offer_details values (null,'" +offer.getOfferName()+
					"','" +offer.getDiscount()+
					"','" +offer.getValidity()+
					"','" +offer.getBaggageAllowance()+
					"','" +offer.getBasicFare()+
					"','" +offer.getDestination()+
					"','" +offer.getSource()+
					"')";
		
			int count = stmt.executeUpdate(flightQuery);
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
	
	
	public List<Offer> getOfferDetails(Offer offer) {	
		List<Offer> offersList = new ArrayList<Offer>();
		try {
			
			createConnection();
			String getOfferDetailsQuery = "select * from offer_details"; 
			if(offer.getOfferName()!=null && !offer.getOfferName().isEmpty()) {
				getOfferDetailsQuery = getOfferDetailsQuery + " where offer_name= '"+offer.getOfferName()+"'";
			}
			pst = conn
					.prepareStatement(getOfferDetailsQuery);
			
			rs = pst.executeQuery();
			
			while (rs.next()) {
				Offer offer1 = new Offer();
				offer1.setOfferId(rs.getInt("offer_id"));
				offer1.setOfferName(rs.getString("offer_name"));
				offer1.setDiscount(rs.getFloat("discount"));
				offer1.setValidity(rs.getString("validity"));
				offer1.setBaggageAllowance(rs.getInt("baggage_allowance"));
				offer1.setBasicFare(rs.getFloat("basic_fare"));
				offer1.setSource(rs.getString("source"));
				offer1.setDestination(rs.getString("destination"));
				
				String[] validity = rs.getString("validity").split("-");
				offer1.setMonth(validity[0]);
				offer1.setDate(validity[1]);
				offer1.setYear(validity[2]);
				
				offersList.add(offer1);
	        }

		} catch (Exception e) {
			System.out.println(e);
		} finally {
			
			closeConnection(conn,pst,rs);
		}
		return offersList;
	}
	

	public boolean updateOfferDetails(Offer offer) {
		try {
				
				conn = createConnection();
				stmt = conn.createStatement();
				String offerQuery = "update offer_details set offer_name = '" + offer.getOfferName() +
						"', discount = '" + offer.getDiscount()+
						"', validity = '" + offer.getValidity()+
						"', source = '" + offer.getSource()+
						"', destination = '" + offer.getDestination()+
						"' where offer_id = '" +offer.getOfferId() + "'";
			
				int count = stmt.executeUpdate(offerQuery);
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
	
	public boolean deleteOfferDetails(Offer offer) {
		try {
				
				conn = createConnection();
				stmt = conn.createStatement();
				String offerQuery = "delete from offer_details where offer_id = '" +offer.getOfferId()+"'";
			
				int count = stmt.executeUpdate(offerQuery);
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