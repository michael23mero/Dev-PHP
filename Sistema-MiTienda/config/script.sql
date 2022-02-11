/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     07/03/2021 14:09:18                          */
/*==============================================================*/


drop table if exists CATEGORIA;

drop table if exists CLIENTE;

drop table if exists DETALLE;

drop table if exists EMPLEADO;

drop table if exists EMPRESA;

drop table if exists FACTURAPEDIDO;

drop table if exists PERFIL;

drop table if exists PRODUCTO;

drop table if exists PROVEEDOR;

drop table if exists ROLEMPLEADO;

/*==============================================================*/
/* Table: CATEGORIA                                             */
/*==============================================================*/
create table CATEGORIA
(
   ID_CATEGORIA         int not null,
   NOM_CATEGORIA        varchar(30),
   primary key (ID_CATEGORIA)
);

/*==============================================================*/
/* Table: CLIENTE                                               */
/*==============================================================*/
create table CLIENTE
(
   ID_CLIENTE           int not null,
   NOM_CLIENTE          char(30),
   APE_CLIENTE          varchar(30),
   DIR_CLIENTE          varchar(30),
   TELCLIENTE           int,
   primary key (ID_CLIENTE)
);

/*==============================================================*/
/* Table: DETALLE                                               */
/*==============================================================*/
create table DETALLE
(
   ID_FACTPED           int not null,
   COD_PRODUCTO         int not null,
   CANTIDAD             int,
   TOTAL                float,
   primary key (ID_FACTPED, COD_PRODUCTO)
);

/*==============================================================*/
/* Table: EMPLEADO                                              */
/*==============================================================*/
create table EMPLEADO
(
   ID_EMPLEADO          int not null,
   ID_EMPRESA           int,
   COD_ROLEMP           int,
   ID                   int,
   NOM_EMPLEADO         varchar(30),
   APE_EMPLEADO         varchar(30),
   DIR_EMPLEADO         varchar(30),
   TEL_EMPLEADO         int,
   primary key (ID_EMPLEADO)
);

/*==============================================================*/
/* Table: EMPRESA                                               */
/*==============================================================*/
create table EMPRESA
(
   ID_EMPRESA           int not null,
   NOM_EMPRESA          varchar(30),
   primary key (ID_EMPRESA)
);

/*==============================================================*/
/* Table: FACTURAPEDIDO                                         */
/*==============================================================*/
create table FACTURAPEDIDO
(
   ID_FACTPED           int not null auto_increment,
   ID_CLIENTE           int,
   ID_EMPLEADO          int,
   FECHA_FACTPED        varchar(20),
   SUBTOT_FACTPED       float,
   IVATOT_FACTPED       float,
   TOTAL_FACTPED        float,
   primary key (ID_FACTPED)
);

/*==============================================================*/
/* Table: PERFIL                                                */
/*==============================================================*/
create table PERFIL
(
   ID                   int not null auto_increment,
   ID_EMPLEADO          int,
   USER                 varchar(20),
   PASS                 varchar(20),
   primary key (ID)
);

/*==============================================================*/
/* Table: PRODUCTO                                              */
/*==============================================================*/
create table PRODUCTO
(
   COD_PRODUCTO         int not null,
   ID_PROVEEDOR         int,
   ID_CATEGORIA         int,
   NOM_PRODUCTO         varchar(30),
   PRECIO_PRODUCTO      float,
   STOCK_PRODUCTO       int,
   primary key (COD_PRODUCTO)
);

/*==============================================================*/
/* Table: PROVEEDOR                                             */
/*==============================================================*/
create table PROVEEDOR
(
   ID_PROVEEDOR         int not null,
   ID_EMPRESA           int,
   NOM_PROVEEDOR        varchar(20),
   DESC_PROVEEDOR       text,
   primary key (ID_PROVEEDOR)
);

