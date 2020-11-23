CREATE TABLE train_desc_future (
	train_id CHAR(5),
	date_of_journey CHAR(8),
	number_of_AC_coach INT,
	number_of_SL_coach INT,
	remain_AC_seats INT,
	remain_SL_seats INT,
	price_AC NUMERIC(7, 2),
	price_SL NUMERIC(7, 2),
	PRIMARY KEY (train_id, date_of_journey)
);

CREATE TABLE train_desc_history (
	train_id CHAR(5),
	date_of_journey CHAR(8),
	number_of_AC_coach INT,
	number_of_SL_coach INT,
	remain_AC_seats INT,
	remain_SL_seats INT,
	price_AC NUMERIC(7, 2),
	price_SL NUMERIC(7, 2),
	PRIMARY KEY (train_id, date_of_journey)
);

CREATE TABLE agent (
	agent_name VARCHAR(30),
	agent_id CHAR(5),
	agent_card CHAR(12),
	agent_address VARCHAR(40),
	agent_password CHAR(8),
	PRIMARY KEY (agent_id)
);

CREATE TABLE ticket_desc_future (
	PNR_number CHAR(17),
	date_of_journey CHAR(8),
	train_id CHAR(5),
	agent_id CHAR(5),
	passenger_count INT,
	coach_type CHAR(2),
	PRIMARY KEY (PNR_number),
	FOREIGN KEY (agent_id) REFERENCES agent(agent_id),
	FOREIGN KEY (train_id, date_of_journey) REFERENCES train_desc_future(train_id, date_of_journey)
);

CREATE TABLE ticket_desc_history (
	PNR_number CHAR(17),
	date_of_journey CHAR(8),
	train_id CHAR(5),
	agent_id CHAR(5),
	passenger_count INT,
	coach_type CHAR(2),
	PRIMARY KEY (PNR_number),
	FOREIGN KEY (agent_id) REFERENCES agent(agent_id),
	FOREIGN KEY (train_id, date_of_journey) REFERENCES train_desc_history(train_id, date_of_journey)
);

CREATE TABLE passenger_desc_future (
	passenger_name VARCHAR(30),
	age INT,
	gender VARCHAR(12),
	PNR_number CHAR(17),
	berth_number INT,
	berth_type CHAR(2),
	coach_number INT,
	FOREIGN KEY (PNR_number) REFERENCES ticket_desc_future(PNR_number)
);

CREATE TABLE passenger_desc_history (
	passenger_name VARCHAR(30),
	age INT,
	gender VARCHAR(12),
	PNR_number CHAR(17),
	berth_number INT,
	berth_type CHAR(2),
	coach_number INT,
	FOREIGN KEY (PNR_number) REFERENCES ticket_desc_history(PNR_number)
);

CREATE TABLE admin (
	admin_name VARCHAR(30),
	admin_id CHAR(5),
	admin_password CHAR(8)
);

CREATE TABLE coach_desc (berth_number INT, berth_type CHAR(2))