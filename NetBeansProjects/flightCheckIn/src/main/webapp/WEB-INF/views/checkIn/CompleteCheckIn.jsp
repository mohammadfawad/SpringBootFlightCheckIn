<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    <%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
    <%@page isELIgnored="false" %>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>CompletedCheckIn</title>
</head>
<body>
	<div align="center" style="color: olive;">
		<table border="1">
			<thead align="center"><tr><td colspan="12"><h2>CheckIn Completed</h2></td></tr></thead>
			<tbody align="center">
			<tr><td colspan="12"><b>Reservation Details</b></td></tr>
				<tr>
					<td><b>Reservation ID</b></td>
					<td>${Reservation.reservationId }</td>
					<td><b>CheckIn Status</b></td>
					<td>${Reservation.reservationCheckedIn }</td>
					<td><b>Number of Bags</b></td>
					<td>${Reservation.reservationNumberOfBags }</td>
					<td><b>Date of Reservation</b></td>
					<td>${Reservation.created }</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr><td colspan="12"><b>Passenger Details</b></td></tr>
				<tr>
					<td><b>PassengerId</b></td>
					<td>${Reservation.reservationPassengerId.passengerId }</td>
					<td><b>FirstName</b></td>
					<td>${Reservation.reservationPassengerId.passengerFirstName }</td>
					<td><b>LastName</b></td>
					<td>${Reservation.reservationPassengerId.passengerLastName }</td>
					<td><b>MiddleName</b></td>
					<td>${Reservation.reservationPassengerId.passengerMiddleName }</td>
					<td><b>Email</b></td>
					<td>${Reservation.reservationPassengerId.passengerEmail }</td>
					<td><b>Phone</b></td>
					<td>${Reservation.reservationPassengerId.passengerPhone }</td>
				</tr>
				<tr><td colspan="12"><b>Flight Detail</b></td></tr>
				<tr>
					<td><b>FlightNumber</b></td>
					<td>${Reservation.reservationFlightId.flightNumber }</td>
					<td><b>OperatingAirlines</b></td>
					<td>${Reservation.reservationFlightId.operatingAirlines }</td>
					<td><b>DepartureCity</b></td>
					<td>${Reservation.reservationFlightId.departureCity }</td>
					<td><b>ArrivalCity</b></td>
					<td>${Reservation.reservationFlightId.arrivalCity }</td>
					<td><b>DateOfDeparture</b></td>
					<td>${Reservation.reservationFlightId.dateOfDeparture }</td>
					<td><b>EstimatedDepartureTime</b></td>
					<td>${Reservation.reservationFlightId.estimatedDepartureTime }</td>
				</tr>			
			</tbody>
			<tfoot align="center">
				<tr><td colspan="12"><b>CheckIn Successfully!</b></td></tr>	
			</tfoot>
		</table>
	</div>
</body>
</html>