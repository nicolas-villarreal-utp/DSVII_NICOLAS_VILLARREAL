<?php

class Datos
{

    public $usuarios;
    public $estudiantes;

    function __construct()
    {
        $this->usuarios = [
            [
                'nombre' => 'Juan Pérez',
                'correo' => 'juan.perez@mail.com',
                'contrasena' => '12345678', //'dB9g8Z2m',
                'rol' => 'estudiante'
            ],
            [
                'nombre' => 'María López',
                'correo' => 'maria.lopez@mail.com',
                'contrasena' => '12345678', //'kX3vB1eF',
                'rol' => 'estudiante'
            ],
            [
                'nombre' => 'Carlos Ramírez',
                'correo' => 'carlos.ramirez@mail.com',
                'contrasena' => '12345678', //'p1234567',
                'rol' => 'profesor'
            ]
        ];

        $this->estudiantes = [
            [
                'nombre' => 'Juan Pérez',
                'correo' => 'juan.perez@mail.com',
                'calificaciones' => [
                    'Parcial 1' => 85,
                    'Parcial 2' => 90,
                    'Parcial 3' => 88,
                    'Parcial 4' => 92,
                    'Parcial 5' => 87
                ]
            ],
            [
                'nombre' => 'María López',
                'correo' => 'maria.lopez@mail.com',
                'calificaciones' => [
                    'Parcial 1' => 78,
                    'Parcial 2' => 85,
                    'Parcial 3' => 80,
                    'Parcial 4' => 89,
                    'Parcial 5' => 90
                ]
            ]
        ];
    }


    //Funcion que valida el email y la contraseña
    function validarUsuario($email, $password)
    {

        foreach ($this->usuarios as $usuario) {

            //echo $email . ' ' . $password . '<br>';
            //echo $usuario['correo'] . ' ' . $usuario['contrasena'] . '<br>';

            if ($usuario['correo'] === $email && $usuario['contrasena'] === $password) {

                return $usuario;
                
            }
        }
        return false;
    }
}
