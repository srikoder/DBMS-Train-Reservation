/* To transfer the data from future to past table */

DELIMITER $$

CREATE PROCEDURE EOD(
    IN curr_date CHAR(8)
)
BEGIN
  INSERT INTO train_desc_history (SELECT * FROM train_desc_future WHERE STRCMP(curr_date, train_desc_future.date_of_journey) >= 0);
    
  INSERT INTO ticket_desc_history (SELECT * FROM ticket_desc_future WHERE STRCMP(curr_date, ticket_desc_future.date_of_journey) >= 0);

  INSERT INTO passenger_desc_history (SELECT * FROM passenger_desc_future WHERE STRCMP(curr_date, SUBSTRING(passenger_desc_future.PNR_number, 6, 8)) >= 0);

  DELETE FROM passenger_desc_future WHERE STRCMP(curr_date, SUBSTRING(passenger_desc_future.PNR_number, 6, 8)) >= 0;
    
  DELETE FROM ticket_desc_future WHERE STRCMP(curr_date, ticket_desc_future.date_of_journey) >= 0;

  DELETE FROM train_desc_future WHERE STRCMP(curr_date, train_desc_future.date_of_journey) >= 0;

END $$

DELIMITER ;
