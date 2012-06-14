

-- Derived storage.
-- Links site+title pairs to item ids.
CREATE TABLE IF NOT EXISTS /*_*/registry (
  entry_id                   INT unsigned        NOT NULL PRIMARY KEY AUTO_INCREMENT, -- Id of change
  entry_key                  VARCHAR(255)        NOT NULL,
  entry_type                 VARCHAR(255)        NOT NULL,
  entry_info                 BLOB                NOT NULL
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX /*i*/registry_entry_key ON /*_*/registry (entry_key);
CREATE INDEX /*i*/registry_entry_type ON /*_*/registry (entry_type);