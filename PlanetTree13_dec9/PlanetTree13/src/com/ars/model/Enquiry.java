package com.ars.model;

public class Enquiry {

	int id;
	
	String name;
	
	String emailId;
	
	String message;

	String enquiryDate;
	
	String status;
	
	String serviceType;
	
	String Address1;
	
	String Species;
	
	String response;
	
	int NoTrees;
	
	
	
	public String getServiceType() {
		return serviceType;
	}

	public void setServiceType(String serviceType) {
		this.serviceType = serviceType;
	}

	public final String getResponse() {
		return response;
	}

	public final void setResponse(String response) {
		this.response = response;
	}

	public final String getEnquiryDate() {
		return enquiryDate;
	}

	public final void setEnquiryDate(String enquiryDate) {
		this.enquiryDate = enquiryDate;
	}

	public final String getStatus() {
		return status;
	}

	public final void setStatus(String status) {
		this.status = status;
	}

	public final int getId() {
		return id;
	}

	public final void setId(int id) {
		this.id = id;
	}

	public final String getName() {
		return name;
	}

	public final void setName(String name) {
		this.name = name;
	}

	public final String getEmailId() {
		return emailId;
	}

	public final void setEmailId(String emailId) {
		this.emailId = emailId;
	}
	
	public final String getAddress1() {
		return Address1;
	}

	public final void setAddress1(String Address1) {
		this.Address1 = Address1;
	}

	public final String getMessage() {
		return message;
	}

	public final void setMessage(String message) {
		this.message = message;
	}
	
	public final String getSpecies() {
		return Species;
	}

	public final void setSpecies(String Species) {
		this.Species = Species;
	}
	
	public final int getNoTrees() {
		return NoTrees;
	}

	public final void setNoTrees(int NoTrees) {
		this.NoTrees = NoTrees;
	}
	
	
}
