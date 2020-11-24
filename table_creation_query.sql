CREATE TABLE train_desc_future (
	train_id CHAR(5),
	date_of_journey CHAR(8),
	number_of_AC_coach INT,
	number_of_SL_coach INT,
	remain_AC_seats INT,
	remain_SL_seats INT,
	price_AC NUMERIC(7, 2),
	price_SL NUMERIC(7, 2),
	train_status CHAR(1),
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

CREATE TABLE control_admin (
	admin_name VARCHAR(30),
	admin_id CHAR(5),
	admin_password CHAR(8)
);

CREATE TABLE coach_desc_ac (berth_number INT, berth_type CHAR(2));

CREATE TABLE coach_desc_sl (berth_number INT, berth_type CHAR(2));

/* queries to initialise the coach_desc_ac table */
insert into coach_desc_ac values(1, LB);
insert into coach_desc_ac values(2, LB);
insert into coach_desc_ac values(3, UB);
insert into coach_desc_ac values(4, UB);
insert into coach_desc_ac values(5, SL);
insert into coach_desc_ac values(6, SU);
insert into coach_desc_ac values(7, LB);
insert into coach_desc_ac values(8, LB);
insert into coach_desc_ac values(9, UB);
insert into coach_desc_ac values(10, UB);
insert into coach_desc_ac values(11, SL);
insert into coach_desc_ac values(12, SU);
insert into coach_desc_ac values(13, LB);
insert into coach_desc_ac values(14, LB);
insert into coach_desc_ac values(15, UB);
insert into coach_desc_ac values(16, UB);
insert into coach_desc_ac values(17, SL);
insert into coach_desc_ac values(18, SU);

/* queries to initialise the coach_desc_sl table */
insert into coach_desc_sl values(1, LB);
insert into coach_desc_sl values(2, MB);
insert into coach_desc_sl values(3, UB);
insert into coach_desc_sl values(4, LB);
insert into coach_desc_sl values(5, MB);
insert into coach_desc_sl values(6, UB);
insert into coach_desc_sl values(7, SL);
insert into coach_desc_sl values(8, SU);
insert into coach_desc_sl values(9, LB);
insert into coach_desc_sl values(10, MB);
insert into coach_desc_sl values(11, UB);
insert into coach_desc_sl values(12, LB);
insert into coach_desc_sl values(13, MB);
insert into coach_desc_sl values(14, UB);
insert into coach_desc_sl values(15, SL);
insert into coach_desc_sl values(16, SU);
insert into coach_desc_sl values(17, LB);
insert into coach_desc_sl values(18, MB);
insert into coach_desc_sl values(19, UB);
insert into coach_desc_sl values(20, LB);
insert into coach_desc_sl values(21, MB);
insert into coach_desc_sl values(22, UB);
insert into coach_desc_sl values(23, SL);
insert into coach_desc_sl values(24, SU);
