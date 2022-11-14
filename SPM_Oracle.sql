--------------------------------------------------------
-- Archivo creado  - lunes-noviembre-14-2022   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Sequence ADMINISTRATIVO_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "TOPHER"."ADMINISTRATIVO_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence CARRERA_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "TOPHER"."CARRERA_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence DETALLE_UNIVERSIDAD_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "TOPHER"."DETALLE_UNIVERSIDAD_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 21 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence ESTUDIANTE_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "TOPHER"."ESTUDIANTE_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence IDIOMA_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "TOPHER"."IDIOMA_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 5 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence MOVILIDAD_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "TOPHER"."MOVILIDAD_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence OPCIONES_PREG_MULTIPLE_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "TOPHER"."OPCIONES_PREG_MULTIPLE_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence PAIS_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "TOPHER"."PAIS_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence POSTULACION_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "TOPHER"."POSTULACION_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 41 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence PREGUNTA_CONVOCATORIA_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "TOPHER"."PREGUNTA_CONVOCATORIA_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence PREGUNTA_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "TOPHER"."PREGUNTA_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence RESPUESTA_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "TOPHER"."RESPUESTA_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence S_CONVOCATORIA_AINCR
--------------------------------------------------------

   CREATE SEQUENCE  "TOPHER"."S_CONVOCATORIA_AINCR"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 2 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence S_PROGRAMA_AINC
--------------------------------------------------------

   CREATE SEQUENCE  "TOPHER"."S_PROGRAMA_AINC"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 24 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Table ADMINISTRATIVO
