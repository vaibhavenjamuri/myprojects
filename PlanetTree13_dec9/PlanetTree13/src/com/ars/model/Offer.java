package com.ars.model;

public class Offer {

	int offerId;
	
	String offerName;
	
	float discount;
	
	String validity;
	
	int baggageAllowance=0;
	
	float basicFare=0.0f;
	
	String date;
	
	String month;
	
	String year;
	
	String source;
	
	String destination;
	
	
	
	

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

	public final String getDate() {
		return date;
	}

	public final void setDate(String date) {
		this.date = date;
	}

	public final String getMonth() {
		return month;
	}

	public final void setMonth(String month) {
		this.month = month;
	}

	public final String getYear() {
		return year;
	}

	public final void setYear(String year) {
		this.year = year;
	}

	public final int getOfferId() {
		return offerId;
	}

	public final void setOfferId(int offerId) {
		this.offerId = offerId;
	}

	public final String getOfferName() {
		return offerName;
	}

	public final void setOfferName(String offerName) {
		this.offerName = offerName;
	}

	public final float getDiscount() {
		return discount;
	}

	public final void setDiscount(float discount) {
		this.discount = discount;
	}

	public final String getValidity() {
		return validity;
	}

	public final void setValidity(String validity) {
		this.validity = validity;
	}

	public final int getBaggageAllowance() {
		return baggageAllowance;
	}

	public final void setBaggageAllowance(int baggageAllowance) {
		this.baggageAllowance = baggageAllowance;
	}

	public final float getBasicFare() {
		return basicFare;
	}

	public final void setBasicFare(float basicFare) {
		this.basicFare = basicFare;
	}
	
		
	
}
