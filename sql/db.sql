create database newsletter;

create table tbpost(
	id bigint,
	content text,
	date timestamp
);
alter table tbpost add constraint tbpost_pk primary key (id);

create table tbcomment(
	id bigint,
	post_id bigint,
	content text,
	date timestamp
);
alter table tbcomment add constraint tbcomment_pk primary key (id);
alter table tbcomment add constraint tbcomment_fk foreign key (post_id) references tbpost (id);

create table tblog(
	id bigint,
	action integer,
	content text,
	date timestamp
);

alter table tblog add constraint tblog_pk primary key (id);