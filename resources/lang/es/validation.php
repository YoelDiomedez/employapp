<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'El campo :attribute debe ser aceptado.',
    'active_url'           => 'El campo :attribute no es una URL válida.',
    'after'                => 'El campo :attribute debe ser una fecha posterior a :date.',
    'after_or_equal'       => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
    'alpha'                => 'El campo :attribute sólo puede contener letras.',
    'alpha_dash'           => 'El campo :attribute sólo puede contener letras, números y guiones (a-z, 0-9, -_).',
    'alpha_num'            => 'El campo :attribute sólo puede contener letras y números.',
    'array'                => 'El campo :attribute debe ser un array.',
    'before'               => 'El campo :attribute debe ser una fecha anterior a :date.',
    'before_or_equal'      => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => 'El campo :attribute debe ser un valor entre :min y :max.',
        'file'    => 'El archivo :attribute debe pesar entre :min y :max kilobytes.',
        'string'  => 'El campo :attribute debe contener entre :min y :max caracteres.',
        'array'   => 'El campo :attribute debe contener entre :min y :max elementos.',
    ],
    'boolean'              => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed'            => 'El campo confirmación de :attribute no coincide.',
    'date'                 => 'El campo :attribute no corresponde con una fecha válida.',
    'date_format'          => 'El campo :attribute no corresponde con el formato de fecha :format.',
    'different'            => 'Los campos :attribute y :other deben ser diferentes.',
    'digits'               => 'El campo :attribute debe ser un número de :digits dígitos.',
    'digits_between'       => 'El campo :attribute debe contener entre :min y :max dígitos.',
    'dimensions'           => 'El campo :attribute tiene dimensiones inválidas.',
    'distinct'             => 'El campo :attribute tiene un valor duplicado.',
    'email'                => 'El campo :attribute debe ser una dirección de correo válida.',
    'exists'               => 'El campo :attribute seleccionado no existe.',
    'file'                 => 'El campo :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute debe tener algún valor.',
    'image'                => 'El campo :attribute debe ser una imagen.',
    'in'                   => 'El campo :attribute es inválido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => 'El campo :attribute debe ser un número entero.',
    'ip'                   => 'El campo :attribute debe ser una dirección IP válida.',
    'ipv4'                 => 'El campo :attribute debe ser una dirección IPv4 válida.',
    'ipv6'                 => 'El campo :attribute debe ser una dirección IPv6 válida.',
    'json'                 => 'El campo :attribute debe ser una cadena de texto JSON válida.',
    'max'                  => [
        'numeric' => 'El campo :attribute no debe ser mayor a :max.',
        'file'    => 'El archivo :attribute no debe pesar más de :max kilobytes.',
        'string'  => 'El campo :attribute no debe contener más de :max caracteres.',
        'array'   => 'El campo :attribute no debe contener más de :max.',
    ],
    'mimes'                => 'El campo :attribute debe ser un archivo de tipo :values.',
    'mimetypes'            => 'El campo :attribute debe ser un archivo de tipo :values.',
    'min'                  => [
        'numeric' => 'El campo :attribute debe tener al menos :min.',
        'file'    => 'El archivo :attribute debe pesar al menos :min kilobytes.',
        'string'  => 'El campo :attribute debe contener al menos :min caracteres.',
        'array'   => 'El campo :attribute debe contener al menos :min elementos.',
    ],
    'not_in'               => 'El campo :attribute seleccionado es inválido.',
    'not_regex'            => 'El formato del campo :attribute es inválido.',
	'numeric'              => 'El campo :attribute debe ser un número.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato del campo :attribute es inválido.',
    'required'             => 'El campo :attribute es obligatorio.',
    'required_if'          => 'El campo :attribute es obligatorio cuando el campo :other es :value.',
    'required_unless'      => 'El campo :attribute es requerido a menos que :other se encuentre en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de los campos :values está presente.',
    'same'                 => 'Los campos :attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El campo :attribute debe ser :size.',
        'file'    => 'El archivo :attribute debe pesar :size kilobytes.',
        'string'  => 'El campo :attribute debe contener :size caracteres.',
        'array'   => 'El campo :attribute debe contener :size elementos.',
    ],
    'string'               => 'El campo :attribute debe ser una cadena de caracteres.',
    'timezone'             => 'El campo :attribute debe contener una zona válida.',
    'unique'               => 'El valor del campo :attribute ya está en uso.',
    'uploaded'             => 'El campo :attribute falló al subir.',
    'url'                  => 'El formato del campo :attribute es inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'dni' => [
            'digits'   => 'El campo DNI debe ser un número de :digits dígitos.',
            'numeric'  => 'El campo DNI debe ser un número.',
            'required' => 'El campo DNI es obligatorio.',
            'unique'   => 'El valor del campo DNI ya está en uso.',
        ],
        'ruc' => [
            'digits'   => 'El campo RUC debe ser un número de :digits dígitos.',
            'numeric'  => 'El campo RUC debe ser un número.',
            'required' => 'El campo RUC es obligatorio.',
            'unique'   => 'El valor del campo RUC ya está en uso.',
        ],
        'cellphone_number' => [
            'digits'   => 'El campo Número Celular debe ser un número de :digits dígitos.',
            'numeric'  => 'El campo Número Celular debe ser un número.',
            'required' => 'El campo Número Celular es obligatorio.',
        ],
        'tuition_number' => [
            'digits'   => 'El campo № de Colegiatura debe ser un número de :digits dígitos.',
            'numeric'  => 'El campo № de Colegiatura debe ser un número.',
            'unique'   => 'El valor del campo № de Colegiatura ya está en uso.',
        ],
        'birth_date' => [
            'before_or_equal' => 'El campo Fecha de Nacimiento debe ser una fecha anterior o igual a :date.',
            'date'            => 'El campo Fecha de Nacimiento no corresponde con una fecha válida.',
            'required'        => 'El campo Fecha de Nacimiento es obligatorio.',
        ],
        'profile_picture' => [
            'file' => 'El campo Fotografia debe ser un archivo.',
            'max'  => [
                'file' => 'El archivo Fotografia no debe pesar más de :max kilobytes.',
            ],
            'mimes'    => 'El campo Fotografia debe ser un archivo de tipo :values.',          
            'required' => 'El campo Fotografia es obligatorio.',
        ],
        'ffaa_file' => [
            'file' => 'El campo ¿Perteneció a las FF. AA.? debe ser un archivo.',
            'max'  => [
                'file' => 'El archivo ¿Perteneció a las FF. AA.? no debe pesar más de :max kilobytes.',
            ],
            'mimes' => 'El campo ¿Perteneció a las FF. AA.? debe ser un archivo de tipo :values.',          
        ],
        'disability_file' => [
            'file' => 'El campo ¿Es usted una persona con discapacidad? debe ser un archivo.',
            'max'  => [
                'file' => 'El archivo ¿Es usted una persona con discapacidad? no debe pesar más de :max kilobytes.',
            ],
            'mimes' => 'El campo ¿Es usted una persona con discapacidad? debe ser un archivo de tipo :values.',          
        ],
        'affidavit_file' => [
            'file' => 'El campo Declaración Jurada debe ser un archivo.',
            'max'  => [
                'file' => 'El archivo Declaración Jurada no debe pesar más de :max kilobytes.',
            ],
            'mimes'    => 'El campo Declaración Jurada debe ser un archivo de tipo :values.',          
            'required' => 'El campo Declaración Jurada es obligatorio.',
        ],
        'dni_file' => [
            'file' => 'El campo Copia del DNI debe ser un archivo.',
            'max'  => [
                'file' => 'El archivo Copia del DNI no debe pesar más de :max kilobytes.',
            ],
            'mimes'    => 'El campo Copia del DNI debe ser un archivo de tipo :values.',          
            'required' => 'El campo Copia del DNI es obligatorio.',
        ],
        'vacancy_file' => [
            'file' => 'El campo Declaración Jurada Elección de Vacante debe ser un archivo.',
            'max'  => [
                'file' => 'El archivo Declaración Jurada Elección de Vacante no debe pesar más de :max kilobytes.',
            ],
            'mimes'    => 'El campo Declaración Jurada Elección de Vacante debe ser un archivo de tipo :values.',          
            'required' => 'El campo Declaración Jurada Elección de Vacante es obligatorio.',
        ],
        'aditional_file' => [
            'file' => 'El campo Declaración Jurada Adicional debe ser un archivo.',
            'max'  => [
                'file' => 'El archivo Declaración Jurada Adicional no debe pesar más de :max kilobytes.',
            ],
            'mimes' => 'El campo Declaración Jurada Adicional debe ser un archivo de tipo :values.',          
        ],
        'degree_file' => [
            'file' => 'El campo Archivo debe ser un archivo.',
            'max'  => [
                'file' => 'El archivo no debe pesar más de :max kilobytes.',
            ],
            'mimes' => 'El campo Archivo debe ser un archivo de tipo :values.',          
        ],
        'degree_date' => [
            'date'   => 'El campo Fecha de Expedición del Título o Grado no corresponde con una fecha válida.',
            'before' => 'El campo Fecha de Expedición del Título o Grado debe ser una fecha anterior a :date.',
        ],
        'file' => [
            'file' => 'El campo Archivo debe ser un archivo.',
            'max'  => [
                'file' => 'El archivo no debe pesar más de :max kilobytes.',
            ],
            'mimes' => 'El campo Archivo debe ser un archivo de tipo :values.',          
        ],
        'hours' => [
            'min' => [
                'numeric' => 'El campo Horas Lectivas debe tener al menos :min.',
            ],
            'numeric'  => 'El campo Horas Lectivas debe ser un número.',
            'required' => 'El campo Horas Lectivas es obligatorio.',
        ],
        'start_date' => [
            'before' => 'El campo Fecha de Inicio debe ser una fecha anterior a :date.',
            'date'     => 'El campo Fecha de Inicio no corresponde con una fecha válida.',
            'required' => 'El campo Fecha de Inicio es obligatorio.',
        ],
        'end_date' => [
            'after'    => 'El campo Fecha de Finalización debe ser una fecha posterior a :date.',
            'date'     => 'El campo Fecha de Finalización no corresponde con una fecha válida.',
            'required' => 'El campo Fecha de Finalización es obligatorio.',
        ],
        'bases' => [
            'file' => 'El campo Bases debe ser un archivo.',
            'max'  => [
                'file' => 'El archivo Bases no debe pesar más de :max kilobytes.',
            ],
            'mimes' => 'El campo Bases debe ser un archivo de tipo :values.',          
        ],
        'annexes' => [
            'file' => 'El campo Anexos debe ser un archivo.',
            'max'  => [
                'file' => 'El archivo Anexos no debe pesar más de :max kilobytes.',
            ],
            'mimes' => 'El campo Anexos debe ser un archivo de tipo :values.',          
        ],
        'partial_results' => [
            'file' => 'El campo Resultado de Evaluación Curricular debe ser un archivo.',
            'max'  => [
                'file' => 'El archivo Resultado de Evaluación Curricular no debe pesar más de :max kilobytes.',
            ],
            'mimes' => 'El campo Resultado de Evaluación Curricular debe ser un archivo de tipo :values.',          
        ],
        'final_results' => [
            'file' => 'El campo Resultado Final debe ser un archivo.',
            'max'  => [
                'file' => 'El archivo Resultado Final no debe pesar más de :max kilobytes.',
            ],
            'mimes' => 'El campo Resultado Final debe ser un archivo de tipo :values.',          
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];