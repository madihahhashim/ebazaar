--------------------------------------------------------
--  File created - Monday-June-22-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Sequence ADMINID_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "PROJECT502"."ADMINID_SEQ"  MINVALUE 1 MAXVALUE 999999 INCREMENT BY 1 START WITH 1 NOCACHE  NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence CUSTID_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "PROJECT502"."CUSTID_SEQ"  MINVALUE 1 MAXVALUE 999999 INCREMENT BY 1 START WITH 1 NOCACHE  NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence DRINKID_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "PROJECT502"."DRINKID_SEQ"  MINVALUE 1 MAXVALUE 999999 INCREMENT BY 1 START WITH 1 NOCACHE  NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence FOODID_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "PROJECT502"."FOODID_SEQ"  MINVALUE 1 MAXVALUE 999999 INCREMENT BY 1 START WITH 1 NOCACHE  NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence ORDERID_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "PROJECT502"."ORDERID_SEQ"  MINVALUE 1 MAXVALUE 999999 INCREMENT BY 1 START WITH 1 NOCACHE  NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence PRODUCTID_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "PROJECT502"."PRODUCTID_SEQ"  MINVALUE 1 MAXVALUE 999999 INCREMENT BY 1 START WITH 1 NOCACHE  NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence VENDORID_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "PROJECT502"."VENDORID_SEQ"  MINVALUE 1 MAXVALUE 999999 INCREMENT BY 1 START WITH 1 NOCACHE  NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Table ADMIN
--------------------------------------------------------

  CREATE TABLE "PROJECT502"."ADMIN" 
   (	"ADMINID" NUMBER(10,0), 
	"A_USERNAME" VARCHAR2(20 BYTE), 
	"A_PASSWORD" VARCHAR2(20 BYTE), 
	"ASSISTANTID" NUMBER(10,0)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table CUSTOMER
--------------------------------------------------------

  CREATE TABLE "PROJECT502"."CUSTOMER" 
   (	"CUSTID" NUMBER(10,0), 
	"C_FIRSTNAME" VARCHAR2(50 BYTE), 
	"C_LASTNAME" VARCHAR2(50 BYTE), 
	"C_PHONE" VARCHAR2(15 BYTE), 
	"C_ADDRESS" VARCHAR2(100 BYTE), 
	"C_ZIPCODE" VARCHAR2(5 BYTE), 
	"C_CITY" VARCHAR2(30 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table DRINK
--------------------------------------------------------

  CREATE TABLE "PROJECT502"."DRINK" 
   (	"DRINKID" NUMBER(10,0), 
	"D_FLAVOUR" VARCHAR2(20 BYTE), 
	"PRODUCTID" NUMBER(10,0), 
	"D_CAPACITY" VARCHAR2(10 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table FOOD
--------------------------------------------------------

  CREATE TABLE "PROJECT502"."FOOD" 
   (	"FOODID" NUMBER(10,0), 
	"PRODUCTID" NUMBER(10,0), 
	"F_SPICYLEVEL" VARCHAR2(10 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table ORDERS
--------------------------------------------------------

  CREATE TABLE "PROJECT502"."ORDERS" 
   (	"ORDERID" NUMBER(10,0), 
	"O_DATE" DATE, 
	"O_TIME" DATE, 
	"O_TOTALPRICE" NUMBER(10,2), 
	"O_STATUS" VARCHAR2(20 BYTE), 
	"ADMINID" NUMBER(10,0), 
	"PRODUCTID" NUMBER(10,0), 
	"CUSTID" NUMBER(10,0)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table PRODUCT
--------------------------------------------------------

  CREATE TABLE "PROJECT502"."PRODUCT" 
   (	"PRODUCTID" NUMBER(10,0), 
	"P_NAME" VARCHAR2(30 BYTE), 
	"P_DESC" VARCHAR2(50 BYTE), 
	"P_PRICE" NUMBER(9,2), 
	"VENDORID" NUMBER(10,0)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table VENDOR
--------------------------------------------------------

  CREATE TABLE "PROJECT502"."VENDOR" 
   (	"VENDORID" NUMBER(10,0), 
	"V_FIRSTNAME" VARCHAR2(50 BYTE), 
	"V_LASTNAME" VARCHAR2(50 BYTE), 
	"V_EMAIL" VARCHAR2(50 BYTE), 
	"V_ADDRESS" VARCHAR2(100 BYTE), 
	"V_ZIPCODE" VARCHAR2(5 BYTE), 
	"V_CITY" VARCHAR2(30 BYTE), 
	"V_PHONE" VARCHAR2(15 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
REM INSERTING into PROJECT502.ADMIN
SET DEFINE OFF;
Insert into PROJECT502.ADMIN (ADMINID,A_USERNAME,A_PASSWORD,ASSISTANTID) values (1,'ebazaar','ebazaar',2);
Insert into PROJECT502.ADMIN (ADMINID,A_USERNAME,A_PASSWORD,ASSISTANTID) values (2,'ain','ain',1);
REM INSERTING into PROJECT502.CUSTOMER
SET DEFINE OFF;
REM INSERTING into PROJECT502.DRINK
SET DEFINE OFF;
REM INSERTING into PROJECT502.FOOD
SET DEFINE OFF;
REM INSERTING into PROJECT502.ORDERS
SET DEFINE OFF;
REM INSERTING into PROJECT502.PRODUCT
SET DEFINE OFF;
REM INSERTING into PROJECT502.VENDOR
SET DEFINE OFF;
Insert into PROJECT502.VENDOR (VENDORID,V_FIRSTNAME,V_LASTNAME,V_EMAIL,V_ADDRESS,V_ZIPCODE,V_CITY,V_PHONE) values (1,'ain','emylia','ain@gmail.com','desa bakti','28400','mentakab','0123456789');
--------------------------------------------------------
--  DDL for Index CUSTID_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "PROJECT502"."CUSTID_PK" ON "PROJECT502"."CUSTOMER" ("CUSTID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Index FOODID_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "PROJECT502"."FOODID_PK" ON "PROJECT502"."FOOD" ("FOODID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Index VENDORID_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "PROJECT502"."VENDORID_PK" ON "PROJECT502"."VENDOR" ("VENDORID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Index PRODUCTID_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "PROJECT502"."PRODUCTID_PK" ON "PROJECT502"."PRODUCT" ("PRODUCTID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Index ORDERID_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "PROJECT502"."ORDERID_PK" ON "PROJECT502"."ORDERS" ("ORDERID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Index ADMINID_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "PROJECT502"."ADMINID_PK" ON "PROJECT502"."ADMIN" ("ADMINID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Index DRINKID_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "PROJECT502"."DRINKID_PK" ON "PROJECT502"."DRINK" ("DRINKID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Index V_EMAIL_UK
--------------------------------------------------------

  CREATE UNIQUE INDEX "PROJECT502"."V_EMAIL_UK" ON "PROJECT502"."VENDOR" ("V_EMAIL") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  Constraints for Table FOOD
--------------------------------------------------------

  ALTER TABLE "PROJECT502"."FOOD" ADD CONSTRAINT "FOODID_PK" PRIMARY KEY ("FOODID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "PROJECT502"."FOOD" ADD CONSTRAINT "F_SPICYLEVEL_NN" CHECK (f_spicylevel is not null) ENABLE;
--------------------------------------------------------
--  Constraints for Table PRODUCT
--------------------------------------------------------

  ALTER TABLE "PROJECT502"."PRODUCT" ADD CONSTRAINT "PRODUCTID_PK" PRIMARY KEY ("PRODUCTID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "PROJECT502"."PRODUCT" ADD CONSTRAINT "P_PRICE_NN" CHECK (p_price is not null) ENABLE;
  ALTER TABLE "PROJECT502"."PRODUCT" ADD CONSTRAINT "P_DESC_NN" CHECK (p_desc is not null) ENABLE;
  ALTER TABLE "PROJECT502"."PRODUCT" ADD CONSTRAINT "P_NAME_NN" CHECK (p_name is not null) ENABLE;
--------------------------------------------------------
--  Constraints for Table VENDOR
--------------------------------------------------------

  ALTER TABLE "PROJECT502"."VENDOR" ADD CONSTRAINT "V_EMAIL_UK" UNIQUE ("V_EMAIL")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "PROJECT502"."VENDOR" ADD CONSTRAINT "VENDORID_PK" PRIMARY KEY ("VENDORID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "PROJECT502"."VENDOR" ADD CONSTRAINT "V_CITY_NN" CHECK (v_city is not null) ENABLE;
  ALTER TABLE "PROJECT502"."VENDOR" ADD CONSTRAINT "V_ZIPCODE_NN" CHECK (v_zipcode is not null) ENABLE;
  ALTER TABLE "PROJECT502"."VENDOR" ADD CONSTRAINT "V_ADDRESS_NN" CHECK (v_address is not null) ENABLE;
  ALTER TABLE "PROJECT502"."VENDOR" ADD CONSTRAINT "V_EMAIL_NN" CHECK (v_email is not null) ENABLE;
  ALTER TABLE "PROJECT502"."VENDOR" ADD CONSTRAINT "V_PHONE_NN" CHECK (v_phone is not null) ENABLE;
  ALTER TABLE "PROJECT502"."VENDOR" ADD CONSTRAINT "V_LASTNAME_NN" CHECK (v_lastname is not null) ENABLE;
  ALTER TABLE "PROJECT502"."VENDOR" ADD CONSTRAINT "V_FIRSTNAME_NN" CHECK (v_firstname is not null) ENABLE;
--------------------------------------------------------
--  Constraints for Table ORDERS
--------------------------------------------------------

  ALTER TABLE "PROJECT502"."ORDERS" ADD CONSTRAINT "ORDERID_PK" PRIMARY KEY ("ORDERID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "PROJECT502"."ORDERS" ADD CONSTRAINT "O_STATUS_NN" CHECK (o_status is not null) ENABLE;
  ALTER TABLE "PROJECT502"."ORDERS" ADD CONSTRAINT "O_TOTALPRICE_NN" CHECK (o_totalprice is not null) ENABLE;
--------------------------------------------------------
--  Constraints for Table ADMIN
--------------------------------------------------------

  ALTER TABLE "PROJECT502"."ADMIN" ADD CONSTRAINT "ADMINID_PK" PRIMARY KEY ("ADMINID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "PROJECT502"."ADMIN" ADD CONSTRAINT "A_PASSWORD_NN" CHECK (a_password is not null) ENABLE;
  ALTER TABLE "PROJECT502"."ADMIN" ADD CONSTRAINT "A_USERNAME_NN" CHECK (a_username is not null) ENABLE;
--------------------------------------------------------
--  Constraints for Table DRINK
--------------------------------------------------------

  ALTER TABLE "PROJECT502"."DRINK" ADD CONSTRAINT "DRINKID_PK" PRIMARY KEY ("DRINKID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "PROJECT502"."DRINK" ADD CONSTRAINT "D_CAPACITY_NN" CHECK (d_capacity is not null) ENABLE;
  ALTER TABLE "PROJECT502"."DRINK" ADD CONSTRAINT "D_FLAVOUR_NN" CHECK (d_flavour is not null) ENABLE;
--------------------------------------------------------
--  Constraints for Table CUSTOMER
--------------------------------------------------------

  ALTER TABLE "PROJECT502"."CUSTOMER" ADD CONSTRAINT "CUSTID_PK" PRIMARY KEY ("CUSTID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "PROJECT502"."CUSTOMER" ADD CONSTRAINT "C_CITY_NN" CHECK (c_city is not null) ENABLE;
  ALTER TABLE "PROJECT502"."CUSTOMER" ADD CONSTRAINT "C_ZIPCODE_NN" CHECK (c_zipcode is not null) ENABLE;
  ALTER TABLE "PROJECT502"."CUSTOMER" ADD CONSTRAINT "C_ADDRESS_NN" CHECK (c_address is not null) ENABLE;
  ALTER TABLE "PROJECT502"."CUSTOMER" ADD CONSTRAINT "C_PHONE_NN" CHECK (c_phone is not null) ENABLE;
  ALTER TABLE "PROJECT502"."CUSTOMER" ADD CONSTRAINT "C_LASTNAME_NN" CHECK (c_lastname is not null) ENABLE;
  ALTER TABLE "PROJECT502"."CUSTOMER" ADD CONSTRAINT "C_FIRSTNAME_NN" CHECK (c_firstname is not null) ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table ADMIN
--------------------------------------------------------

  ALTER TABLE "PROJECT502"."ADMIN" ADD CONSTRAINT "ASSISTANTID_FK" FOREIGN KEY ("ASSISTANTID")
	  REFERENCES "PROJECT502"."ADMIN" ("ADMINID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table DRINK
--------------------------------------------------------

  ALTER TABLE "PROJECT502"."DRINK" ADD CONSTRAINT "PRODUCTID_FFK" FOREIGN KEY ("PRODUCTID")
	  REFERENCES "PROJECT502"."PRODUCT" ("PRODUCTID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table FOOD
--------------------------------------------------------

  ALTER TABLE "PROJECT502"."FOOD" ADD CONSTRAINT "PRODUCTID_FK" FOREIGN KEY ("PRODUCTID")
	  REFERENCES "PROJECT502"."PRODUCT" ("PRODUCTID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table ORDERS
--------------------------------------------------------

  ALTER TABLE "PROJECT502"."ORDERS" ADD CONSTRAINT "ADMINID_FFK" FOREIGN KEY ("ADMINID")
	  REFERENCES "PROJECT502"."ADMIN" ("ADMINID") ENABLE;
  ALTER TABLE "PROJECT502"."ORDERS" ADD CONSTRAINT "CUSTID_FFK" FOREIGN KEY ("CUSTID")
	  REFERENCES "PROJECT502"."CUSTOMER" ("CUSTID") ENABLE;
  ALTER TABLE "PROJECT502"."ORDERS" ADD CONSTRAINT "PRODUCTID_FKK" FOREIGN KEY ("PRODUCTID")
	  REFERENCES "PROJECT502"."PRODUCT" ("PRODUCTID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table PRODUCT
--------------------------------------------------------

  ALTER TABLE "PROJECT502"."PRODUCT" ADD CONSTRAINT "VENDORID_FK" FOREIGN KEY ("VENDORID")
	  REFERENCES "PROJECT502"."VENDOR" ("VENDORID") ENABLE;
