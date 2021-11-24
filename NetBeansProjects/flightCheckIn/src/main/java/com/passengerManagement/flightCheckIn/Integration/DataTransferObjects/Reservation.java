/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.passengerManagement.flightCheckIn.Integration.DataTransferObjects;

import java.util.Date;

/**
 *
 * @author spring
 */
public class Reservation  {
	
	private Integer reservationId;
	private Boolean reservationCheckedIn;
	private Integer reservationNumberOfBags;	
	private Date created;	
	private Passenger reservationPassengerId;	
	private Flight reservationFlightId;

	public Reservation() {
	}

	public Reservation(Integer reservationId) {
		this.reservationId = reservationId;
	}

	public Reservation(Integer reservationId, Date created) {
		this.reservationId = reservationId;
		this.created = created;
	}

	public Integer getReservationId() {
		return reservationId;
	}

	public void setReservationId(Integer reservationId) {
		this.reservationId = reservationId;
	}

	public Boolean getReservationCheckedIn() {
		return reservationCheckedIn;
	}

	public void setReservationCheckedIn(Boolean reservationCheckedIn) {
		this.reservationCheckedIn = reservationCheckedIn;
	}

	public Integer getReservationNumberOfBags() {
		return reservationNumberOfBags;
	}

	public void setReservationNumberOfBags(Integer reservationNumberOfBags) {
		this.reservationNumberOfBags = reservationNumberOfBags;
	}

	public Date getCreated() {
		return created;
	}

	public void setCreated(Date created) {
		this.created = created;
	}

	public Passenger getReservationPassengerId() {
		return reservationPassengerId;
	}

	public void setReservationPassengerId(Passenger reservationPassengerId) {
		this.reservationPassengerId = reservationPassengerId;
	}

	public Flight getReservationFlightId() {
		return reservationFlightId;
	}

	public void setReservationFlightId(Flight reservationFlightId) {
		this.reservationFlightId = reservationFlightId;
	}

	@Override
	public int hashCode() {
		int hash = 0;
		hash += (reservationId != null ? reservationId.hashCode() : 0);
		return hash;
	}

	@Override
	public boolean equals(Object object) {
		// TODO: Warning - this method won't work in the case the id fields are not set
		if (!(object instanceof Reservation)) {
			return false;
		}
		Reservation other = (Reservation) object;
		if ((this.reservationId == null && other.reservationId != null)
				|| (this.reservationId != null && !this.reservationId.equals(other.reservationId))) {
			return false;
		}
		return true;
	}

	@Override
	public String toString() {
		StringBuilder builder = new StringBuilder();
		builder.append("Reservation [reservationId=");
		builder.append(reservationId);
		builder.append(", reservationCheckedIn=");
		builder.append(reservationCheckedIn);
		builder.append(", reservationNumberOfBags=");
		builder.append(reservationNumberOfBags);
		builder.append(", created=");
		builder.append(created);
		builder.append(", reservationPassengerId=");
		builder.append(reservationPassengerId.getPassengerId());
		builder.append(", reservationFlightId=");
		builder.append(reservationFlightId.getFlightId());
		builder.append("]");
		return builder.toString();
	}

}
