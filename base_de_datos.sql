create table roles (
rol_id serial,
rol_nombre varchar(50) not null,
rol_situacion smallint default 1,
primary key (rol_id),
)
create table usuarios(
usu_id serial,
usu_nombre varchar(50) unique not null,
usu_catalogo integer unique not null,
usu_password lvarchar not null,
usu_situacion smallint default 1,
primary key (usu_id)
)
create table permisos (
permiso_id serial,
permiso_usuario integer,
permiso_rol integer,
permiso_situacion smallint default 1,
primary key (permiso_id),
foreign key (permiso_rol) references roles (rol_id),
foreign key (permiso_usuario) references usuarios
(usu_id)
);