--------------------------------------------------------

  CREATE TABLE "TOPHER"."ADMINISTRATIVO" 
   (	"ID_ADMIN" NUMBER(*,0), 
	"ID_USUARIO" NUMBER(11,0), 
	"NOMBRE" VARCHAR2(255 BYTE), 
	"EMAIL" VARCHAR2(255 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table CARRERA
--------------------------------------------------------

  CREATE TABLE "TOPHER"."CARRERA" 
   (	"ID_CARRERA" NUMBER(*,0), 
	"NOMBRE" VARCHAR2(255 BYTE), 
	"FACULTAD" VARCHAR2(255 BYTE), 
	"CAMPUS" VARCHAR2(255 BYTE), 
	"CREDITOS" NUMBER(5,0)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table CONVOCATORIA
--------------------------------------------------------

  CREATE TABLE "TOPHER"."CONVOCATORIA" 
   (	"ID_CONVOCATORIA" NUMBER, 
	"NOMBRE" VARCHAR2(100 BYTE), 
	"FECHA_INICIO" DATE, 
	"FECHA_FIN" DATE, 
	"ESTADO" VARCHAR2(50 BYTE) DEFAULT 'Próximamente', 
	"MIN_CREDITO_SCT" NUMBER(5,0), 
	"MAX_CREDITO_SCT" NUMBER(5,0), 
	"NOTIFICACION" VARCHAR2(20 BYTE) DEFAULT 'No', 
	"RAMOS_REPROBADOS" NUMBER(5,0), 
	"ID_PROGRAMA" NUMBER(15,0)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table DETALLE_UNIVERSIDAD
--------------------------------------------------------

  CREATE TABLE "TOPHER"."DETALLE_UNIVERSIDAD" 
   (	"ID_DET_UNIVERSIDAD" NUMBER(*,0), 
	"ID_UNIVERSIDAD" NUMBER(15,0), 
	"ID_PROGRAMA" NUMBER(15,0)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table ESTUDIANTE
--------------------------------------------------------

  CREATE TABLE "TOPHER"."ESTUDIANTE" 
   (	"ID_ESTUDIANTE" NUMBER(*,0), 
	"ID_USUARIO" NUMBER(15,0), 
	"RUT" NUMBER(15,0), 
	"NOMBRE" VARCHAR2(255 BYTE), 
	"MATRICULA" NUMBER(25,0), 
	"NACIMIENTO" DATE, 
	"EMAIL_INSTITUCIONAL" VARCHAR2(255 BYTE), 
	"ESTUDIANTE_REGULAR" VARCHAR2(2 BYTE), 
	"CREDITOS_APROBADOS" NUMBER(5,0), 
	"RAMOS_REPROBADOS" NUMBER(5,0), 
	"DEUDOR_DAFE" VARCHAR2(2 BYTE), 
	"DEUDOR_BIBLIOTECA" VARCHAR2(2 BYTE), 
	"ID_CARRERA" NUMBER(15,0), 
	"POS" NUMBER(5,0), 
	"PORCENTAJE" NUMBER(5,0), 
	"PAT" FLOAT(5), 
	"PM" NUMBER(5,0)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table IDIOMA
--------------------------------------------------------

  CREATE TABLE "TOPHER"."IDIOMA" 
   (	"ID_IDIOMA" NUMBER(10,0), 
	"IDIOMA" VARCHAR2(100 BYTE), 
	"ESTADO" VARCHAR2(25 BYTE) DEFAULT 'Activo'
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table MOVILIDAD
--------------------------------------------------------

  CREATE TABLE "TOPHER"."MOVILIDAD" 
   (	"ID_MOVILIDAD" NUMBER(*,0), 
	"FECHA_INICIO" DATE, 
	"FECHA_FIN" DATE, 
	"SEMESTRE" VARCHAR2(25 BYTE), 
	"ESTADO" VARCHAR2(25 BYTE) DEFAULT 'En preparación', 
	"ID_ESTUDIANTE" NUMBER(15,0), 
	"ID_CONVOCATORIA" NUMBER(15,0)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table OPCIONES_PREG_MULTIPLE
--------------------------------------------------------

  CREATE TABLE "TOPHER"."OPCIONES_PREG_MULTIPLE" 
   (	"ID_OPCIONES_PM" NUMBER(*,0), 
	"OPCION_PMULTIPLE" VARCHAR2(255 BYTE), 
	"ID_PREGUNTA" NUMBER(15,0)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table PAIS
--------------------------------------------------------

  CREATE TABLE "TOPHER"."PAIS" 
   (	"ID_PAIS" NUMBER(*,0), 
	"NOMBRE" VARCHAR2(100 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table POSTULACION
--------------------------------------------------------

  CREATE TABLE "TOPHER"."POSTULACION" 
   (	"ID_POSTULACION" NUMBER(*,0), 
	"NACIONALIDAD" VARCHAR2(100 BYTE), 
	"N_TELEFONO" NUMBER(15,0), 
	"EMAIL_PERSONAL" VARCHAR2(255 BYTE), 
	"NIVEL_INGLES" VARCHAR2(25 BYTE), 
	"IDIOMA_2" NUMBER(15,0), 
	"PRIMERA_OPCION" NUMBER(15,0), 
	"SEGUNDA_OPCION" NUMBER(15,0), 
	"TERCERA_OPCION" NUMBER(15,0), 
	"SELECCION" NUMBER(15,0) DEFAULT 0, 
	"ESTADO" VARCHAR2(50 BYTE) DEFAULT 'En espera', 
	"ID_CONVOCATORIA" NUMBER(15,0), 
	"ID_MOVILIDAD" NUMBER(15,0) DEFAULT 0, 
	"ID_ESTUDIANTE" NUMBER(15,0), 
	"CONFIRMACION" VARCHAR2(50 BYTE) DEFAULT 'Sin aceptar'
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table PREGUNTA
--------------------------------------------------------

  CREATE TABLE "TOPHER"."PREGUNTA" 
   (	"ID_PREGUNTA" NUMBER, 
	"TIPO" VARCHAR2(100 BYTE), 
	"TITULO" VARCHAR2(255 BYTE), 
	"TIPO_INPUT" VARCHAR2(30 BYTE)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table PREGUNTA_CONVOCATORIA
--------------------------------------------------------

  CREATE TABLE "TOPHER"."PREGUNTA_CONVOCATORIA" 
   (	"ID_DETALLE_PREGUNTA" NUMBER(*,0), 
	"ID_PREGUNTA" NUMBER(15,0), 
	"ID_CONVOCATORIA" NUMBER(10,0)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table PROGRAMA
--------------------------------------------------------

  CREATE TABLE "TOPHER"."PROGRAMA" 
   (	"ID_PROGRAMA" NUMBER(*,0), 
	"NOMBRE" VARCHAR2(100 BYTE), 
	"DESCRIPCION" VARCHAR2(255 BYTE), 
	"ESTADO" VARCHAR2(50 BYTE) DEFAULT 'Activo'
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table RESPUESTA
--------------------------------------------------------

  CREATE TABLE "TOPHER"."RESPUESTA" 
   (	"ID_RESPUESTA" NUMBER(*,0), 
	"RESPUESTA" VARCHAR2(255 BYTE), 
	"ID_PREGUNTA" NUMBER(15,0), 
	"ID_POSTULACION" NUMBER(15,0)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table UNIVERSIDAD
--------------------------------------------------------

  CREATE TABLE "TOPHER"."UNIVERSIDAD" 
   (	"ID_UNIVERSIDAD" NUMBER(15,0), 
	"NOMBRE" VARCHAR2(255 BYTE), 
	"ESTADO" VARCHAR2(25 BYTE) DEFAULT 'Activo', 
	"ID_PAIS" NUMBER(15,0)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table USUARIO
--------------------------------------------------------

  CREATE TABLE "TOPHER"."USUARIO" 
   (	"ID_USUARIO" NUMBER(15,0), 
	"RELACION" VARCHAR2(50 BYTE), 
	"PASS" VARCHAR2(25 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
REM INSERTING into TOPHER.ADMINISTRATIVO
SET DEFINE OFF;
Insert into TOPHER.ADMINISTRATIVO (ID_ADMIN,ID_USUARIO,NOMBRE,EMAIL) values ('1','111','Franco Mella Pizarro','fmella@utalca.cl');
Insert into TOPHER.ADMINISTRATIVO (ID_ADMIN,ID_USUARIO,NOMBRE,EMAIL) values ('2','222','Christopher Paredes López','topherpl98@gmail.com');
REM INSERTING into TOPHER.CARRERA
SET DEFINE OFF;
Insert into TOPHER.CARRERA (ID_CARRERA,NOMBRE,FACULTAD,CAMPUS,CREDITOS) values ('419','Ingeniería en Informática Empresarial','Facultad de Economía y Negocios','Talca','300');
REM INSERTING into TOPHER.CONVOCATORIA
SET DEFINE OFF;
Insert into TOPHER.CONVOCATORIA (ID_CONVOCATORIA,NOMBRE,FECHA_INICIO,FECHA_FIN,ESTADO,MIN_CREDITO_SCT,MAX_CREDITO_SCT,NOTIFICACION,RAMOS_REPROBADOS,ID_PROGRAMA) values ('1','Convocatoria Test 1',to_date('10/11/22','DD/MM/RR'),to_date('10/11/22','DD/MM/RR'),'Activa','1','99','No','6','4');
REM INSERTING into TOPHER.DETALLE_UNIVERSIDAD
SET DEFINE OFF;
Insert into TOPHER.DETALLE_UNIVERSIDAD (ID_DET_UNIVERSIDAD,ID_UNIVERSIDAD,ID_PROGRAMA) values ('1','1','5');
REM INSERTING into TOPHER.ESTUDIANTE
SET DEFINE OFF;
Insert into TOPHER.ESTUDIANTE (ID_ESTUDIANTE,ID_USUARIO,RUT,NOMBRE,MATRICULA,NACIMIENTO,EMAIL_INSTITUCIONAL,ESTUDIANTE_REGULAR,CREDITOS_APROBADOS,RAMOS_REPROBADOS,DEUDOR_DAFE,DEUDOR_BIBLIOTECA,ID_CARRERA,POS,PORCENTAJE,PAT,PM) values ('1','19718582','197185821','Christopher Andrés Paredes López','2016419076',to_date('02/01/98','DD/MM/RR'),'cparedes16@alumnos.utalca.cl','Si','285','1','No','No','419','1','100','5,2','2');
REM INSERTING into TOPHER.IDIOMA
SET DEFINE OFF;
Insert into TOPHER.IDIOMA (ID_IDIOMA,IDIOMA,ESTADO) values ('1','Japonés Básico','Activo');
Insert into TOPHER.IDIOMA (ID_IDIOMA,IDIOMA,ESTADO) values ('2','Japonés Intermedio','Activo');
Insert into TOPHER.IDIOMA (ID_IDIOMA,IDIOMA,ESTADO) values ('3','Japonés Avanzado','Activo');
Insert into TOPHER.IDIOMA (ID_IDIOMA,IDIOMA,ESTADO) values ('4','Alemán básico','Activo');
REM INSERTING into TOPHER.MOVILIDAD
SET DEFINE OFF;
REM INSERTING into TOPHER.OPCIONES_PREG_MULTIPLE
SET DEFINE OFF;
REM INSERTING into TOPHER.PAIS
SET DEFINE OFF;
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('1','Alemania');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('2','Argentina');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('4','Austria');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('5','Bolivia');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('6','Brasil');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('7','Canadá');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('8','China');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('9','Colombia');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('10','Costa Rica');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('11','Corea del Sur');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('12','Cuba');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('13','Dinamarca');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('14','Ecuador');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('15','España');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('16','Estados Unidos');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('17','Finlandia');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('18','Francia');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('19','Guatemala');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('20','Holanda');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('21','Inglaterra');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('22','Israel');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('23','Italia');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('24','India');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('25','Japón');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('26','Marruecos');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('27','México');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('28','Nueva Zelanda');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('29','Palestina');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('30','Paraguay');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('31','Perú');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('32','Portugal');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('33','Puerto Rico');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('34','Rusia');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('35','República Dominicana');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('36','Rumania');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('37','Serbia');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('38','Suiza');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('39','Turquía');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('40','Uruguay');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('41','Uzbekistan');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('42','Gales');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('43','Polonia');
Insert into TOPHER.PAIS (ID_PAIS,NOMBRE) values ('9999','No existe');
REM INSERTING into TOPHER.POSTULACION
SET DEFINE OFF;
Insert into TOPHER.POSTULACION (ID_POSTULACION,NACIONALIDAD,N_TELEFONO,EMAIL_PERSONAL,NIVEL_INGLES,IDIOMA_2,PRIMERA_OPCION,SEGUNDA_OPCION,TERCERA_OPCION,SELECCION,ESTADO,ID_CONVOCATORIA,ID_MOVILIDAD,ID_ESTUDIANTE,CONFIRMACION) values ('21','Chilena','989896187','chrisparedeslbz@gmail.com','Inglés A1','1','1','1','1','0','En espera','1','0','1','Sin aceptar');
REM INSERTING into TOPHER.PREGUNTA
SET DEFINE OFF;
REM INSERTING into TOPHER.PREGUNTA_CONVOCATORIA
SET DEFINE OFF;
REM INSERTING into TOPHER.PROGRAMA
SET DEFINE OFF;
Insert into TOPHER.PROGRAMA (ID_PROGRAMA,NOMBRE,DESCRIPCION,ESTADO) values ('4','Beca Juan Abate Molina 2','dsa','Activo');
Insert into TOPHER.PROGRAMA (ID_PROGRAMA,NOMBRE,DESCRIPCION,ESTADO) values ('5','Programa CINDA2','DUMMY4','Activo');
Insert into TOPHER.PROGRAMA (ID_PROGRAMA,NOMBRE,DESCRIPCION,ESTADO) values ('1','Beca Abate Molina','Dummy ID1','Activo');
Insert into TOPHER.PROGRAMA (ID_PROGRAMA,NOMBRE,DESCRIPCION,ESTADO) values ('2','Programa CINDA','Dummy ID2','Activo');
Insert into TOPHER.PROGRAMA (ID_PROGRAMA,NOMBRE,DESCRIPCION,ESTADO) values ('3','Doble Titulación','Dummy ID3','Activo');
REM INSERTING into TOPHER.RESPUESTA
SET DEFINE OFF;
REM INSERTING into TOPHER.UNIVERSIDAD
SET DEFINE OFF;
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('1','Rheinische Fiedrich-Wilhelms-Universität Bonn','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('2','Technische Universität Dresden','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('3','Europa-Universität Flensburg','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('4','Georg-August-Universität Göttingen','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('5','Rheinisch-Westfälische Technische Hochschule Aachen','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('6','Hochschule für Angewandte Wissenschaften Hamburg ','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('7','Universität Hohenheim','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('8','Universität Konstanz','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('9','Handelshochschule Leipzig','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('10','Westsächsische Hochschule Zwickau','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('11','Universität Siegen','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('12','Hochschule Osnabrück','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('13','Hochschule Weihenstephan-Triesdorf','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('14','Hochschule RheinMain','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('15','Universität Bayreuth','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('16','Universität Mannheim','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('17','Ludwig-Maximilians-Universität München','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('18','Hochschule Rhein-Waal','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('19','Rheinland Pfalz','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('20','Technische Universität Kaiserslautern','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('21','Technische Universität München','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('22','Hochschule Geisenheim','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('23','Hochschule Ruhr West','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('24','Pädagogische Hochschule Heidelberg','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('25','Escuela Argentina de Negocios ','Activo','2');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('26','Universidad Nacional de Cuyo','Activo','2');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('27','Universidad Nacional del Litoral','Activo','2');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('28','Universidad Nacional del Comahue','Activo','2');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('29','Universidad Nacional de San Juan','Activo','2');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('30','Universidad Nacional de Córdoba','Activo','2');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('31','Universidad Nacional de Tucumán','Activo','2');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('32','Pontificia Universidad Católica Argentina - Santa María de los Buenos Aires','Activo','2');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('33','Universidad Nacional de Villa María','Activo','2');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('34','Universidad Nacional de San Martín','Activo','2');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('35','Instituto Universitario de Ciencias de la Salud - Fundación Héctor Alejandro Barceló','Activo','2');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('36','Universidad de Buenos Aires','Activo','2');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('39','Fachhochschule Kärnten','Activo','4');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('40','Donau-Universität Krems ','Activo','4');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('41','Universität Innsbruck','Activo','4');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('42','Universidad San Francisco Xavier de Chuquisaca','Activo','5');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('43','Universidade Federal da Paraíba','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('44','Instituto Brasileiro de Mercado de Capitais (IBMEC)','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('45','Universidade Estadual de Campinas','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('47','Universidade Federal de Itajubá','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('48','Universidade Federal do Oeste do Pará','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('49','Universidade Federal de Santa Catarina','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('50','Universidade de São Paulo','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('51','Universidade Federal de Santa Maria','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('52','Pontíficia Universidade Católica de Sao Paulo','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('53','Universidade do Estado de Santa Catarina','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('54','Universidade do Vale do Río Dos Sinos','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('55','Universidade de Santa Cruz do Sul','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('56','Universidade Federal de Mato Grosso','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('57','Universidade Estadual Norte do Paraná','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('58','Universidade Federal do Rio Grande du Sul','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('59','Universidade Federal de Minas Gerais','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('60','Associação Escola da Cidade','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('61','Universidade Guarulhos','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('62','Faculdades Integradas do Brasil','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('63','Universidade do Oeste de Santa Catarina','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('64','Serviço Nacional de Aprendizagem Comercial','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('65','Universidade Federal Rural da Amazonia','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('66','Pontíficia Universidade Católica do Paraná','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('67','Universidade Sagrado Coração ','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('68','Universidade Federal do Triangulo Mineiro','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('69','UNIFAFIFE - Centro Universitário','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('70','Facultade Projeção ','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('71','Universidade Federal de Ciencias da Saúde de Porto Alegre','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('74','University of Ottawa','Activo','7');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('75','University of Regina','Activo','7');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('76','Yanshan University','Activo','8');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('77','Universidad de Antioquía','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('78','Universidad de los Andes','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('79','Universidad Autónoma de Bucaramanga','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('80','Universidad del Rosario','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('81','Universidad de Caldas','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('82','Universidad Nacional de Colombia','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('83','Universidad Autónoma de Occidente ','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('84','Universidad CES','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('85','Universidad del Norte','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('87','Fundación Universitaria Colombo Internacional ','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('88','Universidad de Santander','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('89','Fundación Universitaria María Cano','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('90','Universidad Autónoma de Manizales','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('91','Universidad de San Buenaventura de Cartagena','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('92','Universidad Tecnológica de Pereira','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('93','Universidad de la Costa','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('94','Universidad Externado de Colombia','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('95','Universidad Santo Tomás','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('96','Pontificia Universidad Javeriana','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('97','Universitaria Agustiniana','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('98','Fundación Universitaria Konrad Lorenz','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('99','INCAE Business School','Activo','10');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('100','Universidad Nacional de Costa Rica','Activo','10');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('101','Instituto Interamericano de Derechos Humanos','Activo','10');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('102','Universidad de Costa Rica','Activo','10');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('103','Corte Interamericana de Derechos Humanos','Activo','10');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('104','Sungkyunkwan University','Activo','11');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('105','Incheon National University','Activo','11');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('106','Kyonggi University','Activo','11');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('107','Dankook University','Activo','11');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('108','Universidad de Matanzas Camilo Cienfuegos','Activo','12');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('109','Aalborg University','Activo','13');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('110','Universidad Católica de Santiago de Guayaquil','Activo','14');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('111','Universidad Técnica Estatal de Quevedo','Activo','14');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('112','Universidad Técnica del Norte de Ibarra','Activo','14');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('113','Universidad Andina Simón Bolívar','Activo','14');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('114','Universidad Católica de Cuenca','Activo','14');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('115','Universidad Regional Amazónica','Activo','14');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('116','Universidad de Alcalá','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('117','Universitat de València','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('118','Universidad de la Laguna','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('119','Universitat Pompeu Fabra','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('120','Universidade de Santiago de Compostela','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('121','Universidad de Deusto','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('122','Universidade de Vigo','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('123','Universidad de Málaga','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('124','Universidad de Granada','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('125','Universidad de Jaén','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('126','Universidad Complutense de Madrid','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('127','Universidad de la Rioja','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('128','Universidad Pública de Navarra','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('129','Universitat de Girona','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('130','Universidad de Valladolid','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('132','Universidade da Coruña','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('133','Universidad del País Vasco','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('134','Universidad de Las Palmas de Gran Canaria','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('135','Escola Politécnica Superior d Edificació de Barcelona','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('136','Centro de Investigación Cardiovascular','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('137','Universidad de Oviedo','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('138','Universitat Politècnica de València','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('139','Universidad de Almería','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('140','Universidad de Zaragoza','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('141','Universidad Politécnica de Madrid','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('142','Universitat de Lleida','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('143','Universidad Miguel Hernández de Elche','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('144','Universidad de Castilla-La Mancha','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('145','Universitat Rovira i Virgili','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('146','Universidad Nacional de Educación a Distancia','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('147','Universidad de Alicante','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('148','Universidad Pontificia de Salamanca','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('149','Universidad de Murcia','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('150','Universidad de Sevilla','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('151','Escuela Andaluza de Salud Pública','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('152','Institut de Teràpia Regenerativa Tissular','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('153','Universitat de Barcelona','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('154','University of Connecticut','Activo','16');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('155','Cornell University','Activo','16');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('156','Southwest Minnesota State University','Activo','16');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('157','University of Texas Rio Grande Valley','Activo','16');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('158','University of California, Davis','Activo','16');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('159','University of Florida','Activo','16');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('160','University of Kentucky','Activo','16');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('161','The University of Arizona','Activo','16');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('162','Western Carolina University','Activo','16');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('163','Abo Akademi University','Activo','17');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('164','Oulu University of Applied Sciences','Activo','17');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('165','Institut National des Sciences Appliquées Centre Val de Loire ','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('166','Centro Internacional de Estudios Superiores en Ciencias Agronómicas Montpellier SupAgro','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('167','Federation des Ecoles superieures D ingenieurs en Agriculture ','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('168','Université d Avignon','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('169','Montpellier Business School','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('170','Université de Bourgogne','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('171','Université de Toulon','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('172','Agrocampus Ouest','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('173','CFPPA de Beaune','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('174','École Normale Supérieure de Cachan','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('175','Université de Bordeaux','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('176','Institut Universitaire de Technologie de Montpellier','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('177','Université d Artois','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('178','École de Hautes Etudes en Commerce International','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('179','Universidad San Carlos de Guatemala Tricentenaria','Activo','19');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('180','Erasmus University Rotterdam','Activo','20');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('181','Hogeschool van Amsterdam','Activo','20');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('182','Universiteit Twente','Activo','20');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('183','Universiteit Wageningen','Activo','20');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('184','University of Warwick','Activo','21');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('185','University of Nottingham','Activo','21');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('186','Bezalez Academy of Arts and Design','Activo','22');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('187','Università degli Studi Roma Tre','Activo','23');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('188','Università degli Studi di Genova','Activo','23');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('189','Università della Calabria','Activo','23');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('190','Università Ca Foscari Venezia','Activo','23');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('191','SRM University','Activo','24');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('192','MS Swaminathan Research Foundation','Activo','24');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('193','Yamagata University','Activo','25');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('194','ESCA School of Management Casablanca','Activo','26');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('195','Universidad Autónoma Chapingo','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('196','Universidad Autónoma Metropolitana','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('197','Colegio de Postgraduados en Ciencias Agrícolas','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('198','Universidad de Colima','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('199','Universidad Autónoma de Chihuahua','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('200','Universidad de Guadalajara','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('201','Tecnológico de Monterrey','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('202','Universidad Vasco de Quiroga','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('203','Universidad de Monterrey','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('204','Universidad Autónoma de Nuevo León','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('205','Instituto Mexicano de Tecnología del Agua','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('206','Centro de Investigación Científica Yucatán CICY','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('208','University of Waikato','Activo','28');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('209','University of Auckland','Activo','28');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('210','Bethlehem University','Activo','29');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('211','Universidad Nacional de Asunción','Activo','30');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('212','Universidad Nacional de Villarrica del Espíritu Santo','Activo','30');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('213','Ministerio de Salud Pública y Bienestar Social','Activo','30');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('214','Universidad Católica Santo Toribio de Mogrovejo','Activo','31');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('215','Universidad Privada Norbert Wiener','Activo','31');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('216','Universidad Nacional Santiago Antúnez de Mayolo ','Activo','31');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('217','Universidad de Lima','Activo','31');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('218','Universidade de Aveiro','Activo','32');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('219','Instituto Politécnico de Setúbal','Activo','32');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('220','Universidade do Algarve','Activo','32');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('221','Asociación Interamericana de Contabilidad','Activo','33');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('222','Universidad Politécnica de Puerto Rico','Activo','33');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('223','Ural Federal University','Activo','34');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('224','Instituto Tecnológico de Santo Domingo','Activo','35');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('225','Instituto Nacional de Recursos Hidráulicos','Activo','35');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('226','Universitatea Alexandru Ioan Cuza ','Activo','36');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('227','University of Belgrade','Activo','37');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('228','Zürcher Hochschule für Angewandte Wissenschaften','Activo','38');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('229','Bezmialem Vakif University','Activo','39');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('230','Universidad Católica del Uruguay','Activo','40');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('231','Universidad de la República','Activo','40');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('232','Pädagogische Hochschule Freiburg','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('233','Universidade Estadual Paulista','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('234','Universidade Evangélica - Centro Universitário de Anápolis','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('235','Korea University - Sejong Campus','Activo','11');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('236','Universitat Autònoma de Barcelona','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('237','Universidad de Salamanca','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('239','Washington State University','Activo','16');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('240','Burgundy School of Business','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('241','Université de Rennes 1','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('242','Université de Lorraine','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('243','International Institute for the Unification of Private Law','Activo','23');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('244','Università degli Studi di Perugia','Activo','23');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('245','Universidad Autónoma de San Luis Potosí','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('246','Universidad Politécnica de Guanajuato','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('247','Universidad Tecnológica de los Valles Centrales de Oaxaca','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('248','Universitè de Genève','Activo','38');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('249','Universität Zürich','Activo','38');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('250','Fatih Sultan Mehmet Vakif University','Activo','39');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('251','Universidade Paulista','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('253','Pädagogische Hochschule Zug','Activo','38');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('254','Pädagogische Hochschule Kärnten','Activo','4');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('255','Universidad EAFIT','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('256','Fundación Universitaria Autónoma de las Américas','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('257','Universidad de Medellín','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('258','University of Nebraska at Kearney','Activo','16');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('259','École Nationale Supérieure des Mines d Albi-Carmaux','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('260','Universidad Americana','Activo','30');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('261','Pädagogische Hochschule Weingarten','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('262','Institut Universitaire de Technologie de Nîmes','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('263','Hankuk University of Foreign Studies','Activo','11');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('264','Universidad Politécnica de Tulancingo','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('265','Tashkent State Dental Institute','Activo','41');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('266','Universidad Tecnológica Empresarial de Guayaquil','Activo','14');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('267','Universidad del Atlántico','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('268','Universidad Peruana Cayetano Heredia','Activo','31');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('269','Aberystwyth University','Activo','42');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('270','Heinrich-Heine-Universität Düsseldorf','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('271','Universidad Tecnológica Nacional - Facultad Regional Delta','Activo','2');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('272','Instituto Evangélico de Novo Hamburgo','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('273','Tampere University of Technology','Activo','17');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('274','Universidad Paraguayo Alemana','Activo','30');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('275','Peoples Friendship University of Russia','Activo','34');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('276','Altinbas University','Activo','39');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('277','East Carolina University','Activo','16');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('278','Tecnológico de Costa Rica','Activo','10');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('279','Universidad Nacional de Loja','Activo','14');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('280','Fundació Salut i Envelliment UAB','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('281','Universidad del Cono Sur de las Américas','Activo','30');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('282','Fachhochschule Münster','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('283','Universidade do Minho','Activo','32');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('284','Instituto Politécnico de Lisboa','Activo','32');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('285','Instituto Internacional de Derecho y Sociedad','Activo','31');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('286','Adtalem Global Education','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('287','École normale supérieure Paris-Saclay','Activo','9999');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('288','Institut de Recerca de l Hospital de la Santa Creu i Sant Pau','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('289','Goethe-Universität Frankfurt','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('290','Institut National des Sciences Appliquées de Toulous','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('291','Instituto Politécnico de Portalegre','Activo','32');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('292','Instituto Tecnológico de Costa Rica','Activo','10');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('293','Kanagawa University','Activo','25');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('294','Leibniz-Universität Hannover','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('295','Pontificia Universidad Católica do Rio Grande Do Sul','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('296','PRÓ- SAÚDE Associação Beneficente de Assistência Social e Hospitalar','Activo','6');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('297','Universidad Antonio Nariño','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('298','Universidad Autónoma de Guadalajara','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('299','Universidad Autónoma Metropolitana Unidad Xochimilco','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('300','Universidad de Cantabria ','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('301','Universidade de Evora','Activo','32');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('302','Universidad de Sonora','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('303','University of North Texas','Activo','16');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('304','Universidad Iberoamericana del Paraguay','Activo','30');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('305','Universidad Industrial de Santander','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('306','Universidad Nacional del Rosario','Activo','27');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('307','Universidad Pontificia Bolivariana','Activo','9');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('308','Universidad Rey Juan Carlos de España','Activo','15');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('309','Universität Bremen','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('310','Université Paris-Diderot','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('311','Rijksuniversiteit Groningen','Activo','20');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('312','University of Lakehead','Activo','7');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('313','University of Sussex','Activo','21');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('314','Warsaw School of Economics','Activo','43');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('315','Westfälische Wilhelms-Universität Münster','Activo','1');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('316','Institut Agro Rennes-Angers','Activo','18');
Insert into TOPHER.UNIVERSIDAD (ID_UNIVERSIDAD,NOMBRE,ESTADO,ID_PAIS) values ('317','Institut Universitaire de Technologie Saint-Étienne','Activo','18');
REM INSERTING into TOPHER.USUARIO
SET DEFINE OFF;
Insert into TOPHER.USUARIO (ID_USUARIO,RELACION,PASS) values ('222','Administrativo','123');
Insert into TOPHER.USUARIO (ID_USUARIO,RELACION,PASS) values ('19718582','Estudiante',null);
Insert into TOPHER.USUARIO (ID_USUARIO,RELACION,PASS) values ('111','Administrativo','123');
--------------------------------------------------------
--  DDL for Index ADMINISTRATIVO_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "TOPHER"."ADMINISTRATIVO_PK" ON "TOPHER"."ADMINISTRATIVO" ("ID_ADMIN") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index CARRERA_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "TOPHER"."CARRERA_PK" ON "TOPHER"."CARRERA" ("ID_CARRERA") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index CONVOCATORIA_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "TOPHER"."CONVOCATORIA_PK" ON "TOPHER"."CONVOCATORIA" ("ID_CONVOCATORIA") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index DETALLE_UNIVERSIDAD_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "TOPHER"."DETALLE_UNIVERSIDAD_PK" ON "TOPHER"."DETALLE_UNIVERSIDAD" ("ID_DET_UNIVERSIDAD") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index ESTUDIANTE_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "TOPHER"."ESTUDIANTE_PK" ON "TOPHER"."ESTUDIANTE" ("ID_ESTUDIANTE") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index IDIOMA_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "TOPHER"."IDIOMA_PK" ON "TOPHER"."IDIOMA" ("ID_IDIOMA") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index MOVILIDAD_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "TOPHER"."MOVILIDAD_PK" ON "TOPHER"."MOVILIDAD" ("ID_MOVILIDAD") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index OPCIONES_PREG_MULTIPLE_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "TOPHER"."OPCIONES_PREG_MULTIPLE_PK" ON "TOPHER"."OPCIONES_PREG_MULTIPLE" ("ID_OPCIONES_PM") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index PAIS_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "TOPHER"."PAIS_PK" ON "TOPHER"."PAIS" ("ID_PAIS") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index POSTULACION_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "TOPHER"."POSTULACION_PK" ON "TOPHER"."POSTULACION" ("ID_POSTULACION") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index PREGUNTA_CONVOCATORIA_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "TOPHER"."PREGUNTA_CONVOCATORIA_PK" ON "TOPHER"."PREGUNTA_CONVOCATORIA" ("ID_DETALLE_PREGUNTA") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index PREGUNTA_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "TOPHER"."PREGUNTA_PK" ON "TOPHER"."PREGUNTA" ("ID_PREGUNTA") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index PROGRAMA_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "TOPHER"."PROGRAMA_PK" ON "TOPHER"."PROGRAMA" ("ID_PROGRAMA") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index RESPUESTA_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "TOPHER"."RESPUESTA_PK" ON "TOPHER"."RESPUESTA" ("ID_RESPUESTA") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index UNIVERSIDAD_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "TOPHER"."UNIVERSIDAD_PK" ON "TOPHER"."UNIVERSIDAD" ("ID_UNIVERSIDAD") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index USUARIO_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "TOPHER"."USUARIO_PK" ON "TOPHER"."USUARIO" ("ID_USUARIO") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Trigger ADMINISTRATIVO_TRG
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE TRIGGER "TOPHER"."ADMINISTRATIVO_TRG" 
BEFORE INSERT ON ADMINISTRATIVO 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.ID_ADMIN IS NULL THEN
      SELECT ADMINISTRATIVO_SEQ.NEXTVAL INTO :NEW.ID_ADMIN FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "TOPHER"."ADMINISTRATIVO_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger CARRERA_TRG
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE TRIGGER "TOPHER"."CARRERA_TRG" 
BEFORE INSERT ON CARRERA 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.ID_CARRERA IS NULL THEN
      SELECT CARRERA_SEQ.NEXTVAL INTO :NEW.ID_CARRERA FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "TOPHER"."CARRERA_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger DETALLE_UNIVERSIDAD_TRG
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE TRIGGER "TOPHER"."DETALLE_UNIVERSIDAD_TRG" 
BEFORE INSERT ON DETALLE_UNIVERSIDAD 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.ID_DET_UNIVERSIDAD IS NULL THEN
      SELECT DETALLE_UNIVERSIDAD_SEQ.NEXTVAL INTO :NEW.ID_DET_UNIVERSIDAD FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "TOPHER"."DETALLE_UNIVERSIDAD_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger ESTUDIANTE_TRG
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE TRIGGER "TOPHER"."ESTUDIANTE_TRG" 
BEFORE INSERT ON ESTUDIANTE 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.ID_ESTUDIANTE IS NULL THEN
      SELECT ESTUDIANTE_SEQ.NEXTVAL INTO :NEW.ID_ESTUDIANTE FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "TOPHER"."ESTUDIANTE_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger IDIOMA_TRG
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE TRIGGER "TOPHER"."IDIOMA_TRG" 
BEFORE INSERT ON IDIOMA 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.ID_IDIOMA IS NULL THEN
      SELECT IDIOMA_SEQ.NEXTVAL INTO :NEW.ID_IDIOMA FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "TOPHER"."IDIOMA_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger MOVILIDAD_TRG
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE TRIGGER "TOPHER"."MOVILIDAD_TRG" 
BEFORE INSERT ON MOVILIDAD 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.ID_MOVILIDAD IS NULL THEN
      SELECT MOVILIDAD_SEQ.NEXTVAL INTO :NEW.ID_MOVILIDAD FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "TOPHER"."MOVILIDAD_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger OPCIONES_PREG_MULTIPLE_TRG
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE TRIGGER "TOPHER"."OPCIONES_PREG_MULTIPLE_TRG" 
BEFORE INSERT ON OPCIONES_PREG_MULTIPLE 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.ID_OPCIONES_PM IS NULL THEN
      SELECT OPCIONES_PREG_MULTIPLE_SEQ.NEXTVAL INTO :NEW.ID_OPCIONES_PM FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "TOPHER"."OPCIONES_PREG_MULTIPLE_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger PAIS_TRG
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE TRIGGER "TOPHER"."PAIS_TRG" 
BEFORE INSERT ON PAIS 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.ID_PAIS IS NULL THEN
      SELECT PAIS_SEQ.NEXTVAL INTO :NEW.ID_PAIS FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "TOPHER"."PAIS_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger POSTULACION_TRG
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE TRIGGER "TOPHER"."POSTULACION_TRG" 
BEFORE INSERT ON POSTULACION 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.ID_POSTULACION IS NULL THEN
      SELECT POSTULACION_SEQ.NEXTVAL INTO :NEW.ID_POSTULACION FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "TOPHER"."POSTULACION_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger PREGUNTA_CONVOCATORIA_TRG
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE TRIGGER "TOPHER"."PREGUNTA_CONVOCATORIA_TRG" 
BEFORE INSERT ON PREGUNTA_CONVOCATORIA 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.ID_DETALLE_PREGUNTA IS NULL THEN
      SELECT PREGUNTA_CONVOCATORIA_SEQ.NEXTVAL INTO :NEW.ID_DETALLE_PREGUNTA FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "TOPHER"."PREGUNTA_CONVOCATORIA_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger PREGUNTA_TRG
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE TRIGGER "TOPHER"."PREGUNTA_TRG" 
BEFORE INSERT ON PREGUNTA 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.ID_PREGUNTA IS NULL THEN
      SELECT PREGUNTA_SEQ.NEXTVAL INTO :NEW.ID_PREGUNTA FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "TOPHER"."PREGUNTA_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger RESPUESTA_TRG
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE TRIGGER "TOPHER"."RESPUESTA_TRG" 
BEFORE INSERT ON RESPUESTA 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.ID_RESPUESTA IS NULL THEN
      SELECT RESPUESTA_SEQ.NEXTVAL INTO :NEW.ID_RESPUESTA FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "TOPHER"."RESPUESTA_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger T_CONVOCATORIA_AINCR
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE TRIGGER "TOPHER"."T_CONVOCATORIA_AINCR" 
BEFORE INSERT ON CONVOCATORIA 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.ID_CONVOCATORIA IS NULL THEN
      SELECT S_CONVOCATORIA_AINCR.NEXTVAL INTO :NEW.ID_CONVOCATORIA FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "TOPHER"."T_CONVOCATORIA_AINCR" ENABLE;
--------------------------------------------------------
--  DDL for Trigger T_PROGRAMA_AINC
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE TRIGGER "TOPHER"."T_PROGRAMA_AINC" 
BEFORE INSERT ON PROGRAMA 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.ID_PROGRAMA IS NULL THEN
      SELECT S_PROGRAMA_AINC.NEXTVAL INTO :NEW.ID_PROGRAMA FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "TOPHER"."T_PROGRAMA_AINC" ENABLE;
--------------------------------------------------------
--  Constraints for Table PREGUNTA_CONVOCATORIA
--------------------------------------------------------

  ALTER TABLE "TOPHER"."PREGUNTA_CONVOCATORIA" MODIFY ("ID_DETALLE_PREGUNTA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."PREGUNTA_CONVOCATORIA" MODIFY ("ID_PREGUNTA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."PREGUNTA_CONVOCATORIA" MODIFY ("ID_CONVOCATORIA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."PREGUNTA_CONVOCATORIA" ADD CONSTRAINT "PREGUNTA_CONVOCATORIA_PK" PRIMARY KEY ("ID_DETALLE_PREGUNTA")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table ADMINISTRATIVO
--------------------------------------------------------

  ALTER TABLE "TOPHER"."ADMINISTRATIVO" MODIFY ("ID_ADMIN" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ADMINISTRATIVO" MODIFY ("ID_USUARIO" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ADMINISTRATIVO" MODIFY ("NOMBRE" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ADMINISTRATIVO" MODIFY ("EMAIL" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ADMINISTRATIVO" ADD CONSTRAINT "ADMINISTRATIVO_PK" PRIMARY KEY ("ID_ADMIN")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table OPCIONES_PREG_MULTIPLE
--------------------------------------------------------

  ALTER TABLE "TOPHER"."OPCIONES_PREG_MULTIPLE" MODIFY ("ID_OPCIONES_PM" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."OPCIONES_PREG_MULTIPLE" MODIFY ("OPCION_PMULTIPLE" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."OPCIONES_PREG_MULTIPLE" MODIFY ("ID_PREGUNTA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."OPCIONES_PREG_MULTIPLE" ADD CONSTRAINT "OPCIONES_PREG_MULTIPLE_PK" PRIMARY KEY ("ID_OPCIONES_PM")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table ESTUDIANTE
--------------------------------------------------------

  ALTER TABLE "TOPHER"."ESTUDIANTE" MODIFY ("ID_ESTUDIANTE" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ESTUDIANTE" MODIFY ("ID_USUARIO" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ESTUDIANTE" MODIFY ("RUT" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ESTUDIANTE" MODIFY ("NOMBRE" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ESTUDIANTE" MODIFY ("MATRICULA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ESTUDIANTE" MODIFY ("NACIMIENTO" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ESTUDIANTE" MODIFY ("EMAIL_INSTITUCIONAL" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ESTUDIANTE" MODIFY ("ESTUDIANTE_REGULAR" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ESTUDIANTE" MODIFY ("CREDITOS_APROBADOS" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ESTUDIANTE" MODIFY ("RAMOS_REPROBADOS" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ESTUDIANTE" MODIFY ("DEUDOR_DAFE" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ESTUDIANTE" MODIFY ("DEUDOR_BIBLIOTECA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ESTUDIANTE" MODIFY ("ID_CARRERA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ESTUDIANTE" MODIFY ("POS" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ESTUDIANTE" MODIFY ("PORCENTAJE" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ESTUDIANTE" MODIFY ("PAT" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ESTUDIANTE" MODIFY ("PM" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."ESTUDIANTE" ADD CONSTRAINT "ESTUDIANTE_PK" PRIMARY KEY ("ID_ESTUDIANTE")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table PROGRAMA
--------------------------------------------------------

  ALTER TABLE "TOPHER"."PROGRAMA" MODIFY ("ID_PROGRAMA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."PROGRAMA" MODIFY ("NOMBRE" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."PROGRAMA" MODIFY ("DESCRIPCION" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."PROGRAMA" MODIFY ("ESTADO" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."PROGRAMA" ADD CONSTRAINT "PROGRAMA_PK" PRIMARY KEY ("ID_PROGRAMA")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table CONVOCATORIA
--------------------------------------------------------

  ALTER TABLE "TOPHER"."CONVOCATORIA" MODIFY ("ID_CONVOCATORIA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."CONVOCATORIA" MODIFY ("NOMBRE" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."CONVOCATORIA" MODIFY ("FECHA_INICIO" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."CONVOCATORIA" MODIFY ("FECHA_FIN" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."CONVOCATORIA" MODIFY ("ESTADO" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."CONVOCATORIA" MODIFY ("MIN_CREDITO_SCT" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."CONVOCATORIA" MODIFY ("MAX_CREDITO_SCT" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."CONVOCATORIA" MODIFY ("NOTIFICACION" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."CONVOCATORIA" MODIFY ("RAMOS_REPROBADOS" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."CONVOCATORIA" MODIFY ("ID_PROGRAMA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."CONVOCATORIA" ADD CONSTRAINT "CONVOCATORIA_PK" PRIMARY KEY ("ID_CONVOCATORIA")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table PAIS
--------------------------------------------------------

  ALTER TABLE "TOPHER"."PAIS" MODIFY ("ID_PAIS" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."PAIS" MODIFY ("NOMBRE" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."PAIS" ADD CONSTRAINT "PAIS_PK" PRIMARY KEY ("ID_PAIS")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table POSTULACION
--------------------------------------------------------

  ALTER TABLE "TOPHER"."POSTULACION" MODIFY ("ID_POSTULACION" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."POSTULACION" MODIFY ("NACIONALIDAD" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."POSTULACION" MODIFY ("N_TELEFONO" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."POSTULACION" MODIFY ("EMAIL_PERSONAL" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."POSTULACION" MODIFY ("NIVEL_INGLES" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."POSTULACION" MODIFY ("IDIOMA_2" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."POSTULACION" MODIFY ("PRIMERA_OPCION" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."POSTULACION" MODIFY ("SEGUNDA_OPCION" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."POSTULACION" MODIFY ("TERCERA_OPCION" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."POSTULACION" MODIFY ("SELECCION" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."POSTULACION" MODIFY ("ESTADO" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."POSTULACION" MODIFY ("ID_CONVOCATORIA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."POSTULACION" MODIFY ("ID_MOVILIDAD" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."POSTULACION" MODIFY ("ID_ESTUDIANTE" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."POSTULACION" MODIFY ("CONFIRMACION" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."POSTULACION" ADD CONSTRAINT "POSTULACION_PK" PRIMARY KEY ("ID_POSTULACION")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table IDIOMA
--------------------------------------------------------

  ALTER TABLE "TOPHER"."IDIOMA" MODIFY ("ID_IDIOMA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."IDIOMA" MODIFY ("IDIOMA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."IDIOMA" MODIFY ("ESTADO" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."IDIOMA" ADD CONSTRAINT "IDIOMA_PK" PRIMARY KEY ("ID_IDIOMA")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table PREGUNTA
--------------------------------------------------------

  ALTER TABLE "TOPHER"."PREGUNTA" MODIFY ("ID_PREGUNTA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."PREGUNTA" MODIFY ("TIPO" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."PREGUNTA" MODIFY ("TITULO" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."PREGUNTA" MODIFY ("TIPO_INPUT" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."PREGUNTA" ADD CONSTRAINT "PREGUNTA_PK" PRIMARY KEY ("ID_PREGUNTA")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table MOVILIDAD
--------------------------------------------------------

  ALTER TABLE "TOPHER"."MOVILIDAD" MODIFY ("ID_MOVILIDAD" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."MOVILIDAD" MODIFY ("ESTADO" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."MOVILIDAD" MODIFY ("ID_ESTUDIANTE" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."MOVILIDAD" MODIFY ("ID_CONVOCATORIA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."MOVILIDAD" ADD CONSTRAINT "MOVILIDAD_PK" PRIMARY KEY ("ID_MOVILIDAD")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table RESPUESTA
--------------------------------------------------------

  ALTER TABLE "TOPHER"."RESPUESTA" MODIFY ("ID_RESPUESTA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."RESPUESTA" MODIFY ("RESPUESTA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."RESPUESTA" MODIFY ("ID_PREGUNTA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."RESPUESTA" MODIFY ("ID_POSTULACION" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."RESPUESTA" ADD CONSTRAINT "RESPUESTA_PK" PRIMARY KEY ("ID_RESPUESTA")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table CARRERA
--------------------------------------------------------

  ALTER TABLE "TOPHER"."CARRERA" MODIFY ("ID_CARRERA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."CARRERA" MODIFY ("NOMBRE" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."CARRERA" MODIFY ("FACULTAD" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."CARRERA" MODIFY ("CAMPUS" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."CARRERA" MODIFY ("CREDITOS" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."CARRERA" ADD CONSTRAINT "CARRERA_PK" PRIMARY KEY ("ID_CARRERA")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table DETALLE_UNIVERSIDAD
--------------------------------------------------------

  ALTER TABLE "TOPHER"."DETALLE_UNIVERSIDAD" MODIFY ("ID_DET_UNIVERSIDAD" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."DETALLE_UNIVERSIDAD" MODIFY ("ID_UNIVERSIDAD" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."DETALLE_UNIVERSIDAD" MODIFY ("ID_PROGRAMA" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."DETALLE_UNIVERSIDAD" ADD CONSTRAINT "DETALLE_UNIVERSIDAD_PK" PRIMARY KEY ("ID_DET_UNIVERSIDAD")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table UNIVERSIDAD
--------------------------------------------------------

  ALTER TABLE "TOPHER"."UNIVERSIDAD" MODIFY ("ID_UNIVERSIDAD" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."UNIVERSIDAD" MODIFY ("NOMBRE" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."UNIVERSIDAD" MODIFY ("ESTADO" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."UNIVERSIDAD" MODIFY ("ID_PAIS" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."UNIVERSIDAD" ADD CONSTRAINT "UNIVERSIDAD_PK" PRIMARY KEY ("ID_UNIVERSIDAD")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table USUARIO
--------------------------------------------------------

  ALTER TABLE "TOPHER"."USUARIO" MODIFY ("ID_USUARIO" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."USUARIO" MODIFY ("RELACION" NOT NULL ENABLE);
  ALTER TABLE "TOPHER"."USUARIO" ADD CONSTRAINT "USUARIO_PK" PRIMARY KEY ("ID_USUARIO")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
