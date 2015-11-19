/* WARNING: THIS SCRIPT WILL DELETE ALL EXISTING FIG DATA */

/* Drop any old tables */
DROP TABLE IF EXISTS FIG_USER;
DROP TABLE IF EXISTS FIG_EXERCISE;
DROP TABLE IF EXISTS FIG_WORKOUT;

CREATE TABLE FIG_USER
(
	user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,   -- PK
	name VARCHAR(100),      -- name of the user
	username VARCHAR(100),  -- what they use to login with
	password VARCHAR(100),  -- password (SHA2)
	points INT UNSIGNED,	-- how many points do I have
	
	PRIMARY KEY(user_id)
);

CREATE TABLE FIG_EXERCISE
(
	eid INT UNSIGNED NOT NULL AUTO_INCREMENT, -- unique exercise id
	name VARCHAR(100),      -- name of the exercise
	kcalhr INT UNSIGNED,    -- how many calories it burns
	description TEXT,       -- description of the exercise
	
	PRIMARY KEY(eid)
);

CREATE TABLE FIG_WORKOUT
(
	/* Key values */
	user_id INT UNSIGNED,   -- CK and FK to FIG_USER
	exercise INT UNSIGNED,  -- CK and FK to FIG_EXERCISE
	performed_on DATETIME,  -- when the user did the exercise
	
	minutes INT UNSIGNED,   -- Number of minutes the workout lasted
	
	PRIMARY KEY (user_id, exercise, performed_on),
	
	FOREIGN KEY (user_id)
		REFERENCES FIG_USER(user_id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
		
	FOREIGN KEY (exercise)
		REFERENCES FIG_EXERCISE(eid)
		ON DELETE SET NULL
		ON UPDATE CASCADE
);

