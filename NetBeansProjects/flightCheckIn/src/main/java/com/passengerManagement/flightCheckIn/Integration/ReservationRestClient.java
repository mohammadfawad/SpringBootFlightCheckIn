package com.passengerManagement.flightCheckIn.Integration;

import com.passengerManagement.flightCheckIn.Integration.DataTransferObjects.Reservation;
import com.passengerManagement.flightCheckIn.Integration.DataTransferObjects.ReservationUpdateRequest;

public interface ReservationRestClient {

	public Reservation findReservation(Integer reservationId);
	public Reservation updateReservation(ReservationUpdateRequest reservationUpdateRequest);
}
