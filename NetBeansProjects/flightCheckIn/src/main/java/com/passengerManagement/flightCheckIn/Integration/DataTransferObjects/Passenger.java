/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.passengerManagement.flightCheckIn.Integration.DataTransferObjects;

/**
 *
 * @author spring
 */
public class Passenger {

	private Integer passengerId;
	private String passengerFirstName;
	private String passengerLastName;
	private String passengerMiddleName;
	private String passengerEmail;
	private String passengerPhone;

	public Passenger() {
	}

	public Passenger(Integer passengerId) {
		this.passengerId = passengerId;
	}

	public Integer getPassengerId() {
		return passengerId;
	}

	public void setPassengerId(Integer passengerId) {
		this.passengerId = passengerId;
	}

	public String getPassengerFirstName() {
		return passengerFirstName;
	}

	public void setPassengerFirstName(String passengerFirstName) {
		this.passengerFirstName = passengerFirstName;
	}

	public String getPassengerLastName() {
		return passengerLastName;
	}

	public void setPassengerLastName(String passengerLastName) {
		this.passengerLastName = passengerLastName;
	}

	public String getPassengerMiddleName() {
		return passengerMiddleName;
	}

	public void setPassengerMiddleName(String passengerMiddleName) {
		this.passengerMiddleName = passengerMiddleName;
	}

	public String getPassengerEmail() {
		return passengerEmail;
	}

	public void setPassengerEmail(String passengerEmail) {
		this.passengerEmail = passengerEmail;
	}

	public String getPassengerPhone() {
		return passengerPhone;
	}

	public void setPassengerPhone(String passengerPhone) {
		this.passengerPhone = passengerPhone;
	}

	@Override
	public int hashCode() {
		int hash = 0;
		hash += (passengerId != null ? passengerId.hashCode() : 0);
		return hash;
	}

	@Override
	public boolean equals(Object object) {
		// TODO: Warning - this method won't work in the case the id fields are not set
		if (!(object instanceof Passenger)) {
			return false;
		}
		Passenger other = (Passenger) object;
		if ((this.passengerId == null && other.passengerId != null)
				|| (this.passengerId != null && !this.passengerId.equals(other.passengerId))) {
			return false;
		}
		return true;
	}

	@Override
	public String toString() {
		StringBuilder builder = new StringBuilder();
		builder.append("Passenger [passengerId=");
		builder.append(passengerId);
		builder.append(", passengerFirstName=");
		builder.append(passengerFirstName);
		builder.append(", passengerLastName=");
		builder.append(passengerLastName);
		builder.append(", passengerMiddleName=");
		builder.append(passengerMiddleName);
		builder.append(", passengerEmail=");
		builder.append(passengerEmail);
		builder.append(", passengerPhone=");
		builder.append(passengerPhone);
		builder.append(", reservationCollection=");
		builder.append("]");
		return builder.toString();
	}

}
