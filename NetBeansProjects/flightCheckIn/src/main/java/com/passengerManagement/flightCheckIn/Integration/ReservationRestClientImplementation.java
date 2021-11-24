package com.passengerManagement.flightCheckIn.Integration;

import org.springframework.stereotype.Component;
import org.springframework.web.client.RestTemplate;

import com.passengerManagement.flightCheckIn.Integration.DataTransferObjects.Reservation;
import com.passengerManagement.flightCheckIn.Integration.DataTransferObjects.ReservationUpdateRequest;

@Component
public class ReservationRestClientImplementation implements ReservationRestClient {

	private static final String Reservation_Rest_URL = "http://localhost:8082/flightReservation/reservations/";

	@Override
	public Reservation findReservation(Integer reservationId) {
		// TODO Auto-generated method stub
		RestTemplate restTemplate = new RestTemplate();
		return restTemplate.getForObject(ReservationRestClientImplementation.getReservationRestUrl() + reservationId,
				Reservation.class);
	}

	@Override
	public Reservation updateReservation(ReservationUpdateRequest reservationUpdateRequest) {
		// TODO Auto-generated method stub
		RestTemplate restTemplate = new RestTemplate();
		return restTemplate.postForObject(ReservationRestClientImplementation.getReservationRestUrl(),
				reservationUpdateRequest, Reservation.class);
	}

	/**
	 * @return the reservationRestUrl
	 */
	public static String getReservationRestUrl() {
		return Reservation_Rest_URL;
	}

}
