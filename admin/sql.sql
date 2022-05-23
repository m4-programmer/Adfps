 

CREATE TABLE dues_payment AS SELECT (fname,oname,lname,stu_regno,descrip,amount,fees.level,dept,students.level,curr_year,reference_id,amount_paid,date(date_paid)as year) as VIEW  FROM students
INNER JOIN payment ON students.id= payment.stu_id
INNER JOIN fullfees on fullfees.id = payment.stu_fees
INNER JOIN fees on fees.level = fullfees.level

update duepayment set amount_paid = 2000 
WHERE stu_regno = "2017/10001"