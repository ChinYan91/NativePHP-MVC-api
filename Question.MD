# Table name: score_result

* { "ID":1, "first_name":"Chris", "last_name":"Stone", "Score":800, "Count":8, "Average":100.00, "Status":"Ready", "Modified_Date":"2021-06-03 09:35:16"},

* { "ID":2, "first_name":"Jane", "last_name":"Brown", "Score":976, "Count":7, "Average":139.43, "Status":"Ready", "Modified_Date":"2021-06-03 10:07:56"},

* { "ID":3, "first_name":"John", "last_name":"Doe", "Score":560, "Count":6, "Average":Null, "Status":"Pending", "Modified_Date":"2021-06-03 12:01:53"},

* { "ID":4, "first_name":"Steph", "last_name":"Jones", "Score":658, "Count":7, "Average":Null, "Status":"Pending", "Modified_Date":"2021-06-03 12:01:54"}




-----------------------------------------------------------

# 1. Write a RESTful endpoint for each of the action below.

## a) Insert new record based on JSON packet 
* {“first_name”: “Harry”, “last_name”: “Evans”, “score”: 459, “count”: 4}. 
* Leave ID as auto incremental field, 
* set Status as default Pending, 
* Average as default NULL,
* Modified Date as default current date.

## b) Get ID for new inserted record in a) based on Name = Harry Evans.

## c) Update existing record based on JSON packet 
* {“id”: 2, “score”: 995, “count”: 8}. 
* Reset Status to Pending, 
* Average to NULL, 
* Modified Date to current date.

## d) Delete existing record where ID = 3.

# 2. Write a program that regularly query the table score_result 
* every 10 seconds for records with Pending status.
* Update the record Average by formula Score / Count (round up to 2 decimal),
* Status to Ready and Modified Date to current date