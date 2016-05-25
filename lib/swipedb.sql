-- If swipedb is not created, uncomment following line
-- CREATE DATABASE swipedb

USE swipedb;

CREATE TABLE members (
	id INTEGER unsigned NOT NULL auto_increment,	-- Automatically generated
	username varchar(100) NOT NULL default '', 		-- Set on account creation
	email varchar(100) NOT NULL default '',			-- Set on account creation
	password varchar(60) NOT NULL default '',		-- Set on account creation
	highscore INTEGER unsigned default 0,			-- Initially 0, set when user improves score in endless mode
	level INTEGER unsigned NOT NULL default 1,		-- Level progress, 1 = level 1; 2 = level 2; 3 = level 3; 4 = endless
	ach001 TINYINT NOT NULL default 0,				-- Achievement 1: unlock endless mode; 0 = locked; 1 = unlocked
	ach002 TINYINT NOT NULL default 0,				-- Achievement 2: get 100 points in endless; 0 = locked; 1 = unlocked
	ach003 TINYINT NOT NULL default 0,				-- Achievement 3: get 500 points in endless; 0 = locked; 1 = unlocked
	sound TINYINT NOT NULL default 1,				-- Holds user sound preference; 0 = sound off; 1 = sound on
	tutorial TINYINT NOT NULL default 1				-- Holds user tutorial status; 0 = off; 1 = on
	PRIMARY KEY (id)
) ENGINE=MyISAM;

CREATE TABLE scores (
	score_id INTEGER unsigned NOT NULL auto_increment,	-- Automatically generated
	id INTEGER unsigned NOT NULL default 0,				-- User id; linked to members table
	score INTEGER unsigned default 0,					-- User score; added each completion of endless
	PRIMARY KEY (score_id),
	FOREIGN KEY (id) REFERENCES members(id)
) ENGINE=MyISAM;