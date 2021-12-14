<?php
    class User 
    {
        public $id;
        public $nombres;
        public $apellidos;
        public $email;
        public $permisos;
        public $username;
        public $es_docente;
        public $escuelas;

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

        // $escuelas_id array of numbers
        public function setEscuelasId($escuelas)
        {
            $this->escuelas = $escuelas;
        }

        //getters
        public function getNombresCompletos()
        {
            if ((isset($this->nombres) && isset($this->apellidos)) && ($this->nombres != '' && $this->apellidos != '')) 
            {
                return $this->apellidos . ', ' . $this->nombres;
            }
            else
            {
                return 'N, N';
            }
        }

        public function getEscuelas()
        {
            return $this->escuelas;
        }

        public function getAtributo($atributo)
        {
            // VERIFICAR SI EXISTE EL ATRIBUTO
            if (property_exists($this, $atributo) && isset($this->$atributo)) 
            {
                return $this->$atributo;
            }
            else
            {
                return null;
            }
        }



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
    }

    define('Administrador', 1);
    define('Docente', 2);
    define('Estudiante', 3);