/*==============================================================*/
/* Table: ROLEMPLEADO                                           */
/*==============================================================*/
create table ROLEMPLEADO
(
   COD_ROLEMP           int not null,
   DES_ROLEMP           varchar(20),
   primary key (COD_ROLEMP)
);

alter table DETALLE add constraint FK_RELATIONSHIP_10 foreign key (ID_FACTPED)
      references FACTURAPEDIDO (ID_FACTPED) on delete restrict on update restrict;

alter table DETALLE add constraint FK_RELATIONSHIP_12 foreign key (COD_PRODUCTO)
      references PRODUCTO (COD_PRODUCTO) on delete restrict on update restrict;

alter table EMPLEADO add constraint FK_PUEDE_SER foreign key (COD_ROLEMP)
      references ROLEMPLEADO (COD_ROLEMP) on delete restrict on update restrict;

alter table EMPLEADO add constraint FK_RELATIONSHIP_11 foreign key (ID)
      references PERFIL (ID) on delete restrict on update restrict;

alter table EMPLEADO add constraint FK_TRABAJA foreign key (ID_EMPRESA)
      references EMPRESA (ID_EMPRESA) on delete restrict on update restrict;

alter table FACTURAPEDIDO add constraint FK_ESTA foreign key (ID_EMPLEADO)
      references EMPLEADO (ID_EMPLEADO) on delete restrict on update restrict;

alter table FACTURAPEDIDO add constraint FK_TIENE foreign key (ID_CLIENTE)
      references CLIENTE (ID_CLIENTE) on delete restrict on update restrict;

alter table PERFIL add constraint FK_RELATIONSHIP_9 foreign key (ID_EMPLEADO)
      references EMPLEADO (ID_EMPLEADO) on delete restrict on update restrict;

alter table PRODUCTO add constraint FK_OFRECE foreign key (ID_PROVEEDOR)
      references PROVEEDOR (ID_PROVEEDOR) on delete restrict on update restrict;

alter table PRODUCTO add constraint FK_PERTENECE foreign key (ID_CATEGORIA)
      references CATEGORIA (ID_CATEGORIA) on delete restrict on update restrict;

alter table PROVEEDOR add constraint FK_TRABAJA2 foreign key (ID_EMPRESA)
      references EMPRESA (ID_EMPRESA) on delete restrict on update restrict;



