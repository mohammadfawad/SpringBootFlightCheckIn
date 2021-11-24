<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    <%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
    <%@page isELIgnored="false" %>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>startCheckIn</title>
</head>
<body>
	<div align="center">
		<h2>startCheckIn</h2>
		<table border="2" style="align-content: center;">
			<thead>
				<tr>
					<td colspan="12" align="center"><h3><i>Reservation Details</i></h3></td>
				</tr>
			</thead>
			<tbody align="center">
				<tr>
					<td></td>
					<td></td>
					<td><h4>ReservationId</h4></td>
					<td>${reservation.reservationId }</td>
					<td><h4>ReservationCheckedIn</h4></td>
					<td>${reservation.reservationCheckedIn }</td>
					<td><h4>ReservationNumberOfBags</h4></td>
					<td>${reservation.reservationNumberOfBags }</td>
					<td><h4>Created</h4></td>
					<td>${reservation.created }</td>
					<td></td>
					<td></td>
				</tr>
				
				<tr>
					<td><h4>PassengerFirstName</h4></td>
					<td>${reservation.reservationPassengerId.passengerFirstName }</td>
					<td><h4>PassengerLastName</h4></td>
					<td>${reservation.reservationPassengerId.passengerLastName }</td>
					<td><h4>PassengerMiddleName</h4></td>
					<td>${reservation.reservationPassengerId.passengerMiddleName }</td>
					<td><h4>PassengerEmail</h4></td>
					<td>${reservation.reservationPassengerId.passengerEmail }</td>
					<td><h4>PassengerPhone</h4></td>
					<td>${reservation.reservationPassengerId.passengerPhone }</td>
					<td></td>
					<td></td>
				</tr>
				
				<tr>
					<td><h4>FlightNumber</h4></td>
					<td>${reservation.reservationFlightId.flightNumber }</td>
					<td><h4>OperatingAirlines</h4></td>
					<td>${reservation.reservationFlightId.operatingAirlines }</td>
					<td><h4>DepartureCity</h4></td>
					<td>${reservation.reservationFlightId.departureCity }</td>
					<td><h4>ArrivalCity</h4></td>
					<td>${reservation.reservationFlightId.arrivalCity }</td>
					<td><h4>DateOfDeparture</h4></td>
					<td>${reservation.reservationFlightId.dateOfDeparture }</td>
					<td><h4>EstimatedDepartureTime</h4></td>
					<td>${reservation.reservationFlightId.estimatedDepartureTime }</td>
				</tr>
				
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<form action="CompleteCheckIn" method="post">
						<td><h4>Number Of Bags</h4></td>
						<td><input type="text" name="reservationNumberOfBags"/></td>
						<td><input type="hidden" name="reservationId" value="${reservation.reservationId }"/></td>
						<td><input type="submit" value="CheckIn" /></td>
					</form>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>