/* INSERT train INTO the train table for future only, for the history, raplace the table namoe rest is same
 */
INSERT INTO
	train_desc_future
VALUES
	(
		train_id,
		date_of_journey,
		number_of_AC_coach,
		number_of_SL_coach,
		remain_AC_seats,
		remain_SL_seats,
		price_AC,
		price_SL,
		train_status
	);

/* INSERT agent INTO agent table
 */
INSERT INTO
	agent
VALUES
	(
		agent_name,
		agent_id,
		agent_card,
		agent_address,
		agent_password
	);

/* INSERT the ticket INTO the ticket table
 */
INSERT INTO
	ticket_desc_future
VALUES
	(
		PNR_number,
		date_of_journey,
		train_id,
		agent_id,
		passenger_count,
		coach_type
	);

/* INSERT the passenger INTO the passenger list
 */
INSERT INTO
	passenger_desc_future
VALUES
	(
		passenger_name,
		age,
		gender,
		PNR_number,
		berth_number,
		berth_type,
		coach_number
	);

/* INSERT admin INTO admin table
 */
INSERT INTO
	control_admin
VALUES
	(
		admin_name,
		admin_id,
		admin_password
	);

/* INSERT the coach description INTO the coach_desc table
 */
INSERT INTO
	coach_desc
VALUES
	(berth_number, berth_type);
