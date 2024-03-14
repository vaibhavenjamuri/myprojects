package com.ars.model;

public class Ticket {
	
	User user;
	
	String pnr;
	
	String flightCode;
	
	String routeCode;
	
	String travelDate;
	
	String returnDate;
	
	int totalPassengers;
	
	StringBuffer passengerNames=new StringBuffer();
	
	StringBuffer seatNumbers=new StringBuffer();
	
	StringBuffer froSeatNumbers=new StringBuffer();
	
	StringBuffer passengerAges=new StringBuffer();;
	
	float totalFare;
	
	String source;
	
	String destination;
	
	String status;
	
	String lastModifiedDate;
	
	
	String via;
	
	String departureTime;
	
	String totalTime;
	
	int customerId=0;
	
	String seatType;
	
	String cardType;
	
	String cardNumber;
	
	String cvv;
	
	String expiryDate;
	
	String returnDepartureTime;
	 
	String froDate="";
	
	
	
	public final String getFroDate() {
		return froDate;
	}

	public final void setFroDate(String froDate) {
		this.froDate = froDate;
	}

	public final String getReturnDepartureTime() {
		return returnDepartureTime;
	}

	public final void setReturnDepartureTime(String returnDepartureTime) {
		this.returnDepartureTime = returnDepartureTime;
	}

	public final String getCardType() {
		return cardType;
	}

	public final void setCardType(String cardType) {
		this.cardType = cardType;
	}

	public final String getCardNumber() {
		return cardNumber;
	}

	public final void setCardNumber(String cardNumber) {
		this.cardNumber = cardNumber;
	}

	public final String getCvv() {
		return cvv;
	}

	public final void setCvv(String cvv) {
		this.cvv = cvv;
	}

	public final String getExpiryDate() {
		return expiryDate;
	}

	public final void setExpiryDate(String expiryDate) {
		this.expiryDate = expiryDate;
	}

	public final String getSeatType() {
		return seatType;
	}

	public final void setSeatType(String seatType) {
		this.seatType = seatType;
	}

	public final int getCustomerId() {
		return customerId;
	}

	public final void setCustomerId(int customerId) {
		this.customerId = customerId;
	}

	public final String getReturnDate() {
		return returnDate;
	}

	public final void setReturnDate(String returnDate) {
		this.returnDate = returnDate;
	}

	public final String getVia() {
		return via;
	}

	public final void setVia(String via) {
		this.via = via;
	}

	public final String getDepartureTime() {
		return departureTime;
	}

	public final void setDepartureTime(String departureTime) {
		this.departureTime = departureTime;
	}

	public final String getTotalTime() {
		return totalTime;
	}

	public final void setTotalTime(String totalTime) {
		this.totalTime = totalTime;
	}
	
	

	public final StringBuffer getFroSeatNumbers() {
		return froSeatNumbers;
	}

	public final void setFroSeatNumbers(StringBuffer froSeatNumbers) {
		this.froSeatNumbers = froSeatNumbers;
	}

	public final String getLastModifiedDate() {
		return lastModifiedDate;
	}

	public final void setLastModifiedDate(String lastModifiedDate) {
		this.lastModifiedDate = lastModifiedDate;
	}

	public final String getStatus() {
		return status;
	}

	public final void setStatus(String status) {
		this.status = status;
	}

	public final String getSource() {
		return source;
	}

	public final void setSource(String source) {
		this.source = source;
	}

	public final String getDestination() {
		return destination;
	}

	public final void setDestination(String destination) {
		this.destination = destination;
	}

	public User getUser() {
		return user;
	}

	public void setUser(User user) {
		this.user = user;
	}

	public String getPnr() {
		return pnr;
	}

	public void setPnr(String pnr) {
		this.pnr = pnr;
	}

	public String getFlightCode() {
		return flightCode;
	}

	public void setFlightCode(String flightCode) {
		this.flightCode = flightCode;
	}

	public String getRouteCode() {
		return routeCode;
	}

	public void setRouteCode(String routeCode) {
		this.routeCode = routeCode;
	}

	public String getTravelDate() {
		return travelDate;
	}

	public void setTravelDate(String travelDate) {
		this.travelDate = travelDate;
	}

	public int getTotalPassengers() {
		return totalPassengers;
	}

	public void setTotalPassengers(int totalPassengers) {
		this.totalPassengers = totalPassengers;
	}

	public StringBuffer getPassengerNames() {
		return passengerNames;
	}

	public void setPassengerNames(StringBuffer passengerNames) {
		this.passengerNames = passengerNames;
	}

	public StringBuffer getSeatNumbers() {
		return seatNumbers;
	}

	public void setSeatNumbers(StringBuffer seatNumbers) {
		this.seatNumbers = seatNumbers;
	}


	public final StringBuffer getPassengerAges() {
		return passengerAges;
	}

	public final void setPassengerAges(StringBuffer passengerAges) {
		this.passengerAges = passengerAges;
	}

	public float getTotalFare() {
		return totalFare;
	}

	public void setTotalFare(float totalFare) {
		this.totalFare = totalFare;
	}
	
	

}
