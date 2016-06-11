package com.ars.model;

import java.util.HashMap;
import java.util.Map;

public class Flight {
	
	String flightCode;
	
	String flightName;
	
	String classCode;
	
	int totalExecSeats;
	
	int totalEconSeats;
	
	Map<String,Float> fareMap = new HashMap<String,Float>();
	
	String source;
	
	String destination;
	
	String via;
	
	String totalTime;
	
	String departureTime;
	
	String routeCode;
	
	String airCraftNo;
	
	int fleetId;
	
	String clubPreCapacity;
	
	String engineType;
	
	String economicCapacity;
	
	String airLength;
	
	String wingSpam;
	
	float cruiseSpeed;
	
	float execSeatFare;
	
	float econSeatFare;
	
	
	public final float getExecSeatFare() {
		return execSeatFare;
	}

	public final void setExecSeatFare(float execSeatFare) {
		this.execSeatFare = execSeatFare;
	}

	public final float getEconSeatFare() {
		return econSeatFare;
	}

	public final void setEconSeatFare(float econSeatFare) {
		this.econSeatFare = econSeatFare;
	}

	public String getFlightCode() {
		return flightCode;
	}

	public void setFlightCode(String flightCode) {
		this.flightCode = flightCode;
	}

	public String getFlightName() {
		return flightName;
	}

	public void setFlightName(String flightName) {
		this.flightName = flightName;
	}

	public String getClassCode() {
		return classCode;
	}

	public void setClassCode(String classCode) {
		this.classCode = classCode;
	}

	public int getTotalExecSeats() {
		return totalExecSeats;
	}

	public void setTotalExecSeats(int totalExecSeats) {
		this.totalExecSeats = totalExecSeats;
	}

	public int getTotalEconSeats() {
		return totalEconSeats;
	}

	public void setTotalEconSeats(int totalEconSeats) {
		this.totalEconSeats = totalEconSeats;
	}

	public Map<String, Float> getFareMap() {
		return fareMap;
	}

	public void setFareMap(Map<String, Float> fareMap) {
		this.fareMap = fareMap;
	}

	public String getSource() {
		return source;
	}

	public void setSource(String source) {
		this.source = source;
	}

	public String getDestination() {
		return destination;
	}

	public void setDestination(String destination) {
		this.destination = destination;
	}

	public String getVia() {
		return via;
	}

	public void setVia(String via) {
		this.via = via;
	}


	public final String getTotalTime() {
		return totalTime;
	}

	public final void setTotalTime(String totalTime) {
		this.totalTime = totalTime;
	}

	public String getDepartureTime() {
		return departureTime;
	}

	public void setDepartureTime(String departureTime) {
		this.departureTime = departureTime;
	}

	public String getRouteCode() {
		return routeCode;
	}

	public void setRouteCode(String routeCode) {
		this.routeCode = routeCode;
	}

	public String getAirCraftNo() {
		return airCraftNo;
	}

	public void setAirCraftNo(String airCraftNo) {
		this.airCraftNo = airCraftNo;
	}

	public int getFleetId() {
		return fleetId;
	}

	public void setFleetId(int fleetId) {
		this.fleetId = fleetId;
	}

	public String getClubPreCapacity() {
		return clubPreCapacity;
	}

	public void setClubPreCapacity(String clubPreCapacity) {
		this.clubPreCapacity = clubPreCapacity;
	}

	public String getEngineType() {
		return engineType;
	}

	public void setEngineType(String engineType) {
		this.engineType = engineType;
	}

	public String getEconomicCapacity() {
		return economicCapacity;
	}

	public void setEconomicCapacity(String economicCapacity) {
		this.economicCapacity = economicCapacity;
	}

	public String getAirLength() {
		return airLength;
	}

	public void setAirLength(String airLength) {
		this.airLength = airLength;
	}

	public String getWingSpam() {
		return wingSpam;
	}

	public void setWingSpam(String wingSpam) {
		this.wingSpam = wingSpam;
	}

	public float getCruiseSpeed() {
		return cruiseSpeed;
	}

	public void setCruiseSpeed(float cruiseSpeed) {
		this.cruiseSpeed = cruiseSpeed;
	}
	
	
	

}
