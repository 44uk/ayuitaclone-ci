DROP DATABASE ayuitaclone;
CREATE DATABASE ayuitaclone CHARACTER SET utf8;

USE ayuitaclone;

DROP TABLE IF EXISTS items;
CREATE TABLE items (
  id INTEGER(32) AUTO_INCREMENT,
  provider_name VARCHAR(255),
  provider_email VARCHAR(255),
  provider_comment VARCHAR(255),
  pw_edit CHAR(40),
  name VARCHAR(255),
  type INTEGER(2),
  uri TEXT,
  force_post INTEGER(1),
  dl_limit INTEGER(4) DEFAULT 0,
  dl_count INTEGER(4) DEFAULT 0,
  created_at DATETIME,
  updated_at DATETIME,
  deleted_at DATETIME,
  PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS types;
CREATE TABLE types (
  id INTEGER(32) AUTO_INCREMENT,
  name VARCHAR(255),
  PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS thanks;
CREATE TABLE thanks (
  id INTEGER(32) AUTO_INCREMENT,
  item_id INTEGER(32) NOT NULL,
  name VARCHAR(255),
  email VARCHAR(255),
  comment TEXT,
  created_at DATETIME,
  PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;

INSERT INTO types ( name ) VALUES ( '写真' );
INSERT INTO types ( name ) VALUES ( '映像' );
INSERT INTO types ( name ) VALUES ( '詩' );
INSERT INTO types ( name ) VALUES ( 'その他' );

INSERT INTO items (
  provider_name,
  provider_email,
  provider_comment,
  pw_edit,
  name,
  type,
  uri,
  force_post,
  dl_limit,
  created_at,
  updated_at
) VALUES (
  '名無しのポエム職人',
  '774poem@example.com',
  '青春時代の熱き思いでを込めたポエムです。',
  '9999',
  '青春ポエム3',
  1,
  'http://example.com/poem/seisyun3.txt',
  1,
  99,
  NOW(),
  NOW()
);

INSERT INTO thanks (
  item_id,
  name,
  email,
  comment,
  created_at
) VALUES (
  1,
  '通りすがりの名無し',
  'a774@example.com',
  'ポエム、詠ませていただきます。ありがとうございました。',
  NOW()
);