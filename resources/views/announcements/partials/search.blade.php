{!! Form::open(['route' => 'announcements.index', 'method' => 'GET', 'class' => 'form-inline']) !!} 

    <div class="form-group">
        {{ Form::select(
            'month', 
            [
                '01' => 'ENERO', 
                '02' => 'FEBRERO',
                '03' => 'MARZO',
                '04' => 'ABRIL',
                '05' => 'MAYO', 
                '06' => 'JUNIO',
                '07' => 'JULIO',
                '08' => 'AGOSTO',
                '09' => 'SEPTIEMBRE', 
                '10' => 'OCTUBRE',
                '11' => 'NOVIEMBRE',
                '12' => 'DICIEMBRE'
            ], 
            $month,
            ['class' => 'form-control selectpicker', 'required' => 'true']
        ) }}
    </div>

    <div class="form-group">
        {{ Form::select(
            'year', 
            [
                date('Y')-1 => date('Y')-1,
                date('Y') => date('Y')
            ], 
            $year,
            ['class' => 'form-control selectpicker', 'required' => 'true']
        ) }}    
    </div>

    <button type="submit" class="btn purple btn-outline">
        Buscar <i class="fa fa-search"></i>
    </button>

{!! Form::close() !!}