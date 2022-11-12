create table if not exists eleicao
(
  id         bigint unsigned auto_increment
  primary key,
  ativa      tinyint(1) default 1 not null,
  created_at timestamp            null,
  updated_at timestamp            null
  );

create table if not exists chapa
(
  id              bigint unsigned auto_increment
  primary key,
  nome_chapa      varchar(255)    not null,
  cod_chapa       varchar(255)    not null,
  nome_sindico    varchar(255)    not null,
  cpf_sindico     varchar(255)    not null,
  nome_subsindico varchar(255)    not null,
  cpf_subsindico  varchar(255)    not null,
  cod_eleicao     bigint unsigned not null,
  created_at      timestamp       null,
  updated_at      timestamp       null,
  constraint chapa_cod_votacao_foreign
  foreign key (cod_eleicao) references eleicao (id)
  );


create table if not exists voto
(
  id          bigint unsigned auto_increment
  primary key,
  bloco       varchar(255)    not null,
  apartamento varchar(255)    not null,
  cod_chapa   bigint unsigned not null,
  cod_eleicao bigint unsigned not null,
  created_at  timestamp       null,
  updated_at  timestamp       null,
  constraint voto_cod_chapa_foreign
  foreign key (cod_chapa) references chapa (id),
  constraint voto_cod_eleicao_foreign
  foreign key (cod_eleicao) references eleicao (id)
  );
