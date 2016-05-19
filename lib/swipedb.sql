USE swipedb;

CREATE TABLE members (
	id INTEGER unsigned NOT NULL auto_increment,
	username varchar(100) NOT NULL default '',
	email varchar(100) NOT NULL default '',
	password varchar(60) NOT NULL default '',
	highscore INTEGER unsigned default 0,
	PRIMARY KEY (id)
) ENGINE=MyISAM;

CREATE TABLE scores (
	score_id INTEGER unsigned NOT NULL auto_increment,
	id INTEGER unsigned NOT NULL default 0,
	score INTEGER unsigned default 0,
	PRIMARY KEY (score_id),
	FOREIGN KEY (id) REFERENCES members(id)
) ENGINE=MyISAM;