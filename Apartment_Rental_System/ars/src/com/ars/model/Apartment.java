package com.ars.model;

public class Apartment {

	int aptId;
	
	String aptNo;
	
	String location;
	
	String city;
	
	String state;
	
	float toRent=0;
	
	float fromRent=0;
	
	String country;
	
	String status;
	
	StringBuffer amenities = new StringBuffer();
	
	String flatNo;
	
	String flatType;
	
	float rent;
	
	float otherCharges;
	
	int maxPersons;
	
	String bond;
	
	String advance;
		
	String description;
	
	int bedrooms;
	
	int bathrooms;
	

	public float getToRent() {
		return toRent;
	}

	public void setToRent(float toRent) {
		this.toRent = toRent;
	}

	public float getFromRent() {
		return fromRent;
	}

	public void setFromRent(float fromRent) {
		this.fromRent = fromRent;
	}

	public StringBuffer getAmenities() {
		return amenities;
	}

	public void setAmenities(StringBuffer amenities) {
		this.amenities = amenities;
	}

	public final String getDescription() {
		return description;
	}

	public final void setDescription(String description) {
		this.description = description;
	}

	public final int getBedrooms() {
		return bedrooms;
	}

	public final void setBedrooms(int bedrooms) {
		this.bedrooms = bedrooms;
	}

	public final int getBathrooms() {
		return bathrooms;
	}

	public final void setBathrooms(int bathrooms) {
		this.bathrooms = bathrooms;
	}

	public final int getAptId() {
		return aptId;
	}

	public final void setAptId(int aptId) {
		this.aptId = aptId;
	}

	public final String getAptNo() {
		return aptNo;
	}

	public final void setAptNo(String aptNo) {
		this.aptNo = aptNo;
	}

	public final String getLocation() {
		return location;
	}

	public final void setLocation(String location) {
		this.location = location;
	}

	public final String getCity() {
		return city;
	}

	public final void setCity(String city) {
		this.city = city;
	}

	public final String getState() {
		return state;
	}

	public final void setState(String state) {
		this.state = state;
	}

	public final String getCountry() {
		return country;
	}

	public final void setCountry(String country) {
		this.country = country;
	}

	public final String getStatus() {
		return status;
	}

	public final void setStatus(String status) {
		this.status = status;
	}

	public final String getFlatNo() {
		return flatNo;
	}

	public final void setFlatNo(String flatNo) {
		this.flatNo = flatNo;
	}

	public final String getFlatType() {
		return flatType;
	}

	public final void setFlatType(String flatType) {
		this.flatType = flatType;
	}

	public final float getRent() {
		return rent;
	}

	public final void setRent(float rent) {
		this.rent = rent;
	}

	public final float getOtherCharges() {
		return otherCharges;
	}

	public final void setOtherCharges(float otherCharges) {
		this.otherCharges = otherCharges;
	}

	public final int getMaxPersons() {
		return maxPersons;
	}

	public final void setMaxPersons(int maxPersons) {
		this.maxPersons = maxPersons;
	}

	public final String getBond() {
		return bond;
	}

	public final void setBond(String bond) {
		this.bond = bond;
	}

	public final String getAdvance() {
		return advance;
	}

	public final void setAdvance(String advance) {
		this.advance = advance;
	}
	
	
}
