

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@ page import="java.sql.*" %>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
<%
    String fullname=request.getParameter("username");
    String pass=request.getParameter("pass");
    try
    {
         Class.forName("com.mysql.jdbc.Driver");
           Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/wt", "root", "root");
           Statement st=conn.createStatement();
   
           int i=st.executeUpdate("insert into login(username,pass)values('"+fullname+"','"+pass+"')");
         
        response.sendRedirect("index.html"); 
        }
        catch(Exception e)
        {
        System.out.print(e);
        e.printStackTrace();
        }
 %>
        
    </body>
</html>