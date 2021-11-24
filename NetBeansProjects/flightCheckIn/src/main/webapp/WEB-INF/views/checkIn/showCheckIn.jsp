<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    <%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
    <%@page isELIgnored="false" %>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>ShowCheckIn</title>
</head>
	<body>
	<h2>Start CheckIn</h2>
		<form action="startCheckIn" method="post">
			Enter Reservation ID : <input type="text" name="reservationId">
			<input type="submit" value="StartCheckIn"/>
		</form>
	</body>
</html>