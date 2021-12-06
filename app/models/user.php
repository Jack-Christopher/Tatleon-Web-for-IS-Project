<?php
    class User 
    {
        private $id;
        private $nombres;
        private $apellidos;
        private $email;
        private $permisos;
        private $username;
        private $es_docente;

        public function __construct($id, $nombres, $apellidos, $email, $permisos, $username, $es_docente)
        {
            $this->id = $id;
            $this->nombres = $nombres;
            $this->apellidos = $apellidos;
            $this->email = $email;
            $this->permisos = $permisos;
            $this->username = $username;
            $this->es_docente = $es_docente;
        }

        //getters
        public function getAll()
        {
            return [
                'id' => $this->id,
                'nombres' => $this->nombres,
                'apellidos' => $this->apellidos,
                'email' => $this->email,
                'permisos' => $this->permisos,
                'username' => $this->username,
                'es_docente' => $this->es_docente
            ];
        }


        public function getId()
        {
            return $this->id;
        }
        public function getNombres()
        {
            return $this->nombres;
        }
        public function getApellidos()
        {
            return $this->apellidos;
        }
        public function getEmail()
        {
            return $this->email;
        }
        public function getPermisos()
        {
            return $this->permisos;
        }
        public function getUsername()
        {
            return $this->username;
        }
        public function getEsDocente()
        {
            return $this->es_docente;
        }
    }

    define('Administrador', 1);
    define('Docente', 2);
    define('Estudiante', 3);