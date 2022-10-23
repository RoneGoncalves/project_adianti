CREATE TABLE IF NOT EXISTS pessoa 
( 
    pessoa_id INT PRIMARY KEY NOT NULL,
    pessoa_nome VARCHAR(128) NOT NULL,
    pessoa_dt_nasc DATE NOT NULL,
    pessoa_cpf VARCHAR(15) NOT NULL,
    pessoa_fone VARCHAR(15) NOT NULL,
    pessoa_whatsApp VARCHAR(15) NOT NULL,
    pessoa_email VARCHAR(128) NOT NULL
    
);

CREATE TABLE IF NOT EXISTS curso
(
    curso_id INT PRIMARY KEY NOT NULL,
    curso_nome VARCHAR(128) NOT NULL,
    curso_carga_hs VARCHAR(10) NOT NULL
);

CREATE TABLE IF NOT EXISTS aluno
(
    pessoa_id INT PRIMARY KEY NOT NULL,
    curso_aluno_id INT NOT NULL,
    disc_aluno_id INT NOT NULL,
    aluno_status INT NOT NULL,
    FOREIGN KEY (pessoa_id) REFERENCES pessoa(pessoa_id)

);

CREATE TABLE IF NOT EXISTS professor
(
    pessoa_id INT PRIMARY KEY NOT NULL,
    FOREIGN KEY (pessoa_id) REFERENCES pessoa(pessoa_id)

);

CREATE TABLE IF NOT EXISTS disciplina
(
    disciplina_id INT PRIMARY KEY NOT NULL,
    disciplina_nome VARCHAR(128) NOT NULL,
    disciplina_cod VARCHAR(5) NOT NULL,
    disci_carga_hs VARCHAR(10) NOT NULL

);

CREATE TABLE IF NOT EXISTS disciplina_curso
(
    disci_curso_id INT PRIMARY KEY,
    disciplina_id INT,
    curso_id INT, 
    FOREIGN KEY (curso_id) REFERENCES curso(curso_id),
    FOREIGN KEY (disciplina_id) REFERENCES disciplina(disciplina_id)


);

CREATE TABLE IF NOT EXISTS disciplina_prof
(
    disci_prof_id INT PRIMARY KEY,
    disci_curso_id INT NOT NULL,
    professor_id INT  NOT NULL,
    FOREIGN KEY (disci_curso_id) REFERENCES disciplina_curso(disci_curso_id),
    FOREIGN KEY (professor_id) REFERENCES professor(pessoa_id)

);


CREATE TABLE IF NOT EXISTS disciplina_aluno
(
    disci_aluno_id INT PRIMARY KEY,
    disci_curso_id INT, 
    pessoa_id INT,
    FOREIGN KEY (disci_curso_id) REFERENCES disciplina_curso(disci_curso_id),
    FOREIGN KEY (pessoa_id) REFERENCES aluno(pessoa_id)

);


CREATE TABLE IF NOT EXISTS curso_aluno
(
    curso_aluno_id INT PRIMARY KEY,
    curso_id INT, 
    pessoa_id INT,
    FOREIGN KEY (curso_id) REFERENCES curso(curso_id),
    FOREIGN KEY (pessoa_id) REFERENCES aluno(pessoa_id)

);


