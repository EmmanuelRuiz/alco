CREATE DATABASE IF NOT EXISTS alco_bd;
USE alco_bd;


CREATE TABLE users(
	id          int(255) auto_increment not null,      
	name        varchar(255),
	lastname    varchar(255),
	email       varchar(255),
	password    varchar(255),
	role_user   varchar(20),
	created_at  datetime,
	CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE = InnoDb;

CREATE TABLE service_description(
	id           		   int(255) auto_increment not null,
	users_id      		   int(255),
	service_category_id    int(255),
	description  		   text,
	provider     		   varchar(150),
	price 		           float,
	created_at             datetime,
	update_at              datetime,
	CONSTRAINT pk_service_description PRIMARY KEY(id),
	CONSTRAINT fk_service_description_users FOREIGN KEY(users_id) references users(id),
	CONSTRAINT fk_service_description_service_category FOREIGN KEY(service_category_id) references service_category(id)
)ENGINE = InnoDb;

CREATE TABLE service_category(
	id 					   int(255) auto_increment not null,
	users_id 			   int(255),
	service_category_name  varchar(255),
	created_at             datetime,
	update_at			   datetime,
	CONSTRAINT pk_service_category PRIMARY KEY(id),
	CONSTRAINT fk_service_category_users FOREIGN KEY(users_id) references users(id)
)ENGINE = InnoDb;

CREATE TABLE estimate(
	id  					int(255) auto_increment not null,
	service_description_id  int(255),
	visitors_id				int(255),
	client_name				varchar(255),
	client_email			varchar(255),
	client_phone			varchar(255),
	location				varchar(255),
	comments				text,
	pdf						varchar(255),
	created_at				datetime,
	CONSTRAINT pk_estimate PRIMARY KEY(id),
	CONSTRAINT fk_estimate_service_description FOREIGN KEY(service_description_id) references service_desription(id),
	CONSTRAINT fk_estimate_visitors_is FOREIGN KEY(visitors_id) references visitors(id)
)ENGINE = InnoDb;

CREATE TABLE air_conditioner_data(
	id
	service_description_id  int(255),
	visitors_id				int(255),
	price                   float,
	comments				text,
	create_at               datetime,
	CONSTRAINT pk_air_conditioner_data PRIMARY KEY(id),
	CONSTRAINT fk_air_conditioner_data_service_description FOREIGN KEY(service_description_id) references service_desription(id),
	CONSTRAINT fk_air_conditioner_data_visitors FOREIGN KEY(visitors_id) references visitors(id)
)ENGINE = InnoDb;


CREATE TABLE paint_data(
	id
	service_description_id  int(255),
	visitors_id				int(255),
	base					float,
	height					float,
	square_maters			float,
	price                   float,
	comments				text,
	create_at               datetime,
	CONSTRAINT pk_paint_data PRIMARY KEY(id),
	CONSTRAINT fk_paint_data_service_description FOREIGN KEY(service_description_id) references service_desription(id),
	CONSTRAINT fk_paint_data_visitors FOREIGN KEY(visitors_id) references visitors(id)
)ENGINE = InnoDb;

CREATE TABLE waterproofing_data(
	id
	service_description_id  int(255),
	visitors_id				int(255),
	base					float,
	height					float,
	square_maters			float,
	price                   float,
	comments				text,
	create_at               datetime,
	CONSTRAINT pk_waterproofing_data PRIMARY KEY(id),
	CONSTRAINT fk_waterproofing_data_service_description FOREIGN KEY(service_description_id) references service_desription(id),
	CONSTRAINT fk_waterproofing_data_visitors FOREIGN KEY(visitors_id) references visitors(id)
)ENGINE = InnoDb;

CREATE TABLE waterproofing_data(
	id
	service_description_id  int(255),
	visitors_id				int(255),
	base					float,
	height					float,
	square_maters			float,
	price                   float,
	comments				text,
	create_at               datetime,
	CONSTRAINT pk_waterproofing_data PRIMARY KEY(id),
	CONSTRAINT fk_waterproofing_data_service_description FOREIGN KEY(service_description_id) references service_desription(id),
	CONSTRAINT fk_waterproofing_data_visitors FOREIGN KEY(visitors_id) references visitors(id)
)ENGINE = InnoDb;

CREATE TABLE bardeados_data(
	id
	service_description_id  int(255),
	visitors_id				int(255),
	base					float,
	height					float,
	square_maters			float,
	price                   float,
	comments				text,
	create_at               datetime,
	CONSTRAINT pk_bardeados_data PRIMARY KEY(id),
	CONSTRAINT fk_bardeados_data_service_description FOREIGN KEY(service_description_id) references service_desription(id),
	CONSTRAINT fk_bardeados_data_visitors FOREIGN KEY(visitors_id) references visitors(id)
)ENGINE = InnoDb;

CREATE TABLE bardeados_data(
	id
	service_description_id  int(255),
	visitors_id				int(255),
	base					float,
	height					float,
	square_maters			float,
	price                   float,
	comments				text,
	create_at               datetime,
	CONSTRAINT pk_bardeados_data PRIMARY KEY(id),
	CONSTRAINT fk_bardeados_data_service_description FOREIGN KEY(service_description_id) references service_desription(id),
	CONSTRAINT fk_bardeados_data_visitors FOREIGN KEY(visitors_id) references visitors(id)
)ENGINE = InnoDb;

CREATE TABLE drywall_data(
	id
	service_description_id  int(255),
	visitors_id				int(255),
	base					float,
	height					float,
	square_maters			float,
	price                   float,
	comments				text,
	create_at               datetime,
	CONSTRAINT pk_drywall_data PRIMARY KEY(id),
	CONSTRAINT fk_drywall_data_service_description FOREIGN KEY(service_description_id) references service_desription(id),
	CONSTRAINT fk_drywall_data_visitors FOREIGN KEY(visitors_id) references visitors(id)
)ENGINE = InnoDb;

CREATE TABLE floor_placement_data(
	id
	service_description_id  int(255),
	visitors_id				int(255),
	base					float,
	height					float,
	square_maters			float,
	price                   float,
	comments				text,
	create_at               datetime,
	CONSTRAINT pk_floor_placement_data PRIMARY KEY(id),
	CONSTRAINT fk_floor_placement_data_service_description FOREIGN KEY(service_description_id) references service_desription(id),
	CONSTRAINT fk_floor_placement_data_visitors FOREIGN KEY(visitors_id) references visitors(id)
)ENGINE = InnoDb;

CREATE TABLE smithy_data(
	id
	service_description_id  int(255),
	visitors_id				int(255),
	base					float,
	height					float,
	square_maters			float,
	price                   float,
	comments				text,
	create_at               datetime,
	CONSTRAINT pk_smithy_data_data PRIMARY KEY(id),
	CONSTRAINT fk_smithy_data_data_service_description FOREIGN KEY(service_description_id) references service_desription(id),
	CONSTRAINT fk_smithy_data_data_visitors FOREIGN KEY(visitors_id) references visitors(id)
)ENGINE = InnoDb;

CREATE TABLE plumbing_data(
	id
	service_description_id  int(255),
	visitors_id				int(255),
	create_at               datetime,
	CONSTRAINT pk_plumbing_data PRIMARY KEY(id),
	CONSTRAINT fk_plumbing_data_service_description FOREIGN KEY(service_description_id) references service_desription(id),
	CONSTRAINT fk_plumbing_data_visitors FOREIGN KEY(visitors_id) references visitors(id)
)ENGINE = InnoDb;

CREATE TABLE masonry_data(
	id
	service_description_id  int(255),
	visitors_id				int(255),
	create_at               datetime,
	CONSTRAINT pk_masonry_data PRIMARY KEY(id),
	CONSTRAINT fk_masonry_data_service_description FOREIGN KEY(service_description_id) references service_desription(id),
	CONSTRAINT fk_masonry_data_visitors FOREIGN KEY(visitors_id) references visitors(id)
)ENGINE = InnoDb;

CREATE TABLE interior_decoration_data(
	id
	service_description_id  int(255),
	visitors_id				int(255),
	create_at               datetime,
	CONSTRAINT pk_interior_decoration_data PRIMARY KEY(id),
	CONSTRAINT fk_interior_decoration_data_service_description FOREIGN KEY(service_description_id) references service_desription(id),
	CONSTRAINT fk_interior_decoration_data_visitors FOREIGN KEY(visitors_id) references visitors(id)
)ENGINE = InnoDb;

CREATE TABLE carpentry_data(
	id
	service_description_id  int(255),
	visitors_id				int(255),
	create_at               datetime,
	CONSTRAINT pk_carpentry_data PRIMARY KEY(id),
	CONSTRAINT fk_carpentry_data_service_description FOREIGN KEY(service_description_id) references service_desription(id),
	CONSTRAINT fk_carpentry_data_visitors FOREIGN KEY(visitors_id) references visitors(id)
)ENGINE = InnoDb;

CREATE TABLE fumigation_data(
	id 						int(255),
	service_description_id  int(255),
	visitors_id				int(255),
	create_at               datetime,
	CONSTRAINT pk_fumigation_data PRIMARY KEY(id),
	CONSTRAINT fk_fumigation_data_service_description FOREIGN KEY(service_description_id) references service_desription(id),
	CONSTRAINT fk_fumigation_data_visitors FOREIGN KEY(visitors_id) references visitors(id)
)ENGINE = InnoDb;

CREATE TABLE electricity_data(
	id 						int(255),
	service_description_id  int(255),
	visitors_id				int(255),
	create_at               datetime,
	CONSTRAINT pk_electricity_data PRIMARY KEY(id),
	CONSTRAINT fk_electricity_data_service_description FOREIGN KEY(service_description_id) references service_desription(id),
	CONSTRAINT fk_electricity_data_visitors FOREIGN KEY(visitors_id) references visitors(id)
)ENGINE = InnoDb;

CREATE TABLE visitors(
	id 			int(255),
	name  		varchar(255)			
	create_at   datetime,
	CONSTRAINT pk_electricity_data PRIMARY KEY(id),
)ENGINE = InnoDb;