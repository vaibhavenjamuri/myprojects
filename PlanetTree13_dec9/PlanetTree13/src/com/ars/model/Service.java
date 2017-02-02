package com.ars.model;

public class Service {

	int serviceId;
	
	String serviceType;
	
	String description;
	
	String status;
	
	String userName;
	
	String requestDate;
	
	String priority;

	public final int getServiceId() {
		return serviceId;
	}

	public final void setServiceId(int serviceId) {
		this.serviceId = serviceId;
	}

	public final String getServiceType() {
		return serviceType;
	}

	public final void setServiceType(String serviceType) {
		this.serviceType = serviceType;
	}

	public final String getDescription() {
		return description;
	}

	public final void setDescription(String description) {
		this.description = description;
	}

	public final String getStatus() {
		return status;
	}

	public final void setStatus(String status) {
		this.status = status;
	}

	public final String getUserName() {
		return userName;
	}

	public final void setUserName(String userName) {
		this.userName = userName;
	}

	public final String getRequestDate() {
		return requestDate;
	}

	public final void setRequestDate(String requestDate) {
		this.requestDate = requestDate;
	}

	public final String getPriority() {
		return priority;
	}

	public final void setPriority(String priority) {
		this.priority = priority;
	}
	
	
}
