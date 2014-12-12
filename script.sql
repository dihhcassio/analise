-- Sequence: seq_evento

-- DROP SEQUENCE seq_evento;

CREATE SEQUENCE seq_evento
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 9
  CACHE 1;
ALTER TABLE seq_evento
  OWNER TO postgres;

-- Sequence: seq_recurso

-- DROP SEQUENCE seq_recurso;

CREATE SEQUENCE seq_recurso
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 5
  CACHE 1;
ALTER TABLE seq_recurso
  OWNER TO postgres;
-- Table: evento

-- DROP TABLE evento;

CREATE TABLE evento
(
  id numeric NOT NULL DEFAULT nextval('seq_evento'::regclass),
  nome character varying(250),
  inicio timestamp with time zone,
  fim timestamp with time zone,
  CONSTRAINT id_evento PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE evento
  OWNER TO postgres;

-- Table: recurso

-- DROP TABLE recurso;

CREATE TABLE recurso
(
  id numeric NOT NULL DEFAULT nextval('seq_recurso'::regclass),
  nome character varying(250),
  CONSTRAINT id_recurso PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE recurso
  OWNER TO postgres;

