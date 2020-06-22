create table admin ( 
adminid number(10), 
a_username varchar2(20), 
a_password varchar2(20), 
assistantid number(10), 
constraint adminid_pk primary key(adminid), 
constraint a_username_nn check (a_username is not null), 
constraint a_password_nn check (a_password is not null), 
constraint assistantid_fk foreign key(assistantid) references admin(adminid)); 
  
create table vendor ( 
vendorid number(10), 
v_firstname varchar2(50), 
v_lastname varchar2(50), 
v_phone varchar2(15), 
v_email varchar2(50), 
v_address varchar2(100), 
v_zipcode varchar2(5), 
v_city varchar2(30), 
constraint vendorid_pk primary key(vendorid), 
constraint v_firstname_nn check (v_firstname is not null), 
constraint v_lastname_nn check (v_lastname is not null), 
constraint v_phone_nn check (v_phone is not null), 
constraint v_email_nn check (v_email is not null), 
constraint v_email_uk unique(v_email), 
constraint v_address_nn check (v_address is not null), 
constraint v_zipcode_nn check (v_zipcode is not null), 
constraint v_city_nn check (v_city is not null)); 
 
create table customer ( 
custid number(10), 
c_firstname varchar2(50), 
c_lastname varchar2(50), 
c_phone varchar2(15), 
c_address varchar2(100), 
c_zipcode varchar2(5), 
c_city varchar2(30), 
constraint custid_pk primary key(custid), 
constraint c_firstname_nn check (c_firstname is not null), 
constraint c_lastname_nn check (c_lastname is not null), 
constraint c_phone_nn check (c_phone is not null), 
constraint c_address_nn check (c_address is not null), 
constraint c_zipcode_nn check (c_zipcode is not null), 
constraint c_city_nn check (c_city is not null)); 
 
create table product ( 
productid number(10), 
p_name varchar2(30), 
p_desc varchar2(50), 
p_price number(9,2), 
vendorid number(10), 
constraint productid_pk primary key(productid), 
constraint p_name_nn check (p_name is not null), 
constraint p_desc_nn check (p_desc is not null), 
constraint p_price_nn check (p_price is not null), 
constraint vendorid_fk foreign key(vendorid) references vendor(vendorid)); 
 
create table food ( 
foodid number(10), 
f_spicylevel number(2), 
productid number(10), 
constraint foodid_pk primary key(foodid), 
constraint f_spicylevel_nn check (f_spicylevel is not null), 
constraint productid_fk foreign key(productid) references product(productid)); 
 
create table drink ( 
drinkid number(10), 
d_flavour varchar2(20), 
d_capacity number(10), 
productid number(10), 
constraint drinkid_pk primary key(drinkid), 
constraint d_flavour_nn check (d_flavour is not null), 
constraint d_capacity_nn check (d_capacity is not null), 
constraint productid_ffk foreign key(productid) references product(productid)); 
 
create table order ( 
orderid number(10), 
o_date date, 
o_time date,  
o_totalprice number(10,2), 
o_status varchar2(20), 
adminid number(10), 
productid number(10), 
custid number(10), 
constraint orderid_pk primary key(orderid), 
constraint o_totalprice_nn check (o_totalprice is not null), 
constraint o_status_nn check (o_status is not null), 
constraint adminid_ffk foreign key(adminid) references admin(adminid), 
constraint productid_fkk foreign key(productid) references product(productid), 
constraint custid_ffk foreign key(custid) references customer(custid)); 

?
create sequence adminid_seq
increment by 1
start with 100
maxvalue 999999
nocache
nocycle;

create sequence vendorid_seq
increment by 1
start with 100
maxvalue 999999
nocache
nocycle;

create sequence custid_seq
increment by 1
start with 100
maxvalue 999999
nocache
nocycle;

create sequence productid_seq
increment by 1
start with 100
maxvalue 999999
nocache
nocycle;

create sequence foodid_seq
increment by 1
start with 100
maxvalue 999999
nocache
nocycle;

create sequence drinkid_seq
increment by 1
start with 100
maxvalue 999999
nocache
nocycle;


create sequence orderid_seq
increment by 1
start with 100
maxvalue 999999
nocache
nocycle;


