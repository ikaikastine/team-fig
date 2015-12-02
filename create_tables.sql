/* WARNING: THIS SCRIPT WILL DELETE ALL EXISTING FIG DATA */

/* Drop any old tables */
DROP TABLE IF EXISTS FIG_USER;
DROP TABLE IF EXISTS FIG_EXERCISE;
DROP TABLE IF EXISTS FIG_WORKOUT;

CREATE TABLE FIG_USER
(
	user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,   -- PK
	name VARCHAR(100) NOT NULL,      -- name of the user
	username VARCHAR(100) NOT NULL,  -- what they use to login with
	password VARCHAR(100) NOT NULL,  -- password (SHA2)
	points INT UNSIGNED NOT NULL DEFAULT 0,	-- how many points do I have
	
	picture BLOB, -- should we store the pic in the db or just store the path?
	weight INT,
	height INT,
	age INT,
	location VARCHAR(100),
	
	PRIMARY KEY(user_id)
);

CREATE TABLE FIG_EXERCISE
(
	eid INT UNSIGNED NOT NULL AUTO_INCREMENT, -- unique exercise id
	name VARCHAR(100),      -- name of the exercise
	kcalhr INT UNSIGNED,    -- how many calories it burns

	PRIMARY KEY(eid)
);

CREATE TABLE FIG_WORKOUT
(
	/* Key values */
	user_id INT UNSIGNED,   -- CK and FK to FIG_USER
	exercise INT UNSIGNED,  -- CK and FK to FIG_EXERCISE
	performed_on DATETIME,  -- when the user did the exercise
	notes TEXT,       -- user notes	
	
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

INSERT INTO FIG_EXERCISE (name, kcalhr, description) VALUES
('Golf', 368),
('Fencing', 490),
('Cleaning gutters', 409),
('Ballroom dancing', 401),
('Archery', 409),
('Bird watching', 204),
('Water polo', 817),
('Squash', 981);
