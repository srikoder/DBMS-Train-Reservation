/*
 1. To update the remaining seats after each booking
 */
DELIMITER $$

CREATE TRIGGER decrease_remain_count
    AFTER INSERT
    ON passenger_desc_future FOR EACH ROW
BEGIN
  IF ((
          SELECT ticket_desc_future.coach_type
          FROM ticket_desc_future
          WHERE ticket_desc_future.PNR_number = NEW.PNR_number
      ) = 'AC') THEN
    UPDATE train_desc_future set remain_AC_seats = remain_AC_seats - 1
      WHERE (train_desc_future.train_id, train_desc_future.date_of_journey) = 
            (SELECT ticket_desc_future.train_id, ticket_desc_future.date_of_journey from ticket_desc_future where ticket_desc_future.PNR_number = NEW.PNR_number);
    ELSE
    UPDATE train_desc_future set remain_SL_seats = remain_SL_seats - 1
      WHERE (train_desc_future.train_id, train_desc_future.date_of_journey) = 
            (SELECT ticket_desc_future.train_id, ticket_desc_future.date_of_journey from ticket_desc_future where ticket_desc_future.PNR_number = NEW.PNR_number);
    END IF;
    
END$$

DELIMITER ;
