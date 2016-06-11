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
import com.ars.model.Enquiry;
import com.ars.model.Flight;
import com.ars.model.Ticket;
import com.ars.model.User;
import com.ars.model.Visit;

public class ServicesDao {
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
	
	public List getTicketDetails(String name, String pass) {		
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
	
	public int bookFlightTicket(Ticket ticket) {
		int pnr=0;
		
try {
			
			conn = createConnection();
			stmt = conn.createStatement();
			String flightTicketQuery = "insert into ticket_details values (null,'" +ticket.getFlightCode()+
					"','" +ticket.getSource()+
					"','" +ticket.getTravelDate()+
					"','" +ticket.getTotalPassengers()+
					"','" +ticket.getPassengerNames()+
					"','" +ticket.getSeatNumbers()+
					"','" +ticket.getTotalFare()+
					"','" +ticket.getPassengerAges()+
					"','" +ticket.getCustomerId()+
					"','" +"booked"+
					"',current_date,'" +ticket.getDestination()+
					"','" +ticket.getCardType()+
					"','" +ticket.getSeatType()+
					"','" +ticket.getFroDate()+
					"','" +ticket.getCardNumber()+
					"','" +ticket.getCvv()+
					"','" +ticket.getExpiryDate()+
					"','" +ticket.getFroSeatNumbers()+
					"')";
		
			int count = stmt.executeUpdate(flightTicketQuery);
				if(count>0) {
					String getFlightDetailsQuery = "select pnr from ticket_details where card_number= '" +ticket.getCardNumber()+"' and last_modified=current_date"; 

					pst = conn
							.prepareStatement(getFlightDetailsQuery);
					
					rs = pst.executeQuery();
					
					while (rs.next()) {
						pnr = rs.getInt("pnr");
					}

				
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

		return pnr;
	}
	
	public boolean updateTicketDetails(String pnr) {
		try {
			
			conn = createConnection();
			stmt = conn.createStatement();
			String ticketQuery = "update ticket_details set status = 'Refund in Process',last_modified=current_date where pnr = '" +pnr + "'";
		
			int count = stmt.executeUpdate(ticketQuery);
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

	public List<Visit> getVisitDetails(String userName) {
		List<Visit> visitList = new ArrayList<Visit>();
		
		try {
			
			createConnection();

			String getVisitDetailsQuery = "select * from visit_details a, apartment_details b where a.visit_date>=current_date and a.apt_id=b.apt_id and a.user_name='"+userName+"'"; 
			
			pst = conn
					.prepareStatement(getVisitDetailsQuery);
			
			rs = pst.executeQuery();
			
			while (rs.next()) {
				Visit visit = new Visit();
				visit.setLocation(rs.getString("location"));
				visit.setAptNo(rs.getString("apt_no"));
				visit.setFlatNo(rs.getString("flat_no"));
				visit.setBathrooms(rs.getInt("bathrooms"));
				visit.setBedrooms(rs.getInt("bedrooms"));
				visit.setRent(rs.getFloat("rent"));
				visit.setVisitTime(rs.getString("visit_time"));
				visit.setVisitId(rs.getInt("visit_id"));
				visit.setVisitDate(rs.getString("visit_date"));
				visit.setAptId(rs.getInt("apt_id"));
				
				visitList.add(visit);
	        }

		} catch (Exception e) {
			System.out.println(e);
		} finally {
			
			closeConnection(conn,pst,rs);
		}

		
		return visitList;
	}

	public Apartment getReservedApartmentDetails(int aptId) {
		Apartment apartment = new Apartment();
		
		try {
			
			createConnection();

			String getApartmentDetailsQuery = "select * from apartment_details where apt_id='"+aptId+ "'"; 
			
			pst = conn
					.prepareStatement(getApartmentDetailsQuery);
			
			rs = pst.executeQuery();
			
			while (rs.next()) {
				apartment.setAptId(rs.getInt("apt_id"));
				apartment.setAptNo(rs.getString("apt_no"));
				apartment.setFlatNo(rs.getString("flat_no"));
				apartment.setFlatType(rs.getString("flat_type"));
				apartment.setBedrooms(rs.getInt("bedrooms"));
				apartment.setBathrooms(rs.getInt("bathrooms"));
				apartment.setMaxPersons(rs.getInt("max_persons"));
				apartment.setRent(rs.getFloat("rent"));
				apartment.setOtherCharges(rs.getFloat("other_charges"));
				apartment.setAdvance(rs.getString("advance"));
				apartment.setBond(rs.getString("bond"));
				apartment.setAmenities(new StringBuffer(rs.getString("amenities")));
				apartment.setStatus(rs.getString("status"));
				apartment.setLocation(rs.getString("location"));
				apartment.setCity(rs.getString("city"));
				apartment.setState(rs.getString("state"));
				apartment.setDescription(rs.getString("description"));	

	        }

		} catch (Exception e) {
			System.out.println(e);
		} finally {
			
			closeConnection(conn,pst,rs);
		}

		
		return apartment;
	}
	
	public Ticket getTicketDetail(String pnr) {
		Ticket ticket = null;
		
		try {
			
			createConnection();

			String getTicketDetailsQuery = "select * from ticket_details a, flight_details c where a.travel_date >= current_date and a.flight_code=c.flight_code and a.status='booked' and a.pnr='"+pnr+"'"; 
			
			pst = conn
					.prepareStatement(getTicketDetailsQuery);
			
			rs = pst.executeQuery();
			
			while (rs.next()) {
				ticket = new Ticket();
				ticket.setPnr(String.valueOf(rs.getInt("pnr")));
				ticket.setFlightCode(rs.getString("flight_code"));
				ticket.setTravelDate(rs.getDate("travel_date").toString());
				ticket.setTotalPassengers(rs.getInt("total_passengers"));
				ticket.setPassengerNames(new StringBuffer(rs.getString("passenger_names")));
				ticket.setSeatNumbers(new StringBuffer(rs.getString("seat_numbers")));
				ticket.setTotalFare(rs.getFloat("total_fare"));
				ticket.setStatus(rs.getString("status"));
				ticket.setLastModifiedDate(rs.getString("last_modified").toString());
				ticket.setSource(rs.getString("source"));
				ticket.setDestination(rs.getString("destination"));
				ticket.setVia(rs.getString("via"));
				ticket.setDepartureTime(rs.getString("departure_time"));
				ticket.setTotalTime(rs.getString("total_time"));
	        }

		} catch (Exception e) {
			System.out.println(e);
		} finally {
			
			closeConnection(conn,pst,rs);
		}

		
		return ticket;
	}

	
	public List<Apartment> getApartmentDetails(Apartment apartment) {	
		List<Apartment> apartmentsList = new ArrayList<Apartment>();
		try {
			
			Class.forName(driver).newInstance();
			conn = DriverManager
					.getConnection(url + dbName, userName, password);
			String getApartmentDetailsQuery = "select * from apartment_details where bedrooms="+ apartment.getBedrooms() +" and bathrooms="+ apartment.getBathrooms() +" and flat_type="+ apartment.getFlatType();
			if(apartment.getLocation()!=null) {
				getApartmentDetailsQuery+=" and lower(location) like '%"+apartment.getLocation()+"%'";
			}
			if(apartment.getCity()!=null) {
				getApartmentDetailsQuery+= " and lower(city) like '%"+apartment.getCity()+"%' " ;
						
			}
			
			if(apartment.getState()!=null) {
				
				getApartmentDetailsQuery+= " and lower(state) like '%"+apartment.getState()+"%'  ";
						
			}
			
			if(apartment.getToRent()!=0 && apartment.getFromRent()!=0) {
				getApartmentDetailsQuery+=" and rent between "+apartment.getFromRent()+" and "+apartment.getToRent(); 
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
			closeConnection(conn,pst,rs);
		}
		return apartmentsList;
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

	
	public boolean updateVisitDetails(Visit visit) {
		try {
				
				conn = createConnection();
				stmt = conn.createStatement();
				String apartmentQuery = "update visit_details set visit_date = '" +visit.getVisitDate()+
						"', visit_time = '" +visit.getVisitTime()+
						"' where visit_id = '" + visit.getVisitId() + "'";
			
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

	public boolean insertVisitDetails(Visit visit) {
		try {
			
			conn = createConnection();
			stmt = conn.createStatement();
			String insertVisitQuery = "insert into visit_details values (null,'" + visit.getAptId()+
					"','" + visit.getVisitDate()+
					"','" + visit.getVisitTime()+
					"','" + visit.getUserName()+
					"','" + visit.getStatus()+
					"','" + visit.getReserved()+
					"','" + visit.getReservedDate()+
					"','" + visit.getCheckinDate()+
					"')";
			int count = stmt.executeUpdate(insertVisitQuery);
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
	
	public boolean updateReservationDetails(User user) {
		try {
					
					conn = createConnection();
					stmt = conn.createStatement();
					String customerQuery = "update login_details set apt_id = '" +user.getAptId()+
							"', checkin_date= '" +user.getCheckinDate()+
							"', card_number= '" +user.getCardNumber()+
							"',card_type='" +user.getCardType()+
							"',exp_date= '" +user.getExpDate()+
							"',cvv= '" +user.getCvv()+
							"',payment='" +user.getPayment()+
							"',user_type='tenant'"+
							"  where user_name='" + user.getUserName()+"'";
				
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

	
	public boolean deleteVisitDetails(Visit visit) {
		try {
				
				conn = createConnection();
				stmt = conn.createStatement();
				String apartmentQuery = "delete from visit_details where visit_id = '" +visit.getVisitId()+"'";
			
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