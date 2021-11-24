package com.passengerManagement.flightCheckIn.Controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import com.passengerManagement.flightCheckIn.Integration.ReservationRestClient;
import com.passengerManagement.flightCheckIn.Integration.DataTransferObjects.Reservation;
import com.passengerManagement.flightCheckIn.Integration.DataTransferObjects.ReservationUpdateRequest;

@Controller
public class CheckInController {

	@Autowired
	ReservationRestClient reservationRestClient;

	@RequestMapping("/showCheckIn")
	public String showCheckIn() {
		return "checkIn/showCheckIn";
	}

	@RequestMapping("/startCheckIn")
	public String startCheckIn(Integer reservationId, ModelMap modelMap) {
		modelMap.addAttribute("reservation", this.reservationRestClient.findReservation(reservationId));
		return "checkIn/startCheckIn";
	}

	@RequestMapping("/CompleteCheckIn")
	public String CompleteCheckIn(@RequestParam("reservationId") Integer reservationId,
			@RequestParam("reservationNumberOfBags") Integer reservationNumberOfBags, ModelMap modelMap) {
		ReservationUpdateRequest reservationUpdateRequest = new ReservationUpdateRequest();
		reservationUpdateRequest.setReservationId(reservationId);
		reservationUpdateRequest.setReservationNumberOfBags(reservationNumberOfBags);
		reservationUpdateRequest.setReservationCheckedIn(true);

		modelMap.addAttribute("Reservation",
				(Reservation) this.reservationRestClient.updateReservation(reservationUpdateRequest));
		return "checkIn/CompleteCheckIn";
	}
}
