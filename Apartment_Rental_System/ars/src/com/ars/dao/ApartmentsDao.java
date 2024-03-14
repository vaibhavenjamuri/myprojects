package com.ars.dao;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

import com.ars.model.Apartment;
import com.ars.model.Flight;
import com.ars.model.User;

public class ApartmentsDao {
	
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
	
	public List<Apartment> getApartmentDetails(Apartment apartment) {	
		List<Apartment> apartmentsList = new ArrayList<Apartment>();
		try {
			
			Class.forName(driver).newInstance();
			conn = DriverManager
					.getConnection(url + dbName, userName, password);
			String getApartmentDetailsQuery = "select * from apartment_details"; 
			if(apartment.getAptNo()!=null && !apartment.getAptNo().isEmpty()) {
				getApartmentDetailsQuery = getApartmentDetailsQuery + " where apt_no= '"+apartment.getAptNo()+"' or flat_no='"+apartment.getFlatNo()+"'";
			}
			pst = conn
					.prepareStatement(getApartmentDetailsQuery);
			
			rs = pst.executeQuery();
			
			while (rs.next()) {
				Apartment apartment1 = new Apartment();
				apartment1.setAptId(rs.getInt("apt_id"));
				apartment1.setAptNo(rs.getString("apt_no"));
				apartment1.setFlatNo(rs.getString("flat_no"));
				apartment1.setFlatType(rs.getString("flat_type"));
				apartment1.setBedrooms(rs.getInt("bedrooms"));
				apartment1.setBathrooms(rs.getInt("bathrooms"));
				apartment1.setMaxPersons(rs.getInt("max_persons"));
				apartment1.setRent(rs.getFloat("rent"));
				apartment1.setOtherCharges(rs.getFloat("other_charges"));
				apartment1.setAdvance(rs.getString("advance"));
				apartment1.setBond(rs.getString("bond"));
				apartment1.setAmenities(new StringBuffer(rs.getString("amenities")));
				apartment1.setStatus(rs.getString("status"));
				apartment1.setLocation(rs.getString("location"));
				apartment1.setCity(rs.getString("city"));
				apartment1.setState(rs.getString("state"));
				apartment1.setDescription(rs.getString("description"));	
				apartmentsList.add(apartment1);
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
		return apartmentsList;
	}
	
	public boolean insertApartmentDetails(Apartment apartment) {
	try {
			
			conn = createConnection();
			stmt = conn.createStatement();
			String apartmentQuery = "insert into apartment_details values (null,'" +apartment.getAptNo()+
					"','" +apartment.getLocation()+
					"','" +apartment.getCity()+
					"','" +apartment.getState()+
					"','" +apartment.getCountry()+
					"','" +apartment.getStatus()+
					"','" +apartment.getFlatNo()+
					"','" +apartment.getFlatType()+
					"','" +apartment.getRent()+
					"','" +apartment.getOtherCharges()+
					"','" +apartment.getMaxPersons()+
					"','" +apartment.getBond()+
					"','" +apartment.getAdvance()+
					"','" +apartment.getAmenities()+
					"','" +apartment.getDescription()+
					"','" +apartment.getBedrooms()+
					"','" +apartment.getBathrooms()+
					"')";
		
			int count = stmt.executeUpdate(apartmentQuery);
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
	
	public boolean updateApartmentDetails(Apartment apartment) {
		try {
				
				conn = createConnection();
				stmt = conn.createStatement();
				String apartmentQuery = "update apartment_details set apt_no = '" +apartment.getAptNo()+
						"', flat_no = '" +apartment.getFlatNo()+
						"', flat_type = '" +apartment.getFlatType()+
						"',bedrooms = '" +apartment.getBedrooms()+
						"', bathrooms= '" +apartment.getBathrooms()+
						"',max_persons= '" +apartment.getMaxPersons()+
						"', rent = '" +apartment.getRent()+
						"', other_charges= '" +apartment.getOtherCharges()+
						"',advance='" +apartment.getAdvance()+
						"',bond='" +apartment.getBond()+
						"',amenities='" +apartment.getAmenities()+
						"',status='" +apartment.getStatus()+
						"',location='" +apartment.getLocation()+
						"',city='" +apartment.getCity()+
						"',state='" +apartment.getState()+
						"',description='" +apartment.getDescription()+
						"' where apt_id = '" + apartment.getAptId() + "'";
			
				int count = stmt.executeUpdate(apartmentQuery);
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
	
	public boolean deleteApartmentDetails(Apartment apartment) {
		try {
				
				conn = createConnection();
				stmt = conn.createStatement();
				String apartmentQuery = "delete from apartment_details where apt_id = '" +apartment.getAptId()+"'";
			
				int count = stmt.executeUpdate(apartmentQuery);
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