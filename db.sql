drop table if exists category;
create table category
(
    id int unsigned not null auto_increment comment 'ID',
    cat_name varchar(255) not null comment '��������',
    parent_id int unsigned not null default 0 comment '�ϼ�ID',
    path varchar(255) not null default '-' comment '�����ϼ������ID',
    primary key (id)
)engine=InnoDB comment='�����';

TRUNCATE category;
INSERT INTO category VALUES
(1,'���õ���',0,'-'),
(2,'����',1,'-1-'),
(3,'�յ�',1,'-1-'),
(4,'�������',2,'-1-2-'),
(5,'��������',2,'-1-2-'),
(6,'��ʽ�յ�',3,'-1-3-'),
(7,'����յ�',3,'-1-3-'),
(8,'����',0,'-'),
(9,'��������',8,'-8-'),
(10,'�������',8,'-8-'),
(11,'�ʼǱ�',9,'-8-9-'),
(12,'��Ϸ��',9,'-8-9-'),
(13,'��ʾ��',10,'-8-10-'),
(14,'CPU',10,'-8-10-');


drop table if exists brand;
create table brand
(
    id int unsigned not null auto_increment comment 'ID',
    brand_name varchar(255) not null comment 'Ʒ������',
    logo varchar(255) not null comment 'LOGO',
    primary key (id)
)engine=InnoDB comment='Ʒ�Ʊ�';

drop table if exists goods;
create table goods
(
    id int unsigned not null auto_increment comment 'ID',
    goods_name varchar(255) not null comment '��Ʒ����',
    logo varchar(255) not null comment 'LOGO',
    is_on_sale enum('y','n') not null default 'y' comment '�Ƿ��ϼ�',
    description longtext not null comment '��Ʒ����',
    cat1_id int unsigned not null comment 'һ������ID',
    cat2_id int unsigned not null comment '��������ID',
    cat3_id int unsigned not null comment '��������ID',
    brand_id int unsigned not null comment 'Ʒ��ID',
    created_at datetime not null default current_timestamp comment '���ʱ��',
    primary key (id)
)engine=InnoDB comment='��Ʒ��';

drop table if exists goods_attribute;
create table goods_attribute
(
    id int unsigned not null auto_increment comment 'ID',
    attr_name varchar(255) not null comment '��������',
    attr_value varchar(255) not null comment '����ֵ',
    goods_id int unsigned not null comment '��������ƷID',
    primary key (id)
)engine=InnoDB comment='��Ʒ���Ա�';

drop table if exists goods_image;
create table goods_image
(
    id int unsigned not null auto_increment comment 'ID',
    goods_id int unsigned not null comment '��������ƷID',
    path varchar(255) not null comment 'ͼƬ��·��',
    primary key (id)
)engine=InnoDB comment='��ƷͼƬ��';

drop table if exists goods_sku;
create table goods_sku
(
    id int unsigned not null auto_increment comment 'ID',
    goods_id int unsigned not null comment '��������ƷID',
    sku_name varchar(255) not null comment 'SKU����',
    stock int unsigned not null comment '�����',
    price decimal(10,2) not null comment '�۸�',
    primary key (id)
)engine=InnoDB comment='��ƷSKU��';