INSERT INTO `producto` (`COD_PRODUCTO`, `ID_PROVEEDOR`, `ID_CATEGORIA`, `NOM_PRODUCTO`, `PRECIO_PRODUCTO`, `STOCK_PRODUCTO`, `DESC_PRODUCTO`, `IMG_PRODUCTO`) VALUES ('1', '1', '1', 'Cloro', '0.99', '20', 'Cloro Cloro Cloro, xd', 'https://tiaecuador.vteximg.com.br/arquivos/ids/165624-1000-1000/141510000.jpg?v=637137551204200000'), ('2', '1', '1', 'Deja', '1.95', '20', 'DETERGENTE BRISA PRIMAVERA DEJA 1.2 KG', 'https://tiaecuador.vteximg.com.br/arquivos/ids/165923-1000-1000/141609001.jpg?v=637184415258400000'), ('3', '1', '1', 'Fabuloso', '2.35', '20', 'DESINFECTANTE LAVANDA FABULOSO 1000 ML', 'https://tiaecuador.vteximg.com.br/arquivos/ids/161667-1000-1000/140691003.jpg?v=636868158315270000'), ('4', '1', '1', 'Suavitel', '1.29', '20', 'SUAVIZANTE FRESCA PRIMAVERA SUAVITEL 800 ML', 'https://tiaecuador.vteximg.com.br/arquivos/ids/169386-1000-1000/141764000.jpg?v=637327058172700000');
INSERT INTO `producto` (`COD_PRODUCTO`, `ID_PROVEEDOR`, `ID_CATEGORIA`, `NOM_PRODUCTO`, `PRECIO_PRODUCTO`, `STOCK_PRODUCTO`, `DESC_PRODUCTO`, `IMG_PRODUCTO`) VALUES ('5', '1', '4', 'Arroz Conejo', '6.00', '20', 'ARROZ CONEJO 20 LB', 'https://tiaecuador.vteximg.com.br/arquivos/ids/161257-1000-1000/257216000.jpg?v=636844674953070000'), ('6', '1', '4', 'Aceite Favorita', '5.99', '20', 'ACEITE LA FAVORITA 4 L', 'https://tiaecuador.vteximg.com.br/arquivos/ids/170189-1000-1000/257470000.jpg?v=637332455440730000'), ('7', '1', '4', 'Azúcar San Carlos', '1.99', '20', 'AZÚCAR SAN CARLOS 2 KG', 'https://tiaecuador.vteximg.com.br/arquivos/ids/155890-1000-1000/2000345.jpg?v=636225933214530000'), ('8', '1', '4', 'Sal, Cris Sal', '0.50', '20', 'SAL YODADA CRIS SAL 1 KG', 'https://tiaecuador.vteximg.com.br/arquivos/ids/168499-1000-1000/251308000.jpg?v=637323750450530000');
INSERT INTO `producto` (`COD_PRODUCTO`, `ID_PROVEEDOR`, `ID_CATEGORIA`, `NOM_PRODUCTO`, `PRECIO_PRODUCTO`, `STOCK_PRODUCTO`, `DESC_PRODUCTO`, `IMG_PRODUCTO`) VALUES ('9', '2', '5', 'Coca Cola', '0.55', '20', 'La Cola de la Coca', 'https://tiaecuador.vteximg.com.br/arquivos/ids/168884-1000-1000/247061000.jpg?v=637324609411500000'), ('10', '2', '5', 'Pepsi', '0.75', '20', 'Coca Cola, lo mismo pero mas barato - 1.25L', 'https://tiaecuador.vteximg.com.br/arquivos/ids/173366-1000-1000/247143.jpg?v=637431390460600000'), ('11', '2', '5', 'Sprite', '0.40', '20', 'La coca cola blanca', 'https://tiaecuador.vteximg.com.br/arquivos/ids/168995-1000-1000/247121000.jpg?v=637324609786330000'), ('12', '1', '5', 'Fioravanti', '0.99', '20', 'La cola de los ecuatorianos', 'https://tiaecuador.vteximg.com.br/arquivos/ids/168889-1000-1000/247096000.jpg?v=637324609427000000');
INSERT INTO `producto` (`COD_PRODUCTO`, `ID_PROVEEDOR`, `ID_CATEGORIA`, `NOM_PRODUCTO`, `PRECIO_PRODUCTO`, `STOCK_PRODUCTO`, `DESC_PRODUCTO`, `IMG_PRODUCTO`) VALUES ('13', '1', '6', 'La Vaquita en Polvo', '3.75', '20', 'LECHE EN POLVO LA VAQUITA 400 G', 'https://tiaecuador.vteximg.com.br/arquivos/ids/160580-1000-1000/277220001.jpg?v=636812866182800000'), ('14', '2', '6', 'Leche Nutri', '0.85', '20', 'LECHE NUTRILECHE TETRA BRIK 1 L ENTERA', 'https://tiaecuador.vteximg.com.br/arquivos/ids/173929-1000-1000/337130000.jpg?v=637463746111300000'), ('15', '2', '6', 'Leche Condensada', '2.50', '20', 'LECHE CONDENSADA LA LECHERA 397 G', 'https://tiaecuador.vteximg.com.br/arquivos/ids/155932-1000-1000/2000409.jpg?v=636225933462870000'), ('16', '2', '6', 'Leceh Svelty', '2.20', '20', 'LECHE SVELTY LA LECHERA TETRA BRIK 1 L EXTRA CALCIO', 'https://tiaecuador.vteximg.com.br/arquivos/ids/169430-1000-1000/337103003.jpg?v=637327058443200000');