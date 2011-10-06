

DELETE FROM SQLITE_SEQUENCE WHERE NAME = 'items';
DELETE FROM SQLITE_SEQUENCE WHERE NAME = 'types';
DELETE FROM SQLITE_SEQUENCE WHERE NAME = 'thanks';
DELETE FROM SQLITE_SEQUENCE WHERE NAME = 'vips';

DROP TABLE IF EXISTS items;
CREATE TABLE items (
  id INTEGER(32) AUTO_INCREMENT,
  owner_name VARCHAR(255),
  owner_email VARCHAR(255),
  delete_password CHAR(48),
  name VARCHAR(255),
  type INTEGER(2),
  uri TEXT,
  force_post INTEGER1(1),
  download_limit INTEGER(4)
  created_at DATETIME,
  updated_at DATETIME
  deleted_at DATETIME,
  PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS types;
CREATE TABLE types (
  id INTEGER(32),
  name VARCHAR(255),
  PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS thanks;
CREATE TABLE thanks (
  id INTEGER(32),
  name VARCHAR(255),
  email VARCHAR(255),
  comment TEXT,
  created_at DATETIME,
  updated_at DATETIME,
  deleted_at DATETIME,
  PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS vips;
CREATE TABLE vips (

  created_at DATETIME,
  updated_at DATETIME
  deleted_at DATETIME,
  PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;
